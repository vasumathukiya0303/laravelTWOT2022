<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Land extends Model
{
    use HasFactory;
    protected $fillable = ['name','email','password'];

    public function contact(){
        return $this->hasOne(Contact::class);
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }

}
