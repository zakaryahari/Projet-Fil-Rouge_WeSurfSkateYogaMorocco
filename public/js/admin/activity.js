// Activities Admin Panel - Add/Edit/Delete Functionality

function openAddActivity() {
    document.getElementById('panel-title').textContent = 'Add Activity';
    document.getElementById('activity-form').reset();
    document.getElementById('activity-coach').value = '';
    document.getElementById('form-method').value = 'POST';
    document.getElementById('activity-form').action = document.getElementById('activity-form').dataset.storeRoute || '';
    document.getElementById('activity-panel').classList.remove('hidden');
}

function openEditActivity(activityData) {
    document.getElementById('panel-title').textContent = 'Edit Activity';
    document.getElementById('activity-name').value = activityData.name;
    document.getElementById('activity-duration').value = activityData.duration_minutes;
    document.getElementById('activity-coach').value = activityData.coach_id || '';

    document.getElementById('form-method').value = 'PUT';
    const updateRoute = document.getElementById('activity-form').dataset.updateRoute || '';
    document.getElementById('activity-form').action = updateRoute.replace(':id', activityData.id);
    document.getElementById('activity-panel').classList.remove('hidden');
}

function closePanel() {
    document.getElementById('activity-panel').classList.add('hidden');
}

document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        const activityPanel = document.getElementById('activity-panel');
        if (activityPanel && !activityPanel.classList.contains('hidden')) {
            closePanel();
        }
    }
});
