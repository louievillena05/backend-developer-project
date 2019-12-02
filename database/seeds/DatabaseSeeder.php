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
        $this->call([
            UsersTableSeeder::class,
            CompaniesTableSeeder::class,
            EmployeesTableSeeder::class,
        ]);
    }
}

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);
    }
}

class CompaniesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('companies')->insert([
            [
            'name' => 'Company1',
            'email' => 'company1@email.com',
            'website' => 'https://company1.com',
            ],
            [
            'name' => 'Company2',
            'email' => 'company2@email.com',
            'website' => 'https://company2.com',
            ],
            [
            'name' => 'Company3',
            'email' => 'company3@email.com',
            'website' => 'https://company3.com',
            ],
            [
            'name' => 'Company4',
            'email' => 'company4@email.com',
            'website' => 'https://company4.com',
            ],
            [
            'name' => 'Company5',
            'email' => 'company5@email.com',
            'website' => 'https://company5.com',
            ],
        ]);
    }
    
}

class EmployeesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('employees')->insert([
            [
            'first_name' => 'First',
            'last_name' => 'Employee',
            'company_id' => 6,
            'email' => 'employee1@email.com',
            'phone' => '09123456781',
            ],
            [
            'first_name' => 'Second',
            'last_name' => 'Employee',
            'company_id' => 7,
            'email' => 'employee2@email.com',
            'phone' => '09123456782',
            ],
            [
            'first_name' => 'Third',
            'last_name' => 'Employee',
            'company_id' => 3,
            'email' => 'employee3@email.com',
            'phone' => '09123456783',
            ],
            [
            'first_name' => 'Fourth',
            'last_name' => 'Employee',
            'company_id' => 4,
            'email' => 'employee4@email.com',
            'phone' => '09123456784',
            ],
            [
            'first_name' => 'Fifth',
            'last_name' => 'Employee',
            'company_id' => 5,
            'email' => 'employee5@email.com',
            'phone' => '09123456785',
            ],
        ]);
    }
}