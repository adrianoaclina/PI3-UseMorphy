<?php
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'adriano.aclina@gmail.com')->first();

        if(!$user){
            User::create([
                'name' => 'Adriano Aclina',
                'email' => 'adriano.aclina@gmail.com',
                'password' => Hash::make('123456789'),
                'role' => 'admin'
            ]);
        } else{
            if($user->role != 'admin'){
                $user->role = 'admin';
                $user->save();
            }
        }
    }
}
