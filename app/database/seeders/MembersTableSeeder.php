<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('members')->insert(
            [
                [
                    'name'=>'五十嵐',
                    'telephone'=>'xxxx-xxxxx',
                    'email'=>'igarashi@example.com',
                    'created_at'=>now(),
                    'updated_at'=>now(),

                ],

            ]
        );
        $this->call(MembersTableSeeder::class);
    }
}
