// Dashboard - Customer Search & Profile Navigation

document.addEventListener('DOMContentLoaded', function() {
    // Customer search functionality
    const searchInput = document.getElementById('searchInput');
    if (searchInput) {
        searchInput.addEventListener('keyup', function() {
            const searchTerm = this.value.toLowerCase();
            const rows = document.querySelectorAll('.customer-row');

            rows.forEach(row => {
                const name = row.getAttribute('data-customer-name');
                const email = row.getAttribute('data-customer-email');

                if (name.includes(searchTerm) || email.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    }

    // Profile menu redirect based on role
    const profileLink = document.querySelector('a[href*="profile.edit"]');
    if (profileLink) {
        profileLink.addEventListener('click', function(e) {
            e.preventDefault();
            const role = document.body.dataset.userRole || 'customer';
            if (role === 'customer') {
                window.location.href = '/';
            } else if (role === 'admin') {
                window.location.href = '/admin';
            }
        });
    }
});
