<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('home')->delete();
        DB::table('tenant')->delete();
        DB::table('payment')->delete();
        DB::table('utility')->delete();
        DB::table('bill')->delete();

        // $this->call(UsersTableSeeder::class);
        $this->call('UserLoginSeeder');
        $this->call('HomeSeederClass');
        $this->call('TenantSeederClass');
        $this->call('PaymentSeederClass');
        $this->call('UtilitySeederClass');
        $this->call('BillSeederClass');
    }
}

class UserLoginSeeder extends Seeder
{
    public function run() {
        $admin = array([
           'name' => 'Gabe',
            'email' => 'Hoverman@Marshall.edu',
            "password"=> Hash::make('password')
        ]);

        DB::table('users')->insert($admin);
    }
}


class HomeSeederClass extends Seeder
{
    public function run() {

        $sig = array([
           'id' => 1,
            'name' => 'Sig Tau',
        ]);

        DB::table('home')->insert($sig);

        $this->command->info('Home Table Seeded!');
    }
}

class TenantSeederClass extends Seeder
{
    public function run() {

        $gabe = array([
            'home_id' => 1,
            'name' => 'Gabe',
            'role' => 'admin',
            'move_in_date' => '2016-08-01',
            'move_out_date' => '2017-08-01',
            'active' => true,
        ]);

        $ty = array([
            'home_id' => 1,
            'name' => 'Tyrell',
            'role' => 'tenant',
            'move_in_date' => '2016-08-01',
            'move_out_date' => '2017-08-01',
            'active' => true,
        ]);

        $cole = array([
            'home_id' => 1,
            'name' => 'Cole',
            'role' => 'tenant',
            'move_in_date' => '2016-08-01',
            'move_out_date' => '2017-08-01',
            'active' => true,
        ]);

        $dave = array([
            'home_id' => 1,
            'name' => 'Dave',
            'role' => 'tenant',
            'move_in_date' => '2016-08-01',
            'move_out_date' => '2017-08-01',
            'active' => true,
        ]);

        $kenny = array([
            'home_id' => 1,
            'name' => 'Kenny',
            'role' => 'tenant',
            'move_in_date' => '2016-08-01',
            'move_out_date' => '2017-08-01',
            'active' => true,
        ]);

        DB::table('tenant')->insert($gabe);
        DB::table('tenant')->insert($ty);
        DB::table('tenant')->insert($cole);
        DB::table('tenant')->insert($dave);
        DB::table('tenant')->insert($kenny);

        $this->command->info('Tenant Table Seeded!');
    }
}

class UtilitySeederClass extends Seeder
{
    public function run() {

        $water = array([
            'name' => 'Water',
            'type' => 'necessary',
            'home_id' => 1
        ]);

        $sewage = array([
            'name' => 'Sewage',
            'type' => 'necessary',
            'home_id' => 1
        ]);

        $electric = array([
            'name' => 'Electric',
            'type' => 'necessary',
            'home_id' => 1
        ]);

        $gas = array([
            'name' => 'Gas',
            'type' => 'necessary',
            'home_id' => 1
        ]);

        $internet = array([
            'name' => 'Internet',
            'type' => 'necessary',
            'home_id' => 1
        ]);

        DB::table('utility')->insert($water,$sewage,$electric,$gas,$internet);
        DB::table('utility')->insert($sewage);
        DB::table('utility')->insert($electric);
        DB::table('utility')->insert($gas);
        DB::table('utility')->insert($internet);

        $this->command->info('Utility Table Seeder');
    }
}

class PaymentSeederClass extends Seeder
{
    public function run() {

        //

        $this->command->info('Payment Table Seeded');
    }
}

class BillSeederClass extends Seeder
{
    public function run() {

        //

        $this->command->info('Bill Table Seeded');
    }
}