@extends('layouts.app')

@section('Main-content')
<!-- Add CSS Link -->
<link rel="stylesheet" href="{{ asset('styling/pages.css') }}">

<div class="pages-container">
    <!-- Header Section -->
    <div class="pages-header">
        <h1 class="pages-title">Menus</h1>
        <a href="{{ route('menus.create') }}" class="add-page-btn">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            <span>Add New Menu</span>
        </a>
    </div>

    <!-- Table Section -->
    <div class="pages-table-container">
        <table class="pages-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Page ID</th>
                    <th>Menu Title</th>
                    <th>Menus English</th>
                    <th>Menus French</th>
                    <th>Menus Arabic</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>


                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <div class="action-buttons">
                            {{-- edit butun main hum id ko pass karenge takay us page ko edit kar sakay jis page par
                            clikc kya hian edit k buttun--}}
                            <a href="" class="edit-btn">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                    </path>
                                </svg>
                                <span>Edit</span>
                            </a>
                            <button type="button" class="delete-btn" onclick="">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                    </path>
                                </svg>
                                <span>Delete</span>
                            </button>
                        </div>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</div>



<script>
    // Delete page with confirmation
    function deletePageWithConfirm(pageId, pageName) {
        SweetAlert.deleteConfirm(pageName).then((result) => {
            if (result.isConfirmed) {
                // Show loading message
                SweetAlert.loading('Deleting page...', 'Please wait');
                
                // Create and submit form
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `{{ url('menus') }}/${pageId}/delete`;
                form.style.display = 'none';
                
                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = '{{ csrf_token() }}';
                
                const methodField = document.createElement('input');
                methodField.type = 'hidden';
                methodField.name = '_method';
                methodField.value = 'DELETE';
                
                form.appendChild(csrfToken);
                form.appendChild(methodField);
                document.body.appendChild(form);
                
                // Submit the form
                form.submit();
            }
        });
    }
</script>

<style>

</style>
@endsection