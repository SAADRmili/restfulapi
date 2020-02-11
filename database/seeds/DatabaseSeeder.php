<?php

use App\Category;
use App\Product;
use App\Transaction;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        User::truncate();
        Category::truncate();
        Product::truncate();
        Transaction::truncate();
        DB::table('category_product')->truncate();
        
        User::flushEventListeners();
        Category::flushEventListeners();
        Product::flushEventListeners();
        Transaction::flushEventListeners();

        $uq = 200;
        $cq = 30;
        $pq = 30;
        $trq=1000;


        factory(User::class,$uq)->create();
        factory(Category::class,$cq)->create();
        factory(Product::class,$pq)->create()->each(
            function ($p){
                $categories = Category::all()->random(mt_rand(1,5))->pluck('id');
                $p->categories()->attach($categories);
            }
        );
        factory(Transaction::class,$uq)->create();
      
    }
}
