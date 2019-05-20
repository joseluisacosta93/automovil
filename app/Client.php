<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
     public function scopeLocation_id($query, $location_id){
        if($location_id)
        	return $query->where('location_id','=',$location_id);
    }
    public function scopeStatu_id($query, $statu_id){
        if($statu_id)
        	return $query->where('statu_id','<>',$statu_id);
    }
     public function scopeDealership_id($query, $dealership_id){
        if($dealership_id)
        	return $query->where('dealership_id','=',$dealership_id);
    }

     public function location()
    {
        return $this->belongsTo(Location::class);
    }
     public function dealership()
    {
        return $this->belongsTo(Dealership::class);
    }
    public function statu()
    {
        return $this->belongsTo(Statu::class);
    }
}
