<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $fillable = [
        'first_name','last_name','company_id','email','phone'
    ];

    protected $hidden = [
        'updated_at','created_at'
    ];
    
    protected $appends = [];

    public function company()
    {
        return $this->belongsTo('App\Models\Companies');
    }
    
}
