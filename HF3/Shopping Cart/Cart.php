<?php


class Cart
{
    /**
     * @var CartItem[]
     */
    private array $items = [];

    // TODO Generate getters and setters of properties

    /**
     * Add Product $product into cart. If product already exists inside cart
     * it must update quantity.
     * This must create CartItem and return CartItem from method
     * Bonus: $quantity must not become more than whatever
     * is $availableQuantity of the Product
     *
     * @param Product $product
     * @param int $quantity
     * @return CartItem
     */
    public function addProduct(Product $product, int $quantity): CartItem
    {
        foreach ($this->items as $cartItem) {
            if ($cartItem->getProduct() === $product) {
                $newQuantity = min($cartItem->getQuantity() + $quantity, $product->getAvailableQuantity());
                $cartItem->setQuantity($newQuantity);
                return $cartItem;
            }
        }

        $cartItem = new CartItem($product, $quantity);
        $this->items[] = $cartItem;
        return $cartItem;
    }

    /**
     * Remove product from cart
     *
     * @param Product $product
     */
    public function removeProduct(Product $product)
    {
        foreach ($this->items as $key => $cartItem) {
            if ($cartItem->getProduct() === $product) {
                unset($this->items[$key]);
                $this->items = array_values($this->items);
                break;
            }
        }
    }

    /**
     * This returns total number of products added in cart
     *
     * @return int
     */
    public function getTotalQuantity(): int
    {
        $totalQuantity = 0;
        foreach ($this->items as $cartItem) {
            $totalQuantity += $cartItem->getQuantity();
        }
        return $totalQuantity;
    }

    /**
     * This returns total price of products added in cart
     *
     * @return float
     */
    public function getTotalSum(): float
    {
        $totalSum = 0.0;
        foreach ($this->items as $cartItem) {
            $totalSum += $cartItem->getTotalPrice();
        }
        return $totalSum;
    }
}