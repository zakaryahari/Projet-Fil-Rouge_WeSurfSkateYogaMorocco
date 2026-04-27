// Coaches Admin Panel - Add/Edit/Delete Functionality

function openAddCoach() {
    document.getElementById('panel-title').textContent = 'Add Coach';
    document.getElementById('coach-form').reset();
    document.getElementById('form-method').value = 'POST';
    document.getElementById('coach-form').action = document.getElementById('coach-form').dataset.storeRoute || '';
    document.getElementById('coach-panel').classList.remove('hidden');
}

function openEditCoach(coachData) {
    document.getElementById('panel-title').textContent = 'Edit Coach';
    document.getElementById('coach-name').value = coachData.name;
    document.getElementById('coach-specialty').value = coachData.specialty;
    document.getElementById('coach-years').value = coachData.years_experience;

    document.getElementById('form-method').value = 'PUT';
    const updateRoute = document.getElementById('coach-form').dataset.updateRoute || '';
    document.getElementById('coach-form').action = updateRoute.replace(':id', coachData.id);
    document.getElementById('coach-panel').classList.remove('hidden');
}

function closePanel() {
    document.getElementById('coach-panel').classList.add('hidden');
}

// Close panel when pressing Escape
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        const coachPanel = document.getElementById('coach-panel');
        if (coachPanel && !coachPanel.classList.contains('hidden')) {
            closePanel();
        }
    }
});
