<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'customer',
        'ticket_type',
        'price',
        'validated'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'customer');
    }

    public function ticket_type() {
        return $this->belongsTo(Ticket_Type::class, 'ticket_type');
    }

    public function ticket_data(){
        return $this->hasMany(Ticket_Data::class);
    }

}
