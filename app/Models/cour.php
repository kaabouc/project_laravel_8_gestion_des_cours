<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class cour extends Model
{
    use HasFactory;
    use SoftDeletes ;
    protected $fillable = ['Name_cour', 'Name_prof','Detail_cour','Name_domaine','Name_brache','Ecole_name','Ecole_email','Path_file'];

    protected $dates=['deleted_at'];
    
    public function user(){ 
        return $this->belongsTo('App\Models\User');
    }
}
