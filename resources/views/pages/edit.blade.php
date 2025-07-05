@extends('layouts.app')

@section('Main-content')
    <!-- Add CSS Link -->
    <link rel="stylesheet" href="{{ asset('styling/page-form.css') }}">

    <div class="page-wrapper">
        <div class="form-container">
            <div class="form-header">
                <h2>Edit Page</h2>
                <p>Update your existing page</p>
            </div>

            <form action="{{route('pages.update',$pages->id)}}" method="POST" class="page-form" onsubmit="return confirmUpdate()">
                @csrf
                @method('PUT')
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="page_name">Page Name</label>
                        <input type="text" id="page_name" name="page_name" value="{{ $pages->page_name }}" class="form-input" placeholder="Enter page name" required>
                    </div>

                    <div class="form-group">
                        <label for="page_link">Page Link</label>
                        <input type="text" id="page_link" name="page_link" value="{{ $pages->page_link }}" class="form-input" placeholder="Enter page link" required>
                    </div>
                </div>

                <div class="form-row languages">
                    <div class="form-group">
                        <label for="page_en">
                            <span>English </span>
                            <span class="lang-badge">EN</span>
                        </label>
                        <input type="text" id="page_en" name="page_english" value="{{ $pages->page_en }}" class="form-input" placeholder="Enter English content" required>
                    </div>

                    <div class="form-group">
                        <label for="page_fr">
                            <span>French </span>
                            <span class="lang-badge">FR</span>
                        </label>
                        <input type="text" id="page_fr" name="page_french" value="{{ $pages->page_fr }}" class="form-input" placeholder="Entrez le contenu en français" required>
                    </div>

                    <div class="form-group">
                        <label for="page_ar">
                            <span>Arabic </span>
                            <span class="lang-badge">AR</span>
                        </label>
                        <input type="text" id="page_ar" name="page_arabic" value="{{ $pages->page_ar }}" class="form-input" placeholder="أدخل المحتوى بالعربية" required>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="submit-btn">
                        <svg class="btn-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span>Update Page</span>
                    </button>
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
                text: 'Please wait while we update the page...',
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
