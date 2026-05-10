@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 py-10">

    <!-- Header -->
    <div class="mb-8 flex items-center justify-between">
        <div>
            <p class="text-xs font-semibold tracking-widest text-violet-500 uppercase mb-1">ADMIN</p>
            <h1 class="font-display font-bold text-3xl text-gray-900">Dashboard</h1>
        </div>
        <div class="flex items-center gap-2">
            <div class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></div>
            <span class="text-sm text-gray-400">System online</span>
        </div>
    </div>

    <!-- Stat cards -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 mb-8">

        <!-- Total Blogs -->
        <div class="bg-white rounded-2xl border border-gray-100 p-6 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 -mt-8 -mr-8 rounded-full opacity-10 bg-violet-500"></div>
            <div class="flex items-start justify-between mb-4">
                <div class="w-11 h-11 rounded-xl bg-violet-50 flex items-center justify-center">
                    <svg class="w-5 h-5 text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                </div>
            </div>
            <p class="font-display font-bold text-4xl text-gray-900">{{ $totalBlogs }}</p>
            <p class="text-gray-500 text-sm mt-1 font-medium">Total Blogs</p>
        </div>

        <!-- Total Users -->
        <div class="bg-white rounded-2xl border border-gray-100 p-6 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 -mt-8 -mr-8 rounded-full opacity-10 bg-pink-500"></div>
            <div class="flex items-start justify-between mb-4">
                <div class="w-11 h-11 rounded-xl bg-pink-50 flex items-center justify-center">
                    <svg class="w-5 h-5 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
            </div>
            <p class="font-display font-bold text-4xl text-gray-900">{{ $totalUsers }}</p>
            <p class="text-gray-500 text-sm mt-1 font-medium">Total Users</p>
        </div>

        <!-- Total Comments -->
        <div class="bg-white rounded-2xl border border-gray-100 p-6 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 -mt-8 -mr-8 rounded-full opacity-10 bg-orange-400"></div>
            <div class="flex items-start justify-between mb-4">
                <div class="w-11 h-11 rounded-xl bg-orange-50 flex items-center justify-center">
                    <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                </div>
            </div>
            <p class="font-display font-bold text-4xl text-gray-900">{{ $totalComments }}</p>
            <p class="text-gray-500 text-sm mt-1 font-medium">Total Comments</p>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white rounded-2xl border border-gray-100 p-6 mb-8">
        <h2 class="font-display font-semibold text-lg text-gray-900 mb-5">Quick Actions</h2>
        <div class="flex flex-wrap gap-3">
            <a href="{{ route('admin.blogs') }}"
                class="inline-flex items-center gap-2 bg-violet-600 hover:bg-violet-700 text-white font-semibold px-5 py-2.5 rounded-xl transition-colors text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                Manage Blogs
            </a>
            <a href="{{ route('posts.create') }}"
                class="inline-flex items-center gap-2 bg-pink-500 hover:bg-pink-600 text-white font-semibold px-5 py-2.5 rounded-xl transition-colors text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Create Blog
            </a>
            <a href="{{ route('home') }}"
                class="inline-flex items-center gap-2 border border-gray-200 text-gray-600 hover:bg-gray-50 font-medium px-5 py-2.5 rounded-xl transition-colors text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                View Site
            </a>
        </div>
    </div>

    <!-- Summary bar -->
    <div class="bg-gradient-to-r from-violet-600 via-pink-500 to-orange-400 rounded-2xl p-6 text-white">
        <div class="flex flex-col sm:flex-row gap-4 items-start sm:items-center justify-between">
            <div>
                <h3 class="font-display font-bold text-xl mb-1">BlogYaari is growing! 🎉</h3>
                <p class="text-white/80 text-sm">{{ $totalBlogs }} posts · {{ $totalUsers }} writers · {{ $totalComments }} conversations</p>
            </div>
            <a href="{{ route('admin.blogs') }}"
                class="bg-white text-violet-700 font-semibold px-5 py-2.5 rounded-xl hover:bg-violet-50 transition-colors text-sm flex-shrink-0">
                View all blogs →
            </a>
        </div>
    </div>
</div>
@endsection