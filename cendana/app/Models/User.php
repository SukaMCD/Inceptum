<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasName;

class User extends Authenticatable implements FilamentUser, HasName
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'id_user';

    protected $fillable = [
        'nama_user',
        'email',
        'password',
        'google_id',
        'google_token',
        'google_refresh_token',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Tentukan apakah user bisa akses panel Filament.
     */
    public function canAccessPanel(\Filament\Panel $panel): bool
    {
        return $this->role === 'admin';
    }

    /**
     * Method dari HasName → ini yang dipanggil Filament v4.
     */
    public function getFilamentName(): string
    {
        return (string) ($this->nama_user ?? $this->email ?? 'User');
    }
}
