<?php
class CetakInfoProduct
{
    public $daftarProduk = [];

    public function tambahProduk(Product $product)
    {
        $this->daftarProduk[] = $product;
    }

    public function cetak()
    {
        $str = "DAFTAR PRODUK : <br>";

        foreach ($this->daftarProduk as $p) {
            $str .= "- {$p->getInfoProduct()} <br>";
        }

        return $str;
    }
}
