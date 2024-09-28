<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_id',
        'admin_name',
        'message',
    ];

    /**
     * Get the ticket that owns the response.
     */
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
