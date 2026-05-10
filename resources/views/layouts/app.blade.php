<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'BlogYaari') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Quill CSS -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    @yield('styles')
</head>
<body class="bg-gray-100 min-h-screen">

    <!-- Navbar -->
    <nav class="bg-white shado<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'BlogYaari') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,400;12..96,500;12..96,600;12..96,700;12..96,800&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        display: ['Bricolage Grotesque', 'serif'],
                        body: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            purple: '#7C3AED',
                            pink: '#EC4899',
                            orange: '#F97316',
                            'purple-light': '#EDE9FE',
                            'pink-light': '#FCE7F3',
                            'orange-light': '#FFF7ED',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, h4, .font-display { font-family: 'Bricolage Grotesque', serif; }
        .nav-link { position: relative; }
        .nav-link::after { content: ''; position: absolute; bottom: -2px; left: 0; width: 0; height: 2px; background: #7C3AED; transition: width 0.2s ease; }
        .nav-link:hover::after { width: 100%; }
        .dropdown-menu { display: none; }
        .group:hover .dropdown-menu { display: block; }
        .category-pill {
            display: inline-flex; align-items: center; gap: 4px;
            padding: 3px 10px; border-radius: 999px; font-size: 12px;
            font-weight: 500; letter-spacing: 0.01em;
        }
        .cat-admit { background: #EDE9FE; color: #6D28D9; }
        .cat-result { background: #FCE7F3; color: #BE185D; }
        .cat-other  { background: #FFF7ED; color: #C2410C; }
        .cat-default { background: #F3F4F6; color: #374151; }
        .flash-banner { animation: slideDown 0.3s ease; }
        @keyframes slideDown { from { transform: translateY(-10px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
        .card-hover { transition: transform 0.2s ease, box-shadow 0.2s ease; }
        .card-hover:hover { transform: translateY(-3px); box-shadow: 0 12px 32px rgba(0,0,0,0.10); }
        .hero-gradient {
            background: linear-gradient(135deg, #f5f3ff 0%, #fce7f3 35%, #fff7ed 70%, #f5f3ff 100%);
        }
        /* Quill overrides */
        .ql-toolbar.ql-snow { border-radius: 10px 10px 0 0; border-color: #E5E7EB; }
        .ql-container.ql-snow { border-radius: 0 0 10px 10px; border-color: #E5E7EB; font-family: 'Inter', sans-serif; font-size: 15px; }
    </style>
    @yield('styles')
</head>
<body class="bg-gray-50 min-h-screen">

    <!-- Navbar -->
    <nav class="bg-white border-b border-gray-100 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="flex justify-between items-center h-16">

                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-violet-600 to-pink-500 flex items-center justify-center">
                        <span class="text-white font-display font-bold text-sm">B</span>
                    </div>
                    <span class="font-display font-bold text-xl text-gray-900 tracking-tight">BlogYaari</span>
                    <span class="hidden sm:inline-block text-xs font-medium bg-violet-100 text-violet-700 px-2 py-0.5 rounded-full ml-1">BETA</span>
                </a>

                <!-- Nav links (desktop) -->
                <div class="hidden md:flex items-center gap-6 text-sm font-medium text-gray-600">
                    <a href="{{ route('home') }}" class="nav-link hover:text-gray-900 transition-colors">Blog</a>
                    @auth
                        <a href="{{ route('my.posts') }}" class="nav-link hover:text-gray-900 transition-colors">My Posts</a>
                    @endauth
                </div>

                <!-- Right actions -->
                <div class="flex items-center gap-3">
                    @auth
                        <a href="{{ route('posts.create') }}"
                            class="hidden sm:inline-flex items-center gap-1.5 bg-violet-600 hover:bg-violet-700 text-white text-sm font-medium px-4 py-2 rounded-lg transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                            Write Post
                        </a>

                        <!-- User dropdown -->
                        <div class="relative group">
                            <button class="flex items-center gap-2 pl-2 pr-3 py-1.5 rounded-lg hover:bg-gray-100 transition-colors text-sm font-medium text-gray-700">
                                <div class="w-7 h-7 rounded-full bg-gradient-to-br from-violet-500 to-pink-500 flex items-center justify-center text-white text-xs font-bold">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                                <span class="hidden sm:block max-w-[100px] truncate">{{ Auth::user()->name }}</span>
                                <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </button>
                            <div class="dropdown-menu absolute right-0 top-full mt-1 w-52 bg-white rounded-xl shadow-lg border border-gray-100 py-1 z-50">
                                <div class="px-4 py-2.5 border-b border-gray-100">
                                    <p class="text-sm font-semibold text-gray-800 truncate">{{ Auth::user()->name }}</p>
                                    <p class="text-xs text-gray-400 truncate">{{ Auth::user()->email }}</p>
                                </div>
                                <a href="{{ route('profile') }}" class="flex items-center gap-2.5 px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                    Account Details
                                </a>
                                <a href="{{ route('my.posts') }}" class="flex items-center gap-2.5 px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                    My Posts
                                </a>
                                @if(Auth::user()->is_admin)
                                <a href="{{ route('admin.index') }}" class="flex items-center gap-2.5 px-4 py-2.5 text-sm text-violet-600 hover:bg-violet-50 transition-colors font-medium">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3H5a2 2 0 00-2 2v4m6-6h10a2 2 0 012 2v4M9 3v18m0 0h10a2 2 0 002-2V9M9 21H5a2 2 0 01-2-2V9m0 0h18"/></svg>
                                    Admin Panel
                                </a>
                                @endif
                                <div class="border-t border-gray-100 mt-1">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="flex items-center gap-2.5 w-full px-4 py-2.5 text-sm text-red-500 hover:bg-red-50 transition-colors">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                            Logout
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900 transition-colors">Login</a>
                        <a href="{{ route('register') }}" class="bg-violet-600 hover:bg-violet-700 text-white text-sm font-medium px-4 py-2 rounded-lg transition-colors">
                            Sign up for free
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Flash Messages -->
    @if(session('success'))
        <div class="flash-banner bg-emerald-50 border-b border-emerald-200 text-emerald-800 px-6 py-3 text-center text-sm font-medium flex items-center justify-center gap-2">
            <svg class="w-4 h-4 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="flash-banner bg-red-50 border-b border-red-200 text-red-700 px-6 py-3 text-center text-sm font-medium flex items-center justify-center gap-2">
            <svg class="w-4 h-4 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/></svg>
            {{ session('error') }}
        </div>
    @endif

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="border-t border-gray-100 bg-white mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 py-8 flex flex-col sm:flex-row justify-between items-center gap-4">
            <div class="flex items-center gap-2">
                <div class="w-6 h-6 rounded-md bg-gradient-to-br from-violet-600 to-pink-500 flex items-center justify-center">
                    <span class="text-white font-display font-bold text-xs">B</span>
                </div>
                <span class="font-display font-semibold text-gray-800">BlogYaari</span>
            </div>
            <p class="text-sm text-gray-400">© {{ date('Y') }} BlogYaari. All rights reserved.</p>
            <div class="flex gap-4 text-sm text-gray-500">
                <a href="{{ route('home') }}" class="hover:text-gray-800 transition-colors">Blog</a>
                @auth
                    <a href="{{ route('posts.create') }}" class="hover:text-gray-800 transition-colors">Write</a>
                @else
                    <a href="{{ route('register') }}" class="hover:text-gray-800 transition-colors">Join</a>
                @endauth
            </div>
        </div>
    </footer>

    @yield('scripts')
</body>
</html>w-md px-6 py-4 flex justify-between items-center">
        <a href="{{ route('home') }}" class="text-2xl font-bold text-blue-600">BlogYaari</a>

        <div class="flex items-center gap-4">
            @auth
                <a href="{{ route('posts.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Write Post</a>
                <div class="relative group">
                    <button class="flex items-center gap-2 font-medium">
                        👤 {{ Auth::user()->name }}
                    </button>
                    <div class="absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-lg hidden group-hover:block z-10">
                        <a href="{{ route('profile') }}" class="block px-4 py-2 hover:bg-gray-100">Account Details</a>
                        <a href="{{ route('my.posts') }}" class="block px-4 py-2 hover:bg-gray-100">My Posts</a>
                        @if(Auth::user()->is_admin)
                            <a href="{{ route('admin.index') }}" class="block px-4 py-2 hover:bg-gray-100 text-red-600">Admin Panel</a>
                        @endif
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100 text-red-500">Logout</button>
                        </form>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}" class="text-blue-600 font-medium">Login</a>
                <a href="{{ route('register') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Register</a>
            @endauth
        </div>
    </nav>

    <!-- Flash Messages -->
    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-6 py-3 text-center">
            {{ session('success') }}
        </div>
    @endif

    <!-- Main Content -->
    <main class="max-w-6xl mx-auto px-4 py-8">
        @yield('content')
    </main>

    @yield('scripts')
</body>
</html>