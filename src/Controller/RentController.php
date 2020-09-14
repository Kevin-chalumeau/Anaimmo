<?php

namespace App\Controller;

use App\Entity\Rent;
use App\Form\RentType;
use App\Repository\RentRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;


/**
 * @Route("/rent")
 */
class RentController extends AbstractController
{
    /**
     * @Route("/", name="rent_index", methods={"GET"})
     */
    public function index(RentRepository $rentRepository, Request $request, PaginatorInterface $paginator): Response
    {   
        $donnees = $this->getDoctrine()->getRepository(Rent::class)->findBy([]);

        $rents = $paginator->paginate(
            $donnees,
            $request->query->getInt('page', 1),
            4
        );
        
        return $this->render('rent/index.html.twig', [
            'rents' => $rentRepository->findAll(),
            'rents' =>$rents
        ]);
    }

    /**
     * @Route("/new", name="rent_new", methods={"GET","POST"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function new(Request $request): Response
    {
        $rent = new Rent();
        $form = $this->createForm(RentType::class, $rent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($rent);
            $entityManager->flush();

            return $this->redirectToRoute('rent_index');
        }

        return $this->render('rent/new.html.twig', [
            'rent' => $rent,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/biens/{slug}-{id}", name="rent_show", methods={"GET"}, requirements={"slug": "[a-z0-9\-]*"})
     * @return Response
     */
    public function show(Rent $rent, string $slug): Response
    {
        if ($rent->getSlug() !== $slug) {
            return $this->redirectToRoute('rent_show', [
                'id' =>$rent->getId(),
                'slug' => $rent->getSlug()
            ], 301);
        }
        return $this->render('rent/show.html.twig', [
            'rent' => $rent,
        ]);
    }


    /**
     * @Route("/{id}/edit", name="rent_edit", methods={"GET","POST"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function edit(Request $request, Rent $rent): Response
    {
        $form = $this->createForm(RentType::class, $rent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'L\'annonce a était modifier');

            return $this->redirectToRoute('rent_index');
        }

        return $this->render('rent/edit.html.twig', [
            'rent' => $rent,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="rent_delete", methods={"DELETE"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function delete(Request $request, Rent $rent): Response
    {
        if ($this->isCsrfTokenValid('delete'.$rent->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($rent);
            $entityManager->flush();
            $this->addFlash('success', 'L\'annonce a était modifier');
        }

        return $this->redirectToRoute('rent_index');
    }
}
