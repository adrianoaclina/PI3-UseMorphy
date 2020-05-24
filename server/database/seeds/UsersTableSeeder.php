<?php

use Illuminate\Database\Seeder;
use App\User;

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
                'nome' => 'Adriano Aclina',
                'cpf' => '47533804830',
                'email' => 'adriano.aclina@gmail.com',
                'senha' => Hash::make('123456789'),
                'telefone' => '11978018651',
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
