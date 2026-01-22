<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Fortify\TwoFactorAuthenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, TwoFactorAuthenticatable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'two_factor_secret',
        'two_factor_recovery_codes',
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
            // Password tidak di-hash otomatis di casts
            // Kita akan handle hashing manual saat menyimpan password baru
        ];
    }

    /**
     * Set the password attribute (hash it when setting)
     */
    public function setPasswordAttribute($value): void
    {
        // Only hash if the value is not already hashed (doesn't start with $2y$)
        if (!empty($value) && !str_starts_with($value, '$2y$') && !str_starts_with($value, '$2a$')) {
            $this->attributes['password'] = Hash::make($value);
        } else {
            // If already hashed, save as is
            $this->attributes['password'] = $value;
        }
    }

    /**
     * Get the user's initials
     */
    public function initials(): string
    {
        return Str::of($this->username ?? $this->email)
            ->explode(' ')
            ->take(2)
            ->map(fn ($word) => Str::substr($word, 0, 1))
            ->implode('')
            ->upper();
    }

    /**
     * Check if user is admin
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    /**
     * Check if user is keuangan
     */
    public function isKeuangan(): bool
    {
        return $this->role === 'keuangan';
    }
}
