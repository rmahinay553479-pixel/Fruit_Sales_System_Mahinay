# Fruit Sales System - Laravel Application

A comprehensive Laravel-based Fruit Sales System built with MVC architecture, featuring user authentication, CRUD management for fruit products, and advanced reporting capabilities.

## 🎯 Features

### 1. **Authentication & Authorization**
- Email/Username login system
- Secure password validation using Laravel Breeze
- Session management with database sessions
- User profile management
- Secure logout functionality

### 2. **Fruit Management (CRUD)**
- **Create**: Add new fruit products with detailed information
- **Read**: View all fruits in a paginated list (10 per page)
- **Update**: Edit fruit product information
- **Delete**: Remove fruit products from inventory
- **View Details**: Display complete fruit information on dedicated page

#### Fruit Product Fields:
- **Fruit Name**: Unique identifier for each fruit
- **Category**: Classification (Citrus, Berry, Tropical, Stone Fruit, Melons, Grapes, Apples, Pears)
- **Price per kg**: Decimal pricing for accurate calculations
- **Stock Quantity**: Inventory tracking in kilograms
- **Description**: Detailed product description
- **Availability**: Boolean flag for stock status

### 3. **Fruit Reports Module**
- View comprehensive fruit product reports
- Filter reports by category
- Filter reports by availability status (Available/Out of Stock)
- Export reports as CSV format
- Quick statistics dashboard with summary cards

#### Available Reports:
- **All Fruits Report**: Complete inventory list
- **Category-based Reports**: Filter fruits by type
- **Availability Reports**: Available vs. Out of Stock
- **Available Fruits Export**: CSV download of available products
- **Out of Stock Export**: CSV download of unavailable products

## 📋 Technical Stack

- **Framework**: Laravel 12.0
- **PHP Version**: 8.2+
- **Database**: MySQL
- **Authentication**: Laravel Breeze
- **Frontend**: Blade Templates with Tailwind CSS
- **Validation**: Server-side form requests
- **ORM**: Eloquent Models

## 🚀 Installation & Setup

### Prerequisites
- PHP 8.2 or higher
- MySQL Server
- Composer
- Node.js (for frontend build tools)

### Step 1: Clone & Install Dependencies
```bash
cd c:\xampp\htdocs\Fruit_Sales_System_Mahinay
composer install
npm install
```

### Step 2: Environment Configuration
The `.env` file is already configured with:
```
DB_DATABASE=fruit_sales_db
DB_USERNAME=root
DB_PASSWORD=
```

### Step 3: Database Setup
Database is already created and migrations have been run:
```bash
php artisan migrate
```

### Step 4: Seed Sample Data
Sample fruit data has been populated:
```bash
php artisan db:seed
```

### Step 5: Build Frontend Assets
```bash
npm run build
```

### Step 6: Start Development Server
```bash
php artisan serve
```

Visit `http://localhost:8000` and login with:
- **Email**: admin@example.com
- **Password**: password

## 📁 Project Structure

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── FruitController.php       # Fruit CRUD operations
│   │   ├── ReportController.php      # Reporting & exports
│   │   └── ProfileController.php     # User profile management
│   ├── Requests/
│   │   ├── StoreFruitRequest.php    # Create validation
│   │   └── UpdateFruitRequest.php   # Update validation
│   └── Middleware/
├── Models/
│   ├── Fruit.php                     # Fruit model with relationships
│   └── User.php                      # User model
└── Providers/

database/
├── migrations/
│   └── 2026_05_13_125434_create_fruits_table.php
└── seeders/
    ├── DatabaseSeeder.php
    └── FruitSeeder.php

resources/views/
├── fruits/
│   ├── index.blade.php              # Fruit list (paginated)
│   ├── create.blade.php             # Create form
│   ├── edit.blade.php               # Edit form
│   └── show.blade.php               # Fruit details
├── reports/
│   ├── index.blade.php              # Reports dashboard
│   └── filtered.blade.php           # Filtered reports
├── layouts/
│   ├── app.blade.php                # Main layout
│   └── navigation.blade.php         # Navigation bar
└── dashboard.blade.php              # Admin dashboard

routes/
└── web.php                          # All route definitions
```

## 🔐 Validation Rules

### Fruit Validation (Create/Update)
- **Name**: Required, unique, max 255 characters
- **Category**: Required, max 255 characters
- **Price per kg**: Required, numeric, minimum 0.01
- **Stock Quantity**: Required, integer, minimum 0
- **Description**: Optional, text field
- **Availability**: Required, boolean (checkbox)

## 🛣️ Routes

### Fruit Management Routes
- `GET /fruits` - List all fruits (paginated)
- `GET /fruits/create` - Show create form
- `POST /fruits` - Store new fruit
- `GET /fruits/{id}` - View fruit details
- `GET /fruits/{id}/edit` - Show edit form
- `PATCH /fruits/{id}` - Update fruit
- `DELETE /fruits/{id}` - Delete fruit

### Report Routes
- `GET /reports` - View reports dashboard
- `GET /reports/category/{category}` - Filter by category
- `GET /reports/availability/{status}` - Filter by availability
- `GET /reports/export-csv` - Export all fruits (CSV)
- `GET /reports/export-available-csv` - Export available fruits (CSV)
- `GET /reports/export-out-of-stock-csv` - Export out of stock (CSV)

## 📊 Database Schema

### Fruits Table
```sql
CREATE TABLE fruits (
    id BIGINT PRIMARY KEY,
    name VARCHAR(255) NOT NULL UNIQUE,
    category VARCHAR(255) NOT NULL,
    price_per_kg DECIMAL(8, 2) NOT NULL,
    stock_quantity INT NOT NULL,
    description TEXT,
    availability BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);
```

## 👤 Default Test Account

- **Email**: admin@example.com
- **Password**: password
- **Name**: Admin User

## 🎨 UI Features

- **Responsive Design**: Works on desktop, tablet, and mobile
- **Tailwind CSS**: Modern styling framework
- **Data Validation**: Real-time and server-side validation
- **Pagination**: 10 fruits per page
- **Status Indicators**: Visual badges for availability
- **Quick Actions**: Inline edit/delete buttons
- **Summary Cards**: Dashboard statistics

## 🚀 Available Operations

### Fruit Management Workflow
1. **View Fruits**: Navigate to "Fruits" in navigation bar
2. **Add Fruit**: Click "Add New Fruit" button
3. **Fill Form**: Enter fruit details and validate
4. **View Details**: Click "View" button on any fruit
5. **Edit Fruit**: Click "Edit" button and update information
6. **Delete Fruit**: Click "Delete" and confirm removal

### Reporting Workflow
1. **View Reports**: Navigate to "Reports" in navigation bar
2. **View Statistics**: See summary cards at top
3. **Filter by Category**: Click category buttons
4. **Filter by Availability**: Click availability filters
5. **Export Data**: Download reports as CSV files

## 💡 Tips & Best Practices

- Always ensure stock quantity is accurate before publishing
- Use meaningful descriptions for better customer understanding
- Regularly export and backup reports
- Update availability status promptly when stock runs out
- Use consistent naming conventions for categories

## 🔒 Security Features

- CSRF protection on all forms
- SQL injection prevention via Eloquent ORM
- Password hashing with bcrypt
- Authenticated routes protection
- Server-side validation
- Secure session handling

## 📞 Support & Troubleshooting

### Common Issues

**Q: Database connection error?**
A: Ensure XAMPP MySQL is running and database is created.

**Q: Cannot login?**
A: Run `php artisan db:seed` to create test user.

**Q: CSS/JS not loading?**
A: Run `npm run build` to compile frontend assets.

**Q: Permission denied error?**
A: Ensure storage folder has write permissions.

## 📝 License

This project is built following Laravel best practices and standards.

---

**Created**: May 13, 2026
**Framework**: Laravel 12.0
**Last Updated**: May 13, 2026
