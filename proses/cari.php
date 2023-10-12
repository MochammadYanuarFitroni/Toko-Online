<?php

function cari($kategori, $cari)
{
    $query = "SELECT * FROM produk WHERE 1=1";
    
    if ($kategori) {
        $query .= " AND id_kategori = $kategori";
    }
    
    if ($cari) {
        $query .= " AND nama_produk LIKE '%$cari%'";
    }

    return query($query);
}
?>