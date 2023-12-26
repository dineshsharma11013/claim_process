<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class generalInfoMdl extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $primaryKey = 'id';
    protected $fillable = ['logo','company_name','address','email','mobile','username','password','pwd','gender','user_type','sub_user','rights','banners','profile_pic','link','rem_addr','status','availability','created_at','updated_at']; // we need to include the $fillable property to prevent the mass assignment exceptions.

}
