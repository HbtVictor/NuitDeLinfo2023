<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QcmController extends AbstractController
{
    #[Route('/qcm', name: 'app_qcm', methods: ['GET', 'POST'])]
    public function index(): Response
    {
        return $this->render('qcm/index.html.twig', [
            'controller_name' => 'QcmController',
        ]);
    }
    # routes.yaml
    #[Route('/qcm/rep', name: 'app_rep', methods: ['GET', 'POST'])]
    public function index3(): Response
    {
        return $this->render('qcm/rep.html.twig', [
            'controller_name' => 'QcmController',
        ]);
    }
//     #[Route('/rep', name: 'app_rep', methods: ['GET', 'POST'])]
//     public function rep(Request $request)
//     {
//         $form = $this->createForm(QuestionnaireType::class);

//         $form->handleRequest($request);

//         if ($form->isSubmitted() && $form->isValid()) {
//             // Traitement du formulaire

//             // Vérification des réponses

//             $reponses = $form->getData();

//             for ($i = 1; $i <= 4; $i++) {
//                 if ($reponses['ed' . $i] != $reponses['ez' . $i]) {
//                     // Une réponse est incorrecte
//                     return $this->redirectToRoute('app_qcm');
//                 }
//             }

//             // Toutes les réponses sont correctes
//             return $this->redirectToRoute('rep');
//         }

//         return $this->render('qcm/index.html.twig', [
//             'form' => $form->createView(),
//         ]);
//     }
 }