<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser; // <-- 1. TAMBAHKAN INI
use Filament\Panel;                         // <-- 2. TAMBAHKAN INI

class User extends Authenticatable implements FilamentUser // <-- 3. TAMBAHKAN 'implements FilamentUser'
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Method ini sudah benar
    public function canAccessPanel(Panel $panel): bool
    {
        // Izinkan semua user yang terdaftar untuk mengakses
        // Logika ini berarti SETIAP user di tabel 'users' bisa login ke panel Filament.
        return true;
    }
}