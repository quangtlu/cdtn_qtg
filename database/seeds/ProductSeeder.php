<?php

use App\Models\Author;
use App\Models\AuthorProduct;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Author::class,100)->create();
        factory(Product::class, 100)->create();
        factory(ProductCategory::class, 100)->create();
        factory(AuthorProduct::class, 100)->create();
    }
}
