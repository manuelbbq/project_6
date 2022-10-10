<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Usercontroller extends AbstractController
{
    #[Route('/')]
    public function homepage ():Response
    {
        return $this->render('login/user.html.twig',[
        'title' => 'login'
        ]);
    }

    #[Route('/browse/{user}')]
    public function browse($user) :Response
    {
        return new Response('Hallo'.$user);

    }

}