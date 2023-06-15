<?php

namespace App\Controller;

use App\Repository\Object756Repository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ManageObjectController extends AbstractController
{

    private Object756Repository $object756Repository;
    private EntityManagerInterface $entityManager;

    public function __construct(Object756Repository $object756Repository, EntityManagerInterface $entityManager)
    {
        $this->object756Repository = $object756Repository;
        $this->entityManager = $entityManager;
    }

    #[Route('/manage/object/{id}', name: 'app_manage_object')]
    public function index(int $id, Request $request): Response
    {
        $object = $this->object756Repository->find($id);
        if (null === $object) {
            throw new \InvalidArgumentException('Id doesn\'t exists');
        }

        if (null !== $request->get('action')) {
            if ('update' === $request->get('action')) {
                $object->setNom($request->get('nomNew'));
                $object->setDescription($request->get('description'));
                $this->object756Repository->save($object, true);
            }
            if ('delete' === $request->get('action')) {
                $this->object756Repository->remove($object, true);
            }
        }

        return $this->render('manage_object/index.html.twig', [
            'object' => $object,
        ]);
    }
}
