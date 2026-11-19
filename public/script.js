document.addEventListener('DOMContentLoaded', () => {
    // Add Modal Elements
    const openModalBtn = document.getElementById('openModalBtn');
    const modal = document.getElementById('addPatientModal');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const cancelModalBtn = document.getElementById('cancelModalBtn');

    if (openModalBtn && modal) {
        openModalBtn.addEventListener('click', () => {
            modal.classList.add('active');
        });
    }

    if (closeModalBtn && modal) {
        closeModalBtn.addEventListener('click', () => {
            modal.classList.remove('active');
        });
    }

    if (cancelModalBtn && modal) {
        cancelModalBtn.addEventListener('click', () => {
            modal.classList.remove('active');
        });
    }

    // Edit Modal Elements
    const editModal = document.getElementById('editPatientModal');
    const closeEditModalBtn = document.getElementById('closeEditModalBtn');
    const cancelEditModalBtn = document.getElementById('cancelEditModalBtn');
    const editForm = document.getElementById('editForm');

    const editButtons = document.querySelectorAll('.openEditModal');
    editButtons.forEach(button => {
        button.addEventListener('click', () => {
            const id = button.getAttribute('data-id');
            document.getElementById('edit_db_id').value = button.getAttribute('data-id');
            document.getElementById('edit_full_name').value = button.getAttribute('data-name');
            document.getElementById('edit_age').value = button.getAttribute('data-age');
            document.getElementById('edit_gender').value = button.getAttribute('data-gender');
            document.getElementById('edit_phone').value = button.getAttribute('data-phone');
            document.getElementById('edit_medical_history').value = button.getAttribute('data-history');
            
            editForm.action = `/patients/${id}`;
            editModal.classList.add('active');
        });
    });

    if (closeEditModalBtn && editModal) {
        closeEditModalBtn.addEventListener('click', () => {
            editModal.classList.remove('active');
        });
    }

    if (cancelEditModalBtn && editModal) {
        cancelEditModalBtn.addEventListener('click', () => {
            editModal.classList.remove('active');
        });
    }

    // Confirm Alert for Delete
    const deleteButtons = document.querySelectorAll('.btn-action.delete');
    deleteButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            if (!confirm('Delete patient record?')) {
                e.preventDefault();
            }
        });
    });

    // Toast Notifications 
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('added') === '1') {
        showToast('Patient added successfully');
        window.history.replaceState({}, document.title, window.location.pathname);
    } else if (urlParams.get('updated') === '1') {
        showToast('Patient updated successfully');
        window.history.replaceState({}, document.title, window.location.pathname);
    } else if (urlParams.get('deleted') === '1') {
        showToast('Patient deleted successfully');
        window.history.replaceState({}, document.title, window.location.pathname);
    }

    // Close when clicking outside the card
    window.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.classList.remove('active');
        }
        if (e.target === editModal) {
            editModal.classList.remove('active');
        }
    });
});

// Display bottom-right Toast message
function showToast(message) {
    const toast = document.createElement('div');
    toast.className = 'toast-notification';
    toast.innerHTML = `<i class="fa-solid fa-circle-check"></i> <span>${message}</span>`;
    document.body.appendChild(toast);

    setTimeout(() => {
        toast.classList.add('show');
    }, 100);

    setTimeout(() => {
        toast.classList.remove('show');
        setTimeout(() => toast.remove(), 300);
    }, 3500);
}