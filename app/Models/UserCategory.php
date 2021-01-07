<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCategory extends Model
{
    use HasFactory;
    protected $table = 'usercategorys';
    protected $fillable = [
        'cat_name',
        'details',
    ];
        //   public function userdetail()
        // {
        //     return $this->belongsTo('App\Models\UserDetail');
        // }
}
