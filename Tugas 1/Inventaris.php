<?php
require_once 'HP.php';
abstract class inventaris{
    abstract public function adding($nama, $merek, $harga, $stok);
    abstract public function deleting($idx);
    abstract public function updating($idx, $nama, $merek, $harga, $stok);
}

interface marketprice{
    public function price();
}