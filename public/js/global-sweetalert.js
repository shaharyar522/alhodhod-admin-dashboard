// Global SweetAlert Configuration for entire project
const GlobalSweetAlert = {
    // Success message
    success: function(message, title = 'Success!') {
        Swal.fire({
            title: title,
            text: message,
            icon: 'success',
            confirmButtonText: 'Great!',
            confirmButtonColor: '#10b981',
            background: '#ffffff',
            backdrop: `
                rgba(0,0,123,0.4)
                url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%2310b981' fill-opacity='0.1'%3E%3Ccircle cx='30' cy='30' r='2'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E")
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

    // Error message
    error: function(message, title = 'Error!') {
        Swal.fire({
            title: title,
            text: message,
            icon: 'error',
            confirmButtonText: 'OK',
            confirmButtonColor: '#ef4444',
            background: '#ffffff'
        });
    },

    // Warning message
    warning: function(message, title = 'Warning!') {
        Swal.fire({
            title: title,
            text: message,
            icon: 'warning',
            confirmButtonText: 'OK',
            confirmButtonColor: '#f59e0b',
            background: '#ffffff'
        });
    },

    // Info message
    info: function(message, title = 'Information') {
        Swal.fire({
            title: title,
            text: message,
            icon: 'info',
            confirmButtonText: 'OK',
            confirmButtonColor: '#3b82f6',
            background: '#ffffff'
        });
    },

    // Loading message
    loading: function(message = 'Please wait...', title = 'Processing...') {
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

    // Generic confirmation dialog
    confirm: function(message, title = 'Are you sure?', confirmText = 'Yes', cancelText = 'Cancel') {
        return Swal.fire({
            title: title,
            text: message,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3b82f6',
            cancelButtonColor: '#6b7280',
            confirmButtonText: confirmText,
            cancelButtonText: cancelText,
            background: '#ffffff'
        });
    },

    // Delete confirmation - Generic
    deleteConfirm: function(itemName, itemType = 'item') {
        return Swal.fire({
            title: `Delete ${itemType.charAt(0).toUpperCase() + itemType.slice(1)}`,
            text: `Are you sure you want to delete this ${itemType} "${itemName}"? This action cannot be undone.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#6b7280',
            confirmButtonText: `Delete ${itemType.charAt(0).toUpperCase() + itemType.slice(1)}`,
            cancelButtonText: 'Cancel',
            background: '#ffffff',
            customClass: {
                popup: `${itemType}-delete-popup`,
                confirmButton: `${itemType}-delete-btn`
            }
        });
    },

    // Edit confirmation
    editConfirm: function(itemName, itemType = 'item') {
        return Swal.fire({
            title: `Edit ${itemType.charAt(0).toUpperCase() + itemType.slice(1)}`,
            text: `Are you sure you want to save changes to "${itemName}"?`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3b82f6',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Save Changes',
            cancelButtonText: 'Cancel',
            background: '#ffffff'
        });
    },

    // Create confirmation
    createConfirm: function(itemType = 'item') {
        return Swal.fire({
            title: `Create ${itemType.charAt(0).toUpperCase() + itemType.slice(1)}`,
            text: `Are you sure you want to create this ${itemType}?`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#10b981',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Create',
            cancelButtonText: 'Cancel',
            background: '#ffffff'
        });
    },

    // Update confirmation
    updateConfirm: function(itemName, itemType = 'item') {
        return Swal.fire({
            title: `Update ${itemType.charAt(0).toUpperCase() + itemType.slice(1)}`,
            text: `Are you sure you want to update "${itemName}"?`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#f59e0b',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Update',
            cancelButtonText: 'Cancel',
            background: '#ffffff'
        });
    }
};

// Global delete function - can be used for any item type
function deleteItemWithConfirm(itemId, itemName, itemType, deleteUrl) {
    GlobalSweetAlert.deleteConfirm(itemName, itemType).then((result) => {
        if (result.isConfirmed) {
            // Show loading message
            GlobalSweetAlert.loading(`Deleting ${itemType}...`, 'Please wait');
            
            // Create and submit form
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = deleteUrl;
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

// Global edit confirmation function
function editItemWithConfirm(itemId, itemName, itemType, editUrl) {
    GlobalSweetAlert.editConfirm(itemName, itemType).then((result) => {
        if (result.isConfirmed) {
            // Show loading message
            GlobalSweetAlert.loading(`Updating ${itemType}...`, 'Please wait');
            
            // Redirect to edit page
            window.location.href = editUrl;
        }
    });
}

// Global create confirmation function
function createItemWithConfirm(itemType, createUrl) {
    GlobalSweetAlert.createConfirm(itemType).then((result) => {
        if (result.isConfirmed) {
            // Show loading message
            GlobalSweetAlert.loading(`Creating ${itemType}...`, 'Please wait');
            
            // Redirect to create page
            window.location.href = createUrl;
        }
    });
}

// Auto-show session messages when page loads
document.addEventListener('DOMContentLoaded', function() {
    // Check for session messages (these will be set by Laravel)
    if (typeof sessionSuccess !== 'undefined' && sessionSuccess) {
        GlobalSweetAlert.success(sessionSuccess);
    }
    
    if (typeof sessionError !== 'undefined' && sessionError) {
        GlobalSweetAlert.error(sessionError);
    }
    
    if (typeof sessionWarning !== 'undefined' && sessionWarning) {
        GlobalSweetAlert.warning(sessionWarning);
    }
    
    if (typeof sessionInfo !== 'undefined' && sessionInfo) {
        GlobalSweetAlert.info(sessionInfo);
    }
});

// Export for use in other files
if (typeof module !== 'undefined' && module.exports) {
    module.exports = GlobalSweetAlert;
} 