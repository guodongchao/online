<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class teacherdetails extends Model
{
    protected $table='teacher_details';
    protected $primaryKey="teacher_id";
    public $timestamps = false;
}
