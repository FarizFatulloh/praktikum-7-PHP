<?php


    function hitungDiskon($harga, $persen) {
        $potongan = $harga * ($persen / 100);
        return $harga - $potongan;
    }


    function hitungLuas($panjang, $lebar) {
        return $panjang * $lebar;
    }

    $hargaAkhir = hitungDiskon(150000, 10);

  
    $luas = hitungLuas(8, 4);

    echo "<h3>Hasil Perhitungan</h3>";

    echo "Harga awal: Rp150.000<br>";
    echo "Diskon: 10%<br>";
    echo "Harga setelah diskon: Rp" .
         number_format($hargaAkhir, 0, ",", ".") . "<br><br>";

    echo "Panjang: 8<br>";
    echo "Lebar: 4<br>";
    echo "Luas persegi panjang: " . $luas;

?>