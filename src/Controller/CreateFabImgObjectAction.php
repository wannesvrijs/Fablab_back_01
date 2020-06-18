<?php


namespace App\Controller;


use App\Entity\FabImg;
use App\Entity\Fabmoment;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class CreateFabImgObjectAction
{
    public function __invoke(Request $request, EntityManagerInterface $em)
    {
        $uploadedFile = $request->files->get('file');
        $uploadedData = $request->request->all();

        if (!$uploadedFile) {
            throw new BadRequestHttpException('"file" is required');
        }
        if (!$uploadedData['id']) {
            throw new BadRequestHttpException('"fabImgFab" is required');
        }

        $fabImgObject = new FabImg();
        $fabImgObject->fabimgImgFile = $uploadedFile;

        $fabMoment = $em->getReference(Fabmoment::class, $uploadedData['id']);
        $fabImgObject->setFabimgFab($fabMoment);

        return $fabImgObject;
    }
}