<?php


namespace App\Doctrine;


use App\Entity\Fabmoment;
use Symfony\Component\Security\Core\Security;

class FabmomentSetUserListener
{

    private $security;

    //extra config in services.yaml to make sure autwiring is working
    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    //function to be executed before persisting to the database
    public function prePersist(Fabmoment $fabmoment)
    {
        if ($this->security->getUser()){
            $fabmoment->setFabUse($this->security->getUser());
        }
    }

}

