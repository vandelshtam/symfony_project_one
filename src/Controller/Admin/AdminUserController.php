<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Form\UserType;


use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Registry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AdminUserController extends AdminBaseController
{
    /**
     * @Route("/admin/user", name="admin_user")
     * @return Respose
     */
    public function index(ManagerRegistry $doctrine): Response
    {
        //$product = $doctrine->getRepository(Product::class)->find($id);
        $users = $doctrine -> getRepository(User::class) -> findAll();

        $forRender = parent::renderDefault();
        $forRender['title'] = 'Пользователи';
        $forRender['users'] = $users;
        return $this->render('admin/user/index.html.twig', $forRender);
    }

    /**
     * @Route("/admin/user/create", name="admin_user_created")
     * @param Request $request
     * @param UserPasswordHasherInterface $passwordEncoder
     * @return RedirectRespose|Respose
     */
    public function create(ManagerRegistry $doctrine, Request $request, UserPasswordHasherInterface $passwordEncoder)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $em = $doctrine()->getEntityManager();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $password = $passwordEncoder->hashPassword($user, $user->get->planPassword());
            //$task = $form->getData();
            $user->setPassword($password);
            $user->setRoles('ROLE_ADMIN');
            $em->persist($user);
            $em->flush();
            // ... perform some action, such as saving the task to the database

            return $this->redirectToRoute('/');
        }
        $forRender = parent::renderDefault();
        $forRender['title'] = 'Форма создания пользователя';
        $forRender['form'] = $form -> createView();

        return $this -> render('admin/user/form.html.twig');
    }
}
