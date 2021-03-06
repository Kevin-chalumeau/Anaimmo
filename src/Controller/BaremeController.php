<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BaremeController extends AbstractController
{
    /**
     * @Route("/bareme",name="bareme_index")
     * @return Response A response instance
     */
    public function index(): Response
    {
       return $this->render('bareme/index.html.twig');
    }
}