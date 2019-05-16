<?php

declare(strict_types=1);


namespace App\Controller;


use App\Model\ResourceInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ObjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ResourceController
 * @package App\Controller
 */
abstract class ResourceController extends AbstractController
{
    /**
     * @param Request $request
     *
     * @return Response
     */
    public function indexAction(Request $request)
    {
        $form = $this->createFormFilter();
        $form->handleRequest($request);
        $params    = !empty($form->getData()) ? array_filter($form->getData()) : [];
        $em        = $this->getDoctrine()->getManager();
        $resources = $em->getRepository($this->getEntityClass())->getAll($params, $form);

        return $this->render(ucfirst($this->getEntityName()) . '/index.html.twig', [
            'resources' => $resources,
            'form'      => $form->createView()
        ]);
    }

    /**
     * @param Request $request
     *
     * @return Response
     */
    public function addAction(Request $request): Response
    {
        $resource    = $this->newResource();
        $form        = $this->createMyForm($resource);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $this->getEntityManager()->persist($resource);
            $this->getEntityManager()->flush();
            return $this->redirectToRoute('app_' . $this->getEntityName() . '_index', []);
        }

        return $this->render(ucfirst($this->getEntityName()) . '/add.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @param         $id
     * @param Request $request
     *
     * @return Response
     */
    public function editAction($id, Request $request): Response
    {
        $resources = $this->getMyRepository()->find($id);
        $form     = $this->createMyForm($resources);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $this->getEntityManager()->flush();
            return $this->redirectToRoute('app_' . $this->getEntityName() . '_index');
        }

        return $this->render(ucfirst($this->getEntityName()) . '/edit.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @param         $id
     * @param Request $request
     *
     * @return Response
     */
    public function deleteAction($id, Request $request): Response
    {
        $resources = $this->getMyRepository()->find($id);

        if ($request->isMethod('POST')) {
            $this->getEntityManager()->remove($resources);
            $this->getEntityManager()->flush();
            return $this->redirectToRoute('app_' . $this->getEntityName() . '_index');
        }

        return $this->render(ucfirst($this->getEntityName()) . '/delete.html.twig', [
            'resources' => $resources
        ]);
    }


    /**
     * @return string
     */
    abstract protected function getFormFilter(): string;

    /**
     * @return string
     */
    abstract protected function getFormType(): string;

    /**
     * @return string
     */
    abstract protected function getEntityClass(): string;

    /**
     * @return string
     */
    protected function getEntityName(): string
    {
        return strtolower(substr(strrchr($this->getEntityClass(), '\\'), 1));
    }

    /**
     * @param $resources
     *
     * @return FormInterface
     */
    protected function createMyForm($resources) : FormInterface
    {
        return $this->createForm($this->getFormType(), $resources);
    }

    /**
     * @return FormInterface
     */
    protected function createFormFilter() : FormInterface
    {
        return $this->createForm($this->getFormFilter());
    }

    /**
     * @return ObjectRepository
     */
    protected function getMyRepository(): ObjectRepository
    {
        return $this->getDoctrine()->getManager()->getRepository($this->getEntityClass());
    }

    /**
     * @return ObjectManager
     */
    protected function getEntityManager() : ObjectManager
    {
        return $this->getDoctrine()->getManager();
    }

    /*
     *
     */
    protected function newResource(): ResourceInterface
    {
        $entityClass = $this->getEntityClass();

        return new $entityClass();
    }
}