/**
 * Admin Loading Animation Script
 * Provides consistent loading animations across all admin dashboard pages
 * Matches the implementation from navbar control panel
 */

document.addEventListener('DOMContentLoaded', function() {
    
    /**
     * Initialize loading animation for all forms in admin dashboard
     */
    function initializeAdminLoading() {
        // Find all forms in the admin dashboard
        const forms = document.querySelectorAll('form');
        
        forms.forEach(form => {
            // Skip forms that already have loading handlers
            if (form.hasAttribute('data-loading-initialized')) {
                return;
            }
            
            // Mark form as initialized
            form.setAttribute('data-loading-initialized', 'true');
            
            form.addEventListener('submit', function(e) {
                const submitBtn = this.querySelector('button[type="submit"]');
                
                if (submitBtn) {
                    // Determine loading text based on button content or form action
                    let loadingText = 'Menyimpan...'; // Default text like navbar control
                    
                    const btnText = submitBtn.textContent || submitBtn.innerText || '';
                    const formAction = this.action || '';
                    
                    // Specific loading text for different operations
                    if (btnText.includes('Hapus') || btnText.includes('Delete') || formAction.includes('destroy')) {
                        loadingText = 'Menghapus...';
                    } else if (btnText.includes('Upload') || formAction.includes('upload')) {
                        loadingText = 'Mengupload...';
                    } else if (btnText.includes('Tambah') || btnText.includes('Create') || formAction.includes('store')) {
                        loadingText = 'Menyimpan...';
                    } else if (btnText.includes('Update') || btnText.includes('Edit') || formAction.includes('update')) {
                        loadingText = 'Menyimpan...';
                    } else if (btnText.includes('Perbarui')) {
                        loadingText = 'Menyimpan...';
                    } else if (btnText.includes('Ubah')) {
                        loadingText = 'Menyimpan...';
                    }
                    
                    // Apply loading state exactly like navbar control
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>' + loadingText;
                    submitBtn.disabled = true;
                    
                    // Optional: Add loading class for additional styling
                    submitBtn.classList.add('loading');
                }
            });
        });
    }
    
    /**
     * Initialize loading for dynamically added forms
     */
    function initializeDynamicForms() {
        // Use MutationObserver to watch for new forms being added
        const observer = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                mutation.addedNodes.forEach(function(node) {
                    if (node.nodeType === 1) { // Element node
                        // Check if the added node is a form or contains forms
                        if (node.tagName === 'FORM') {
                            initializeFormLoading(node);
                        } else if (node.querySelectorAll) {
                            const forms = node.querySelectorAll('form');
                            forms.forEach(initializeFormLoading);
                        }
                    }
                });
            });
        });
        
        observer.observe(document.body, {
            childList: true,
            subtree: true
        });
    }
    
    /**
     * Initialize loading for a specific form
     */
    function initializeFormLoading(form) {
        if (form.hasAttribute('data-loading-initialized')) {
            return;
        }
        
        form.setAttribute('data-loading-initialized', 'true');
        
        form.addEventListener('submit', function(e) {
            const submitBtn = this.querySelector('button[type="submit"]');
            
            if (submitBtn) {
                let loadingText = 'Menyimpan...';
                
                const btnText = submitBtn.textContent || submitBtn.innerText || '';
                const formAction = this.action || '';
                
                if (btnText.includes('Hapus') || btnText.includes('Delete') || formAction.includes('destroy')) {
                    loadingText = 'Menghapus...';
                } else if (btnText.includes('Upload') || formAction.includes('upload')) {
                    loadingText = 'Mengupload...';
                }
                
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>' + loadingText;
                submitBtn.disabled = true;
                submitBtn.classList.add('loading');
            }
        });
    }
    
    /**
     * Reset loading state (useful for AJAX forms)
     */
    window.resetAdminLoading = function(form) {
        const submitBtn = form.querySelector('button[type="submit"]');
        if (submitBtn && submitBtn.hasAttribute('data-original-html')) {
            submitBtn.innerHTML = submitBtn.getAttribute('data-original-html');
            submitBtn.disabled = false;
            submitBtn.classList.remove('loading');
        }
    };
    
    /**
     * Store original button HTML before applying loading
     */
    function storeOriginalButtonHTML() {
        const submitButtons = document.querySelectorAll('button[type="submit"]');
        submitButtons.forEach(btn => {
            if (!btn.hasAttribute('data-original-html')) {
                btn.setAttribute('data-original-html', btn.innerHTML);
            }
        });
    }
    
    // Initialize everything
    storeOriginalButtonHTML();
    initializeAdminLoading();
    initializeDynamicForms();
    
    // Console log for debugging
    console.log('Admin Loading Animation initialized - matching navbar control implementation');
});

/**
 * CSS for loading state (can be added to admin layout)
 */
const loadingCSS = `
<style>
.loading {
    pointer-events: none;
    opacity: 0.8;
}

.loading .fa-spinner {
    animation: fa-spin 1s infinite linear;
}

@keyframes fa-spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>
`;

// Inject CSS if not already present
if (!document.querySelector('#admin-loading-css')) {
    const style = document.createElement('style');
    style.id = 'admin-loading-css';
    style.innerHTML = `
        .loading {
            pointer-events: none;
            opacity: 0.8;
        }
        
        .loading .fa-spinner {
            animation: fa-spin 1s infinite linear;
        }
        
        @keyframes fa-spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    `;
    document.head.appendChild(style);
}