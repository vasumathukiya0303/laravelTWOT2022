<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $fillable = ['name','price','validity'];
    public $timestamps = false;
    public function people()
    {
        return $this->belongsToMany(People::class, 'people_plan');
    }
}
