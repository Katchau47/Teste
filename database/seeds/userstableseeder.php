<?php

use Illuminate\Database\Seeder;
use App\User;
class userstableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        'name'=>'Robson',
        'email'=>'robsonzin@gmail.com',
        'password'=>'12345',
        ]);
    }
}
