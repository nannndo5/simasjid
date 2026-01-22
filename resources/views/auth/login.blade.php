<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Login - {{ config('app.name') }}</title>
    
    <meta name="description" content="Login ke sistem Islamic Center untuk Admin dan Pengelola Keuangan">
    
    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full font-sans antialiased bg-navy-900">
    <div class="min-h-full flex items-center justify-center px-4 sm:px-6 lg:px-8 py-12">
        <!-- Background Image with Overlay -->
        <div class="fixed inset-0 z-0">
            <img 
                src="{{ asset('picture/masjid.jpg') }}" 
                alt="Background Masjid"
                class="w-full h-full object-cover"
                loading="eager"
            >
            <div class="absolute inset-0 bg-navy-900/80 backdrop-blur-sm"></div>
        </div>

        <!-- Login Form Container -->
        <div class="relative z-10 w-full max-w-md">
            <div class="bg-green-600 rounded-2xl shadow-2xl border-2 border-green-700/30 p-8 sm:p-10 relative overflow-visible">
                <!-- Back to User Button -->
                <div class="absolute top-0 left-0 translate-x-1 translate-y-1 sm:translate-x-2 sm:translate-y-2">
                    <a 
                        href="{{ route('home') }}" 
                        class="inline-flex items-center text-white hover:text-green-100 text-xs font-medium transition-colors duration-200 group"
                        aria-label="Kembali sebagai user"
                    >
                        <svg class="w-4 h-4 mr-1.5 transition-transform duration-200 group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali Sebagai User
                    </a>
                </div>
                
                <!-- Logo/Title -->
                <div class="text-center mb-8">
                    <div class="flex justify-center mb-4">
                        <div class="bg-white rounded-full p-3 shadow-lg ring-4 ring-white/30">
                            <svg class="w-12 h-12 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                    </div>
                    <h1 class="font-heading text-3xl font-bold text-white mb-2">
                        Login
                    </h1>
                    <p class="text-green-100 text-sm">
                        Masuk ke sistem Islamic Center
                    </p>
                </div>

                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-lg">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3 flex-1">
                                <p class="text-sm font-medium text-red-800">
                                    Terjadi kesalahan saat login:
                                </p>
                                <ul class="mt-2 text-sm text-red-700 list-disc list-inside space-y-1">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Login Form -->
                <form action="{{ route('login') }}" method="POST" class="space-y-6 bg-white rounded-xl p-6 -mx-2 shadow-lg border border-white/20">
                    @csrf

                    <!-- Username or Email Field -->
                    <div>
                        <label for="username" class="block text-sm font-medium text-navy-700 mb-2">
                            Username atau Email
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-navy-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <input 
                                type="text" 
                                id="username" 
                                name="username" 
                                value="{{ old('username') }}"
                                required
                                autocomplete="username email"
                                autofocus
                                class="block w-full pl-10 pr-3 py-3 bg-white border-2 border-navy-200 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 text-navy-900 placeholder-navy-400 transition-all shadow-sm @error('username') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror"
                                placeholder="Masukkan username atau email"
                                style="padding-left: 2.75rem;"
                            >
                        </div>
                        @error('username')
                            <p class="mt-1 text-sm text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password Field -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-navy-700 mb-2">
                            Password
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-navy-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                            <input 
                                type="password" 
                                id="password" 
                                name="password" 
                                required
                                autocomplete="current-password"
                                class="block w-full pl-10 pr-12 py-3 bg-white border-2 border-navy-200 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 text-navy-900 placeholder-navy-400 transition-all shadow-sm @error('password') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror"
                                placeholder="Masukkan password"
                                style="padding-left: 2.75rem;"
                            >
                            <!-- Toggle Password Visibility Button -->
                            <button 
                                type="button" 
                                id="togglePassword"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-navy-400 hover:text-navy-600 transition-colors"
                                aria-label="Tampilkan/sembunyikan password"
                            >
                                <!-- Eye Icon (Hidden) -->
                                <svg id="eyeIcon" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                <!-- Eye Slash Icon (Visible) -->
                                <svg id="eyeSlashIcon" class="h-5 w-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>
                                </svg>
                            </button>
                        </div>
                        @error('password')
                            <p class="mt-1 text-sm text-red-600 font-medium">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input 
                                type="checkbox" 
                                id="remember" 
                                name="remember" 
                                class="h-4 w-4 text-green-600 focus:ring-green-500 border-navy-300 rounded"
                            >
                            <label for="remember" class="ml-2 block text-sm text-navy-700">
                                Ingat saya
                            </label>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button 
                            type="submit" 
                            class="w-full flex justify-center items-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-semibold text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-200"
                        >
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                            </svg>
                            Masuk
                        </button>
                    </div>
                </form>

                <!-- Footer -->
                <div class="mt-6 text-center">
                    <p class="text-xs text-green-100 font-medium">
                        Hanya untuk Admin dan Pengelola Keuangan
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Password Toggle Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
            const eyeSlashIcon = document.getElementById('eyeSlashIcon');

            if (togglePassword && passwordInput && eyeIcon && eyeSlashIcon) {
                togglePassword.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    
                    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordInput.setAttribute('type', type);

                    // Toggle icon visibility
                    if (type === 'password') {
                        // Hide password - show eye icon
                        eyeIcon.classList.remove('hidden');
                        eyeSlashIcon.classList.add('hidden');
                    } else {
                        // Show password - show eye slash icon
                        eyeIcon.classList.add('hidden');
                        eyeSlashIcon.classList.remove('hidden');
                    }
                });
            }
        });
    </script>
</body>
</html>
