<?php

class Produk
{
    // Property
    public $judul,
        $penulis,
        $penerbit,
        $harga;

    // Method
    public function getLabel()
    {
        return "$this->judul, $this->penulis, $this->penerbit, $this->harga";
    }
}

// Object
$komik = new Produk();
$komik->judul = "Naruto";
$komik->penulis = "Masashi Kishimoto";
$komik->penerbit = "Shonen Jump";
$komik->harga = 30000;

$game = new Produk();
$game->judul = "Uncharted";
$game->penulis = "Neil Druckmann";
$game->penerbit = "Sony Computer";
$game->harga = 250000;

// Print
echo $komik->getLabel();
echo "<br>";
echo $game->getLabel();
