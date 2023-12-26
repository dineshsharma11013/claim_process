<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workmen_step_four_doc extends Model
{
    use HasFactory;

    protected $table='work_and_employee_from_step_four_doc';
    protected $guarded = ['id'];
    public $timestamps = false;
}
