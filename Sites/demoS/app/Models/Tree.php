<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Boolean;

class Tree extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tree';
    protected $fillable = ['name'];

    protected $casts = [
        'is_publish'=>'boolean',
        'name'=>'encrypted'
    ];

    public function setNameAttribute($value){
        $this->attributes['name'] = "Mr. ".$value;
    }
    public function setAddressAttribute($value){
        $this->attributes['address'] = $value.", India";
    }
    public function getNameAttribute($value){
        return ucfirst($value);
    }
    public function getAddressAttribute($value){
        return $value.', INDIA';
    }
}
