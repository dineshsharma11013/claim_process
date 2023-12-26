<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Config;
use Session;

class form2Mdl extends Model
{
    use HasFactory;
    public $timestamps = false;

    public static function getForm2Data($id, $form2_id, $tbl)
    {
    	$res = DB::table($tbl)->where($form2_id,$id)->get();
        return $res;
    }






}
