<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use HasFactory;

    protected $table = 'genders';
    protected $primaryKey = 'id';

    public function articles(){
        // hasManyThrough(related,through)
        return $this->hasManyThrough(Article::class,User::class);

        // hasManyThrough(related,through,firstKey,secondPivotKey)
        return $this->hasManyThrough(Article::class,User::class,'gender_id','user_id');
    }
}
