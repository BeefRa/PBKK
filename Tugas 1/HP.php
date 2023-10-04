<?php
class HP{
    private $nama;
	private $merek;
	private $harga;
	private $stok;

    public function __construct($nama, $merek, $harga, $stok){
        $this->nama = $nama;
        $this->merek = $merek;
        $this->harga = $harga;
        $this->stok = $stok;
    }

    function set_nama($nama){
        $this->nama = $nama;
    }
    function get_nama($nama){
        return $this->nama;
    }

    function set_merek($merek){
        $this->merek = $merek;
    }
    function get_merek($merek){
        return $this->merek;
    }

    function set_harga($harga){
        $this->harga = $harga;
    }
    function get_harga($harga){
        return $this->harga;
    }

    function set_stok($stok){
        $this->stok = $stok;
    }
    function get_stok($stok){
        return $this->stok;
    }

    public function txt(){
        echo "This {$this->merek} phone named {$this->nama} is being recorded";
    }
}

class Xiaomi extends HP{
    public function msg(){
        echo "Thanks you for choosing Xiaomi to be your phone";
    }
}
class Samsung extends HP{
    public function msg(){
        echo "Thanks you for choosing samsung to be your phone";
    }
}
class Opo extends HP{
    public function msg(){
        echo "Thanks you for choosing Opo to be your phone";
    }
}