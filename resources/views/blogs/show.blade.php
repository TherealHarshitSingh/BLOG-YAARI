@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 py-10">

    <!-- Back link -->
    <a href="{{ route('home') }}" class="inline-flex items-center gap-1.5 text-sm text-gray-500 hover:text-violet-600 font-medium mb-8 transition-colors group">
        <svg class="w-4 h-4 transition-transform group-hover:-translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        Back to all blogs
    </a>

    <!-- Article -->
    <article class="bg-white rounded-2xl overflow-hidden border border-gray-100 mb-8">

        <!-- Hero Image / Gradient Banner -->
        @if($blog->image)
            <img src="{{ asset('storage/' . $blog->image) }}"
                 alt="{{ $blog->title }}"
                 class="w-full h-72 sm:h-80 object-cover">
        @else
            @php
                $gradients = [
                    'Admit Card' => 'linear-gradient(135deg, #6D28D9, #A855F7, #EC4899)',
                    'Result'     => 'linear-gradient(135deg, #EC4899, #F472B6, #FB923C)',
                    'Other'      => 'linear-gradient(135deg, #F97316, #FBBF24, #EF4444)',
                ];
                $grad = $gradients[$blog->category] ?? 'linear-gradient(135deg, #6366F1, #8B5CF6, #EC4899)';
            @endphp
            <div class="w-full h-72 sm:h-80 flex items-end p-10" style="background: {{ $grad }}">
                <h1 class="text-white font-display font-bold text-3xl sm:text-4xl leading-tight max-w-xl">{{ $blog->title }}</h1>
            </div>
        @endif

        <div class="p-8 sm:p-10">

            <!-- Category + Date -->
            <div class="flex items-center gap-3 mb-5">
                @php
                    $catClass = match($blog->category) {
                        'Admit Card' => 'cat-admit',
                        'Result'     => 'cat-result',
                        default      => 'cat-other',
                    };
                @endphp
                <span class="category-pill {{ $catClass }}">{{ $blog->category }}</span>
                <span class="text-gray-300 text-sm">——</span>
                <span class="text-gray-400 text-sm">{{ \Carbon\Carbon::parse($blog->published_date)->format('M d, Y') }}</span>
            </div>

            @if($blog->image)
                <h1 class="font-display font-bold text-3xl sm:text-4xl text-gray-900 leading-tight mb-4">{{ $blog->title }}</h1>
            @endif

            <div class="flex items-center gap-3 mb-8 pb-8 border-b border-gray-100">
                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-violet-500 to-pink-500 flex items-center justify-center text-white text-xs font-bold flex-shrink-0">
                    {{ strtoupper(substr($blog->user->name ?? 'B', 0, 1)) }}
                </div>
                <div>
                    <p class="text-sm font-semibold text-gray-700">{{ $blog->user->name ?? 'BlogYaari Team' }}</p>
                    <p class="text-xs text-gray-400">Author</p>
                </div>
            </div>

            <!-- Short description pull-quote -->
            <p class="text-lg text-gray-600 border-l-4 border-violet-400 pl-5 italic mb-8 font-medium leading-relaxed">
                {{ $blog->short_description }}
            </p>

            <!-- Full content -->
            <div class="prose prose-gray max-w-none text-gray-700 leading-relaxed text-base blog-content">
                {!! $blog->content !!}
            </div>

            <!-- Upvote -->
            <div class="mt-10 pt-8 border-t border-gray-100 flex items-center gap-4">
                @auth
                    <button id="upvote-btn" data-id="{{ $blog->id }}"
                        class="inline-flex items-center gap-2.5 bg-violet-600 hover:bg-violet-700 active:bg-violet-800 text-white px-6 py-2.5 rounded-xl font-semibold text-sm transition-all hover:shadow-md hover:shadow-violet-200">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"/></svg>
                        Upvote
                        <span id="upvote-count" class="bg-white/20 text-white text-xs font-bold px-2 py-0.5 rounded-full">{{ $blog->upvotes }}</span>
                    </button>
                    <span class="text-sm text-gray-400">Found this helpful? Give it an upvote!</span>
                @else
                    <a href="{{ route('login') }}"
                        class="inline-flex items-center gap-2.5 bg-gray-100 hover:bg-violet-600 hover:text-white text-gray-600 px-6 py-2.5 rounded-xl font-semibold text-sm transition-all">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"/></svg>
                        Login to Upvote
                        <span class="bg-gray-200 text-gray-600 text-xs font-bold px-2 py-0.5 rounded-full">{{ $blog->upvotes }}</span>
                    </a>
                @endauth
            </div>
        </div>
    </article>

    <!-- Comments Section -->
    <div class="bg-white rounded-2xl border border-gray-100 p-8 sm:p-10">
        <h2 class="font-display font-bold text-2xl text-gray-900 mb-8 flex items-center gap-2">
            Comments
            <span class="text-sm font-semibold bg-violet-100 text-violet-700 px-2.5 py-0.5 rounded-full">{{ count($comments) }}</span>
        </h2>

        @auth
            <form method="POST" action="{{ route('comments.store', $blog->id) }}" class="mb-10">
                @csrf
                <div class="flex gap-3">
                    <div class="w-9 h-9 rounded-full bg-gradient-to-br from-violet-500 to-pink-500 flex items-center justify-center text-white text-sm font-bold flex-shrink-0 mt-1">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <div class="flex-1">
                        <textarea name="text" rows="3" placeholder="Share your thoughts..."
                            class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-violet-300 focus:border-transparent transition-all resize-none placeholder-gray-400"></textarea>
                        <button type="submit"
                            class="mt-2 bg-violet-600 hover:bg-violet-700 text-white text-sm font-semibold px-5 py-2 rounded-lg transition-colors">
                            Post Comment
                        </button>
                    </div>
                </div>
            </form>
        @else
            <div class="bg-gray-50 rounded-xl p-5 mb-8 text-center">
                <p class="text-sm text-gray-500">
                    <a href="{{ route('login') }}" class="text-violet-600 font-semibold hover:underline">Login</a>
                    to join the conversation.
                </p>
            </div>
        @endauth

        <div class="space-y-6">
            @forelse($comments as $comment)
                <div class="flex gap-3">
                    <div class="w-9 h-9 rounded-full bg-gradient-to-br from-gray-300 to-gray-400 flex items-center justify-center text-white text-sm font-bold flex-shrink-0">
                        {{ strtoupper(substr($comment->user->name ?? 'A', 0, 1)) }}
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center gap-2 mb-1">
                            <span class="text-sm font-semibold text-gray-800">{{ $comment->user->name }}</span>
                            <span class="text-xs text-gray-400">{{ $comment->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="text-sm text-gray-600 leading-relaxed">{{ $comment->text }}</p>
                    </div>
                </div>
            @empty
                <div class="text-center py-10">
                    <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-3">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                    </div>
                    <p class="text-sm text-gray-400">No comments yet. Be the first to share your thoughts!</p>
                </div>
            @endforelse
        </div>
    </div>
</div>

<style>
.blog-content h1, .blog-content h2, .blog-content h3 { font-family: 'Bricolage Grotesque', serif; font-weight: 700; color: #111827; margin: 1.5rem 0 0.75rem; }
.blog-content h1 { font-size: 1.875rem; }
.blog-content h2 { font-size: 1.5rem; }
.blog-content h3 { font-size: 1.25rem; }
.blog-content p { margin-bottom: 1rem; color: #374151; line-height: 1.75; }
.blog-content ul, .blog-content ol { margin: 1rem 0 1rem 1.5rem; }
.blog-content li { margin-bottom: 0.4rem; color: #374151; }
.blog-content a { color: #7C3AED; text-decoration: underline; }
.blog-content strong { font-weight: 700; color: #111827; }
.blog-content blockquote { border-left: 4px solid #7C3AED; padding-left: 1rem; color: #6B7280; font-style: italic; margin: 1.5rem 0; }
</style>
@endsection

@section('scripts')
<script>
$('#upvote-btn').on('click', function() {
    const id = $(this).data('id');
    const $btn = $(this);
    $btn.prop('disabled', true).addClass('opacity-75');
    $.ajax({
        url: '/blogs/' + id + '/upvote',
        method: 'POST',
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        success: function(response) {
            $('#upvote-count').text(response.upvotes);
            $btn.prop('disabled', false).removeClass('opacity-75');
        },
        error: function() {
            $btn.prop('disabled', false).removeClass('opacity-75');
        }
    });
});
</script>
@endsection