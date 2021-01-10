<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignments extends Model
{
    use HasFactory;
    public function complete() {
        $this->completed = true;
        $this->save();
    }

    public function user() {
        //$assigment->user;
        //AKA select * from user where assigment_id = $this->id (id of current assigment);
        return $this->belongsTo(User::class);
    }
}

// hasOne
// hasMany
// belongsTo
// belongsToMany
// morphMany
// morphToMany
