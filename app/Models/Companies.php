<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    protected $fillable = [
        'name','email','logo','website'
    ];    
    
    protected $hidden = [
        'updated_at','created_at'
    ];
    
    protected $appends = [];

    public function employess()
    {
        return $this->hasMany('App\Models\Employess');
    }
    
}
