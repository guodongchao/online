<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class wx extends Model
{
    protected $table="weixin";
    protected $primaryKey="wx_id";
    public $timestamps = false;
}
