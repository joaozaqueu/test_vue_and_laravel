<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        $this->createUsers();
    }

    private function createUsers()
    {
        $max = rand(10, 30);
        for($i=0; $i < $max; $i++):
            $this->createUser($i);
        endfor;
        $this->command->info($max . ' demo users created');
    }

    private function createUser($index)
    {
        return User::create([
            'email' => 'email' . $index . '@mail.com',
            'name'  =>'User '. $index,
            'password' => bcrypt('123456')
        ]);
    }

}
