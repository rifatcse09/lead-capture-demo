# Lead Capture Demo

This project is a simple lead capture system built with Laravel.

## Features

- A form to capture leads with fields: `name`, `email`, `gclid`, and `sub_id`.
- Admin interface to view a paginated list of captured leads.
- Tracker log for auditing lead submissions.

## Setup

1. Clone the repository:
   ```bash
   git clone https://github.com/rifatcse09/lead-capture-demo.git
   cd lead-capture-demo
   ```
2. Run `composer install` to install dependencies.
3. Copy the example environment file and set up your `.env` file:
   ```bash
   cp .env.example .env
   ```
4. Generate the application key:
   ```bash
   php artisan key:generate
   ```
5. Run migrations:
   ```bash
   php artisan migrate
   ```
6. Start the development server:
   ```bash
   php artisan serve
   ```

## Verifying a Lead

### Tracker Log
- Every lead submission is logged in `storage/logs/tracker.log`.
- Example log entry:
  ```
  [INFO] lead_captured {"id":1,"payload":{"name":"John Doe","email":"john@example.com",...},"ip":"127.0.0.1",...}
  ```

### CRM Row (Admin List)
- Navigate to the admin interface at `/admin`.
- Use the search bar to filter leads by email or browse the paginated list.
- Example row in the admin list:
  ```
  | Name       | Email             | GCLID       | Sub ID     | Created At          |
  |------------|-------------------|-------------|------------|---------------------|
  | John Doe   | john@example.com  | abc123      | sub456     | 2025-09-04 12:22:48 |
  ```

## Notes

- Ensure the `created_at` column in the `leads` table is indexed for efficient sorting and filtering.
- Logs are stored in `storage/logs/tracker.log` and can be rotated or archived as needed.