<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;

class StaticController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(){
        return $this->render('static/index.html.twig', [
            'controller_name' => 'StaticController',
        ]);
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact(Request $request, \Swift_Mailer $mailer){
        $form = $this->createForm(ContactType::class);

        if($request->isMethod('POST')){
            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid()){
                $this->addFlash('notice','Message envoyé !');
                
                // Envoi de l'email
                $message = (new \Swift_Message($form->get('subject')->getData()))
                    ->setFrom($form->get('email')->getData())
                    ->setTo('mairesse.valentin.pro@gmail.com')
                    ->setBody($this->renderView('email/emails.html.twig', array('name'=>$form->get('name')->getData(), 'subject'=>$form->get('subject')->getData(), 'message'=>$form->get('message')->getData())), 'text/html');

                $mailer->send($message);
                return $this->redirectToRoute('contact');
            }
        }

        return $this->render('static/contact.html.twig', [
            'form'=>$form->createView()
        ]);
    }
}
