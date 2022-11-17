<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipients extends Model
{
    use HasFactory;
    //public $table = "recipients";
    protected $fillable = [
        'name',
        'cargo',
        'email'
    ];

    public function recipentsUser(){
        return $this->belongsToMany(User::class);
    }

}
