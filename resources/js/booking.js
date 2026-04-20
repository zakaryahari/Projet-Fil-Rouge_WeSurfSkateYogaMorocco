const basePrice = parseFloat(document.querySelector('[data-base-price]')?.dataset.basePrice || 0);
const totalPriceDisplay = document.querySelector('[data-total-price]');
const startDateInput = document.querySelector('input[name="start_date"]');
const endDateInput = document.querySelector('input[name="end_date"]');
const roomRadios = document.querySelectorAll('input[name="room_id"]');
const eventCheckboxes = document.querySelectorAll('input[name="events[]"]');

function calculateTotal() {
    let total = basePrice;

    const selectedRoom = document.querySelector('input[name="room_id"]:checked');
    if (selectedRoom) {
        const roomPrice = parseFloat(selectedRoom.dataset.roomPrice || 0);
        const nights = calculateNights();
        total += roomPrice * nights;
    }

    const selectedEvents = document.querySelectorAll('input[name="events[]"]:checked');
    selectedEvents.forEach(event => {
        const eventPrice = parseFloat(event.dataset.eventPrice || 0);
        total += eventPrice;
    });

    if (totalPriceDisplay) {
        totalPriceDisplay.textContent = '€' + total.toFixed(2);
    }
}

function calculateNights() {
    if (!startDateInput.value || !endDateInput.value) {
        return 1;
    }

    // Parse dates as YYYY-MM-DD format (date strings without timezone)
    const startDate = new Date(startDateInput.value + 'T00:00:00Z');
    const endDate = new Date(endDateInput.value + 'T00:00:00Z');

    // Calculate difference in milliseconds
    const diffTime = endDate - startDate;

    // Convert to days (1000ms * 60s * 60m * 24h)
    const diffDays = Math.floor(diffTime / (1000 * 60 * 60 * 24));

    // Return at least 1 day
    return diffDays > 0 ? diffDays : 1;
}

startDateInput?.addEventListener('change', calculateTotal);
endDateInput?.addEventListener('change', calculateTotal);

roomRadios.forEach(radio => {
    radio.addEventListener('change', calculateTotal);
});

eventCheckboxes.forEach(checkbox => {
    checkbox.addEventListener('change', calculateTotal);
});

calculateTotal();

// Form validation and debug logging
const form = document.querySelector('form');
const confirmBtn = document.getElementById('confirm-btn');

function validateForm() {
    const errors = [];

    if (!startDateInput.value) errors.push('❌ Arrival date is empty');
    if (!endDateInput.value) errors.push('❌ Departure date is empty');
    if (!document.querySelector('input[name="room_id"]:checked')) {
        errors.push('❌ Please select a room');
    }

    if (errors.length > 0) {
        console.warn('Form Validation Failed:', errors.join('\n'));
        alert('Please fill in all required fields:\n- Arrival Date\n- Departure Date\n- Select a Room');
        return false;
    }

    console.log('✅ Form Valid! Submitting to server');
    return true;
}

form?.addEventListener('submit', (e) => {
    if (!validateForm()) {
        e.preventDefault();
    }
});
