<?php

namespace App\Security\Voter;

use App\Entity\Inschrijving;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;

class InschrijvingVoter extends Voter
{

    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    protected function supports($attribute, $subject)
    {
        // replace with your own logic
        // https://symfony.com/doc/current/security/voters.html
        return in_array($attribute, ['READ'])
            && $subject instanceof Inschrijving;
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $user = $token->getUser();
        // if the user is anonymous, do not grant access
        if (!$user instanceof UserInterface) {
            return false;
        }

        /**
         * @var Inschrijving $subject
         */

        // ... (check conditions and return true to grant permission) ...
        switch ($attribute) {
            case 'READ':
                if($subject->getInsUse() === $user) {
                    return true;
                }
                if ($this->security->isGranted("ROLE_ADMIN")) {
                    return true;
                }
                return false;
        }

        throw new \Exception(sprintf('Unhandled attribute "%s"', $attribute));
    }
}
