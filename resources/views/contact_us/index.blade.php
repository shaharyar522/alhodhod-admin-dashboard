@extends('layouts.app')

@section('Main-content')

@push('styles')
  <link rel="stylesheet" href="{{ asset('styling/contact-info.css') }}">
@endpush


<div class="contact-wrapper">
    <h2 class="contact-title">Contact Information</h2>

    <form action="{{ route('contacts.store') }}" method="POST">
        @csrf
        <div class="table-responsive">
            <table class="contact-table">
                <thead>
                    <tr>
                        <th>EN Title</th>
                        <th>EN Value</th>
                        <th>FR Title</th>
                        <th>FR Value</th>
                        <th>AR Title</th>
                        <th>AR Value</th>
                        <th>Icon</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" name="contacts[0][en_title]" placeholder="EN Title" class="input-field"></td>
                        <td><input type="text" name="contacts[0][en_value]" placeholder="EN Value" class="input-field"></td>
                        <td><input type="text" name="contacts[0][fr_title]" placeholder="FR Title" class="input-field"></td>
                        <td><input type="text" name="contacts[0][fr_value]" placeholder="FR Value" class="input-field"></td>
                        <td><input type="text" name="contacts[0][ar_title]" placeholder="AR Title" class="input-field" dir="rtl"></td>
                        <td><input type="text" name="contacts[0][ar_value]" placeholder="AR Value" class="input-field" dir="rtl"></td>
                        <td class="icon-select-wrapper">
                            <i class="fas fa-envelope icon-preview" id="icon-preview-0"></i>
                            <select name="contacts[0][icon]" class="icon-select" data-index="0">
                                <option value="fa-envelope" selected>Envelope</option>
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
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="form-footer">
            <button type="submit" class="submit-button">
                <i class="fas fa-save"></i> Save Changes
            </button>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('.icon-select').forEach(select => {
            select.addEventListener('change', function () {
                const iconClass = this.value;
                const index = this.dataset.index;
                const iconElem = document.getElementById('icon-preview-' + index);
                iconElem.className = 'fas ' + iconClass + ' icon-preview';
            });
        });
    });
</script>
@endsection
