<?php 
namespace App\Controller;

use App\Form\SearchBienType;
use App\Model\SearchBien;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mime\Address;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;

class SearchController extends AbstractController
{
   /**
     * Contact page display
     * @Route("/search",name="search_index",  methods={"GET","POST"})
     * @return Response A reponse instance
     */
    public function contact(Request $request, MailerInterface $mailer): Response
    {
        $searchBien = new SearchBien();
        $form = $this->createForm(SearchBienType::class, $searchBien);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $email = (new templatedEmail())
                ->from($this->getParameter('mailer_from'))
                ->to(new Address($this->getParameter('mailer_to')))
                ->subject("Vous avez reçu un email pour une recherche de bien !")
                ->html($this->renderView('search/mail.html.twig', [
                    'searchBien' => $searchBien
                ]));

            $mailer->send($email);

            $this->addFlash('success', 'Votre message a été transmis, nous vous répondrons dans les meilleurs délais.');
            return $this->redirectToRoute('search_index');
        }

        return $this->render('search/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}