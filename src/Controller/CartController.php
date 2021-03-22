<?php

namespace App\Controller;

use App\Entity\Cat;
use App\Service\CartService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CartController extends AbstractController
{
    private CartService $cart;

    public function __construct(CartService $cart)
    {
        $this->cart = $cart;
    }

    public function add(Request $request): Response
    {
        $cat = array_values(
                array_filter(
                    Cat::all(), function ($cat) use ($request) {
                    return $cat->getId() == $request->get('id');
                })
            )[0] ?? null;

        if (empty($cat)) {
            throw $this->createNotFoundException();
        }

        if ($this->cart->contains($cat)) {
            $this->addFlash('warning', "Le chat {$cat->getName()} est déjà dans votre panier !");
            return $this->redirectToRoute('index');
        }

        $this->cart->add($cat);

        return $this->redirectToRoute('cart');
    }

    public function remove(Request $request): Response
    {
        $cat = array_values(
                array_filter(
                    Cat::all(), function ($cat) use ($request) {
                    return $cat->getId() == $request->get('id');
                })
            )[0] ?? null;

        if (empty($cat)) {
            throw $this->createNotFoundException();
        }

        $this->cart->remove($cat);

        $this->addFlash('success', "Le chat {$cat->getName()} n'est plus dans votre panier ! Et hop, {$cat->getPrice()} € économisés.");

        return $this->redirectToRoute('cart');
    }

    public function show(): Response
    {
        $cats = $this->cart->all();
        $total = $this->cart->totalPrice();

        return $this->render('cart.html.twig', [
            'cats' => $cats,
            'total' => $total,
        ]);
    }
}
