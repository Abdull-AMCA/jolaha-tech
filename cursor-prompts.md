# 🧩 Cursor Prompt Pack — Jolaha Tech Admin System

Your personal library of AI prompts for **Cursor**, designed specifically for your **PHP + Bootstrap admin dashboard** setup.

---

## ⚙️ 1. Database & Backend (PHP + MySQL)

### 🔹 Create or Update CRUD Functions
> Create CRUD functions for `services` table including safe prepared statements and JSON responses. Each service can have multiple subservices stored in a related table `sub_services` with `service_id` as foreign key.

### 🔹 Secure Delete Function
> Create a `delete_service.php` script that deletes a service and all related subservices by ID. Use try/catch with transactions and return JSON `{ success, message }`.

### 🔹 Fix JSON Fetch Errors
> Debug why `get_inquiry_details.php` is returning HTML instead of JSON. Ensure it always sets correct headers and outputs valid JSON.

### 🔹 Improve DB Query Performance
> Optimize all SELECT queries in admin-functions.php to use indexed columns and limit clauses where appropriate.

### 🔹 Add Pagination
> Add server-side pagination to `view_all_inquiries.php`, using a limit of 10 per page and Bootstrap 5 pagination UI at the bottom.

---

## 🎨 2. Frontend (Bootstrap + Fetch API + Modals)

### 🔹 Animate and Modernize Hero Section
> Redesign the hero background with soft animated mesh gradients (including #fbad59 orange), smooth transitions, and glowing depth without breaking dark mode.

### 🔹 Improve View Inquiry Modal
> In `view_all_inquiries.php`, enhance the inquiry details modal UI — use a cleaner layout with subtle cards, two-column grid, and labeled badges for budget/timeline.

### 🔹 Add Live Search
> Add live search with debounce for filtering inquiries by name, company, or service_type in `view_all_inquiries.php`. Use Bootstrap 5 input group and client-side JS.

### 🔹 Improve Active Link System
> Update sidebar navigation active class detection logic to include sub-menu highlighting. Ensure parent menu stays expanded when a sub-item is active.

### 🔹 Add Confirmation Modals
> Add a Bootstrap 5 confirmation modal before deleting a service in the admin panel. Use Fetch API to send the delete request and update the table without reload.

---

## 🧠 3. Smart Helpers & Utilities

### 🔹 Sanitize All User Input
> Create a PHP utility function `sanitize_input()` that trims strings, strips tags, and escapes HTML before database insertion.

### 🔹 Consistent Error Handling
> Add a global PHP function `send_json_error($message)` and `send_json_success($data)` that always send properly formatted JSON responses.

### 🔹 Add Logs for Admin Actions
> Add a table `admin_logs` and create a PHP function `log_admin_action($action, $admin_id, $description)` that records all CRUD actions.

---

## 🧱 4. Structural Improvements

### 🔹 Folder Reorganization
> Propose a clean folder structure for the admin backend separating includes, API endpoints, components, and views, optimized for Cursor readability.

### 🔹 Modern PHP Refactor
> Refactor admin-functions.php into OOP style using a `Database` class and `ServiceManager` class to handle queries. Keep all existing functionality.

### 🔹 Add CSRF Protection
> Add CSRF tokens to all form submissions and validate them in PHP endpoints to improve security.

---

## 🚀 5. Productivity Boost Prompts

### 🔹 Explain Code
> Explain this PHP function line by line, including its database logic and error handling.

### 🔹 Refactor for Readability
> Refactor this PHP script for readability — use consistent indentation, comments, and descriptive variable names.

### 🔹 Add Type Hints
> Add PHP 8+ type hints and return types to all functions in this file.

### 🔹 Convert to Fetch API
> Convert this jQuery AJAX call to a modern Fetch API request with async/await syntax.

### 🔹 Add Loading States
> Add a loading spinner and disabled state to this button while the fetch request is processing.

---

## 🧩 6. Optional Extras

### 🔹 Email Integration
> Add a PHPMailer-based email function that sends a formatted HTML response to the client when an inquiry is responded to.

### 🔹 Dark/Light Mode Toggle
> Add a theme toggle in the admin dashboard using localStorage to persist the dark/light mode preference.

### 🔹 Dashboard Metrics
> Add a statistics section at the top of the admin dashboard showing total inquiries, services, and trial requests with small Bootstrap cards.

---

## 💼 7. Debug & Diagnostics

### 🔹 Check Server Paths
> Verify that all fetch endpoints use correct relative paths (e.g., `includes/get_inquiry_details.php`) and output valid JSON.

### 🔹 Fix 500 or Network Errors
> Trace why this PHP file is returning HTML (like a warning or fatal error) instead of JSON. Add error logging and use `error_log()` for details.

---

## 🧠 8. AI Co-Development Mode (Advanced)

> You are my coding partner. As I edit PHP, automatically suggest improvements and best practices for security, performance, and Bootstrap 5 UI.

---

## 🪄 Bonus: Quick Cursor Keyboard Cheats

| Action | Shortcut |
|--------|-----------|
| **Inline Edit** | Ctrl + K |
| **Chat with AI** | Ctrl + L |
| **Accept Suggestion** | Tab |
| **Reject Suggestion** | Esc |
| **Open File Search** | Ctrl + P |
| **Toggle Terminal** | Ctrl + ` |

---

**Created by GPT-5 for Jolaha Tech Admin Development (PHP + Bootstrap)** 🚀
