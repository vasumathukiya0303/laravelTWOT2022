<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;
    protected $fillable = ['name','company','phone'];
    public $timestamps = false;
    public function plans()
    {
        return $this->belongsToMany(Plan::class, 'people_plan');
    }
}
