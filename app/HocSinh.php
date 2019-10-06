<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HocSinh extends Model
{
    protected $table = 'hocsinh';
    public $timestamps = false;

    protected $fillable = ['hoten', 'toan', 'ly', 'hoa'];

}
