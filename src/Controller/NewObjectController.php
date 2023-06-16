<?php

namespace App\Controller;

use App\Entity\Object756;
use App\Repository\Object756Repository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class NewObjectController extends AbstractController
{

    private Object756Repository $object756Repository;

    public function __construct(Object756Repository $object756Repository, private UrlGeneratorInterface $urlGenerator)
    {
        $this->object756Repository = $object756Repository;
    }

    #[Route('/new/object', name: 'app_new_object')]
    public function index(Request $request): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');

        if (null !== $request->get('action')) {
            if ('create' === $request->get('action')) {
                $object756 = new Object756();
                $object756->setNom($request->get('nomNew'));
                $object756->setDescription($request->get('description'));
                $object756->setProprietaire($this->getUser());

                $this->object756Repository->save($object756, true);
                return new RedirectResponse($this->urlGenerator->generate('app_list_objects'));
            }
        }

        return $this->render('new_object/index.html.twig', [
            'controller_name' => 'NewObjectController',
        ]);
    }
}
