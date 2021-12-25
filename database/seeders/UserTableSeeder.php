<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('users')->delete();

        // \DB::table('users')->insert(array (
        //     0 =>
        //     array (
        //         'bio' => NULL,
        //         'created_at' => '2021-07-27 09:50:00',
        //         'dob' => '2021-09-10',
        //         'email' => 'admin@admin.com',
        //         'email_verified_at' => NULL,
        //         'gender' => 'Male',
        //         'id' => 1,
        //         'login_type' => NULL,
        //         'name' => 'admin',
        //         'password' => '$2y$10$2spOqTyUZlEauQNDTbS1BO2YznCPRpUa.i/GTlcSEScPfM.clUoJm',
        //         'player_id' => NULL,
        //         'remember_token' => NULL,
        //         'status' => 1,
        //         'updated_at' => '2021-09-10 18:12:28',
        //         'user_type' => 'admin',
        //         'username' => 'admin',
        //     ),
        //     1 =>
        //     array (
        //         'bio' => NULL,
        //         'created_at' => '2021-08-12 04:34:24',
        //         'dob' => NULL,
        //         'email' => 'demo@admin.com',
        //         'email_verified_at' => NULL,
        //         'gender' => NULL,
        //         'id' => 2,
        //         'login_type' => NULL,
        //         'name' => 'Demo admin',
        //         'password' => '$2y$10$LHnCvMFXkZQ1wHEQMwdZduht0yweiM55B1Ab4dVIb.ooe//9.gKqy',
        //         'player_id' => NULL,
        //         'remember_token' => NULL,
        //         'status' => 1,
        //         'updated_at' => '2021-05-29 05:40:38',
        //         'user_type' => 'demo_admin',
        //         'username' => 'demoadmin',
        //     ),
        // ));


    }
}
