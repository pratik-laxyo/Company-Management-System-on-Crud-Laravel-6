<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'company', 'email', 'phone', 'user_id', 'role_id'
      ];

    //protected $with = ['company_name'];

    public function company_name(){
    	return $this->belongsTo('App\company', 'company');
    } 
}

