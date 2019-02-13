<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Register;
use AppBundle\Form\RegisterType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class RegisterController extends Controller
{
    /**
     * @Route("/user/create")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function productCreateAction(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $register = new Register();
        $form    = $this->createForm(RegisterType::class, $register);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($register);
            $entityManager->flush();
        }

        return $this->render('AppBundle::register.html.php', ['form' => $form->createView()]);
    }
}
