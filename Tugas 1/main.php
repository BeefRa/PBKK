<?php

require_once 'Inventaris.php';
require_once 'HP.php';

class brandnew implements marketprice{
    private $harga;
    
    public function __construct($harga){
        $this->harga = $harga;
    }
    public function price(){
        return $this->harga;
    }
}
class secondhand implements marketprice{
    private $harga;
    private $cut;
    public function __construct($harga, $cut){
        $this->harga = $harga;
        $this->cut = $cut;
    }
    
    public function price(){
        return $this->harga - ($this->harga * $this->cut / 100);
    }
}

class operation extends inventaris{
    private $listHp = [];

    public function getListHp(){
        return $this->listHp;
    }

    public function adding($nama, $merek, $harga, $stok){
        $hp = new HP($nama, $merek, $harga, $stok);
        $this->listHp[] = $hp;
    }

    public function deleting($idx){
        if(isset($this->listHp[$idx])) {
            unset($this->hp_list[$idx]);
            $this->listHp = array_values($this->listHp);
        }
    }

    public function updating($idx, $nama, $merek, $harga, $stok){
        if(isset($this->listHp[$idx])){
            $hp = $this->listHp[$idx];
            $hp->set_nama($nama);
            $hp->set_merek($merek);
            $hp->set_harga($harga);
            $hp->set_stok($stok);
        }
    }
}

$admin = new operation();

while(true){
    echo "1. Open inventory\n
        2. Add New Phone to inventory\n
        3. Delete Phone from inventory\n
        4. Update Phone from inventory\n
        5. Exit\n";
    $select = readline("No : ");
    intval($select);
    
    switch($select){
        //inven
        case 1:
            $Lists = $admin->getListHp();
            foreach ($Lists as $idx => $HP){
                echo"index = $idx   |   Merek = " . $HP->get_merek . "  |Nama = " . $HP->get_nama . "  |Harga = " . $HP->get_harga . "  |Stok = " . $HP->stok;
            }
            break;
        //add
        case 2:
            $merek = readline("Merek : ");
            $nama = readline("Nama : ");
            $hargatemp = readline("Harga : ");
            floatval($hargatemp);
            $kondisi = readline("1. Baru | 2. Lama  : ");
            intval($kondisi);
                switch($kondisi){
                    case 1:
                        $harga = new brandnew($hargatemp);
                        floatval($harga);
                        break;
                    case 2:
                        $kerusakan = readline("Seberapa parah kerusakan dalam persen(tanpa persen) : ");
                        floatval($kerusakan);
                        $harga = new secondhand($hargatemp, $kerusakan);
                        floatval($harga);
                        break;
                }
            $stok = readline("Stok : ");
            intval($stok);
            $admin->adding($nama, $merek, $harga, $stok);
            break;
        //del
        case 3:
            $idx = readline("enter the index of the phone that want to be deleted : ");
            intval($idx);
            $admin->deleting($idx);
            break;
        //updt
        case 4:
            $idx = readline("enter the index of the phone that want to be updated : ");
            intval($idx);
            $nama = readline("Nama : ");
            $hargatemp = readline("Harga : ");
            floatval($hargatemp);
            $kondisi = readline("1. Baru | 2. Lama  : ");
            intval($kondisi);
                switch($kondisi){
                    case 1:
                        $harga = new brandnew($hargatemp);
                        floatval($harga);
                        break;
                    case 2:
                        $kerusakan = readline("Seberapa parah kerusakan dalam persen(tanpa persen) : ");
                        floatval($kerusakan);
                        $harga = new secondhand($hargatemp, $kerusakan);
                        floatval($harga);
                        break;
                }
            $stok = readline("Stok : ");
            intval($stok);
            $admin->updating($idx, $nama, $merek, $harga, $stok);
            break;
        //exit
        case 5:
            exit;

        default:
            echo "Option doesn't exists, try another one\n";
            break;
    }
}