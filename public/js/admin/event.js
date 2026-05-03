// Events Admin Panel - Add/Edit/Delete Functionality

let currentEditEventId = null;

function openAddEvent() {
    document.getElementById('panel-title').textContent = 'Add Event';
    document.getElementById('event-form').reset();
    document.getElementById('event-form-method').value = 'POST';

    const storeRoute = document.getElementById('event-form').dataset.storeRoute;
    document.getElementById('event-form').action = storeRoute;

    document.getElementById('event-panel').classList.remove('hidden');
    document.getElementById('image-preview').innerHTML = '';
    document.getElementById('image-preview-container').classList.add('hidden');
    currentEditEventId = null;
}

function openEditEvent(eventData) {
    currentEditEventId = eventData.id;
    document.getElementById('panel-title').textContent = 'Edit Event';
    document.getElementById('event-title').value = eventData.title;
    document.getElementById('event-description').value = eventData.description;

    // Convert datetime string to datetime-local format
    const eventDateTime = new Date(eventData.event_date);
    const localDateTime = eventDateTime.toISOString().slice(0, 16);
    document.getElementById('event-date').value = localDateTime;

    document.getElementById('event-max-participants').value = eventData.max_participants;
    document.getElementById('event-price').value = eventData.price;

    // Show current image preview if exists
    if (eventData.image_path) {
        const imageUrl = '/storage/' + eventData.image_path;
        document.getElementById('image-preview').innerHTML = `
            <img src="${imageUrl}" alt="Event image" class="w-full h-32 object-cover rounded-lg">
        `;
        document.getElementById('image-preview-container').classList.remove('hidden');
    } else {
        document.getElementById('image-preview').innerHTML = '';
        document.getElementById('image-preview-container').classList.add('hidden');
    }

    // Set form to PUT method
    document.getElementById('event-form-method').value = 'PUT';

    // Build the update route dynamically
    const baseUpdateRoute = document.getElementById('event-form').dataset.updateRoute;
    const updateRoute = baseUpdateRoute.replace(':id', eventData.id);
    document.getElementById('event-form').action = updateRoute;

    document.getElementById('event-panel').classList.remove('hidden');
}

function closePanel() {
    document.getElementById('event-panel').classList.add('hidden');
}

// Image preview on selection
document.addEventListener('DOMContentLoaded', function() {
    const imageInput = document.getElementById('event-image');
    if (imageInput) {
        imageInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    document.getElementById('image-preview').innerHTML = `
                        <img src="${event.target.result}" alt="Preview" class="w-full h-32 object-cover rounded-lg">
                    `;
                    document.getElementById('image-preview-container').classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }
        });
    }
});

// Close panel with Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        const eventPanel = document.getElementById('event-panel');
        if (eventPanel && !eventPanel.classList.contains('hidden')) {
            closePanel();
        }
    }
});
