<?php
// require_once 'Produk/InfoProduct.php';
// require_once 'Produk/Product.php';
// require_once 'Produk/Komik.php';
// require_once 'Produk/Game.php';
// require_once 'Produk/CetakInfoProduct.php';
// require_once 'Produk/User.php';
// require_once 'Service/User.php';

// Tidak Menggunakan __DIR__
// spl_autoload_register(function ($class) {
//     require_once 'Produk/' . $class . '.php';
// });

// Menggunakan __DIR__
spl_autoload_register(function ($class) {
    // Akan menjadi seperti ini jika menggunakan explode  App\Produk\User = ["App", "Produk", "User"]
    $class = explode('\\', $class);
    $class = end($class);
    require_once __DIR__ . '/Produk/' . $class . '.php';
});

spl_autoload_register(function ($class) {
    // Akan menjadi seperti ini jika menggunakan explode  App\Produk\User = ["App", "Produk", "User"]
    $class = explode('\\', $class);
    $class = end($class);
    require_once __DIR__ . '/Service/' . $class . '.php';
});
