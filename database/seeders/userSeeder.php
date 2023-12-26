<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\userMdl;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Traits\MethodsTrait;
use Illuminate\Http\Request;

class userSeeder extends Seeder
{
	 use MethodsTrait;

	 // php artisan make:seeder userSeeder
	 // php artisan db:seed --class userSeeder

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Request $req)
    {	
          for ($i=0; $i < 20; $i++) { 
	    	$pwd = Str::random(8);
	    	$str_result = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
	    	$data =[
	            'name' => substr(str_shuffle($str_result),0, 10),
	            'email' => Str::random(6).'@mail.com',
	            'address' => Str::random(20),
	            'mobile' => rand(9111111111,9999999999),
	            'password' =>$pwd,
	            'pwd' => Hash::make($pwd),
	            'unique_id' =>Str::random(8),
	            'creditor_type' =>Str::random(8),
	            'rem_addr' =>$req->ip(),
	            'date' =>date("Y-m-d"),
	            'status' =>rand(1,2),
	            'auth_id' =>Str::random(8),
	            'auth_check' =>rand(1,2),
	            'forgot_link' =>Str::random(8),
	            'created_at' => \Carbon\Carbon::now(),
	            'updated_at' => \Carbon\Carbon::now(),
	        ];
	        $this->insertData('user_mdls',$data);
    	}
    }
}
