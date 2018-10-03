<?php 

function tanggal($tanggal, $cetak_hari = false)
{
    $bulan = array (1 => 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
    $split    = explode('-', $tanggal);
    $tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
    
    if ($cetak_hari) {
        $num = date('N', strtotime($tanggal));
        return $tgl_indo;
    }
    return $tgl_indo;
}
function tanggal_indo($tanggal, $cetak_hari = false)
{
    $bulan = array (1 => 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
    $split    = explode('-', $tanggal);
    $tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
    $waktu    = $split[3]. ':' . $split[4]. ':' . $split[5];
    
    if ($cetak_hari) {
        $num = date('N', strtotime($tanggal));
        return $tgl_indo ." ". $waktu;
    }
    return $tgl_indo;
}
function hari_tanggal_indo($tanggal, $cetak_hari = false)
{
    $hari = array ( 1 => 'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu' );
    $bulan = array (1 => 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
    $split    = explode('-', $tanggal);
    $tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
    $waktu    = $split[3]. ':' . $split[4]. ':' . $split[5];
    
    if ($cetak_hari) {
        $num = date('N', strtotime($tanggal));
        return $hari[$num] . ', ' . $tgl_indo ." ". $waktu;
    }
    return $tgl_indo;
}
function hari_tanggal_indo_waktu($tanggal, $cetak_hari = false)
{
    $hari = array ( 1 => 'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu' );
    $bulan = array (1 => 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
    $split    = explode('-', $tanggal);
    $tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
    $waktu    = $split[3]. ':' . $split[4];
    
    if ($cetak_hari) {
        $num = date('N', strtotime($tanggal));
        return $hari[$num] . ', ' . $tgl_indo ." ". $waktu;
    }
    return $tgl_indo;
}

function hari_indo($tanggal)
{
    $hari = array ( 1 => 'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu' );
    $num = date('N', strtotime($tanggal));
    return $hari[$num];
}
function bulan_indo($bulan)
{
    $namabulan = [1=>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
    $tgl_indo = $namabulan[$bulan];
    
    return $tgl_indo;
}
function warna($no)
{
    $warna = ['red','teal','purple darken-2','red accent-4',' indigo darken-3',' teal darken-1','light-blue darken-4','lime darken-3','teal darken-4','amber darken-4'];
    $tgl_indo = $warna[$no];
    
    return $tgl_indo;
}

function limit_words($string, $word_limit){
    $words = explode(" ",$string);
    return implode(" ",array_splice($words,0,$word_limit));
}
