<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
        protected $fillable = [
        'grp_name',
        'status',
        'details',
    ];

        //   public function userdetail()
        // {
        //     return $this->hasMany('App\Models\UserDetail');
        // }
}
