<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{



    #[Route('/utilisateur', name: 'user')]
    public function userInterface(): Response
    {
        $user = $this->getUser();

        if(!$user){
            return $this->redirectToRoute('security.login');
        }


        return $this->render('user/user.html.twig',[
            'userName' => $user->getPseudo(),
            'userEmail' => $user->getEmail(),
            'userPassword' => $user->getPassword()
        ]);
    }



    #[Route('/utilisateur/edit/{id}', name: 'user.edit')]
    public function index(): Response
    {
        $user = $this->getUser();

        if(!$user){
            return $this->redirectToRoute('security.login');
        }

        $form = $this->createForm(UserType::class, $user);

        return $this->render('user/edit.html.twig', [
            'form' => $form,
        ]);
    }
}
