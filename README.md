# BFTech HR Portal

A Laravel-based Human Resource Management System (HRMS) developed as part of my Laravel Development Internship. This project focuses on managing employee-related operations including authentication, attendance, leave management, employee profiles, multilingual support, and other HR functionalities.

---

# Project Overview

BFTech HR Portal is designed to simplify employee management by providing an easy-to-use interface for employees to manage their daily activities.

The project follows Laravel's MVC architecture and uses Form Requests, Localization, Sessions, Blade Templates, and Eloquent ORM.

---

# Features

## Authentication

- Employee Registration
- Login
- Logout
- Forgot Password
- OTP Verification
- Reset Password

---

## Employee Dashboard

- Welcome Card
- Attendance Status
- Check-In
- Check-Out
- Dashboard Statistics

---

## Employee Profile

- Personal Information
- Contact Information
- Designation Information
- Other Information
- Profile Image Upload

---

## Attendance Module

- Check In
- Check Out
- Attendance History
- Daily Attendance Status

---

## Leave Module

- Apply Leave
- Leave History
- Leave Validation

---

## Localization

- English Language
- Urdu Language
- Dynamic Language Switching
- Validation Translation

---

# Technologies Used

## Backend

- Laravel
- PHP

## Database

- MySQL

## Frontend

- HTML5
- CSS3
- Bootstrap 5
- JavaScript
- Blade Templates

## Tools

- Composer
- Git
- GitHub
- VS Code

---

# Laravel Concepts Implemented

- MVC Architecture
- Routing
- Controllers
- Blade Layouts
- Blade Components
- Form Requests
- Validation
- Sessions
- Localization
- View Composer
- File Upload
- Password Hashing
- Eloquent ORM
- CRUD Operations

---

# Installation

```bash
git clone https://github.com/FhussainCodes/BFTech_HR_Portal.git
```

```bash
cd BFTech_HR_Portal
```

```bash
composer install
```

```bash
cp .env.example .env
```

Configure database credentials inside the .env file.

```bash
php artisan key:generate
```

```bash
php artisan migrate
```

```bash
php artisan serve
```

---

# Folder Structure

```text
app/
bootstrap/
config/
database/
public/
resources/
routes/
storage/
```

---
# Recent Updates

- Added the `role` column to the `register` table.
- Implemented role-based login redirection (Employee / HR).
- Created a dedicated development branch (`hr-portal`) for HR module development.
- Implemented custom `HrAuth` middleware for HR route protection.
- Designed the initial HR Portal layout:
  - HR Navbar
  - HR Sidebar
  - HR Footer
  - HR Dashboard UI
- Organized the HR module folder structure.
- Started development of the HR Dashboard.

# Future Improvements

- Employee Management Module
- Attendance Management
- Leave Approval Workflow
- Reports Module
- Import Employees using Excel
- Notification System
- Role & Permission Management
---

# Learning Outcomes

During this project I learned:

- Laravel MVC
- Request Validation
- Sessions
- Localization
- View Composer
- CRUD Development
- Authentication Flow
- Attendance Logic
- Leave Management
- File Upload
- Problem Solving
- Debugging

---

# Author

**Farrukh Hussain**

Laravel Development Intern

University of Education Lahore
