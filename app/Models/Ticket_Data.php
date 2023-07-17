<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket_Data extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'age',
        'ticket'
    ];

    public function ticket() {
        return $this->belongsTo(Ticket::class, 'ticket');
    }
}
