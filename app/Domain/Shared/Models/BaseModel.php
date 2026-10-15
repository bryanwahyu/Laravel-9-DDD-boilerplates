<?php
namespace Domain\Shared\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaseModel extends Model{
    protected $guarded=['id','created_at','updated_at'];
    use SoftDeletes;
    /**
     * @var array<string, string> $casts
     */
    protected $casts=[
        'created_at'=>'dateTime',
        'updated_at'=>'dateTime'
    ];
    

}
