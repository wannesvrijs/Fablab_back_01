<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CustomEasyAdminController
{
    /**
     * @Route("/deploy_now", name="deploy_now", methods={"POST", "GET"})
     */
    public function deployNow()
    {
        $cURLConnection = curl_init();

        curl_setopt($cURLConnection, CURLOPT_URL, 'https://api.vercel.com/v1/integrations/deploy/QmWAagX3ArKjEP15aEEM7AdTxZJ9GVGxMSewZAByRqausQ/fVqIcIrsj4');
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

        $phoneList = curl_exec($cURLConnection);
        curl_close($cURLConnection);

        return new Response('deployment has started');

    }

}