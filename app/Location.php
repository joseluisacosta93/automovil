<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
	protected $fillable = [
           'location',
          
           
        ];
     public function client()
    {
        return $this->hasMany(Client::class);
    }

}
