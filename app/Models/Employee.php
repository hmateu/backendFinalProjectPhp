<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'password',
        'user',
        'attraction'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function attraction() {
        return $this->belongsTo(Attraction::class);
    }

    public function payroll() {
        return $this->hasMany(Payroll::class);
    }
}
