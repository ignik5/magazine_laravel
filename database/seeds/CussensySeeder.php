<?php

use Illuminate\Database\Seeder;

class CussensySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        //DB::table('currencies')->truncate(); $table->string('code');
     
        DB::table('currencies')->insert([
            [
                'code'=>'RUB',
                'Symbol'=>'₽',
                'is_main'=>'1',
                'rate'=>1,

        ],
        [
            'code'=>'USD',
            'Symbol'=>'$',
            'is_main'=>'0',
            'rate'=>75,

        ],
        [
            'code'=>'EUR',
            'Symbol'=>'€',
            'is_main'=>'0',
            'rate'=>90,

        ],
        ]);
    }
}
