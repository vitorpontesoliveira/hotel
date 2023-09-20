<?php 
namespace app\libraries;

class Product {
    private string $name;

    public function setName(string $name) {
        $this->name = $name;
    }
}