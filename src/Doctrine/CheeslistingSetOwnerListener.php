<?php


namespace App\Doctrine;


use App\Entity\CheeseListing;
use Symfony\Component\Security\Core\Security;

class CheeslistingSetOwnerListener
{

    private $security;

    //extra config in services.yaml to make sure autwiring is working
    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    //function to be executed before persisting to the database
    public function prePersist(CheeseListing $cheeseListing)
    {
        if ($cheeseListing->getOwner()){
            return;
        }
        if ($this->security->getUser()){
            $cheeseListing->setOwner($this->security->getUser());
        }
    }

}