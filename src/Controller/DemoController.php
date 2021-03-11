<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DemoController extends AbstractController
{
    /**
     * @Route("/demo1", name="demo1")
     */
    public function demo1()
    {
        // mauvaise pratique, mieux vaut passer par TWIG
        $output = "<html><head><title>Demo 1</title>";
        $output .= "<body><h1>Demo 1</h1></body>";
        return new Response($output);
    }

    /**
     * @Route("/demo2")
     */
    public function demo2(Request $req)
    {
        // /demo2?text=coucou
        // /demo2?text=hello&category=developpement
        $text = $req->query->get('text');
        $cat = $req->query->get('category');
        return new Response($text . ', ' . $cat);
    }

    /**
     * @Route("/demo3")
     */
    public function demo3(Request $req)
    {
        $info = $req->headers->get('User-Agent');
        $token = $req->headers->get('X-Token');
        // curl -H "X-Token:secret"  http://127.0.0.1:8000/demo3

        if ($token == "secret") {
            return new Response("Bravo !");
        } else {
            return new Response("Tant pis...");
        }
    }

    /**
     * @Route("/demo4")
     */
    public function demo4(Request $req)
    {
        $method = $req->getMethod();
        $res = new Response();
        $res->setContent("Méthode utilisée: " . $method);

        return $res;
    }

    /**
     * @Route("/demo5")
     */
    public function demo5()
    {
        $trainees = array(
            array("fname" => "Alex", "lname" => "AAA"),
            array("fname" => "Manu", "lname" => "BBB"),
            array("fname" => "Stéphanie", "lname" => "CCC")
        );

        return new JsonResponse($trainees);
    }

    /**
     * @Route("/demo6")
     */
    public function demo6()
    {
        $res = new Response();
        $res->headers->set('X-Secret', 'La terre est ronde');
        //$res->setStatusCode(404);
        $res->setStatusCode(Response::HTTP_NOT_FOUND);
        $res->setContent('RAS');
        return $res;
    }

    /**
     * @Route("/demo7/{color}")
     */
    public function demo7($color)
    {
        $res = new Response($color);
        return $res;
    }

    // méthode sans annotation de route
    public function demo8()
    {
        $res = new Response('...');
        return $res;
    }

    /**
     * @Route("/demo9/{num}", requirements={"num"="\d+"}, methods={"POST"})
     */
    public function demo9($num)
    {
        $res = new Response($num * $num);
        return $res;
    }

    /**
     * @Route("/demo10")
     */
    public function demo10()
    {
        $title = 'Demo 10';

        return $this->render('demo/demo10.html.twig', array(
            'title' => $title
        ));
    }

    /**
     * @Route("/demo11")
     */
    public function demo11()
    {
        $title = 'Demo 11';

        $trainees = array(
            array("fname" => "Alex", "lname" => "AAA", "gender" => "male"),
            array("fname" => "Manu", "lname" => "BBB", "gender" => "male"),
            array("fname" => "Stéphanie", "lname" => "CCC", "gender" => "female")
        );

        return $this->render('demo/demo11.html.twig', array(
            'title' => $title,
            'trainees' => $trainees
        ));
    }

    /**
     * @Route("/demo12")
     */
    public function demo12()
    {
        $title = 'Demo 12';
        return $this->render('demo/demo12.html.twig', array(
            'title' => $title
        ));
    }

}
