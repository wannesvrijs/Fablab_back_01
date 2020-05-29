<?php


namespace App\Doctrine;


use App\Entity\Inschrijving;
use Symfony\Component\Security\Core\Security;

class InschrijvingSetUserListener
{

    private $security;

    //extra config in services.yaml to make sure autwiring is working
    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    //function to be executed before persisting to the database
    public function prePersist(Inschrijving $inschrijving)
    {
        if ($this->security->getUser()){
            $inschrijving->setInsUse($this->security->getUser());
        }
    }

}