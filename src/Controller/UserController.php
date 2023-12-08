<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{



    #[Route('/utilisateur', name: 'user.profile')]
    public function userInterface(User $user): Response
    {

        if(!$this->getUser()){
            return $this->redirectToRoute('security.login');
        }

        // if($this->getUser() !== $user){
        //     return $this->redirectToRoute('accueil');
        // }

        return $this->render('user/user.html.twig',[
            'userName' => $this->getUser()->getPseudo(),
            'userEmail' => $this->getUser()->getEmail(),
            'userPassword' => $this->getUser()->getPassword()
        ]);
    }



    #[Route('/utilisateur/edit/{id}', name: 'user.edit')]
    public function userEdit(User $user): Response
    {

        if(!$this->getUser()){
            return $this->redirectToRoute('security.login');
        }

        if($this->getUser() !== $user){
            return $this->redirectToRoute('accueil');
        }

        $form = $this->createForm(UserType::class, $user);

        return $this->render('user/edit.html.twig', [
            'form' => $form,
        ]);
    }
}
