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
        // $this->call(UserSeeder::class);
        DB::table('users')->insert([
            'is_admin' => 1
            , 'name' => 'Manash'
            , 'email' => 'manash.pstu@gmail.com'
            , 'password' => bcrypt('secret')
        ]);
        factory(App\User::class, 50)->create()->each(function ($user){
            for($i = 0; $i < 5; $i++){
                $user->posts()->save(factory(App\Post::class)->create());
            }            
        });
    }
}
