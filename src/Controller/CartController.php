<?php

namespace App\Controller;

use App\Entity\Cat;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CartController extends AbstractController
{
    private SessionInterface $session;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    public function add(Request $request): Response
    {
        $cat = array_values(array_filter(Cat::all(), function ($cat) use ($request) {
                return $cat->getId() == $request->get('id');
            }))[0] ?? null;

        if (empty($cat)) {
            throw $this->createNotFoundException();
        }

        $catsInCart = $this->session->get('cats', []);
        array_push($catsInCart, $cat);
        $this->session->set('cats', $catsInCart);

        return $this->redirectToRoute('cart');
    }

    public function show(): Response
    {
        $total = 0;
        $cats = $this->session->get('cats', []);

        foreach($cats as $cat) {
            $total += $cat->getPrice();
        }

        return $this->render('cart.html.twig', [
            'cats' => $cats,
            'total' => $total,
        ]);
    }
}
