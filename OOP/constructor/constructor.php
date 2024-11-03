<?php

class Product
{
    // Property
    public $judul, $penulis, $penerbit, $harga;

    // Constructor
    public function __construct($judul = "-", $penulis = "-", $penerbit = "-", $harga = "-")
    {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    // Method
    public function getLabel()
    {
        return "Judul : " . $this->judul . "<br>" . "Penulis : " . $this->penulis . "<br>" . "Penerbit : " . $this->penerbit . "<br>" . "Harga : " . $this->harga;
    }
}

$product1 = new Product("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000);
$product2 = new Product("Uncharted", "Neil Druckmann", "Sony Computer", 250000);
$product3 = new Product("Dragon Ball");

echo $product1->getLabel();
echo "<br>";
echo "<br>";
echo $product2->getLabel();
echo "<br>";
echo "<br>";
echo $product3->getLabel();
