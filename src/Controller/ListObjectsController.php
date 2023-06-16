<?php

namespace App\Controller;

use App\Repository\Object756Repository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class ListObjectsController extends AbstractController
{

    private Object756Repository $object756Repository;

    public function __construct(Object756Repository $object756Repository, private UrlGeneratorInterface $urlGenerator)
    {
        $this->object756Repository = $object756Repository;
    }

    #[Route('/', name: 'app_list_objects')]
    public function index(Request $request): Response
    {
        if (null !== $request->get('action')) {
            if ('new' === $request->get('action')) {
                return new RedirectResponse($this->urlGenerator->generate('app_new_object'));
            } elseif ('update' === $request->get('action')) {
                return new RedirectResponse($this->urlGenerator->generate('app_manage_object', ['id' => $request->get('objectId')]));
            }
        }
        $objects = $this->object756Repository->findAll();
        return $this->render('list_objects/index.html.twig', [
            'objects' => $objects,
        ]);
    }
}
