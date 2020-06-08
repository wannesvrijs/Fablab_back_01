<?php

namespace App\Controller;

use App\Repository\UserRepository;
use PHPUnit\Util\Json;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;

class CustomApiController extends AbstractController
{
    /**
     * @Route("/api/emailIsTaken", name="custom_api", methods={"GET"})
     */
    public function getPosts( UserRepository $userRepository, SerializerInterface $serializer, NormalizerInterface $normalizer)
    {
        $fabmoments = $fabmomentRepository->findFabmomentCollection();

        return $this->json($fabmoments, 200);
    }
}
