<?php

namespace App\Controller\Admin;

use App\Entity\Property;
use App\Form\PropertyType;
use App\Repository\PropertyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PropertyController extends AbstractController{


    /**
     * @var PropertyRepository
     */
    private $repository;
    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(PropertyRepository $repository, EntityManagerInterface $em)
    {

        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * @Route("/admin/properties",name="admin.property.index")
     */
    public function index(): Response{
        $properties = $this->repository->findAll();
        return $this->render('admin/property/index.html.twig', compact('properties'));
    }

    /**
    * @Route("/admin/properties/new", name="admin.property.create")
    */
    public function new(Request $request):Response{
        $property = new Property();
        $form = $this->createForm(PropertyType::class, $property);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $this->em->persist($property);
            $this->em->flush();
            $this->addFlash('success','Property created successfully');
            return $this->redirectToRoute('admin.property.index');
        }
        return $this->render('admin/property/create.html.twig',[
            'property'=> $property,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/properties/{id}", name="admin.property.edit", methods={"GET", "POST"})
    */
    public function edit(Property $property, Request $request): Response
    {
        $form = $this->createForm(PropertyType::class, $property);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $this->em->flush();
            $this->addFlash('success','Property updated successfully');
            return $this->redirectToRoute('admin.property.index');
        }

        return $this->render('admin/property/edit.html.twig',[
            'property'=> $property,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/properties/{id}", name="admin.property.delete", methods={"DELETE"})
     */
    public function delete(Property $property, Request $request): Response{
        if ($this->isCsrfTokenValid('delete'.$property->getId(), $request->request->get('_token'))) {
            $this->em->remove($property);
            $this->em->flush();
            $this->addFlash('success','Property deleted successfully');
        }
        return $this->redirectToRoute('admin.property.index');
    }

}