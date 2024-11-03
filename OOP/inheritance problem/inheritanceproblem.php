<?php

class Product
{
    // Property
    public $judul, $penulis, $penerbit, $harga, $jmlHalaman, $waktuMain, $tipe;
    // Constructor
    public function __construct($tipe, $judul = "-", $penulis = "-", $penerbit = "-", $harga = "-", $jmlHalaman = 0, $waktuMain = 0)
    {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
        $this->jmlHalaman = $jmlHalaman;
        $this->waktuMain = $waktuMain;
        $this->tipe = $tipe;
    }
    // Method 
    public function getLabel()
    {
        return "$this->penulis,  $this->penerbit";
    }

    public function getInfoLengkap()
    {
        $str = "{$this->tipe} : {$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
        if ($this->tipe == "Komik") {
            $str .= " - {$this->jmlHalaman} Halaman";
        } else if ($this->tipe == "Game") {
            $str .= " ~ {$this->waktuMain} Jam";
        }

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

$product1 = new Product("Komik", "Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100, 0,);
$product2 = new Product("Game", "Uncharted", "Neil Druckmann", "Sony Computer", 250000, 0, 50,);

echo $product1->getInfoLengkap();
echo "<br>";
echo $product2->getInfoLengkap();
