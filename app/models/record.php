<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class record extends Model
{
    protected $table='record';
    protected $primaryKey = "record_id";
    public $timestamps = false;
}
