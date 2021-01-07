<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;
        protected $table = 'userdetails';
     protected $fillable = [
        'name',
        'email',
        'category_id',
        'group_id',
        'department_id'
    ];

    public function category()
        {
        	return $this->belongsTo('App\Models\UserCategory');
        }
    public function group()
        {
        	return $this->belongsTo('App\Models\Group');
        }
    public function department()
        {
        	return $this->belongsTo('App\Models\Department');
        }
            public function user()
        {
            return $this->belongsTo('App\Models\User');
        }
}
