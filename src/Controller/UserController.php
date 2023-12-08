<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{
    #[Route('/utilisateur/edit/{id}', name: 'user.edit')]
    public function index(User $user): Response
    {

        if(!$this->getUser()){
            return $this->redirectToRoute('security.login');
        }

        if($this->getUser() === $user){
            return $this->redirectToRoute('accueuil');
        }

        return $this->render('user/edit.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
}
