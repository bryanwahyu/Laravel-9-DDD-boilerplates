<?php
namespace Domain\Shared\Models;

use Illuminate\Database\Eloquent\Model;

class PivotModel extends Model{
    protected $guarded=['id','created_at','updated_at'];
}
