<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role_User extends Model
{
    use HasFactory;

    protected $fillable = [
        'user',
        'role'
    ];

    protected $table = 'role_user';

    public function user() {
        return $this->belongsTo(User::class, 'user');
    }

    public function role() {
        return $this->belongsTo(Role::class, 'role');
    }
}
