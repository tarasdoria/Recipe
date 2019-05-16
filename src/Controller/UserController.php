<?php

declare(strict_types=1);


namespace App\Controller;


use App\UserBundle\Entity\User;
use App\UserBundle\Form\Type\UserSearchType;
use App\UserBundle\Form\Type\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class UserController
 * @package App\Controller
 */
class UserController extends Controller
{
    /**
     * @param Request $request
     *
     * @return Response
     */
    public function indexAction(Request $request): Response
    {
        $form = $this->createForm(UserSearchType::class);
        $form->handleRequest($request);
        $params   = !empty($form->getData()) ? array_filter($form->getData()) : [];
        $em       = $this->getDoctrine()->getManager();
        $resource = $em->getRepository(User::class)->getAll($params, $form);

        return $this->render('UserBundle::index.html.twig', [
            'resources' => $resource,
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
        $em       = $this->getDoctrine()->getManager();
        $resource = new User();
        $form     = $this->createForm(UserType::class, $resource);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em->persist($resource);
            $em->flush();
            return $this->redirectToRoute('app_user_index', []);
        }

        return $this->render('UserBundle::add.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @param Request $request
     * @param User    $resource
     *
     * @return Response
     */
    public function editAction(Request $request, User $resource): Response
    {
        $em   = $this->getDoctrine()->getManager();
        $form = $this->createForm(UserType::class, $resource);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $this->get('fos_user.user_manager')->updateUser($form->getData(), false);
            $em->flush();
            return $this->redirectToRoute('app_user_index');
        }

        return $this->render('UserBundle::edit.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @param Request $request
     * @param User    $resource
     *
     * @return Response
     */
    public function deleteAction(Request $request, User $resource): Response
    {
        $em = $this->getDoctrine()->getManager();
        if ($request->isMethod('POST')) {
            $em->remove($resource);
            $em->flush();
            return $this->redirectToRoute('app_user_index');
        }

        return $this->render('UserBundle::delete.html.twig', [
            'resources' => $resource]);
    }

}