<?php


namespace App\Security;


use App\Entity\User;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\Security\Core\Exception\AccountExpiredException;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\DisabledException;
use Symfony\Component\Security\Core\User\UserCheckerInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class UserChecker implements UserCheckerInterface
{
    public function checkPreAuth(UserInterface $user)
    {
        if (!$user instanceof User) {
            return;
        }

        if ($user->getUseIsBlocked())  {
            throw new AuthenticationException('not valid');
        }

        if ($user->getUseIsDeleted())  {
            throw new AuthenticationException('not valid');
        }

        return;
    }

    public function checkPostAuth(UserInterface $user)
    {

        return;

    }
}