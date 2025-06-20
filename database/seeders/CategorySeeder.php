<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('categories')->delete();
       
       Category::create([
'name'=>'Elektronik',
'slug'=>'elektronik',


       ]);

       Category::create([
        'name'=>'Perabotan rumah',
        'slug'=>'perabotan-rumah',
        
        
               ]);




    }
}
