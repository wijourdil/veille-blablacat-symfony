<?php

namespace App\Service;

use App\Entity\Cat;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CartService
{
    private SessionInterface $session;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    public function all(): array
    {
        return $this->session->get('cats', []);
    }

    public function add(Cat $catToAdd): void
    {
        $cats = $this->all();
        array_push($cats, $catToAdd);
        $this->session->set('cats', $cats);
    }

    public function remove(Cat $catToRemove): void
    {
        $cats = array_filter($this->all(), function (Cat $cat) use ($catToRemove) {
            return $catToRemove->getId() !== $cat->getId();
        });

        $this->session->set('cats', $cats);
    }

    public function contains(Cat $catToFind): bool
    {
        $cats = $this->all();

        foreach ($cats as $cat) {
            if ($cat->getId() === $catToFind->getId()) {
                return true;
            }
        }

        return false;
    }

    public function count(): int
    {
        return count($this->all());
    }

    public function totalPrice(): float
    {
        $total = .0;

        foreach ($this->all() as $cat) {
            $total += $cat->getPrice();
        }

        return $total;
    }
}
