# Price Calculation Fixes

## Issues Fixed

### 1. ✅ Room Prices from Database
**Status**: Database correctly contains room prices
- Shared Room: €25/night
- Private Double: €80/night
- Private Single: €50/night
- All prices are properly displayed in the booking form

### 2. ✅ Night Calculation Error (FIXED)
**Issue**: Server was using `now()->parse()` which is incorrect
**Fix in BookingController.php (line 66)**:

```php
// BEFORE (Wrong)
$nights = now()->parse($request->end_date)->diffInDays(now()->parse($request->start_date));

// AFTER (Fixed)
$startDate = Carbon::createFromFormat('Y-m-d', $request->start_date);
$endDate = Carbon::createFromFormat('Y-m-d', $request->end_date);
$nights = $endDate->diffInDays($startDate);
```

### 3. ✅ JavaScript/Server Calculation Discrepancy (FIXED)
**Issue**: JavaScript was using `Math.ceil()` while server used `diffInDays()` causing different night counts
**Fix in resources/js/booking.js**:

```javascript
// BEFORE (Mismatch with server)
const diffTime = Math.abs(endDate - startDate);
const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

// AFTER (Matches server calculation)
const diffTime = endDate - startDate;
const diffDays = Math.floor(diffTime / (1000 * 60 * 60 * 24));
```

Also added UTC timezone handling to avoid timezone issues:
```javascript
const startDate = new Date(startDateInput.value + 'T00:00:00Z');
const endDate = new Date(endDateInput.value + 'T00:00:00Z');
```

## Price Calculation Formula (Now Correct)

```
Total Price = Package Base Price + (Room Price/Night × Number of Nights) + Sum(Selected Extras)
```

### Example:
- Package: €100
- Room: Double at €80/night for 2 nights = €160
- Extras: Surf Lessons €50 + Skate Park Access €30 = €80
- **Total = €100 + €160 + €80 = €340**

## Testing the Fix

1. ✅ Select arrival and departure dates
2. ✅ Choose a room (verify price shows correctly with number of nights)
3. ✅ Add optional extras (verify each adds correct price)
4. ✅ Click "Confirm Booking"
5. ✅ Should redirect to payment page with correct total
6. ✅ Server-side and client-side prices should now match

## Files Modified
- `app/Http/Controllers/BookingController.php` - Fixed night calculation
- `resources/js/booking.js` - Fixed JavaScript calculation + timezone handling
