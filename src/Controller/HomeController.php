<?php

namespace App\Controller;

use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @var PropertyRepository
     */

    private $repository;

    public function __construct(PropertyRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        $properties = $this->repository->findLatest();

        return $this->render('home/index.html.twig', [
            'current_menu' => 'home',
            'properties' => $properties,
        ]);
    }
}
