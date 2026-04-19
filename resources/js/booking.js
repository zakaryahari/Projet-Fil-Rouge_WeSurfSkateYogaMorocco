// Booking Price Calculator

const basePrice = parseFloat(document.querySelector('[data-base-price]')?.dataset.basePrice || 0);
const totalPriceDisplay = document.querySelector('[data-total-price]');
const startDateInput = document.querySelector('input[name="start_date"]');
const endDateInput = document.querySelector('input[name="end_date"]');
const roomRadios = document.querySelectorAll('input[name="room_id"]');
const eventCheckboxes = document.querySelectorAll('input[name="events[]"]');

// Function to calculate total price
function calculateTotal() {
    let total = basePrice;

    // Add room price
    const selectedRoom = document.querySelector('input[name="room_id"]:checked');
    if (selectedRoom) {
        const roomPrice = parseFloat(selectedRoom.dataset.roomPrice || 0);
        const nights = calculateNights();
        total += roomPrice * nights;
    }

    // Add events price
    const selectedEvents = document.querySelectorAll('input[name="events[]"]:checked');
    selectedEvents.forEach(event => {
        const eventPrice = parseFloat(event.dataset.eventPrice || 0);
        total += eventPrice;
    });

    // Update display
    if (totalPriceDisplay) {
        totalPriceDisplay.textContent = '€' + total.toFixed(2);
    }
}

// Calculate nights between dates
function calculateNights() {
    const startDate = new Date(startDateInput.value);
    const endDate = new Date(endDateInput.value);

    if (!startDateInput.value || !endDateInput.value) {
        return 1;
    }

    const diffTime = Math.abs(endDate - startDate);
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

    return diffDays > 0 ? diffDays : 1;
}

// Add event listeners
startDateInput?.addEventListener('change', calculateTotal);
endDateInput?.addEventListener('change', calculateTotal);

roomRadios.forEach(radio => {
    radio.addEventListener('change', calculateTotal);
});

eventCheckboxes.forEach(checkbox => {
    checkbox.addEventListener('change', calculateTotal);
});

// Initial calculation
calculateTotal();
