<?php

namespace App\Controller;

use App\Entity\User;
use App\helpers\MailerTrait;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;



class CustomApiController extends AbstractController
{
    use MailerTrait;
    /**
     * @Route("/api/activatie", name="activatie_api", methods={"POST"})
     */
    public function profileActivation(UserRepository $userRepository, Request $request, EntityManagerInterface $em)
    {
        $content = json_decode($request->getContent(), false);
        $email = $content->email;
        $regkey = $content->regkey;
        $date = new \DateTime();
        $history = $date->modify("-1 hour");

        /**
         * @var User $user
         */

        $user = $userRepository->findUserWithEmail($email);
        if (!$user) {
            return $this->json("no match found for: $email",'404');
        }

        if ($user->getUseIsActief()){
            return $this->json('already activated','403');
        }

        if ($user->getUpdatedAt() < $history) {
            $newregkey = bin2hex(random_bytes(32));
            $user->setUseRegkey($newregkey);
            $em->persist($user);
            $em->flush();
            $this->sendMail($user->getEmail(), $newregkey);
            return $this->json('outdated activationlink, mail with new link has been send','403');
        }


        if (!$user->getUseRegkey() == $regkey) {
            return $this->json("invalid match",'404');
        }

            $newregkey = bin2hex(random_bytes(32));

            $user->setUseIsActief(true);
            $user->setUseRegkey($newregkey);

            $em->persist($user);
            $em->flush();

            return $this->json('activated','201');

    }
}
