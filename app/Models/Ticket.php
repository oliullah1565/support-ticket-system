<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',  // Add user_id here to allow mass assignment
        'title',
        'description',
        'status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function responses()
    {
        return $this->hasMany(Response::class);
    }

}
