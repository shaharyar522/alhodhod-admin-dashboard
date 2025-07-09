@extends('layouts.app')

@section('Main-content')
<link rel="stylesheet" href="{{ asset('styling/contact-info.css') }}">

<div class="pages-container contact-info-container">
    <!-- Header -->
    <div class="pages-header">
        <h1 class="pages-title">Contact Information</h1>
    </div>

    <!-- Contact Info Table -->
    <form action="" method="POST">
        @csrf
        <div class="pages-table-container contact-info-table-container">
            <table class="pages-table contact-info-table">
                <thead>
                    <tr>
                        <th>English Title</th>
                        <th>English Value</th>
                        <th>French Title</th>
                        <th>French Value</th>
                        <th>Arabic Title</th>
                        <th>Arabic Value</th>
                        <th>Icon</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" name="contacts[][en_title]" value="" class="contact-input" placeholder="English Title"></td>
                        <td><input type="text" name="contacts[][en_value]" value="" class="contact-input" placeholder="English Value"></td>
                        <td><input type="text" name="contacts[][fr_title]" value="" class="contact-input" placeholder="French Title"></td>
                        <td><input type="text" name="contacts[][fr_value]" value="" class="contact-input" placeholder="French Value"></td>
                        <td><input type="text" name="contacts[][ar_title]" value="" class="contact-input" placeholder="Arabic Title" dir="rtl"></td>
                        <td><input type="text" name="contacts[][ar_value]" value="" class="contact-input" placeholder="Arabic Value" dir="rtl"></td>
                        <td class="icon-cell">
                            <i class="fas fa-envelope contact-icon"></i>
                            <select class="icon-select contact-input" style="width:auto;min-width:120px;margin-left:8px;">
                                <option value="fa-envelope">Envelope</option>
                                <option value="fa-map-marker">Map Marker</option>
                                <option value="fa-globe">Globe</option>
                                <option value="fa-fax">Fax</option>
                                <option value="fa-at">@ Symbol</option>
                                <option value="fa-inbox">Inbox</option>
                                <option value="fa-paper-plane">Paper Plane</option>
                                <option value="fa-mail-bulk">Bulk Mail</option>
                                <option value="fa-envelope-open">Envelope Open</option>
                                <option value="fa-address-card">Address Card</option>
                            </select>
                            <input type="hidden" name="contacts[][icon]" value="fa-envelope">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Save Button -->
        <div class="form-actions contact-form-actions">
            <button type="submit" class="submit-btn contact-submit-btn">
                <svg class="btn-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span>Save Changes</span>
            </button>
        </div>
    </form>
</div>
<script>
// Update icon when select changes
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.icon-select').forEach(function(select) {
            select.addEventListener('change', function() {
                var icon = this.value;
                var iconElem = this.parentElement.querySelector('i');
                var hiddenInput = this.parentElement.querySelector('input[type="hidden"]');
                iconElem.className = 'fas ' + icon + ' contact-icon';
                hiddenInput.value = icon;
            });
        });
    });
</script>
@endsection
