// Get DOM elements
const startDateInput = document.getElementById('start_date');
const endDateInput = document.getElementById('end_date');
const totalPriceDisplay = document.querySelector('[data-total-price]');
const roomRadios = document.querySelectorAll('input[name="room_id"]');
const eventCheckboxes = document.querySelectorAll('input[name="events[]"]');

// Get package duration from data attribute
function getPackageDuration() {
    const packageDiv = document.querySelector('[data-package-duration]');
    if (packageDiv && packageDiv.dataset.packageDuration) {
        return parseInt(packageDiv.dataset.packageDuration, 10);
    }
    return 0;
}

// Get base price from data attribute
function getBasePrice() {
    const packageDiv = document.querySelector('[data-base-price]');
    if (packageDiv && packageDiv.dataset.basePrice) {
        return parseFloat(packageDiv.dataset.basePrice);
    }
    return 0;
}

// Format date to YYYY-MM-DD
function formatDate(date) {
    const year = date.getFullYear();
    const month = String(date.getMonth() + 1).padStart(2, '0');
    const day = String(date.getDate()).padStart(2, '0');
    return `${year}-${month}-${day}`;
}

// Calculate and set the end date based on start date + package duration
function calculateEndDate() {
    if (!startDateInput.value) {
        endDateInput.value = '';
        return;
    }

    const duration = getPackageDuration();
    if (duration <= 0) {
        endDateInput.value = '';
        return;
    }

    const startDate = new Date(startDateInput.value);
    const endDate = new Date(startDate);
    endDate.setDate(endDate.getDate() + duration);

    endDateInput.value = formatDate(endDate);
    calculateTotal();
}

// Calculate number of nights between dates
function calculateNights() {
    if (!startDateInput.value || !endDateInput.value) {
        return 1;
    }

    const startDate = new Date(startDateInput.value);
    const endDate = new Date(endDateInput.value);
    const diffTime = Math.abs(endDate - startDate);
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

    return diffDays > 0 ? diffDays : 1;
}

// Calculate total price LIVE
function calculateTotal() {
    let total = getBasePrice();

    // Add room price x nights
    const selectedRoom = document.querySelector('input[name="room_id"]:checked');
    if (selectedRoom) {
        const roomPrice = parseFloat(selectedRoom.dataset.roomPrice || 0);
        const nights = calculateNights();
        total += roomPrice * nights;
    }

    // Add event/activity prices
    const selectedEvents = document.querySelectorAll('input[name="events[]"]:checked');
    selectedEvents.forEach((event) => {
        const eventPrice = parseFloat(event.dataset.eventPrice || 0);
        total += eventPrice;
    });

    // Update price display
    if (totalPriceDisplay) {
        totalPriceDisplay.textContent = '€' + total.toFixed(2);
    }
}

// Event Listeners - Start Date Change
if (startDateInput) {
    startDateInput.addEventListener('change', function() {
        calculateEndDate();
    });
}

// Event Listeners - Room Selection (LIVE PRICE UPDATE)
roomRadios.forEach((radio) => {
    radio.addEventListener('change', function() {
        calculateTotal();
    });
});

// Event Listeners - Extra Activities (LIVE PRICE UPDATE)
eventCheckboxes.forEach((checkbox) => {
    checkbox.addEventListener('change', function() {
        calculateTotal();
    });
});

// Initialize on page load
document.addEventListener('DOMContentLoaded', () => {
    calculateTotal();
});
