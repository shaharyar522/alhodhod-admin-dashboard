@extends('layouts.app')

@section('Main-content')
    <!-- Add CSS Link -->
    <link rel="stylesheet" href="{{ asset('styling/page-form.css') }}">

    <div class="page-wrapper">
        <div class="form-container">
            <div class="form-header">
                <h2>Edit Article</h2>
                <p>Update your existing article</p>
            </div>

            <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Language --}}
                <div class="row mb-4">
                    <label class="col-lg-3 col-form-label">Language</label>
                    <div class="col-lg-9">
                        <select name="language" id="language_select" class="form-control">
                            <option value="">-- Select Language --</option>
                            <option value="en" {{ $article->language == 'en' ? 'selected' : '' }}>English</option>
                            <option value="fr" {{ $article->language == 'fr' ? 'selected' : '' }}>French</option>
                            <option value="ar" {{ $article->language == 'ar' ? 'selected' : '' }}>Arabic</option>
                        </select>
                        @error('language') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>

                {{-- Title --}}
                <div class="row mb-4">
                    <label class="col-lg-3 col-form-label">Article Title</label>
                    <div class="col-lg-9">
                        <input type="text" name="article_title" value="{{ $article->article_title }}" class="form-control" placeholder="Article Title">
                        @error('article_title') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>

                {{-- Meta Tag --}}
                <div class="row mb-4">
                    <label class="col-lg-3 col-form-label">Meta Tag</label>
                    <div class="col-lg-9">
                        <input type="text" name="metatag" value="{{ $article->metatag }}" class="form-control" placeholder="Meta tag, SEO keywords">
                        @error('metatag') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>

                {{-- Upload Image --}}
                <div class="row mb-4">
                    <label class="col-lg-3 col-form-label">Upload Image</label>
                    <div class="col-lg-9">
                        <input type="file" name="article_image" class="form-control">
                        @error('article_image') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>

                {{-- CKEditor --}}
                <div class="row mb-4">
                    <label class="col-lg-3 col-form-label">Content</label>
                    <div class="col-lg-9">
                        <textarea name="content" id="editor_full" class="form-control" rows="10">{{ $article->content }}</textarea>
                        @error('content') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>

                {{-- Home Page --}}
                <div class="row mb-4">
                    <label class="col-lg-3 col-form-label">Show on Home Page</label>
                    <div class="col-lg-9">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="show_on_home_page" value="1" id="show_on_home" {{ $article->show_on_home_page ? 'checked' : '' }}>
                            <label class="form-check-label" for="show_on_home">Yes</label>
                        </div>
                    </div>
                </div>

                {{-- Menu --}}
                <div class="row mb-4">
                    <label class="col-lg-3 col-form-label">Menu</label>
                    <div class="col-lg-9">
                        <select name="menu_id" class="form-control">
                            <option value="">-- Choose Menu --</option>
                            @foreach ($menus as $menu)
                                <option value="{{ $menu->id }}" {{ $article->menu_id == $menu->id ? 'selected' : '' }}>{{ $menu->menu_title }}</option>
                            @endforeach
                        </select>
                        @error('menu_id') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>

                {{-- Submit --}}
                <div class="text-end mt-4">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="fas fa-paper-plane me-2"></i>Update Article
                    </button>
                    <a href="{{ route('articles.index') }}" class="btn btn-secondary px-4 ms-2">
                        <i class="fas fa-arrow-left me-2"></i>Back to Articles
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Update Processing Script -->
    <script>
        function confirmUpdate() {
            // Show processing message
            Swal.fire({
                title: 'Updating...',
                text: 'Please wait while we update the article...',
                icon: 'info',
                allowOutsideClick: false,
                allowEscapeKey: false,
                showConfirmButton: false,
                background: '#f0f8ff',
                didOpen: () => {
                    Swal.showLoading();
                }
            });
            
            // Allow form to submit
            return true;
        }
    </script>
@endsection
