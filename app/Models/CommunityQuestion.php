<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommunityQuestion extends Model
{
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function answers() {
        return $this->hasMany(CommunityAnswer::class);
    }
    public function course() {
        return $this->belongsTo(Course::class);
    }
}
