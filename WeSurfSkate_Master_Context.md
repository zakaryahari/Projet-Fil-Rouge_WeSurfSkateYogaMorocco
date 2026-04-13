# WE SURF SKATE YOGA MOROCCO - SYSTEM ARCHITECTURE (MASTER CONTEXT)

## 1. PROJECT OVERVIEW

A Laravel-based booking platform for a Moroccan Surf, Skate, and Yoga camp.
Architecture: Service-Oriented MVC (Controllers must remain thin, complex logic goes to Services).
Tech Stack: Laravel 11+, MySQL (InnoDB), Blade/Tailwind.

## 2. CRITICAL DESIGN RULES (STRICTLY ENFORCED)

1. **Roles:** Only 2 roles exist in the `users` table: `admin` and `customer`.
2. **Coaches are NOT Users:** The `Coach` entity is an internal resource managed via an Admin CRUD. They do NOT log in. They have no password.
3. **No Overbooking:** Room availability is dynamically calculated. A room has a `total_stock`. Availability = `total_stock` - (Active Bookings).
4. **Maintenance Handling:** Broken rooms are handled via "Blocker Bookings". If a room is broken, the admin creates a booking with the status `maintenance`. We do NOT change the global `total_stock`.
5. **Booking is the Core:** A Booking MUST include a `Room` and a `Package`. `Activities` (Extras) are optional via a Pivot table.

## 3. CORE BOOKING STATUSES

`['pending', 'confirmed', 'finished', 'cancelled', 'maintenance']`

## 4. SYSTEM CLASS DIAGRAM

@startuml
skinparam classAttributeIconSize 0

class User {

- id : int
- name : string
- email : string
- password : string
- role : string <<admin, customer>>
  }

class Coach {

- id : int
- name : string
- specialty : string
- years_experience : int
  }

class Room {

- id : int
- type : string
- price_per_night : float
- total_stock : int

* checkAvailability(startDate, endDate) : int
  }

class Package {

- id : int
- name : string
- description : string
- base_price : float
  }

class Activity {

- id : int
- name : string
- price : float
- is_extra : boolean
  }

class Booking {

- id : int
- start_date : date
- end_date : date
- total_price : float
- status : string <<pending, confirmed, finished, cancelled, maintenance>>
  }

class BookingItem {

- id : int
- quantity : int
  }

class Review {

- id : int
- rating : int
- comment : string
  }

User "1" -- "0.._" Booking : makes >
Booking "1" -- "1" Room : reserves >
Booking "1" -- "1" Package : requires >
Booking "1" _-- "0.._" BookingItem : contains >
BookingItem "1" -- "1" Activity : references >
Booking "1" -- "0..1" Review : receives >
Coach "1" -- "0.._" Activity : leads >
@enduml
