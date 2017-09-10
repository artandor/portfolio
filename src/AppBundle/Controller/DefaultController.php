<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Contact;
use AppBundle\Form\ContactType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @throws \InvalidArgumentException
     * @throws \LogicException
     * @throws \RuntimeException
     */
    public function indexAction(Request $request)
    {
        $contact = new Contact();
        $formContact = $this->createForm(ContactType::class, $contact);

        $formContact->handleRequest($request);
        if ($formContact->isSubmitted() && $formContact->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();

            $session = new Session();
            $session->getFlashBag()->add('successSubmit', 'Message registred. I\'ll answer as soon as possible.');
            return $this->redirectToRoute('homepage');
        }
        return $this->render(
            '@App/default/index.html.twig',
            array(
                'formContact' => $formContact->createView()
            )
        );
    }

    /**
     * @Route("/projects", name="projectsList")
     */
    public function projectListAction(Request $request)
    {
        return $this->render('@App/default/projects.html.twig');
    }


    /**
     * @Route("/testangular", name="testAngular")
     */
    public function testAngularAction(Request $request)
    {
        return $this->render('@App/default/testAngular.html.twig');
    }

    /**
     * @Route("/testajax", name="testAjax")
     */
    public function testAjaxAction(Request $request)
    {
        return JsonResponse::fromJsonString('[
            {
                "name": "A kid game !",
                "description": "Yeah. Nothing less. Still dunno the platform tho."
            }, {
                "name": "A crazy api with java for message reception from erlang.",
                "description": "Don\'t ask for a description man, i don\'t know either."
            }
        ]');
    }
}
