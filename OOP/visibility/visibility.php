<?php

class Product
{
    public $judul;
    public $penulis;
    public $penerbit;

    private $harga;
    protected $diskon = 0;

    public function __construct($judul = "Judul", $penulis = "Penulis", $penerbit = "Penerbit", $harga = 0)
    {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    public function sayHello()
    {
        return "Hello World !";
    }

    public function getHarga()
    {
        return $this->harga - ($this->diskon * $this->harga / 100);
    }

    public function getLabel()
    {
        return "$this->penulis, $this->penerbit";
    }

    public function getInfoProduct()
    {
        $str = " {$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
        return $str;
    }
}

class Komik extends Product
{
    public $jmlHalaman;

    public function __construct($judul = "Judul", $penulis = "Penulis", $penerbit = "Penerbit", $harga = 0, $jmlHalaman = 0)
    {
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->jmlHalaman = $jmlHalaman;
    }

    public function getInfoProduct()
    {
        $str = "Komik : " . parent::getInfoProduct() . " - {$this->jmlHalaman} Halaman";
        return $str;
    }
}

class Game extends Product
{
    public $waktuMain;
    public function __construct($judul = "Judul", $penulis = "Penulis", $penerbit = "Penerbit", $harga = 0, $waktuMain = 0)
    {
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->waktuMain = $waktuMain;
    }

    public function setDiskon($diskon)
    {
        $this->diskon = $diskon;
    }

    public function getInfoProduct()
    {
        $str = "Game : " . parent::getInfoProduct() . " ~ {$this->waktuMain} Jam";
        return $str;
    }
}


class CetakInfoProduct
{
    public function cetak(Product $Product)
    {
        $str = "{$Product->judul} | {$Product->getLabel()} (Rp. {$Product->harga})";
        return $str;
    }
}


$product1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
$product2 = new Game("Uncharted", "Neil Druckmann", "Sony Computer", 250000, 50);

echo $product1->getInfoProduct();
echo "<br>";
echo $product2->getInfoProduct();

echo "<hr>";

$product2->setDiskon(50);
echo $product2->getHarga();
