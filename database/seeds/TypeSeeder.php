<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                'id' => 1,
                'name' => 'Bài viết'
            ],
            [
                'id' => 2,
                'name' => 'Tác phẩm'
            ],
        ];

        Type::insert($types);
    }
}
