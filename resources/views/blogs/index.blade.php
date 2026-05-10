@extends('layouts.app')

@section('content')

<!-- ═══════════════════════════════════════════
     HERO SECTION
════════════════════════════════════════════ -->
<section class="hero-gradient py-20 px-4 text-center border-b border-gray-100">
    <p class="text-xs font-semibold tracking-widest text-violet-600 uppercase mb-4">BLOGS</p>
    <h1 class="font-display font-bold text-4xl sm:text-5xl lg:text-6xl text-gray-900 leading-tight max-w-2xl mx-auto mb-6">
        Blogs on exams,<br>results & admit cards
    </h1>
    <p class="text-gray-500 text-lg max-w-md mx-auto">
        Stay updated with the latest admit cards, results, and important notifications.
    </p>
</section>

<!-- ═══════════════════════════════════════════
     CATEGORY QUICK-LINKS
════════════════════════════════════════════ -->
<section class="bg-white border-b border-gray-100 py-10 px-4">
    <div class="max-w-7xl mx-auto">
        <p class="text-xs font-semibold tracking-widest text-gray-400 uppercase mb-6">READ BY CATEGORY</p>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <button onclick="filterByCategory('Admit Card')"
                class="group relative overflow-hidden rounded-2xl h-36 flex items-end p-5 cursor-pointer text-left transition-transform hover:-translate-y-1"
                style="background: linear-gradient(135deg, #6D28D9 0%, #A855F7 50%, #EC4899 100%);">
                <span class="relative z-10 bg-white/20 backdrop-blur-sm text-white text-sm font-semibold px-3 py-1.5 rounded-full">Admit Card</span>
            </button>
            <button onclick="filterByCategory('Result')"
                class="group relative overflow-hidden rounded-2xl h-36 flex items-end p-5 cursor-pointer text-left transition-transform hover:-translate-y-1"
                style="background: linear-gradient(135deg, #EC4899 0%, #F472B6 50%, #FB923C 100%);">
                <span class="relative z-10 bg-white/20 backdrop-blur-sm text-white text-sm font-semibold px-3 py-1.5 rounded-full">Result</span>
            </button>
            <button onclick="filterByCategory('Other')"
                class="group relative overflow-hidden rounded-2xl h-36 flex items-end p-5 cursor-pointer text-left transition-transform hover:-translate-y-1"
                style="background: linear-gradient(135deg, #F97316 0%, #FBBF24 50%, #EF4444 100%);">
                <span class="relative z-10 bg-white/20 backdrop-blur-sm text-white text-sm font-semibold px-3 py-1.5 rounded-full">Other</span>
            </button>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════
     FILTER BAR
════════════════════════════════════════════ -->
<section class="bg-white border-b border-gray-100 px-4 py-4 sticky top-16 z-40">
    <div class="max-w-7xl mx-auto flex flex-wrap gap-3 items-center">
        <select id="category-filter"
            class="text-sm border border-gray-200 rounded-lg px-3 py-2 bg-white text-gray-700 focus:outline-none focus:ring-2 focus:ring-violet-300 focus:border-transparent transition-all">
            <option value="all">All Categories</option>
            <option value="Admit Card">Admit Card</option>
            <option value="Result">Result</option>
            <option value="Other">Other</option>
        </select>

        <input type="date" id="date-filter"
            class="text-sm border border-gray-200 rounded-lg px-3 py-2 bg-white text-gray-700 focus:outline-none focus:ring-2 focus:ring-violet-300 focus:border-transparent transition-all">

        <div class="relative flex-1 min-w-[200px]">
            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            <input type="text" id="search-filter" placeholder="Search blogs..."
                class="w-full text-sm border border-gray-200 rounded-lg pl-9 pr-4 py-2 bg-white text-gray-700 focus:outline-none focus:ring-2 focus:ring-violet-300 focus:border-transparent transition-all">
        </div>

        <button id="clear-filter"
            class="text-sm text-gray-500 hover:text-violet-600 font-medium px-3 py-2 rounded-lg hover:bg-violet-50 transition-all">
            Clear filters
        </button>
    </div>
</section>

<!-- ═══════════════════════════════════════════
     FEATURED BLOGS LABEL
════════════════════════════════════════════ -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 pt-10 pb-4">
    <p class="text-xs font-semibold tracking-widest text-gray-400 uppercase">FEATURED BLOGS</p>
</div>

<!-- ═══════════════════════════════════════════
     BLOG GRID
════════════════════════════════════════════ -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 pb-16">

    <!-- Loading Spinner -->
    <div id="loading" class="hidden text-center py-16">
        <div class="inline-block w-8 h-8 border-[3px] border-violet-200 border-t-violet-600 rounded-full animate-spin"></div>
        <p class="text-sm text-gray-400 mt-3">Loading blogs...</p>
    </div>

    <div id="blog-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($blogs as $blog)
        <article class="card-hover bg-white rounded-2xl overflow-hidden border border-gray-100 flex flex-col">

            <!-- Thumbnail -->
            <a href="{{ route('blogs.show', $blog->id) }}" class="block">
                @if($blog->image)
                    <img src="{{ asset('storage/' . $blog->image) }}"
                         alt="{{ $blog->title }}"
                         class="w-full h-48 object-cover">
                @else
                    @php
                        $gradients = [
                            'Admit Card' => 'linear-gradient(135deg, #6D28D9, #A855F7, #EC4899)',
                            'Result'     => 'linear-gradient(135deg, #EC4899, #F472B6, #FB923C)',
                            'Other'      => 'linear-gradient(135deg, #F97316, #FBBF24, #EF4444)',
                        ];
                        $grad = $gradients[$blog->category] ?? 'linear-gradient(135deg, #6366F1, #8B5CF6, #EC4899)';
                        $words = explode(' ', $blog->title);
                        $shortTitle = implode(' ', array_slice($words, 0, 4));
                    @endphp
                    <div class="w-full h-48 flex items-center justify-center p-6" style="background: {{ $grad }}">
                        <p class="text-white font-display font-bold text-xl text-center leading-tight">{{ $shortTitle }}</p>
                    </div>
                @endif
            </a>

            <!-- Meta + Content -->
            <div class="p-5 flex flex-col flex-1">
                <div class="flex items-center gap-2 mb-3">
                    @php
                        $catClass = match($blog->category) {
                            'Admit Card' => 'cat-admit',
                            'Result'     => 'cat-result',
                            default      => 'cat-other',
                        };
                    @endphp
                    <span class="category-pill {{ $catClass }}">{{ $blog->category }}</span>
                    <span class="text-gray-300 text-xs">——</span>
                    <span class="text-gray-400 text-xs">{{ \Carbon\Carbon::parse($blog->published_date)->format('M d, Y') }}</span>
                </div>

                <a href="{{ route('blogs.show', $blog->id) }}" class="block flex-1">
                    <h3 class="font-display font-bold text-gray-900 text-lg leading-snug hover:text-violet-700 transition-colors mb-2">
                        {{ $blog->title }}
                    </h3>
                    <p class="text-gray-500 text-sm leading-relaxed line-clamp-3">
                        {{ Str::limit($blog->short_description, 110) }}
                    </p>
                </a>

                <div class="flex items-center justify-between mt-4 pt-4 border-t border-gray-100">
                    <span class="text-xs text-gray-400">By {{ $blog->user->name ?? 'BlogYaari' }}</span>
                    <a href="{{ route('blogs.show', $blog->id) }}"
                        class="text-xs font-semibold text-violet-600 hover:text-violet-800 transition-colors">
                        Read more →
                    </a>
                </div>
            </div>
        </article>
        @empty
            <div class="col-span-3 text-center py-20">
                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-7 h-7 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                </div>
                <p class="text-gray-500 font-medium">No blogs found.</p>
                <p class="text-gray-400 text-sm mt-1">Try adjusting your filters.</p>
            </div>
        @endforelse
    </div>
</div>

@endsection

@section('scripts')
<script>
function getCategoryClass(cat) {
    if (cat === 'Admit Card') return 'cat-admit';
    if (cat === 'Result') return 'cat-result';
    return 'cat-other';
}

function getGradient(cat) {
    if (cat === 'Admit Card') return 'linear-gradient(135deg, #6D28D9, #A855F7, #EC4899)';
    if (cat === 'Result') return 'linear-gradient(135deg, #EC4899, #F472B6, #FB923C)';
    return 'linear-gradient(135deg, #F97316, #FBBF24, #EF4444)';
}

function filterByCategory(cat) {
    $('#category-filter').val(cat);
    fetchBlogs();
}

function fetchBlogs() {
    $('#loading').removeClass('hidden');
    $('#blog-grid').addClass('opacity-40 pointer-events-none');

    $.ajax({
        url: '/blogs/filter',
        method: 'GET',
        data: {
            category: $('#category-filter').val(),
            date: $('#date-filter').val(),
            search: $('#search-filter').val()
        },
        success: function(blogs) {
            $('#loading').addClass('hidden');
            $('#blog-grid').removeClass('opacity-40 pointer-events-none');

            if (blogs.length === 0) {
                $('#blog-grid').html(`
                    <div class="col-span-3 text-center py-20">
                        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-7 h-7 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        </div>
                        <p class="text-gray-500 font-medium">No blogs found.</p>
                        <p class="text-gray-400 text-sm mt-1">Try adjusting your filters.</p>
                    </div>`);
                return;
            }

            let html = '';
            blogs.forEach(function(blog) {
                const catClass = getCategoryClass(blog.category);
                const grad = getGradient(blog.category);
                const words = blog.title.split(' ').slice(0, 4).join(' ');
                const thumb = blog.image
                    ? `<img src="/storage/${blog.image}" alt="${blog.title}" class="w-full h-48 object-cover">`
                    : `<div class="w-full h-48 flex items-center justify-center p-6" style="background:${grad}">
                           <p class="text-white font-bold text-xl text-center leading-tight">${words}</p>
                       </div>`;
                const desc = blog.short_description ? blog.short_description.substring(0, 110) : '';
                const author = blog.user ? blog.user.name : 'BlogYaari';
                const date = blog.published_date ? new Date(blog.published_date).toLocaleDateString('en-US', {month:'short', day:'numeric', year:'numeric'}) : '';

                html += `
                <article class="card-hover bg-white rounded-2xl overflow-hidden border border-gray-100 flex flex-col">
                    <a href="/blogs/${blog.id}" class="block">${thumb}</a>
                    <div class="p-5 flex flex-col flex-1">
                        <div class="flex items-center gap-2 mb-3">
                            <span class="category-pill ${catClass}">${blog.category}</span>
                            <span class="text-gray-300 text-xs">——</span>
                            <span class="text-gray-400 text-xs">${date}</span>
                        </div>
                        <a href="/blogs/${blog.id}" class="block flex-1">
                            <h3 class="font-display font-bold text-gray-900 text-lg leading-snug hover:text-violet-700 transition-colors mb-2">${blog.title}</h3>
                            <p class="text-gray-500 text-sm leading-relaxed">${desc}...</p>
                        </a>
                        <div class="flex items-center justify-between mt-4 pt-4 border-t border-gray-100">
                            <span class="text-xs text-gray-400">By ${author}</span>
                            <a href="/blogs/${blog.id}" class="text-xs font-semibold text-violet-600 hover:text-violet-800 transition-colors">Read more →</a>
                        </div>
                    </div>
                </article>`;
            });
            $('#blog-grid').html(html);
        },
        error: function() {
            $('#loading').addClass('hidden');
            $('#blog-grid').removeClass('opacity-40 pointer-events-none');
        }
    });
}

$('#category-filter, #date-filter').on('change', fetchBlogs);

let searchTimer;
$('#search-filter').on('keyup', function() {
    clearTimeout(searchTimer);
    searchTimer = setTimeout(fetchBlogs, 500);
});

$('#clear-filter').on('click', function() {
    $('#category-filter').val('all');
    $('#date-filter').val('');
    $('#search-filter').val('');
    fetchBlogs();
});
</script>
@endsection