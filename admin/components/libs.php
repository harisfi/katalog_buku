<?php

namespace components\libs;

class Notifikasi
{
    public function generate($type)
    {
        $success = "<div class='alert alert-success' role='alert'>";
        $danger = "<div class='alert alert-danger' role='alert'>";
        $end_div = "</div>";
        switch ($type) {
            case 'tambahberhasil':
                echo $success . "Data Berhasil Ditambahkan" . $end_div;
                break;
            case 'editberhasil':
                echo $success . "Data Berhasil Diedit" . $end_div;
                break;
            case 'hapusberhasil':
                echo $success . "Data Berhasil Dihapus" . $end_div;
                break;
            case 'editkosong':
            case 'tambahkosong':
                echo $danger . "Maaf semua data harus dilengkapi" . $end_div;
                break;
            default:
                break;
        }
    }
}

class Pagination
{
    public function generate($sekarang, $jum_halaman, $halaman, $katakunci)
    {
        echo "<ul class='pagination pagination-sm m-0 float-right'>";
        if ($jum_halaman == 1) {
            echo "<li class='page-item active'><span class='page-link'>1</span></li>";
        } elseif ($jum_halaman > 1) {
            $sebelum = $halaman - 1;
            $setelah = $halaman + 1;
            if (!empty($katakunci)) {
                if ($halaman != 1) {
                    echo "<li class='page-item'><a class='page-link' href='$sekarang?katakunci=$katakunci&halaman=1'>First</a></li>";
                    echo "<li class='page-item'><a class='page-link' href='$sekarang?katakunci=$katakunci&halaman=$sebelum'>&laquo;</a></li>";
                }
                for ($i = 1; $i <= $jum_halaman; $i++) {
                    if ($i > $halaman - 5 && $i < $halaman + 5) {
                        if ($i != $halaman) {
                            echo "<li class='page-item'><a class='page-link' href='$sekarang?katakunci=$katakunci&halaman=$i'>$i</a></li>";
                        } else {
                            echo "<li class='page-item active'><span class='page-link'>$i</span></li>";
                        }
                    }
                }
                if ($halaman != $jum_halaman) {
                    echo "<li class='page-item'><a class='page-link' href='$sekarang?katakunci=$katakunci&halaman=$setelah'>&raquo;</a></li>";
                    echo "<li class='page-item'><a class='page-link' href='$sekarang?katakunci=$katakunci&halaman=$jum_halaman'>Last</a></li>";
                }
            } else {
                if ($halaman != 1) {
                    echo "<li class='page-item'><a class='page-link' href='$sekarang?halaman=1'>First</a></li>";
                    echo "<li class='page-item'><a class='page-link' href='$sekarang?halaman=$sebelum'>&laquo;</a></li>";
                }
                for ($i = 1; $i <= $jum_halaman; $i++) {
                    if ($i > $halaman - 5 && $i < $halaman + 5) {
                        if ($i != $halaman) {
                            echo "<li class='page-item'><a class='page-link' href='$sekarang?halaman=$i'>$i</a></li>";
                        } else {
                            echo "<li class='page-item active'><span class='page-link'>$i</span></li>";
                        }
                    }
                }
                if ($halaman != $jum_halaman) {
                    echo "<li class='page-item'><a class='page-link' href='$sekarang?halaman=$setelah'>&raquo;</a></li>";
                    echo "<li class='page-item'><a class='page-link' href='$sekarang?halaman=$jum_halaman'>Last</a></li>";
                }
            }
        }
        echo "</ul>";
    }
}
