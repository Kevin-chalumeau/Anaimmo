<?php

namespace App\Controller;

use App\Entity\Option;
use App\Form\OptionType;
use App\Entity\Sale;
use App\Form\ContactBienType;
use App\Form\SaleType;
use App\Model\ContactBien;
use App\Repository\SaleRepository;
use Knp\Component\Pager\PaginatorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mime\Address;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;

// Mise en place des différentes éléments du crud

/**
 * @Route("/sale")
 */
class SaleController extends AbstractController
{
    /**
     * @Route("/", name="sale_index", methods={"GET"})
     */
    public function index(SaleRepository $saleRepository,Request $request, PaginatorInterface $paginator): Response
    {   
        $donnee = $this->getDoctrine()->getRepository(Sale::class)->findBy([]);

        $sales = $paginator->paginate(
            $donnee,
            $request->query->getInt('page', 1),
            4
        );

        return $this->render('sale/index.html.twig', [
            'sales' => $saleRepository->findAll(),
            'sales' =>$sales
        ]);
    }
    //Fonction création de nouveau bien
    /**
     * @Route("/new", name="sale_new", methods={"GET","POST"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function new(Request $request): Response
    {
        $sale = new Sale();
        $form = $this->createForm(SaleType::class, $sale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($sale);
            $entityManager->flush();

            return $this->redirectToRoute('sale_index');
        }

        return $this->render('sale/new.html.twig', [
            'sale' => $sale,
            'form' => $form->createView(),
        ]);
    }
    // Visualisation du bien en entier, mis en place du formulaire d'envoi de mail
    /**
     * @Route("/biens/{slug}-{id}", name="sale_show", methods={"GET", "POST"}, requirements={"slug": "[a-z0-9\-]*"})
     * @return Response
     */
    public function show(Sale $sale, string $slug, Request $request, MailerInterface $mailer): Response
    {
       

        if ($sale->getSlug() !== $slug) {
            return $this->redirectToRoute('sale_show', [
                'id' =>$sale->getId(),
                'slug' => $sale->getSlug()
            ], 301);
        }

        $contactBien = new ContactBien();
        $contactBien->setSale($sale);
        $form = $this->createForm(ContactBienType::class, $contactBien);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $email = (new templatedEmail())
                ->from($this->getParameter('mailer_from'))
                ->to(new Address($this->getParameter('mailer_to')))
                ->subject("Vous avez reçu un email d'un visiteur pour un bien en vente !")
                ->html($this->renderView('contactBien/mail.html.twig', [
                    'contactBien' => $contactBien
                ]));

            $mailer->send($email);

            $this->addFlash('success', 'Votre message a été transmis, nous vous répondrons dans les meilleurs délais.');
            return $this->redirectToRoute('sale_show', [
                'id' =>$sale->getId(),
                'slug' => $sale->getSlug()
            ]);
        }


        return $this->render('sale/show.html.twig', [
            'sale' => $sale,
            'form' => $form->createView()
        ]);
    }
    // Editions d'un bien deja existant
    /**
     * @Route("/{id}/edit", name="sale_edit", methods={"GET","POST"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function edit(Request $request, Sale $sale): Response
    {

        $form = $this->createForm(SaleType::class, $sale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'L\'annonce a était modifier');

            return $this->redirectToRoute('sale_index');
        }

        return $this->render('sale/edit.html.twig', [
            'sale' => $sale,
            'form' => $form->createView(),
        ]);
    }
    //Suppression d'un bien
    /**
     * @Route("/{id}", name="sale_delete", methods={"DELETE"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function delete(Request $request, Sale $sale): Response
    {
        if ($this->isCsrfTokenValid('delete'.$sale->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($sale);
            $entityManager->flush();
            $this->addFlash('success', 'L\'annonce a était supprimer');
        }

        return $this->redirectToRoute('sale_index');
    }
}
