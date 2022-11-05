<?php

namespace Omojunior\PhpStripeApiUsage\controller;

class HomeController
{
    public function __construct()
    {
        $this->items = new ItemsController();
    }

    public function showProduct()
    {
        $items = $this->items->showItem();

        return $items;
    }

    public function showItemById($id)
    {
        $item = $this->items->showItemById($id);

        return $item;
    }

    public function insertItem($name, $price, $description, $image)
    {
        $item = $this->items->insertItem($name, $price, $description, $image);

        return $item;
    }

    public function updateItem($id, $name, $price, $description, $image)
    {
        $item = $this->items->updateItem($id, $name, $price, $description, $image);

        return $item;
    }

    public function deleteItem($id)
    {
        $item = $this->items->deleteItem($id);

        return $item;
    }
}
