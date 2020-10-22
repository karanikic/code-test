<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'Admin',
            'last_name' => 'Lawline',
            'email' => 'info@lawline.io',
            'password' => bcrypt('password'),
            'is_subscribed' => true
        ]);

        User::create([
            'first_name' => 'John',
            'last_name' => 'Smith',
            'email' => 'jsmith@lawline.io',
            'password' => bcrypt('password'),
            'is_subscribed' => true
        ]);

        User::create([
            'first_name' => 'Mary',
            'last_name' => 'Lee',
            'email' => 'mlee@lawline.io',
            'password' => bcrypt('password'),
            'is_subscribed' => false
        ]);

        User::create([
            'first_name' => 'Shawn',
            'last_name' => 'Penn',
            'email' => 'spenn@lawline.io',
            'password' => bcrypt('password'),
            'is_subscribed' => true
        ]);

        User::create([
            'first_name' => 'Mike',
            'last_name' => 'Loo',
            'email' => 'mloo@lawline.io',
            'password' => bcrypt('password'),
            'is_subscribed' => false
        ]);

        User::create([
            'first_name' => 'Secret',
            'last_name' => 'Service',
            'email' => 'secret@lawline.io',
            'password' => bcrypt('password'),
            'is_subscribed' => false
        ]);
    }
}
