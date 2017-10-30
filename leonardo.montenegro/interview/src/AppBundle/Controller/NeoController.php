<?php
// src/AppBundle/Controller/NeoController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NeoController extends Controller
{
    /**
     * @Route("/getNEO")
     */
    public function numberAction()
    {
        $number = mt_rand(0, 100);

        return $this->render('lucky/number.html.twig', array(
            'number' => $number,
        ));
    }
    
    /**
     * @Route("/lucky/teste/{test}")
     */
    public function teste($test)
    {
        $response = new JsonResponse();
        $response->setData(["teste"=>$test]);
        return $response;
    }
            
}