@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 py-10">

    <!-- Header -->
    <div class="mb-8">
        <a href="{{ route('home') }}" class="inline-flex items-center gap-1.5 text-sm text-gray-500 hover:text-violet-600 font-medium mb-4 transition-colors group">
            <svg class="w-4 h-4 transition-transform group-hover:-translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Back
        </a>
        <h1 class="font-display font-bold text-3xl text-gray-900">Create New Post</h1>
        <p class="text-gray-500 mt-1 text-sm">Share your knowledge with the BlogYaari community.</p>
    </div>

    @if($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-700 px-5 py-4 rounded-xl mb-6 flex gap-3">
            <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/></svg>
            <p class="text-sm font-medium">{{ $errors->first() }}</p>
        </div>
    @endif

    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- Title -->
        <div class="bg-white rounded-2xl border border-gray-100 p-6">
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Post Title <span class="text-red-400">*</span>
            </label>
            <input type="text" name="title" required
                class="w-full border border-gray-200 rounded-xl px-4 py-3 text-gray-900 text-base focus:outline-none focus:ring-2 focus:ring-violet-300 focus:border-transparent transition-all placeholder-gray-400 font-display font-medium"
                placeholder="Write a compelling title..."
                value="{{ old('title') }}">
        </div>

        <!-- Short Description -->
        <div class="bg-white rounded-2xl border border-gray-100 p-6">
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Short Description <span class="text-red-400">*</span>
            </label>
            <textarea name="short_description" rows="2" required
                class="w-full border border-gray-200 rounded-xl px-4 py-3 text-gray-700 text-sm focus:outline-none focus:ring-2 focus:ring-violet-300 focus:border-transparent transition-all placeholder-gray-400 resize-none"
                placeholder="A brief summary readers will see in the card view...">{{ old('short_description') }}</textarea>
        </div>

        <!-- Category + Date row -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div class="bg-white rounded-2xl border border-gray-100 p-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Category <span class="text-red-400">*</span>
                </label>
                <select name="category" id="category"
                    class="w-full border border-gray-200 rounded-xl px-4 py-3 text-gray-700 text-sm focus:outline-none focus:ring-2 focus:ring-violet-300 focus:border-transparent transition-all bg-white">
                    <option value="Admit Card">Admit Card</option>
                    <option value="Result">Result</option>
                    <option value="Other">Other</option>
                </select>

                <!-- Other category field -->
                <div class="hidden mt-3" id="other-category-field">
                    <input type="text" name="other_category"
                        class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-gray-700 text-sm focus:outline-none focus:ring-2 focus:ring-violet-300 focus:border-transparent transition-all placeholder-gray-400"
                        placeholder="Specify category..."
                        value="{{ old('other_category') }}">
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-gray-100 p-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Published Date <span class="text-red-400">*</span>
                </label>
                <input type="date" name="published_date" required
                    class="w-full border border-gray-200 rounded-xl px-4 py-3 text-gray-700 text-sm focus:outline-none focus:ring-2 focus:ring-violet-300 focus:border-transparent transition-all"
                    value="{{ old('published_date', date('Y-m-d')) }}">
            </div>
        </div>

        <!-- Featured Image -->
        <div class="bg-white rounded-2xl border border-gray-100 p-6">
            <label class="block text-sm font-semibold text-gray-700 mb-2">Featured Image</label>
            <div class="border-2 border-dashed border-gray-200 rounded-xl p-6 text-center hover:border-violet-300 transition-colors">
                <svg class="w-8 h-8 text-gray-300 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                <input type="file" name="image" id="image-upload" accept="image/*"
                    class="hidden" onchange="previewImage(this)">
                <label for="image-upload" class="cursor-pointer">
                    <span class="text-sm text-violet-600 font-semibold hover:text-violet-700">Click to upload</span>
                    <span class="text-sm text-gray-400"> or drag and drop</span>
                </label>
                <p class="text-xs text-gray-400 mt-1">PNG, JPG, GIF up to 2MB. Leave blank for auto-generated gradient.</p>
                <img id="image-preview" class="hidden mt-4 mx-auto max-h-40 rounded-lg object-cover" src="" alt="Preview">
            </div>
        </div>

        <!-- Content / Quill Editor -->
        <div class="bg-white rounded-2xl border border-gray-100 p-6">
            <label class="block text-sm font-semibold text-gray-700 mb-3">
                Full Content <span class="text-red-400">*</span>
            </label>
            <div id="editor" style="min-height: 400px; max-height: 600px; overflow-y: auto;"></div>
            <textarea name="content" id="content" class="hidden">{{ old('content') }}</textarea>
        </div>

        <!-- Submit -->
        <div class="flex gap-3">
            <button type="submit"
                class="flex-1 bg-violet-600 hover:bg-violet-700 text-white font-semibold py-3.5 rounded-xl transition-colors text-base flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                Publish Post
            </button>
            <a href="{{ route('home') }}"
                class="px-6 py-3.5 border border-gray-200 text-gray-600 hover:bg-gray-50 font-medium rounded-xl transition-colors text-sm">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
<script>
var quill = new Quill('#editor', {
    theme: 'snow',
    modules: {
        toolbar: [
            [{ 'header': [1, 2, 3, false] }],
            ['bold', 'italic', 'underline'],
            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
            ['link', 'image'],
            ['blockquote'],
            ['clean']
        ]
    },
    placeholder: 'Write your blog content here...',
});

// Pre-fill if editing
@if(old('content'))
quill.root.innerHTML = {!! json_encode(old('content')) !!};
@endif

$('form').on('submit', function() {
    $('#content').val(quill.root.innerHTML);
});

$('#category').on('change', function() {
    if ($(this).val() === 'Other') {
        $('#other-category-field').removeClass('hidden');
    } else {
        $('#other-category-field').addClass('hidden');
    }
});

function previewImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#image-preview').attr('src', e.target.result).removeClass('hidden');
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection