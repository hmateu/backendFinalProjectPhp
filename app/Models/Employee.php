<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'user',
        'attraction'
    ];

    protected $hidden = [
        'password'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user');
    }

    public function attraction() {
        return $this->belongsTo(Attraction::class, 'attraction');
    }

    public function payroll() {
        return $this->hasMany(Payroll::class);
    }
}
