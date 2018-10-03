<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sekolah = [
            'nama' => 'Sekolah',
            'email' => 'sekolah@sekolah.com',
            'password' => bcrypt('121212')
        ];
        $pengurus = [
            'nama' => 'Pengurus',
            'email' => 'pengurus@pengurus.com',
            'password' => bcrypt('121212'),
            'status' => 1
        ];
        $ta = [
            'tahun_ajaran' => '2018-2019',
            'status' => 'Aktif'
        ];


        $profilsekolah = [
             'nama_sekolah' => 'SMA Wahid Hasyim Model',
             'id_sekolah' => 1,
             'npsn' => '1029128', 
             'jenjang' => 'SMA',
             'status' => 'Swasta', 
             'alamat' => 'Sumberwudi Karanggeneng Lamongan', 
             'kode_pos' => '62254', 
             'maps' => '<script>', 
             'sk' => 'Hydrangeas_5b139c769dccf.jpg', 
             'sk_izin' => 'sk izin', 
             'tgl_sk' => '2018-06-21', 
             'status_kepemilikan' => 'Swasta', 
             'luastanah_milik' => '1000', 
             'luastanah_bukan' => '100', 
             'nama_wajib_pajak' => 'nama wajib', 
             'npwp' => 'npwp', 
             'no_telp' => '0128129', 
             'no_fax' => '121212', 
             'email' => 'email@sekolah.com', 
             'website' => 'www.smawahas.sch', 
             'waktu_sekolah' => 'Pagi', 
             'menerima_bos' => 'Ya', 
             'sertifikasi_iso' => 'User', 
             'sumber_listrik' => 'PLN', 
             'daya_listrik' => '2400', 
             'akses_internet' => 'Ya', 
             'kepala_sekolah' => 'Kepala Sekolah', 
             'akriditasi' => 'A', 
             'kurikulum' => 'Kurikulum 2013', 
             'logo' => 'Hydrangeas_5b139c769dccf.jpg'
        ];

        DB::table('sekolahs')->insert($sekolah);
        DB::table('profil_sekolahs')->insert($profilsekolah);
        DB::table('penguruses')->insert($pengurus);
        DB::table('tahun_ajarans')->insert($ta);
    }
}
