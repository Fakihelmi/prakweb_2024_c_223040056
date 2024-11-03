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
        return "$this->penulis,  $this->penerbit";
    }
}

// Object Type
class CetakInfoProduct
{
    // Method
    public function cetak(Product $product)
    {
        $str = "{$product->judul} | {$product->getLabel()} ($product->harga)";
        return $str;
    }
}

$product1 = new Product("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000);
$product2 = new Product("Uncharted", "Neil Druckmann", "Sony Computer", 250000);

$infoProduct1 = new CetakInfoProduct();
echo $infoProduct1->cetak($product1);
