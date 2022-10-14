<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserFormType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class Usercontroller extends AbstractController
{
    #[Route('/', name: "app_login")]
    public function homepage ():Response
    {
        return $this->render('login/user.html.twig',[
        'title' => 'login'
        ]);
    }
    #[Route('users/create', name: 'app_create_user')]
    public function create(Request $request, EntityManagerInterface $entityManager) :Response
    {
        $user = new User();
        $form = $this->createForm(UserFormType::class, $user,);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $user = $form->getData();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('app_users');
        }


        return $this->renderForm('user/new.html.twig',[
            'form' => $form
        ]);
    }



    #[Route('/users', name: 'app_users')]
    public function index(UserRepository $userRepository) :Response
    {
        $users = $userRepository->findAll();
        return $this->render('user/users.html.twig', ['users'=> $users]);
    }


    #[Route('users/store', name: 'app_store_user')]
    public function store() :Response
    {
        return $this->render('user/users.html.twig');
    }







    #[Route('users/edit/{id}', name: 'app_edit_user')]
    public function edit(User $user, Request $request, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(UserFormType::class, $user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $user = $form->getData();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('app_users');
        }


        return $this->renderForm('user/edit.html.twig',[
            'form' => $form
        ]);

    }
    #[Route('users/{id}/delete', name: 'app_delete_user')]
    public function delete(User $user):Response
    {
        return $this->render('user/users.html.twig');
    }

    #[Route('/new')]
    public function newuser(EntityManagerInterface $entityManager) :Response
    {
        $user = new User();
        $user->setName('Tim Thomsen');
        $user->setOrt('timland');
        $user->setEmail('tim@tamland.com');
        $user->setPlz('10243');
        $user->setTelefon('0190332332');
        $user->setPasswort('geheim');

        $entityManager->persist($user);
        $entityManager->flush();;
        return new Response(sprintf('Hallo %d du wohnst in %s',
        $user->getId(),
        $user->getOrt()));
    }

    #[Route('/users/{id}', name: 'app_user')]
    public function show(User $user) :Response
    {
        return $this->render('user/user.html.twig',[
            'user'=> $user]);

    }

}