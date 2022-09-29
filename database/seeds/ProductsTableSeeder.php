<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'id'=>1,
                'name'=>'Laptop ASUS',
                'brand'=>'ASUS',
                'price'=>18000000,
                'image'=>'products/IvaUgWQo0vpVMrwCKxjBU7aJRSQuJGJdeOcq5FuZ.jpg',
                'config' =>'Card 123',
                'insurance' => '12',
                'quantity'=>1
            ],
          

        ]);
    }
}