<?php

use Illuminate\Database\Seeder;
use App\Content;

class ContentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Content::create([
            'isi_konten' => '"Jika kamu tidak sanggup menahan lelahnya belajar maka kamu harus sanggup menahan perihnya kebodohan"-Imam Syafi-i',
        ]);
    }
}
