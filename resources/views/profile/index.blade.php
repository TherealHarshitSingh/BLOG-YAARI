@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto px-4 sm:px-6 py-10">

    <!-- Header -->
    <div class="mb-8">
        <h1 class="font-display font-bold text-3xl text-gray-900">Account Details</h1>
        <p class="text-gray-500 text-sm mt-1">Manage your personal information.</p>
    </div>

    <!-- Profile Card -->
    <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
        <!-- Gradient header -->
        <div class="h-24 bg-gradient-to-r from-violet-600 via-pink-500 to-orange-400"></div>

        <!-- Avatar -->
        <div class="px-8 -mt-10 mb-6 flex items-end gap-4">
            <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-violet-600 to-pink-500 flex items-center justify-center text-white font-display font-bold text-3xl border-4 border-white shadow-sm flex-shrink-0">
                {{ strtoupper(substr($user->name, 0, 1)) }}
            </div>
            <div class="pb-1">
                <p class="font-display font-bold text-xl text-gray-900">{{ $user->name }}</p>
                <p class="text-sm text-gray-400">Member since {{ $user->created_at->format('M Y') }}</p>
            </div>
        </div>

        <div class="px-8 pb-8">

            @if(session('success'))
                <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-xl mb-6 flex gap-2 items-center text-sm">
                    <svg class="w-4 h-4 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-xl mb-6 text-sm">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('profile.update') }}" class="space-y-5">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Full Name</label>
                        <input type="text" name="name" required
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-violet-300 focus:border-transparent transition-all"
                            value="{{ $user->name }}">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Username</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-sm">@</span>
                            <input type="text" name="username" required
                                class="w-full border border-gray-200 rounded-xl pl-8 pr-4 py-2.5 text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-violet-300 focus:border-transparent transition-all"
                                value="{{ $user->username }}">
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Email address</label>
                    <input type="email" name="email" required
                        class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-violet-300 focus:border-transparent transition-all"
                        value="{{ $user->email }}">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Member Since</label>
                    <input type="text" disabled
                        class="w-full border border-gray-100 bg-gray-50 rounded-xl px-4 py-2.5 text-sm text-gray-400 cursor-not-allowed"
                        value="{{ $user->created_at->format('d M Y') }}">
                </div>

                <div class="pt-2">
                    <button type="submit"
                        class="w-full bg-violet-600 hover:bg-violet-700 text-white font-semibold py-3 rounded-xl transition-colors text-sm">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection