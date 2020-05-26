<?php

namespace App\DataFixtures;

use App\Entity\Land;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AdminFixture extends Fixture
{

    /**
     * @var UserPasswordEncoderInterface
     */
    private $userPasswordEncoder;

    public function __construct(UserPasswordEncoderInterface $userPasswordEncoder)
    {
        $this->userPasswordEncoder = $userPasswordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $land = new Land();
        $land->setLandNaam('belgie');
        $manager->persist($land);
        $manager->flush();

        $user = new User();
        $user->setEmail('admin@example.com')
            ->setPassword($this->userPasswordEncoder->encodePassword($user, 'wannes'))
            ->setUseAn("vrijs")
            ->setUseVn("wannes")
            ->setUseBeroep("student")
            ->setUseFabworthy(2)
            ->setUseGeboorte(new \DateTime())
            ->setUseGemeente('Genk')
            ->setUsePostcode(2812)
            ->setUseRegkey('refeferferf')
            ->setUseIsActief(true)
            ->setUseIsBlocked(false)
            ->setUseIsDeleted(false)
            ->setUseSchool('syntra')
            ->setUseRichting('grafische')
            ->setUseLand($land)
            ->setRoles(['ROLE_ADMIN']);


        $manager->persist($user);
        $manager->flush();
    }
}
