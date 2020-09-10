<?php
namespace App\Controller;

use App\Model\SaleSearch;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends AbstractController
{
    /**
     * @Route("/",name="home_index")
     * @return Response A response instance
     */
    public function index(Request $request, SaleSearch $search): Response
    {
        
       return $this->render('index.html.twig');
    }
}