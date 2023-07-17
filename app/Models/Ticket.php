<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class, 'customer');
    }

    public function ticket_type() {
        return $this->belongsTo(Ticket_Type::class, 'ticket_type');
    }

}
