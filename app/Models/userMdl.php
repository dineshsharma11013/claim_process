<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class userMdl extends Model
{
    use HasFactory;
    public $timestamps = false;

    public static function formBRegisterUsers()
    {
    	$data = DB::table('user_mdls')
    			->join('operational_creditor_mdls', 'operational_creditor_mdls.user_id','=','user_mdls.id')
    			->select('user_mdls.id', 'user_mdls.name', 'user_mdls.email', 'user_mdls.status', 'operational_creditor_mdls.created_at', 'operational_creditor_mdls.updated_at')
    			->where('submit')
    			->orderByDesc('operational_creditor_mdls.id')
    			->get();
    }

}
