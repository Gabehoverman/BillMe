<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Home;
use App\Models\CommentType;
use App\Models\AlertType;


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
        $this->call('FullTableSeeder');
        //$this->call('UserLoginSeeder');
        //$this->call('HomeSeederClass');
        //$this->call('TenantSeederClass');
        //$this->call('PaymentSeederClass');
        //$this->call('UtilitySeederClass');
        //$this->call('BillSeederClass');
    }
}

class FullTableSeeder extends Seeder {
    public function run() {
        
        $home = array([
             'name' => 'Home',
             'id' => 1,
             'code' => Home::generateCode(),
             'address' => '1349 6th Ave',
             'created_at'=>Carbon\Carbon::now()->format('Y-m-d H:i:s'),
             'updated_at'=>Carbon\Carbon::now()->format('Y-m-d H:i:s'),
         ]);

         DB::table('home')->insert($home);
         $this->command->info('Home seeded');

         $user_admin = array([
             'id' => 1,
             'first_name' => 'Admin',
             'last_name' => '  ',
             'email' => 'Admin@Admin.com',
             'home_id'=>1,
             'password' => Hash::make('password'),
             'role' => 'Admin',
             'created_at'=>Carbon\Carbon::now()->format('Y-m-d H:i:s'),
             'updated_at'=>Carbon\Carbon::now()->format('Y-m-d H:i:s'),
         ]);

         DB::table('users')->insert($user_admin);

         $tenant_admin = array([
            'id' => 1,
            'home_id' => 1,
            'user_id' => 1,
            'name' => 'admin',
            'role' => 'admin',
            'move_in_date' => '2016-08-01',
            'move_out_date' => '2017-08-01',
            'active' => true,
            'created_at'=>Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('tenant')->insert($tenant_admin);

        $maintenance_req = array([
            'id'=>1,
            'home_id'=>1,
            'user_id'=>1,
            'completed'=>false,
            'active'=>true,
            'notes'=>'Our first maintenance request',
            'created_at'=>Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('maintenance')->insert($maintenance_req);

        $bill = array([
            'id'=>1,
            'home_id'=>1,
            'utility_id'=>1,
            'user_id'=>1,
            'amount'=>'123.45',
            'date'=>Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'active'=>true,
            'notes'=>'Bob the builder',
            'created_at'=>Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('bill')->insert($bill);

        $payment = array([
            'id'=>1,
            'home_id'=>1,
            'user_id'=>1,
            'amount'=>'123.45',
            'notes'=>'Pretty cool payment',
            'active'=>true,
            'date'=>Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'created_at'=>Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('payment')->insert($payment);

        $alert = array([
            'id'=>1,
            'home_id'=>1,
            'user_id'=>1,
            'alert_type' => AlertType::Bill,
            'active'=>true,
            'notes'=>'added a new bill',
            'created_at'=>Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('alert')->insert($alert);

        $alert = array([
            'id'=>2,
            'home_id'=>1,
            'user_id'=>1,
            'alert_type' => AlertType::Payment,
            'active'=>true,
            'notes'=>'added a new payment',
            'created_at'=>Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('alert')->insert($alert);

        $alert = array([
            'id'=>3,
            'home_id'=>1,
            'user_id'=>1,
            'alert_type' => AlertType::Maintenance,
            'active'=>true,
            'notes'=>'added a maintenance request',
            'created_at'=>Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('alert')->insert($alert);

        $alert = array([
            'id'=>4,
            'home_id'=>1,
            'user_id'=>1,
            'alert_type' => AlertType::Post,
            'active'=>true,
            'notes'=>'added a new post',
            'created_at'=>Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('alert')->insert($alert);

        $alert = array([
            'id'=>5,
            'home_id'=>1,
            'user_id'=>1,
            'alert_type' => AlertType::Task,
            'active'=>true,
            'notes'=>'added a new task',
            'created_at'=>Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('alert')->insert($alert);

        $alert = array([
            'id'=>6,
            'home_id'=>1,
            'user_id'=>1,
            'alert_type' => AlertType::PostComment,
            'active'=>true,
            'notes'=>'commented on a post',
            'created_at'=>Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('alert')->insert($alert);

        $alert = array([
            'id'=>7,
            'home_id'=>1,
            'user_id'=>1,
            'alert_type' => AlertType::TaskComment,
            'active'=>true,
            'notes'=>'commented on a task',
            'created_at'=>Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('alert')->insert($alert);
        
        $comment = array([
            'id'=>1,
            'home_id'=>1,
            'user_id'=>1,
            'item_id'=>1,
            'comment_type'=>CommentType::Bill,
            'description'=>'I approve bill',
            'active'=>true,
            'created_at'=>Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('comment')->insert($comment);

        $comment = array([
            'id'=>2,
            'home_id'=>1,
            'user_id'=>1,
            'item_id'=>1,
            'comment_type'=>CommentType::Payment,
            'description'=>'I approve payment',
            'active'=>true,
            'created_at'=>Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('comment')->insert($comment);

        $task = array([
            'id'=>1,
            'home_id'=>1,
            'user_id'=>1,
            'title'=>'Do the dishes',            
            'description'=>'Whoevers dishes are downstairs, please do them',
            'completed'=>false,
            'active'=>true,
            'created_at'=>Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('task')->insert($task);

        $task = array([
            'id'=>2,
            'home_id'=>1,
            'user_id'=>1,
            'title'=>'Take out the trash.',            
            'description'=>'We need to take out the trash on Monday',
            'completed'=>true,
            'active'=>true,
            'created_at'=>Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('task')->insert($task);

        $post = array([
            'id'=>2,
            'home_id'=>1,
            'user_id'=>1,
            'title'=>'Can we upgrade our internet?',            
            'description'=>'The internet is slow and Comcast has a cheaper new plan',
            'active'=>true,
            'created_at'=>Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon\Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('post')->insert($post);


        $this->call('UtilitySeederClass');
    }
    //DB::table(tableName)->insert($value);
}


class UserLoginSeeder extends Seeder
{
    public function run() {
        $admin = array([
           'name' => 'Admin',
            'email' => 'Admin@Admin.com',
            'home_id'=>1,
            "password"=> Hash::make('password'),
            'role' => 'Admin',
            'tenant_id' => 1
        ]);

        $tenant = array([
            'name' => 'Tenant',
            'email' => 'tenant@tenant.com',
            'home_id'=>1,
            "password"=> Hash::make('password'),
            'role' => 'Tenant',
            'tenant_id' => 2
        ]);

        DB::table('users')->insert($admin);
        DB::table('users')->insert($tenant);
    }
}


class HomeSeederClass extends Seeder
{
    public function run() {

        $sig = array([
           'id' => 1,
            'name' => 'Home',
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
            'name' => 'admin',
            'role' => 'admin',
            'move_in_date' => '2016-08-01',
            'move_out_date' => '2017-08-01',
            'active' => true,
        ]);

        $ty = array([
            'home_id' => 1,
            'name' => 'tenant',
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
            'id' => 1,
            'name' => 'Water',
            'type' => 'necessary',
            'home_id' => 1
        ]);

        $sewage = array([
            'id' => 2,
            'name' => 'Sewage',
            'type' => 'necessary',
            'home_id' => 1
        ]);

        $electric = array([
            'id' => 3,
            'name' => 'Electric',
            'type' => 'necessary',
            'home_id' => 1
        ]);

        $gas = array([
            'id' => 4,
            'name' => 'Gas',
            'type' => 'necessary',
            'home_id' => 1
        ]);

        $internet = array([
            'id' => 5,
            'name' => 'Internet',
            'type' => 'necessary',
            'home_id' => 1
        ]);

        DB::table('utility')->insert($water);
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
        $waterbill = array([
            'id' => 1,
            'utility_id' => 1,
            'amount' => 180.27,
            'bill_date' => '2017-05-12',
            'due_date' => '2017-05-29',
            'month' => 'May',
            'image_url' => 'hello world',
            'active' => 0,
            'notes' => ' '
        ]);

        $waterbill2 = array([
            'id' => 6,
            'utility_id' => 1,
            'amount' => 180.27,
            'bill_date' => '2017-04-12',
            'due_date' => '2017-04-29',
            'month' => 'April',
            'image_url' => 'hello world',
            'active' => 0,
            'notes' => ' '
        ]);

        $sewagebill = array([
            'id' => 2,
            'utility_id' => 2,
            'amount' => 76.65,
            'bill_date' => '2017-05-12',
            'due_date' => '2017-05-29',
            'month' => 'May',
            'image_url' => 'hello world',
            'active' => 0,
            'notes' => ' '
        ]);

        $sewagebill2 = array([
            'id' => 7,
            'utility_id' => 2,
            'amount' => 76.65,
            'bill_date' => '2017-04-12',
            'due_date' => '2017-04-29',
            'month' => 'April',
            'image_url' => 'hello world',
            'active' => 0,
            'notes' => ' '
        ]);

        $electricbill = array([
            'id' => 3,
            'utility_id' => 3,
            'amount' => 192.47,
            'bill_date' => '2017-05-12',
            'due_date' => '2017-05-29',
            'month' => 'May',
            'image_url' => 'hello world',
            'active' => 0,
            'notes' => ' '
        ]);

        $electricbill2 = array([
            'id' => 8,
            'utility_id' => 3,
            'amount' => 192.47,
            'bill_date' => '2017-04-12',
            'due_date' => '2017-04-29',
            'month' => 'April',
            'image_url' => 'hello world',
            'active' => 0,
            'notes' => ' '
        ]);

        $gasbill = array([
            'id' => 4,
            'utility_id' => 4,
            'amount' => 207.92,
            'bill_date' => '2017-05-12',
            'due_date' => '2017-05-29',
            'month' => 'May',
            'image_url' => 'hello world',
            'active' => 0,
            'notes' => ' '
        ]);

        $gasbill2 = array([
            'id' => 9,
            'utility_id' => 4,
            'amount' => 207.92,
            'bill_date' => '2017-04-12',
            'due_date' => '2017-04-29',
            'month' => 'April',
            'image_url' => 'hello world',
            'active' => 0,
            'notes' => ' '
        ]);

        $internetbill = array([
            'id' => 5,
            'utility_id' => 5,
            'amount' => 70.66,
            'bill_date' => '2017-05-12',
            'due_date' => '2017-05-29',
            'month' => 'May',
            'image_url' => 'hello world',
            'active' => 0,
            'notes' => ' '
        ]);

        $internetbill2 = array([
            'id' => 10,
            'utility_id' => 5,
            'amount' => 70.66,
            'bill_date' => '2017-04-12',
            'due_date' => '2017-04-29',
            'month' => 'April',
            'image_url' => 'hello world',
            'active' => 0,
            'notes' => ' '
        ]);

        DB::table('bill')->insert($waterbill);
        DB::table('bill')->insert($sewagebill);
        DB::table('bill')->insert($electricbill);
        DB::table('bill')->insert($gasbill);
        DB::table('bill')->insert($internetbill);
        DB::table('bill')->insert($waterbill2);
        DB::table('bill')->insert($sewagebill2);
        DB::table('bill')->insert($electricbill2);
        DB::table('bill')->insert($gasbill2);
        DB::table('bill')->insert($internetbill2);

        $this->command->info('Bill Table Seeded');
    }
}