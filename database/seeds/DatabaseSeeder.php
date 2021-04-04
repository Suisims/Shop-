<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $a = ["Мягкий", "Теплый", "Пушистый", "Качественный"];
        $b = ["Ковер", "Плед"];
        $c = "Современные технологии достигли такого уровня, что сложившаяся структура организации способствует повышению качества соответствующих условий активизации. А также предприниматели в сети интернет набирают популярность среди определенных слоев населения, а значит, должны быть ограничены исключительно образом мышления. Акционеры крупнейших компаний представляют собой не что иное, как квинтэссенцию победы маркетинга над разумом и должны быть разоблачены.";
        for($i = 0; $i<30; $i++){
            DB::table('products')->insert([
                'name' => "".$a[rand (0,count($a)-1)]." ".$b[0]."",
                'description' => $c,
                'category' => 'carpet',
                'cost'=>rand(0,10) * 1000,
                'image'=>'carpet'.$i.'.jpg'
            ]);
        }
        for($i = 30; $i<60; $i++){
            DB::table('products')->insert([
                'name' => "".$a[rand(0,count($a)-1)]." ".$b[1]."",
                'description' => $c,
                'category' => 'pledy',
                'cost'=>rand(0,10) * 1000,
                'image'=>'pledy'.$i.'.jpg'
            ]);
        }
    }
}
