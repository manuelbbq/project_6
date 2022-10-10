<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Usercontroller
{
    #[Route('/')]
    public function homepage ():Response
    {
        return new Response('Hallo');
    }

    #[Route('/browse/{user}')]
    public function browse($user) :Response
    {
        return new Response('Hallo'.$user);

    }

}