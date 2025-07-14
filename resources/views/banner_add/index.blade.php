@extends('layouts.app')

@section('Main-content')
<!-- Add CSS Link -->

@push('styles')
<link rel="stylesheet" href="{{ asset('styling/banneradd.css') }}">

@endpush

<div class="pages-container">

    <!-- ✅ TOP SECTION: Heading + Styled Buttons -->
    <div class="pages-header d-flex justify-content-between align-items-center">
        <!-- Left Side: Heading -->
        <h1 class="pages-title">Banner </h1>

        <!-- Right Side: Styled Buttons (movement style) -->
        <div class="d-inline-flex gap-2">
            <a href="#" class="add-page-btn">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                <span>Banner Add</span>
            </a>
            <a href="#" class="add-page-btn">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                <span>Subject Add</span>
            </a>
            <a href="#" class="add-page-btn">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                <span>Description Add</span>
            </a>
            <a href="#" class="add-page-btn">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                <span>Add New Advertisement</span>
            </a>
        </div>
    </div>

    <!-- ✅ TABLE SECTION -->
    <div id="banner-ads-table-wrapper">
        <table class="pages-table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Text</th>
                    <th>Link</th>
                    <th>Clicks</th>
                    <th>En</th>
                    <th>Fr</th>
                    <th>Ar</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <a href="{{ asset('uploads/sample.jpg') }}" target="_blank"
                            class="btn btn-sm btn-outline-primary">
                            View
                        </a>
                    </td>

                    <td>Sample Text</td>
                    <td><a href="https://example.com">example.com</a></td>
                    <td>42</td>
                    <td>Title EN</td>
                    <td>Title FR</td>
                    <td>Title AR</td>
                    <td><span class="badge bg-success">Active</span></td>
                    <td>
                        <div class="action-buttons">
                            <form action="" method="POST" class="delete-form"
                                style="display: inline-block; width: 100%; text-align: center;  padding-left: 55px;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="delete-btn" onclick="confirmDelete(this)">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                        </path>
                                    </svg>
                                    <span>Delete</span>
                                </button>
                            </form>

                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- ✅ Delete Confirmation Script -->
<script>
    function confirmDelete(button) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'Are you sure you want to delete this?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Delete',
            cancelButtonText: 'Cancel',
            background: '#ffffff'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Deleting...',
                    text: 'Deleting...',
                    icon: 'info',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                button.closest('form').submit();
            }
        });
    }
</script>
@endsection