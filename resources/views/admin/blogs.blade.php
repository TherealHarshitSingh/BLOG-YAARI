@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 py-10">

    <!-- Header -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <div class="flex items-center gap-2 mb-1">
                <a href="{{ route('admin.index') }}" class="text-xs text-gray-400 hover:text-violet-600 font-medium transition-colors">Dashboard</a>
                <span class="text-gray-300 text-xs">/</span>
                <span class="text-xs text-gray-500 font-medium">Blogs</span>
            </div>
            <h1 class="font-display font-bold text-3xl text-gray-900">Manage Blogs</h1>
        </div>
        <a href="{{ route('posts.create') }}"
            class="inline-flex items-center gap-1.5 bg-violet-600 hover:bg-violet-700 text-white text-sm font-semibold px-4 py-2.5 rounded-xl transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            New Blog
        </a>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-gray-100 bg-gray-50/60">
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase tracking-wide">#</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase tracking-wide">Post</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase tracking-wide">Author</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase tracking-wide">Category</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase tracking-wide">Upvotes</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-400 uppercase tracking-wide">Date</th>
                        <th class="px-6 py-4 text-right text-xs font-semibold text-gray-400 uppercase tracking-wide">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($blogs as $blog)
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="px-6 py-4 text-gray-400 text-xs font-mono">{{ $blog->id }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    @if($blog->image)
                                        <img src="{{ asset('storage/' . $blog->image) }}"
                                             class="w-10 h-10 rounded-lg object-cover flex-shrink-0">
                                    @else
                                        @php
                                            $gs = [
                                                'Admit Card' => 'from-violet-500 to-pink-500',
                                                'Result'     => 'from-pink-500 to-orange-400',
                                                'Other'      => 'from-orange-400 to-yellow-400',
                                            ];
                                            $g = $gs[$blog->category] ?? 'from-violet-500 to-pink-500';
                                        @endphp
                                        <div class="w-10 h-10 rounded-lg bg-gradient-to-br {{ $g }} flex-shrink-0"></div>
                                    @endif
                                    <div class="min-w-0">
                                        <p class="font-semibold text-gray-900 truncate max-w-[220px]">{{ Str::limit($blog->title, 40) }}</p>
                                        <p class="text-xs text-gray-400 truncate max-w-[220px]">{{ Str::limit($blog->short_description, 50) }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <div class="w-7 h-7 rounded-full bg-gradient-to-br from-violet-400 to-pink-400 flex items-center justify-center text-white text-xs font-bold flex-shrink-0">
                                        {{ strtoupper(substr($blog->user->name ?? 'U', 0, 1)) }}
                                    </div>
                                    <span class="text-gray-700 text-sm">{{ $blog->user->name ?? 'Unknown' }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                @php
                                    $catClass = match($blog->category) {
                                        'Admit Card' => 'cat-admit',
                                        'Result'     => 'cat-result',
                                        default      => 'cat-other',
                                    };
                                @endphp
                                <span class="category-pill {{ $catClass }}">{{ $blog->category }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-1.5">
                                    <svg class="w-3.5 h-3.5 text-violet-400" fill="currentColor" viewBox="0 0 20 20"><path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"/></svg>
                                    <span class="font-semibold text-gray-700">{{ $blog->upvotes }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-500 text-sm">
                                {{ \Carbon\Carbon::parse($blog->published_date)->format('M d, Y') }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-1">
                                    <a href="{{ route('blogs.show', $blog->id) }}"
                                        class="p-2 text-gray-400 hover:text-violet-600 hover:bg-violet-50 rounded-lg transition-all" title="View" target="_blank">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </a>
                                    <form method="POST" action="{{ route('admin.blogs.destroy', $blog->id) }}" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            onclick="return confirm('Delete this blog permanently?')"
                                            class="p-2 text-gray-400 hover:text-red-500 hover:bg-red-50 rounded-lg transition-all" title="Delete">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-20 text-center">
                                <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-3">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                </div>
                                <p class="text-gray-400 font-medium">No blogs found.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($blogs->count() > 0)
        <div class="px-6 py-4 border-t border-gray-100 bg-gray-50/40 flex items-center justify-between">
            <p class="text-xs text-gray-400">Showing {{ $blogs->count() }} blog{{ $blogs->count() !== 1 ? 's' : '' }}</p>
            <a href="{{ route('posts.create') }}" class="text-xs font-semibold text-violet-600 hover:text-violet-800">+ Add new blog</a>
        </div>
        @endif
    </div>
</div>
@endsection