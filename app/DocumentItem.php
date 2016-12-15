<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PercentPricingValue;
class DocumentItem extends Model
{
    //
    protected $table = "documentItem";
    public $incrementing = false;
    public $primaryKey = 'code';

}
