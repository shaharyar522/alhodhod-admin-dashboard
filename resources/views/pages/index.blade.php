@extends('layouts.app')

@section('Main-content')
    <!-- Add CSS Link -->
    <link rel="stylesheet" href="{{ asset('styling/pages.css') }}">

    <div class="pages-container">
        <!-- Header Section -->
        <div class="pages-header">
            <h1 class="pages-title">Pages</h1>
            <a href="{{ route('pages.create') }}" class="add-page-btn">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                <span>Add New Page</span>
            </a>
        </div>

        <!-- Table Section -->
        <div class="pages-table-container">
            <table class="pages-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Page Name</th>
                        <th>Page Link</th>
                        <th>English</th>
                        <th>French</th>
                        <th>Arabic</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($Pages as $page)
                    <tr>
                        <td>{{$page->id}}</td>
                        <td>{{$page->page_name}}</td>
                        <td>{{$page->page_link}}</td>
                        <td>{{$page->page_en}}</td>
                        <td>{{$page->page_fr}}</td>
                        <td>{{$page->page_ar}}</td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{route('pages.edit',$page->id )}}" class="edit-btn">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                    </svg>
                                    <span>Edit</span>
                                </a>
                                <button type="button" class="delete-btn" onclick="deletePageWithConfirm({{ $page->id }}, '{{ $page->page_name }}')">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                    <span>Delete</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Global SweetAlert Script -->
    <script src="{{ asset('js/global-sweetalert.js') }}"></script>

    <script>
    // Delete page with confirmation and redirect
    function deletePageWithConfirm(pageId, pageName) {
        GlobalSweetAlert.deleteConfirm(pageName, 'page').then((result) => {
            if (result.isConfirmed) {
                // Show loading message
                GlobalSweetAlert.loading('Deleting page...', 'Please wait');
                
                // Create and submit form
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = "{{ route('pages.destroy', ':id') }}".replace(':id', pageId);
                form.style.display = 'none';
                
                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                
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
    /* Custom styling for pages delete button */
    .delete-btn {
        color: #ef4444;
        background: rgba(239, 68, 68, 0.1);
        border: 1px solid rgba(239, 68, 68, 0.2);
        padding: 0.4rem;
        border-radius: 6px;
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        gap: 0.15rem;
        position: relative;
        overflow: hidden;
        font-size: 0.65rem;
        font-weight: 500;
        width: 42px;
        height: 42px;
    }

    .delete-btn:hover {
        background: rgba(239, 68, 68, 0.15);
        transform: translateY(-1px);
        box-shadow: 0 2px 4px rgba(239, 68, 68, 0.2);
    }

    .delete-btn:active {
        transform: translateY(1px);
        box-shadow: none;
    }

    .delete-btn svg {
        width: 14px;
        height: 14px;
        transition: transform 0.2s ease;
    }

    .delete-btn:hover svg {
        transform: scale(1.1);
    }

    .delete-btn span {
        display: block;
        font-size: 0.6rem;
        line-height: 1;
    }
    </style>
@endsection