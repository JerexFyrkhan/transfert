<?php

namespace App\Controller;

use App\Repository\Object756Repository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListObjectsController extends AbstractController
{

    private Object756Repository $object756Repository;

    public function __construct(Object756Repository $object756Repository)
    {
        $this->object756Repository = $object756Repository;
    }

    #[Route('/list/objects', name: 'app_list_objects')]
    public function index(): Response
    {
        $objects = $this->object756Repository->findAll();
        return $this->render('list_objects/index.html.twig', [
            'objects' => $objects,
        ]);
    }
}
