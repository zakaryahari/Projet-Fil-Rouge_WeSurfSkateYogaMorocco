// Rooms Admin Panel - Add/Edit/Delete Functionality with Image Preview

function previewImage(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview-image').src = e.target.result;
            document.getElementById('preview-image').classList.remove('hidden');
            document.getElementById('preview-content').classList.add('hidden');
        };
        reader.readAsDataURL(file);
    }
}

function clearImagePreview() {
    document.getElementById('room-image').value = '';
    document.getElementById('preview-image').src = '';
    document.getElementById('preview-image').classList.add('hidden');
    document.getElementById('preview-content').classList.remove('hidden');
}

function displayErrors(errors) {
    const errorContainer = document.getElementById('error-container');
    const errorList = document.getElementById('error-list');

    errorList.innerHTML = '';

    Object.keys(errors).forEach(field => {
        const errorMessages = errors[field];
        errorMessages.forEach(message => {
            const li = document.createElement('li');
            li.textContent = message;
            errorList.appendChild(li);

            const fieldElement = document.getElementById('room-' + field.replace('.', '-'));
            if (fieldElement) {
                fieldElement.classList.add('border', 'border-red-500', 'bg-red-50');
            }
        });
    });

    errorContainer.classList.remove('hidden');
}

function clearErrors() {
    const errorContainer = document.getElementById('error-container');
    const errorList = document.getElementById('error-list');

    if (errorContainer) {
        errorContainer.classList.add('hidden');
    }
    if (errorList) {
        errorList.innerHTML = '';
    }

    document.querySelectorAll('#room-form input, #room-form textarea').forEach(el => {
        el.classList.remove('border', 'border-red-500', 'bg-red-50');
    });
}

function openAddRoom() {
    document.getElementById('panel-title').textContent = 'Add Room';
    document.getElementById('room-form').reset();
    clearImagePreview();
    clearErrors();
    document.getElementById('form-method').value = 'POST';
    document.getElementById('room-form').action = document.getElementById('room-form').dataset.storeRoute || '';
    document.getElementById('room-active').checked = true;
    document.getElementById('room-panel').classList.remove('hidden');
}

function openEditRoom(roomData) {
    document.getElementById('panel-title').textContent = 'Edit Room';
    document.getElementById('room-type').value = roomData.type;
    document.getElementById('room-price').value = roomData.price_per_night;
    document.getElementById('room-stock').value = roomData.total_stock;
    document.getElementById('room-capacity').value = roomData.capacity || '';
    document.getElementById('room-active').checked = roomData.is_active === 1 || roomData.is_active === true;
    clearErrors();

    if (roomData.image_path) {
        document.getElementById('preview-image').src = document.getElementById('room-form').dataset.storageUrl + roomData.image_path;
        document.getElementById('preview-image').classList.remove('hidden');
        document.getElementById('preview-content').classList.add('hidden');
    } else {
        clearImagePreview();
    }

    document.getElementById('form-method').value = 'PUT';
    const updateRoute = document.getElementById('room-form').dataset.updateRoute || '';
    document.getElementById('room-form').action = updateRoute.replace(':id', roomData.id);
    document.getElementById('room-panel').classList.remove('hidden');
}

function closePanel() {
    document.getElementById('room-panel').classList.add('hidden');
}

document.addEventListener('DOMContentLoaded', function() {
    const roomForm = document.getElementById('room-form');
    if (roomForm) {
        roomForm.addEventListener('submit', function(e) {
            clearErrors();

            const roomType = document.getElementById('room-type').value.trim();
            const roomPrice = document.getElementById('room-price').value;
            const roomStock = document.getElementById('room-stock').value;

            const errors = {};

            if (!roomType) {
                errors['type'] = ['Room type is required'];
            }

            if (!roomPrice || parseFloat(roomPrice) < 0) {
                errors['price_per_night'] = ['Price must be a positive number'];
            }

            if (!roomStock || parseInt(roomStock) < 1) {
                errors['total_stock'] = ['Stock must be at least 1'];
            }

            if (Object.keys(errors).length > 0) {
                e.preventDefault();
                displayErrors(errors);
                return false;
            }
        });
    }

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !document.getElementById('room-panel').classList.contains('hidden')) {
            closePanel();
        }
    });
});
