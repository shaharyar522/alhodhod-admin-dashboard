@extends('layouts.app')

@section('Main-content')
    <!-- Add CSS Link -->
    <link rel="stylesheet" href="{{ asset('styling/page-form.css') }}">

    <div class="page-wrapper">
        <div class="form-container">
            <div class="form-header">
                <h2>Create New Menu</h2>
                <p>Add a new menu to your website</p>
            </div>

            <form action="{{route('menus.store')}}" method="POST" class="page-form" autocomplete="off">
                @csrf

                <div class="form-row">
                    <div class="form-group">
                        <label for="page_id">Select Page</label>
                        <select name="page_id" id="page_id" class="form-input">
                            <option value="">-- Choose Page --</option>
                            @foreach ($pages as $page)
                            <option value="{{ $page->id }}">{{ $page->page_name }}</option>
                            @endforeach
                        </select>
                        @error('page_id')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="menu_title">Menu Title</label>
                        <input type="text" id="menu_title" name="menu_title" class="form-input" placeholder="Enter menu title">
                        @error('menu_title')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="form-row languages">
                    <div class="form-group">
                        <label for="menu_en">
                            <span> English Menu </span>
                            <span class="lang-badge">EN</span>
                        </label>
                        <input type="text" id="menu_en" name="menu_english" class="form-input" placeholder="Menu in English">
                        @error('menu_english')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="menu_fr">
                            <span> French Menu </span>
                            <span class="lang-badge">FR</span>
                        </label>
                        <input type="text" id="menu_fr" name="menu_french" class="form-input" placeholder="Menu en Français">
                        @error('menu_french')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="menu_ar">
                            <span> Arabic Menu </span>
                            <span class="lang-badge">AR</span>
                        </label>
                        <input type="text" id="menu_ar" name="menu_arabic" class="form-input" dir="rtl" placeholder="القائمة بالعربية">
                        @error('menu_arabic')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="submit-btn" onclick="return confirmCreate('menu')">
                        <svg class="btn-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span>Create Menu</span>
                    </button>
                    
                    <button type="reset" class="reset-btn">
                        <svg class="btn-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                        </svg>
                        <span>Reset Form</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

   <!-- Create Confirmation Script -->
<script>
    function confirmCreate() {
            // Show confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: 'Are you sure you want to create this Menu?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#10b981',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Create',
                cancelButtonText: 'Cancel',
                background: '#f0f8ff'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Show processing message
                    Swal.fire({
                        title: 'Creating...',
                        text: 'Please wait while we create the page...',
                        icon: 'info',
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        showConfirmButton: false,
                        background: '#f0f8ff',
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });
                    
                    // Submit the form
                    document.querySelector('.page-form').submit();
                }
            });
            
            // Prevent form submission until confirmed
            return false;
        }

</script>
@endsection
