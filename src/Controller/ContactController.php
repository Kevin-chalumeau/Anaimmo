<?php 
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
     /**
     * Contact page display
     * @Route("/contact",name="contact_index",  methods={"GET","POST"})
     * @return Response A reponse instance
     */
    public function index(): Response
    {
       return $this->render('contact/index.html.twig');
    }
}