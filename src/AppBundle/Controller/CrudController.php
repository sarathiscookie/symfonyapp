<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2/12/2019
 * Time: 9:54 AM
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CrudController extends Controller
{
    /**
     * @Route("/", name="list")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction()
    {
        $product = $this->getDoctrine()
            ->getRepository(Product::class)
            ->findAll();

        //dump($product);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found'
            );
        }

        return $this->render('AppBundle::list.html.php', ['products' => $product]);
    }

    /**
     * @Route("/read")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function readAction()
    {
        return new Response('Reading page');
    }

    /**
     * @Route("/read/{post}")
     * @param string $post
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function readPostAction($post)
    {
        return new Response('Reading post: '.$post);
    }

    /**
     * @Route("/read/render/twig/{data}")
     * @param string $data
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function readRenderTwigAction($data)
    {
        $html       = $this->render('default/crudRender.html.twig', [
            'name' => $data
        ]);

        return new Response($html);
    }

    /**
     * @Route("/read/render/normal/html")
     */
    public function readRenderNormalHtmlAction()
    {
        $number = random_int(0, 100);

        return $this->render('AppBundle::crud.html.php', [
            'number' => $number,
        ]);
    }

}