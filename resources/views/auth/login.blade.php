@extends('layouts.app')

@section('content')
<div class="min-h-[calc(100vh-64px)] flex items-center justify-center px-4 py-12 bg-gray-50">
    <div class="w-full max-w-sm">

        <!-- Card -->
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

            <!-- Top gradient strip -->
            <div class="h-1.5 bg-gradient-to-r from-violet-600 via-pink-500 to-orange-400"></div>

            <div class="p-8">
                <!-- Logo -->
                <div class="text-center mb-8">
                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-violet-600 to-pink-500 flex items-center justify-center mx-auto mb-3">
                        <span class="text-white font-display font-bold text-xl">B</span>
                    </div>
                    <h1 class="font-display font-bold text-2xl text-gray-900">Welcome back</h1>
                    <p class="text-gray-400 text-sm mt-1">Login to your BlogYaari account</p>
                </div>

                @if($errors->any())
                    <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-xl mb-6 text-sm flex gap-2 items-start">
                        <svg class="w-4 h-4 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/></svg>
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="/login" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Email address</label>
                        <input type="email" name="email" required autocomplete="email"
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-violet-300 focus:border-transparent transition-all placeholder-gray-400"
                            placeholder="you@example.com"
                            value="{{ old('email') }}">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Password</label>
                        <input type="password" name="password" required autocomplete="current-password"
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-violet-300 focus:border-transparent transition-all placeholder-gray-400"
                            placeholder="Enter your password">
                    </div>

                    <button type="submit"
                        class="w-full bg-violet-600 hover:bg-violet-700 text-white font-semibold py-2.5 rounded-xl transition-colors text-sm mt-2">
                        Login to BlogYaari
                    </button>
                </form>

                <p class="text-center text-sm text-gray-500 mt-6">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="text-violet-600 font-semibold hover:text-violet-700">Sign up for free</a>
                </p>
            </div>
        </div>

        <!-- Trust signals -->
        <p class="text-center text-xs text-gray-400 mt-6">
            By logging in you agree to our
            <span class="text-gray-500">Terms of Service</span> &
            <span class="text-gray-500">Privacy Policy</span>
        </p>
    </div>
</div>
@endsection