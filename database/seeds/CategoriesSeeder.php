<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Category;
use Illuminate\Support\Str;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorieslist = ['Primi Piatti', 'Secondi piatti', 'Contorni', 'Antipasti', 'Dolci'];
        foreach($categorieslist as $category){
            $newcategory = new Category();

            $newcategory->name = $category;
            $newcategory->slug = Str::of($newcategory->name)->slug('-');

            $newcategory->save();
        }
    }
}
