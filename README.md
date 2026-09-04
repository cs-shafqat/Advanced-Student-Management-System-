# 🎓 Advanced School Management System (ASMS)

A full-stack, role-based web application designed to digitise and streamline school administration — connecting students, teachers, parents, and admins through a unified online portal. Developed as a **Final Year Bachelor's Capstone Project** at the **University of Lahore**.

---

## 📋 Table of Contents
- [Overview](#overview)
- [Problem Statement](#problem-statement)
- [Key Features](#key-features)
- [User Roles](#user-roles)
- [System Design](#system-design)
- [Tech Stack](#tech-stack)
- [User Manual](#user-manual)

---

## Overview

ASMS is a web-based school management platform built to replace fragmented, inefficient manual processes across educational institutions. The system provides dedicated portals for every stakeholder — students, teachers, parents, and administrators — enabling secure access to academic records, communication tools, scheduling, and finance management from a single application.

The core innovation is **direct parent-teacher communication** without requiring student intermediaries (Class Representatives), alongside a transparent academic progress tracking system accessible to parents at any time.

---

## Problem Statement

Educational institutions commonly face several recurring challenges:

- **CR Dependency:** Students rely on a single Class Representative to relay all teacher communications — schedule changes, quiz announcements, lecture uploads — creating a fragile single point of failure.
- **Parent Disconnect:** Parents have no direct channel to monitor their children's academic performance, attendance, or communicate with teachers.
- **Manual Administration:** Timetabling, fee management, attendance tracking, and resource allocation are handled manually, leading to inefficiency and errors.
- **No Unified Platform:** Students, teachers, and parents use separate, disconnected tools with no integration.

ASMS was designed to address each of these gaps in a single system.

---

## Key Features

### 📚 Academic Management
- Lecture upload and announcement system for teachers
- Class schedule and timetable management
- Assignment and quiz notification system
- Student attendance tracking
- Academic results and progress sheets

### 👨‍👩‍👧 Parent Portal
- Dedicated parent accounts linked to their children's profiles
- Direct access to academic records, attendance, and fee status
- **Parent-Teacher Meeting (PTM)** scheduling — parents can request meetings directly with any teacher
- Real-time progress monitoring without student involvement

### 💬 Communication
- Direct student-to-teacher query system
- Teacher-to-class announcements (eliminating CR dependency)
- Parent-teacher direct messaging channel
- Admin-generated notifications via email/SMS

### 💰 Finance Module
- Student fee management and fine tracking
- Employee pay structure and payroll records
- Fee payment history and outstanding balance reporting

### 🔐 Role-Based Access Control
- Granular permissions per role (Super Admin → Admin → Teacher → Student → Parent)
- Super Admin can subscribe/unsubscribe schools from the platform
- Admin can assign and revoke role-level authority

---

## User Roles

| Role | Key Responsibilities |
| :--- | :--- |
| **Super Admin** | Manage schools, assign school admins, system-wide configuration |
| **Admin** | Register students, assign classes, manage timetable and resources |
| **Teacher** | Upload lectures, post announcements, manage grades and attendance |
| **Student** | View schedule, access materials, submit queries, check results |
| **Parent** | Monitor child's academic profile, communicate with teachers, schedule PTM |

---

## System Design

### Entity Relationship Diagram
The full database schema is documented in the ERD below. It covers all core entities: Users, Roles, Students, Parents, Teachers, Classes, Timetables, Fees, Attendance, and PTM Scheduling.

📄 **[View ERD Diagram](./ERD.pdf)**

**Key entity relationships:**
- One Parent $\rightarrow$ Many Students (children)
- One Student $\rightarrow$ One Class $\rightarrow$ Many Teachers
- One Teacher $\rightarrow$ Many Classes (subjects)
- Many-to-Many: Parents $\leftrightarrow$ Teachers (via PTM scheduling)
- One Admin $\rightarrow$ Many Students, Classes, Resources

---

## Tech Stack

| Layer | Technology |
| :--- | :--- |
| **Frontend** | HTML, CSS, jQuery, Bootstrap |
| **Backend** | PHP 5.x (Core) |
| **Database** | MySQL |
| **Local Server** | XAMPP (Apache) |
| **Editor** | Sublime Text |
| **Architecture** | Role-Based Access Control (RBAC) |

---

## User Manual

A complete user guide with step-by-step instructions and screenshots for all user roles is available here:

📖 **[View Full User Manual (PDF)](./User_Manual.pdf)**

**The manual covers:**

* **Super Admin:** School registration and system configuration
* **Admin:** Student registration, class assignment, timetable management
* **Teacher:** Lecture uploads, announcements, grade entry
* **Student:** Portal navigation, query submission, schedule viewing
* **Parent:** Accessing child's profile, PTM scheduling, teacher communication
