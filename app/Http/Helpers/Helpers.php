<?php

function opsiHarga($opsi, $hargaBefore){
    if ($opsi == 2) {
        $harga = $hargaBefore + 50000;
        return $harga;
    } elseif ($opsi == 3) {
        $harga = $hargaBefore + 100000;
        return $harga;
    } else {
        return $hargaBefore;
    }
}
