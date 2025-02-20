<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;


    // A user belongs to a role
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', '_id');
    }

    // Check if user has a specific permission
    public function hasPermission($permission)
    {
        return $this->role
            ? in_array($permission, $this->role->permissions->pluck('name')->toArray())
            : false;
    }
}
