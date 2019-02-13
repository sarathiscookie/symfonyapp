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
use Doctrine\ORM\EntityManagerInterface;
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
     * @Route("/{individualList}", name="list_one")
     * @param int $individualList
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listOneAction($individualList)
    {
        $product = $this->getDoctrine()
            ->getRepository(Product::class)
            ->find($individualList);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id: '.$individualList
            );
        }

        return $this->render('AppBundle::listIndividual.html.php', ['product' => $product]);
    }

    /**
     * @Route("/listMultipleId", name="list_one")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listMultipleIdAction()
    {
        $products = $this->getDoctrine()
            ->getRepository(Product::class)
            ->findBy([
                'id' => [1,3]
            ]);

        if (!$products) {
            throw $this->createNotFoundException(
                'No product found'
            );
        }

        return $this->render('AppBundle::listMltipleId.html.php', ['products' => $products]);
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

    /**
     * @Route("/create")
     */
    public function createAction()
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to your action: createAction(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();

        $product = new Product();
        $product->setName('Nokia');
        $product->setPrice(19000);
        $product->setDescription('Mobile');

        // tells Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        //return new Response('Saved new product with id '.$product->getId()); //OR
        return $this->redirectToRoute('list');
    }

    /**
     * @Route("/update/{productID}")
     * @param int $productID
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function updateAction($productID)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $product       = $entityManager->getRepository(Product::class)->find($productID);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$productID
            );
        }

        $product->setName('Redmi');
        $entityManager->flush();

        return $this->redirectToRoute('list');
    }
}