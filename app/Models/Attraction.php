<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attraction extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'min_height',
        'max_height',
        'length'
    ];

    public function employee() {
        return $this->hasMany(Employee::class);
    }
}
