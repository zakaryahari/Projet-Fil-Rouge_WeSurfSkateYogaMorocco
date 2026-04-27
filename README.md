<p align="center">
  <a href="https://wesurfskatemorocco.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="WeSurfSkate Logo">
  </a>
</p>

<p align="center">
  <a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

---

## 🌊 About WeSurfSkate Platform

**WeSurfSkateYogaMorocco** is a comprehensive, full-stack digital booking and management platform engineered specifically for Moroccan surf, skate, and yoga retreats. Built on the robust Laravel MVC framework, it replaces manual administrative tasks with a fully automated, real-time availability engine. 

Designed with a premium dark/light UI aesthetic, the platform allows customers to seamlessly compose custom retreats, verify room availability, and securely process payments, while providing administrators with a powerful, reactive command center to manage daily operations.

## ✨ Core Features

### 🏄‍♂️ Front-Office (Customer Experience)
- **Dynamic Booking Engine:** Real-time overlap detection algorithms to prevent room double-booking.
- **Customizable Packages:** Users can select base packages and append dynamic extras (events, activities) to their itinerary.
- **Secure E-Commerce:** Fully integrated **Stripe Checkout API** for PCI-compliant payment processing and webhook state management.
- **Interactive UI:** Smooth horizontal Alpine.js carousels, dynamic transparent-to-dark navigation bars, and fully responsive Tailwind CSS layouts.
- **Post-Stay Review System:** Intelligent UI that prompts users with a 5-star interactive modal only upon completion of a `finished` booking.

### 🛡️ Back-Office (Admin Command Center)
- **Real-Time KPI Dashboard:** Instant metrics on total revenue, active customers, and booking volumes.
- **Slide-Out CRUD Interface:** Vanilla JavaScript-powered asynchronous side-panels for rapid data entry (Rooms, Packages, Coaches) without page reloads.
- **Complex Pivot Management:** Advanced form logic to assign multiple activities to packages with specific `included_sessions` dynamically.
- **User Security:** One-click instant account suspension (`is_banned` toggle) protected by global routing middleware.

## 💻 Tech Stack

| Category | Technologies Used |
| :--- | :--- |
| **Backend Framework** | Laravel (PHP 8+) |
| **Database** | MySQL (Highly Normalized, STI Architecture) |
| **Frontend Styling** | Tailwind CSS, Blade Components |
| **Frontend Interactivity** | Alpine.js, Vanilla JavaScript (DOM manipulation) |
| **Payment Gateway** | Stripe API (Checkout & Webhooks) |
| **Version Control** | Git & GitHub |

## 🚀 Installation & Setup

To run this project locally for development or testing, follow these strict deployment steps:

### Prerequisites
- PHP >= 8.1
- Composer
- Node.js & NPM
- MySQL Server
- Stripe API Account (for test keys)
