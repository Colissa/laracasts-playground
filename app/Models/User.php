<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function articles() {
        // $user->articles;
        // select * from articles where user_id = 1;

        return $this->hasMany(Article::class);
    }

    public function assignments() {
        // $user->assignments;
        // select * from assignments where user_id = 1;

        return $this->hasMany(Assignments::class);
    }

    // Eloquent relationship examples:
    // $user = Users::find(1); // select * from users where id = 1;
    // $user->assignements; // select * from projects where user_id = $user->id;
    // $user->prjects->first();
}
