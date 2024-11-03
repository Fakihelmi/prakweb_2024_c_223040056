<?php

class Product
{
    // Property
    public $judul, $penulis, $penerbit, $harga, $jmlHalaman, $waktuMain;
    // Constructor
    public function __construct($judul = "-", $penulis = "-", $penerbit = "-", $harga = "-", $jmlHalaman = 0, $waktuMain = 0)
    {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
        $this->jmlHalaman = $jmlHalaman;
        $this->waktuMain = $waktuMain;
    }
    // Method 
    public function getLabel()
    {
        return "$this->penulis,  $this->penerbit";
    }

    public function getInfoProduk()
    {
        $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
        return $str;
    }
}

// Inheritance
class Komik extends Product
{
    public function getInfoKomik()
    {
        $str = "Komik : {$this->getInfoProduk()} - {$this->jmlHalaman} Halaman";
        return $str;
    }
}

class Game extends Product
{
    public function getInfoGame()
    {
        $str = "Game : {$this->getInfoProduk()} ~ {$this->waktuMain} Jam";
        return $str;
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

$product1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100, 0, "Komik");
$product2 = new Game("Uncharted", "Neil Druckmann", "Sony Computer", 250000, 0, 50, "Game");

echo $product1->getInfoKomik();
echo "<br>";
echo $product2->getInfoGame();
