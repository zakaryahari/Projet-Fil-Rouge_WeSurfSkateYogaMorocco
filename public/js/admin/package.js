// Packages Admin Panel - Add/Edit/Delete Functionality with Activities

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
    document.getElementById('package-image').value = '';
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

            const fieldElement = document.getElementById('package-' + field.replace('.', '-'));
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

    document.querySelectorAll('#package-form input, #package-form textarea').forEach(el => {
        el.classList.remove('border', 'border-red-500', 'bg-red-50');
    });
}

function openAddPackage() {
    document.getElementById('panel-title').textContent = 'Add Package';
    document.getElementById('package-form').reset();
    clearImagePreview();
    clearErrors();
    document.getElementById('form-method').value = 'POST';
    document.getElementById('package-form').action = document.getElementById('package-form').dataset.storeRoute || '';

    document.querySelectorAll('.activity-checkbox').forEach(checkbox => {
        checkbox.checked = false;
    });
    document.querySelectorAll('.session-input').forEach(input => {
        input.classList.add('hidden');
        input.value = '';
    });

    document.getElementById('package-panel').classList.remove('hidden');
}

function openEditPackage(packageData) {
    document.getElementById('panel-title').textContent = 'Edit Package';
    document.getElementById('package-name').value = packageData.name;
    document.getElementById('package-description').value = packageData.description;
    document.getElementById('package-duration').value = packageData.duration_days;
    document.getElementById('package-price').value = packageData.base_price;
    clearErrors();

    if (packageData.image_path) {
        document.getElementById('preview-image').src = document.getElementById('package-form').dataset.storageUrl + packageData.image_path;
        document.getElementById('preview-image').classList.remove('hidden');
        document.getElementById('preview-content').classList.add('hidden');
    } else {
        clearImagePreview();
    }

    document.querySelectorAll('.activity-checkbox').forEach(checkbox => {
        checkbox.checked = false;
    });
    document.querySelectorAll('.session-input').forEach(input => {
        input.classList.add('hidden');
        input.value = '';
    });

    if (packageData.activities && packageData.activities.length > 0) {
        packageData.activities.forEach(activity => {
            const checkbox = document.querySelector(`input[name="activity_ids[]"][value="${activity.id}"]`);
            const sessionInput = document.querySelector(`input[name="sessions[${activity.id}]"]`);

            if (checkbox) {
                checkbox.checked = true;
            }
            if (sessionInput) {
                sessionInput.classList.remove('hidden');
                sessionInput.value = activity.pivot.included_sessions;
            }
        });
    }

    document.getElementById('form-method').value = 'PUT';
    const updateRoute = document.getElementById('package-form').dataset.updateRoute || '';
    document.getElementById('package-form').action = updateRoute.replace(':id', packageData.id);
    document.getElementById('package-panel').classList.remove('hidden');
}

function closePanel() {
    document.getElementById('package-panel').classList.add('hidden');
}

function toggleSessionInput(checkbox) {
    const activityId = checkbox.value;
    const sessionInput = document.querySelector(`input[name="sessions[${activityId}]"]`);

    if (checkbox.checked) {
        sessionInput.classList.remove('hidden');
        sessionInput.focus();
    } else {
        sessionInput.classList.add('hidden');
        sessionInput.value = '';
    }
}

function validateSessionInput(input) {
    if (input.value === '' || input.value === '0') {
        input.value = '1';
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const packageForm = document.getElementById('package-form');
    if (packageForm) {
        packageForm.addEventListener('submit', function(e) {
            clearErrors();

            const packageName = document.getElementById('package-name').value.trim();
            const packageDescription = document.getElementById('package-description').value.trim();
            const packageDuration = document.getElementById('package-duration').value;
            const packagePrice = document.getElementById('package-price').value;

            const errors = {};

            if (!packageName) {
                errors['name'] = ['Package name is required'];
            }

            if (!packageDescription) {
                errors['description'] = ['Description is required'];
            }

            if (!packageDuration || parseInt(packageDuration) < 1) {
                errors['duration_days'] = ['Duration must be at least 1 day'];
            }

            if (!packagePrice || parseFloat(packagePrice) < 0) {
                errors['base_price'] = ['Price must be a positive number'];
            }

            if (Object.keys(errors).length > 0) {
                e.preventDefault();
                displayErrors(errors);
                return false;
            }
        });
    }

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !document.getElementById('package-panel').classList.contains('hidden')) {
            closePanel();
        }
    });
});
