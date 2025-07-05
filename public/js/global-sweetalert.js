// Global SweetAlert Configuration for entire project
const GlobalSweetAlert = {
    // Success message
    success: function(message, title = 'Success!') {
        Swal.fire({
            title: title,
            text: message,
            icon: 'success',
            confirmButtonText: 'OK',
            confirmButtonColor: '#10b981',
            background: '#f0f8ff'
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
            background: '#f0f8ff'
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
            background: '#f0f8ff'
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
            background: '#f0f8ff'
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
            background: '#f0f8ff',
            didOpen: () => {
                Swal.showLoading();
            }
        });
    }
};

// Auto-show session messages when page loads (for Laravel redirects)
document.addEventListener('DOMContentLoaded', function() {
    // Check for session messages from Laravel redirects
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