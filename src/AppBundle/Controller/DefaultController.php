<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        return $this->render('@App/default/index.html.twig');
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
