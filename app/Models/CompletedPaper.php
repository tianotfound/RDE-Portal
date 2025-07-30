<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompletedPaper extends Model
{
    use HasFactory;

    /**
     * Define a relationship to the User model.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }   
}
