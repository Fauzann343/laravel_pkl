<?php
namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use DB;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('categories')->delete();
        DB::table('products')->delete();

        $categori1 = Category::create([
            'name' => 'Elektronik',
            'slug' => 'elektronik',

        ]);

        $categori2 = Category::create([
            'name' => 'Perabotan rumah',
            'slug' => 'perabotan-rumah',

        ]);
        Product::create([
            'name'        => 'Sungsam',
            'slug'        => 'sungsam',
            'category_id' => $categori1->id,
            'description' => 'lorem ipsum',
            'image'       => 'image.png',
            'price'       => 240000000,
            'stock'       => 11,
        ]);

        Product::create([
            'name'        => 'Hihid',
            'slug'        => 'hihid',
            'category_id' => $categori2->id,
            'description' => 'lorem ipsum',
            'image'       => 'image.png',
            'price'       => 4000,
            'stock'       => 22,
        ]);

    }
}
