<?php


namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class FirstUserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now();
        $dateTime = $date->format('Y-m-d');
        DB::table('users')->insert([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'email_verified_at' =>$dateTime,
            'password' => bcrypt('12345678'),
            'pass_con' => bcrypt('12345678'),
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
    }
}
