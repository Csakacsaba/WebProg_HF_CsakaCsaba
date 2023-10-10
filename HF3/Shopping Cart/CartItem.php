<?php


class CartItem
{
    private Product $product;
    private int $quantity;

    public function __construct(Product $product, int $quantity)
    {
        $this->product = $product;
        $this->quantity = $quantity;
    }

    // Getters and setters for properties
    public function getProduct(): Product
    {
        return $this->product;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity)
    {
        $this->quantity = $quantity;
    }

    public function increaseQuantity()
    {
        $availableQuantity = $this->product->getAvailableQuantity();
        if ($this->quantity < $availableQuantity) {
            $this->quantity++;
        }
    }

    public function decreaseQuantity()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }

    public function getTotalPrice(): float
    {
        return $this->product->getPrice() * $this->quantity;
    }
}
