<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Admin::class, 100)->create();
        $admin = \App\Admin::find(1);
        $admin->nickname = '董俊';
        $admin->username = 'admin';
        $admin->password = bcrypt('admin888');
        $admin->save();
    }
}
