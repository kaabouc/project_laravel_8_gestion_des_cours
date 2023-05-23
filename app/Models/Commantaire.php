<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commantaire extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'Name','Email','Cour_id', 'User_id','Detail_comm'];
  
    public function cour(){ 
        return $this->belongsTo('App\Models\Cour');
    }
    public function user(){ 
        return $this->belongsTo('App\Models\User');
    }
}