<?php

namespace App\Entity;

class Cat
{
    private int $id;

    private string $name;

    private string $image;

    private string $icon;

    private float $price;

    private string $description;

    public function __construct(int $id, string $name, string $image, string $icon, float $price, string $description)
    {
        $this
            ->setId($id)
            ->setName($name)
            ->setImage($image)
            ->setIcon($icon)
            ->setPrice($price)
            ->setDescription($description);
    }

    public static function all()
    {
        return [
            new Cat(
                1,
                'Minours',
                'https://placekitten.com/481/398',
                '/img/cat-smirk.svg',
                1999,
                'Lorem ipsum dolor sit amet ipsum dolor sit amet ipsum dolor sit amet ipsum dolor sit amet'
            ),
            new Cat(
                2,
                'Chachat',
                'https://placekitten.com/600/406',
                '/img/cat-smile.svg',
                9000,
                'Lorem ipsum dolor sit amet ipsum dolor sit amet ipsum dolor sit amet ipsum dolor sit amet'
            ),
            new Cat(
                3,
                "Coco l'asticot",
                'https://placekitten.com/501/402',
                '/img/cat-love.svg',
                1234,
                'Lorem ipsum dolor sit amet ipsum dolor sit amet ipsum dolor sit amet ipsum dolor sit amet'
            ),
            new Cat(
                4,
                'Fricadelle',
                'https://placekitten.com/460/403',
                '/img/cat-cry.svg',
                36,
                'Lorem ipsum dolor sit amet ipsum dolor sit amet ipsum dolor sit amet ipsum dolor sit amet'
            ),
            new Cat(
                5,
                'Jean-Pierre',
                'https://placekitten.com/469/403',
                '/img/cat-joy.svg',
                999.99,
                'Lorem ipsum dolor sit amet ipsum dolor sit amet ipsum dolor sit amet ipsum dolor sit amet'
            ),
        ];
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Cat
     */
    public function setId(int $id): Cat
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Cat
     */
    public function setName(string $name): Cat
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     * @return Cat
     */
    public function setImage(string $image): Cat
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return string
     */
    public function getIcon(): string
    {
        return $this->icon;
    }

    /**
     * @param string $icon
     * @return Cat
     */
    public function setIcon(string $icon): Cat
    {
        $this->icon = $icon;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     * @return Cat
     */
    public function setPrice(float $price): Cat
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Cat
     */
    public function setDescription(string $description): Cat
    {
        $this->description = $description;
        return $this;
    }
}
