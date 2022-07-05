<?php

use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('barangs')->insert([
            'name' => 'Grade A',
            'gambar' => 'seed1.jpg',
            'harga' => 20000 ,
            'stok' => 100 ,
            'description' => 'deskripsi',
            'created_at' => now(),
        ]);

         DB::table('barangs')->insert([
            'name' => 'Standar',
            'gambar' => 'seed2.jpg',
            'harga' => 15000 ,
            'stok' => 90 ,
            'description' => 'deskripsi',
            'created_at' => now(),
         ]);
    }
}
