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
        DB::table('admins')->insert([
            'name' => 'Administrators',
            'password' => bcrypt('parole123')
        ]);

        DB::table('lecturers')->insert([
            'name' => 'Lektors',
            'last_name' => 'Lektors',
            'email' => 'lektors@va.lv',
            'password' => bcrypt('parole123')
        ]);

        DB::table('courses')->insert(
            ['name' => 'IT1']
        );
        DB::table('courses')->insert(
            ['name' => 'IT2']
        );
        DB::table('courses')->insert(
            ['name' => 'IT3']
        );
        DB::table('courses')->insert(
            ['name' => 'IT4']
        );

        DB::table('lectures')->insert([
            'name' => 'Matemātika'
        ]);

        DB::table('lectures')->insert([
            'name' => 'Programmēšana'
        ]);

        DB::table('students')->insert([
            'name' => 'Jānis',
            'last_name' => 'Bērziņš',
            'email' => 'students@va.lv',
            'course_id' => 1,
            'password' => bcrypt('parole123')
        ]);
    }
}
