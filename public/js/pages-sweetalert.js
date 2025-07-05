// Pages-specific SweetAlert configuration
const PagesSweetAlert = {
    // Success message for pages
    success: function(message, title = 'Page Success!') {
        Swal.fire({
            title: title,
            text: message,
            icon: 'success',
            confirmButtonText: 'Great!',
            confirmButtonColor: '#4f46e5',
            background: '#ffffff',
            backdrop: `
                rgba(0,0,123,0.4)
                url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%234f46e5' fill-opacity='0.1'%3E%3Ccircle cx='30' cy='30' r='2'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E")
                left top
                no-repeat
            `,
            customClass: {
                popup: 'animated fadeInDown'
            },
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        });
    },

    // Error message for pages
    error: function(message, title = 'Page Error!') {
        Swal.fire({
            title: title,
            text: message,
            icon: 'error',
            confirmButtonText: 'OK',
            confirmButtonColor: '#ef4444',
            background: '#ffffff'
        });
    },

    // Loading message for pages
    loading: function(message = 'Please wait...', title = 'Processing Page...') {
        Swal.fire({
            title: title,
            text: message,
            icon: 'info',
            allowOutsideClick: false,
            allowEscapeKey: false,
            showConfirmButton: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });
    },

    // Page-specific delete confirmation
    deletePageConfirm: function(pageName) {
        return Swal.fire({
            title: 'Delete Page',
            text: `Are you sure you want to delete the page "${pageName}"? This action cannot be undone and will remove all associated content.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc2626',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Delete Page',
            cancelButtonText: 'Cancel',
            background: '#ffffff',
            customClass: {
                popup: 'page-delete-popup',
                confirmButton: 'page-delete-btn'
            }
        });
    }
};

// Page delete confirmation function
function deletePageWithConfirm(pageId, pageName) {
    PagesSweetAlert.deletePageConfirm(pageName).then((result) => {
        if (result.isConfirmed) {
            // Show loading message
            PagesSweetAlert.loading('Deleting page...', 'Please wait');
            
            // Create and submit form
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = `/pages/${pageId}/delete`;
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