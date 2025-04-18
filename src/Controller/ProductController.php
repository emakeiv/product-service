<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

use Doctrine\ORM\EntityManagerInterface;

use App\Repository\ProductRepository;
use App\Form\ProductType;
use App\Entity\Product;

class ProductController extends AbstractController
{
    #[Route('/products', name: 'product_index')]
    #[IsGranted('ROLE_USER')]
    public function index(ProductRepository $repository): Response
    {
        return $this->render('product/index.html.twig', [
            'products' =>  $repository -> findAll(),
        ]);
    }
    #[Route('/products/{id<\d+>}', name: 'product_show')]
    #[IsGranted('ROLE_USER')]
    public function show($id, ProductRepository $repository): Response
    {
        $product = $repository -> findOneBy(['id' => $id]);
        if ($product === null){
            throw $this->createNotFoundException('Poduct not found');
        }
        return $this->render('product/show.html.twig',[
            'product' => $product
        ]);
    }
    #[Route('/products/new', name: 'product_new')]
    #[IsGranted('ROLE_USER')]
    public function new(Request $request, EntityManagerInterface $manager): Response
    {   
        $product = new Product;

        $form = $this->createForm(ProductType::class, $product);
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($product);
            $manager->flush();

            $this->addFlash(
                'primary',
                'this product was successfully saved !'
            );

            return $this->redirectToRoute('product_show', [
                'id' => $product->getId()
            ]);
        }

        return $this->render('product/new.html.twig',[
            'form' => $form
        ]);
    }

    #[Route('/products/{id<\d+>}/edit', name: 'product_edit')]
    #[IsGranted('ROLE_USER')]
    public function edit(Product $product, Request $request, EntityManagerInterface $manager): Response
    {

        $form = $this->createForm(ProductType::class, $product);
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
        
            $manager->flush();

            $this->addFlash(
                'primary',
                'this product was successfully updated !'
            );

            return $this->redirectToRoute('product_show', [
                'id' => $product->getId()
            ]);
        }

        return $this->render('product/edit.html.twig',[
            'form' => $form
        ]);
    }
    #[Route('/products/{id<\d+>}/delete', name: 'product_delete') ]
    #[IsGranted('ROLE_USER')]
    public function delete(Product $product, Request $request, EntityManagerInterface $manager): Response
    {  
        if($request->isMethod('POST')){
            $manager->remove($product);
            $manager->flush();

            $this->addFlash(
                'primary',
                'this product was successfully deleted !'
            );
            
            return $this->redirectToRoute('product_index');
        }
        
        return $this->render('product/delete.html.twig', [
            'id' => $product->getId()            
        ]);

    }
}
