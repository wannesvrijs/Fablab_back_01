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
            return $this->json("Geen account gevonden voor: $email",'404');
        }

        if ($user->getUseIsActief()){
            return $this->json('Dit profiel is reeds actief.','403');
        }

        if ($user->getUpdatedAt() < $history) {
            $newregkey = bin2hex(random_bytes(32));
            $user->setUseRegkey($newregkey);
            $em->persist($user);
            $em->flush();
            $this->sendMail($user->getEmail(), $newregkey);
            return $this->json('Verlopen activatielink, een mail met een nieuwe link werd verzonden.','401');
        }


        if (!$user->getUseRegkey() == $regkey) {
            return $this->json("Deze link bevat geen geldige gegevens.",'404');
        }

            $newregkey = bin2hex(random_bytes(32));

            $user->setUseIsActief(true);
            $user->setUseRegkey($newregkey);

            $em->persist($user);
            $em->flush();

            return $this->json('Je profiel werd succesvol geactiveerd.','201');

    }
}
