<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccessLevel extends Model
{
    //
    protected $table= 'accesslevel';
    protected $fillable = ['code', 'process','uifieldname', 'uri', 'icon'];
    

}
