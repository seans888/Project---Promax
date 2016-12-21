<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PercentPricingValue extends Model
{
    //
    protected $table = "percentPricingValues";
    public $incrementing = false;
    public $primaryKey = 'code';
}
