<?php
  
use App\User;
use Illuminate\Database\Seeder;
   
class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Admin',
                'email' => 'admin@email.com',
                'is_admin' => '1',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'User',
                'email' => 'user@email.com',
                'is_admin' => '0',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Delivery man',
                'email' => 'delivery@email.com',
                'is_delivery' => '1',
                'password' => bcrypt('123456'),
            ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
