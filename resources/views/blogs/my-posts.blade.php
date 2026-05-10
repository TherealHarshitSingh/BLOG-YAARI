@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 py-10">

    <!-- Header -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="font-display font-bold text-3xl text-gray-900">My Posts</h1>
            <p class="text-gray-500 text-sm mt-1">Manage all the content you've published.</p>
        </div>
        <a href="{{ route('posts.create') }}"
            class="inline-flex items-center gap-1.5 bg-violet-600 hover:bg-violet-700 text-white text-sm font-semibold px-4 py-2.5 rounded-xl transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            New Post
        </a>
    </div>

    @if($blogs->isEmpty())
        <!-- Empty state -->
        <div class="bg-white rounded-2xl border border-gray-100 p-16 text-center">
            <div class="w-16 h-16 bg-violet-50 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
            </div>
            <h3 class="font-display font-bold text-xl text-gray-800 mb-2">No posts yet</h3>
            <p class="text-gray-400 text-sm mb-6">Start sharing your knowledge with the community.</p>
            <a href="{{ route('posts.create') }}"
                class="inline-flex items-center gap-2 bg-violet-600 hover:bg-violet-700 text-white font-semibold px-6 py-3 rounded-xl transition-colors text-sm">
                Write your first post
            </a>
        </div>

    @else
        <div class="space-y-4">
            @foreach($blogs as $blog)
            <div class="bg-white rounded-2xl border border-gray-100 p-5 flex flex-col sm:flex-row gap-4 items-start sm:items-center hover:border-violet-200 transition-colors card-hover">

                <!-- Thumbnail -->
                <div class="flex-shrink-0">
                    @if($blog->image)
                        <img src="{{ asset('storage/' . $blog->image) }}"
                             class="w-16 h-16 sm:w-20 sm:h-20 object-cover rounded-xl">
                    @else
                        @php
                            $grads = [
                                'Admit Card' => 'from-violet-500 to-pink-500',
                                'Result'     => 'from-pink-500 to-orange-400',
                                'Other'      => 'from-orange-400 to-yellow-400',
                            ];
                            $g = $grads[$blog->category] ?? 'from-violet-500 to-pink-500';
                        @endphp
                        <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-xl bg-gradient-to-br {{ $g }} flex items-center justify-center">
                            <svg class="w-6 h-6 text-white/80" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        </div>
                    @endif
                </div>

                <!-- Info -->
                <div class="flex-1 min-w-0">
                    <div class="flex items-center gap-2 mb-1">
                        @php
                            $catClass = match($blog->category) {
                                'Admit Card' => 'cat-admit',
                                'Result'     => 'cat-result',
                                default      => 'cat-other',
                            };
                        @endphp
                        <span class="category-pill {{ $catClass }}">{{ $blog->category }}</span>
                        <span class="text-gray-300 text-xs">·</span>
                        <span class="text-xs text-gray-400">{{ \Carbon\Carbon::parse($blog->published_date)->format('M d, Y') }}</span>
                    </div>
                    <h3 class="font-display font-bold text-gray-900 text-lg leading-snug truncate">{{ $blog->title }}</h3>
                    <p class="text-gray-400 text-sm mt-0.5 truncate">{{ Str::limit($blog->short_description, 80) }}</p>
                </div>

                <!-- Metrics -->
                <div class="flex items-center gap-5 flex-shrink-0">
                    <div class="text-center">
                        <p class="text-2xl font-display font-bold text-violet-600">{{ $blog->upvotes }}</p>
                        <p class="text-xs text-gray-400">Upvotes</p>
                    </div>
                    <div class="text-center">
                        <p class="text-2xl font-display font-bold text-pink-500">{{ $blog->comments->count() }}</p>
                        <p class="text-xs text-gray-400">Comments</p>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex items-center gap-2 flex-shrink-0">
                    <a href="{{ route('blogs.show', $blog->id) }}"
                        class="p-2 text-gray-400 hover:text-violet-600 hover:bg-violet-50 rounded-lg transition-all" title="View">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    </a>
                    <a href="{{ route('posts.edit', $blog->id) }}"
                        class="p-2 text-gray-400 hover:text-amber-600 hover:bg-amber-50 rounded-lg transition-all" title="Edit">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    </a>
                    <form method="POST" action="{{ route('posts.destroy', $blog->id) }}" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            onclick="return confirm('Are you sure you want to delete this post?')"
                            class="p-2 text-gray-400 hover:text-red-500 hover:bg-red-50 rounded-lg transition-all" title="Delete">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>
@endsection