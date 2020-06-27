<?php

namespace App\Controller;

use App\Entity\MachineCategorie;
use App\Entity\Materiaal;
use App\Entity\User;
use App\helpers\MailerTrait;
use App\Repository\FabmomentRepository;
use App\Repository\MachineCategorieRepository;
use App\Repository\MateriaalRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;



class CustomApiController extends AbstractController
{
    use MailerTrait;


    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @Route("/api/activatie", name="activatie_api", methods={"POST"})
     */
    public function profileActivation(UserRepository $userRepository, Request $request)
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
            $this->em->persist($user);
            $this->em->flush();
            $this->sendMail($user->getEmail(), $newregkey);
            return $this->json('Verlopen activatielink, een mail met een nieuwe link werd verzonden.','401');
        }


        if (!$user->getUseRegkey() == $regkey) {
            return $this->json("Deze link bevat geen geldige gegevens.",'404');
        }

            $newregkey = bin2hex(random_bytes(32));

            $user->setUseIsActief(true);
            $user->setUseRegkey($newregkey);

            $this->em->persist($user);
            $this->em->flush();

            return $this->json('Je profiel werd succesvol geactiveerd.','201');

    }

    /**
     * @Route("/api/all_materialen", name="all_materialen_api", methods={"GET"})
     */
    public function getMaterialen(MateriaalRepository $materiaal)
    {
        $result = $materiaal->createQueryBuilder('m')
            ->select(['m.matNaam', 'm.id'])
            ->getQuery()->getResult();

        return $this->json($result, 200);
    }

    /**
     * @Route("/api/all_technieken", name="all_technieken_api", methods={"GET"})
     */
    public function getTechnieken(MachineCategorieRepository $techniek)
    {
        $result = $techniek->createQueryBuilder('t')
            ->select(['t.mcatNaam', 't.id'])
            ->getQuery()->getResult();

        return $this->json($result, 200);
    }

    /**
     * @Route("/api/fabmoments_posted_id", name="fabmoments_posted_api", methods={"GET"})
     */
    public function getPostedFabmomentIds(FabmomentRepository $fabmoment)
    {
        $result = $fabmoment->createQueryBuilder('f')
            ->select(['f.id', 'f.slug'])
            ->andWhere('f.fabIsPosted = :fabIsPosted')
            ->setParameter('fabIsPosted', true)
            ->getQuery()->getResult();

        return $this->json($result, 200);
    }

}
