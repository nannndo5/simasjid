<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Show the login form.
     */
    public function showLoginForm()
    {
        // If already authenticated, redirect to home
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->isAdmin()) {
                return redirect()->route('admin.dashboard');
            }
            if ($user->isKeuangan()) {
                return redirect()->route('pengelola-keuangan.infaq.index');
            }
            return redirect()->route('home');
        }

        return view('auth.login');
    }

    /**
     * Handle a login request to the application.
     */
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ], [
            'username.required' => 'Username harus diisi',
            'password.required' => 'Password harus diisi',
        ]);

        $username = $request->username;
        $password = $request->password;

        // Try to find user by username or email
        $user = User::where('username', $username)
            ->orWhere('email', $username)
            ->first();

        if (!$user) {
            throw ValidationException::withMessages([
                'username' => ['Username atau email tidak ditemukan.'],
            ]);
        }

        // Check password using bcrypt
        // Get raw password hash from database (without auto-hashing from model)
        $storedPassword = $user->getAttributes()['password'];
        
        // Verify password using password_verify() which works with bcrypt
        if (!password_verify($password, $storedPassword)) {
            throw ValidationException::withMessages([
                'password' => ['Password salah.'],
            ]);
        }
        
        // If password needs rehashing (e.g., if using old algorithm), rehash it
        if (password_needs_rehash($storedPassword, PASSWORD_BCRYPT)) {
            // Update password directly in database to avoid timestamp issues
            DB::table('user')
                ->where('id', $user->id)
                ->update(['password' => Hash::make($password)]);
        }

        // Check if user is admin or keuangan (not regular user)
        if (!in_array($user->role, ['admin', 'keuangan'])) {
            throw ValidationException::withMessages([
                'username' => ['Akses ditolak. Hanya Admin dan Pengelola Keuangan yang dapat login.'],
            ]);
        }

        // Login the user
        Auth::login($user, $request->filled('remember'));

        $request->session()->regenerate();

        return $this->redirectBasedOnRole($user);
    }

    /**
     * Redirect user based on their role.
     */
    protected function redirectBasedOnRole(User $user)
    {
        if ($user->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }

        if ($user->isKeuangan()) {
            return redirect()->route('pengelola-keuangan.infaq.index');
        }

        return redirect()->route('home');
    }

    /**
     * Log the user out of the application.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
