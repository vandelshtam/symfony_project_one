<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProductController extends AbstractController
{
    #[Route('/product', name: 'product')]
    public function index(): Response
    {
        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }

    /**
     * @Route("/product/create", name="create_product")
     */
    public function createProduct(ManagerRegistry $doctrine): Response
    {
        // вы можете извлечь EntityManager через $this->getDoctrine()
        // или вы можете добавить к действию аргумент: createProduct(EntityManagerInterface $entityManager)
        $entityManager = $doctrine->getManager();

        $product = new Product();
        $product->setName('Keyboard');
        $product->setPrice(1999);
        $product->setDescription('Ergonomic and stylish!');

        // сообщите Doctrine, что вы хотите (в итоге) сохранить Продукт (пока без запросов)
        $entityManager->persist($product);

        // действительно выполните запросы (например, запрос INSERT)
        $entityManager->flush();

        return new Response('Saved new product with id '.$product->getId());
    }


    /**
     * @Route("/product/{id}", name="product_show")
     */
    public function show(ManagerRegistry $doctrine, int $id): Response
    {
        $product = $doctrine->getRepository(Product::class)->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        return new Response('Check out this great product: '.$product->getName());


        // или отобразить шаблон
        // в шаблоне, печатайте все с {{ product.name }}
        // вернет $this->render('product/show.html.twig', ['product' => $product]);
    }

     /**
     * @Route("/product_new/{id}", name="product_show_new")
     */
    public function show_new(Product $product): Response
    {
        return new Response('Check out this great product: '.$product->getName());
        // используйте Продукт!
        // ...
    }
}
