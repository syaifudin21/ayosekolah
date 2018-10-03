<?php

use Illuminate\Database\Seeder;

class MapelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mapel = [
        	array(
        		'mapel' => 'Matematika', 
        		'deskripsi' => 'Pelajaran Berhitung', 
        		'jenis_mapel' => 'Mata Pelajaran Wajib (Kelompok A)'
	        ),
	        array(
        		'mapel' => 'Bahasa Indonesia', 
        		'deskripsi' => 'Interaksi', 
        		'jenis_mapel' => 'Mata Pelajaran Wajib (Kelompok A)'
	        ),
	        array(
        		'mapel' => 'Matematika', 
        		'deskripsi' => 'Pelajaran Berhitung', 
        		'jenis_mapel' => 'Mata Pelajaran Wajib (Kelompok A)'
	        ),
	        array(
        		'mapel' => 'Bahasa Indonesia', 
        		'deskripsi' => 'Interaksi', 
        		'jenis_mapel' => 'Mata Pelajaran Wajib (Kelompok A)'
	        ),
        ];

        // 'Mata Pelajaran Wajib (Kelompok A)', 'Mata Pelajaran Wajib (Kelompok B)', 'A. Peminatan Matematika dan Sains', 'B. Peminatan Sosial', 'C. Peminatan Bahasa', 'Palajaran Wajib', 'Muatan Lokal'
        DB::table('mapels')->insert($mapel);

    }
}
