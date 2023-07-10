<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price_Change extends Model
{
    use HasFactory;

    public function ticket() {
        return $this->hasMany(Ticket::class);
    }
}
