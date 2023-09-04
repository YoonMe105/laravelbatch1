<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    protected $primarykey = "id";

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function article(){
        // Method 1
        // return $this->hasOne("App\Models\Article");

        // Method 2
        return $this->hasOne(Article::class);
    }

    public function articles(){
        return $this->hasMany(Article::class);
    }

    public function roles(){
        // return $this->belongsToMany(Role::class);  // obey naming conversion
    
        // =>For Custom Table Name
        // belongsToMany(primarytable,secondarytable,secondarytable_fk,primarytable_fk)
        // belongsToMany(related,table,foreignPivotKey,relativePivotKey)

        return $this->belongsToMany(Role::class,'userroles','user_id','role_id');

    }

    // belongsToMany with withPivot
    public function rolecreateddate(){
        // return $this->belongsToMany(Role::class)->withPivot('created_at');  // Error Base table or view not found : role_user doesn't have
        return $this->belongsToMany(Role::class,'userroles','user_id','role_id')->withPivot('created_at');  // Error Base table or view not found : role_user doesn't have
    }

    public function photos(){
        // morphMany(relatedtable,name)
        return $this->morphMany(Photo::class,'imageable');  // use imageable cuz of imageable_id,imageable_type (call the same firstletter)
    }

    public function comments(){
        // morphMany(relatedtable,name)
        return $this->morphMany(Comment::class,'commentable');  
    }
    
}
