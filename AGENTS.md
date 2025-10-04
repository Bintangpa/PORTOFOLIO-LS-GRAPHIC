# Repository Guidelines

## Project Structure & Module Organization

LittleStar Studio is organized following Laravel's MVC architecture:
- `app/` - Core application logic (Models, Controllers, Middleware)
- `resources/views/` - Blade templates for frontend rendering
- `resources/js/` and `resources/sass/` - Frontend assets compiled with Vite
- `database/migrations/` - Database schema definitions
- `routes/web.php` - Application routing configuration
- `config/` - Laravel configuration files
- `tests/` - PHPUnit test suites (Feature and Unit)

## Build, Test, and Development Commands

```bash
# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install

# Start development environment (server, queue, logs, and Vite)
composer run dev

# Build frontend assets for production
npm run build

# Run database migrations
php artisan migrate

# Run tests
composer run test
# or
php artisan test

# Generate application key
php artisan key:generate
```

## Coding Style & Naming Conventions

- **Indentation**: 4 spaces (PHP), 2 spaces (JavaScript/CSS)
- **File naming**: PascalCase for PHP classes, kebab-case for Blade views
- **Function/variable naming**: camelCase for PHP methods/variables, kebab-case for CSS classes
- **Linting**: Laravel Pint for PHP code formatting (`./vendor/bin/pint`)

## Testing Guidelines

- **Framework**: PHPUnit with Laravel's testing utilities
- **Test files**: Located in `tests/Feature/` and `tests/Unit/`
- **Running tests**: `php artisan test` or `composer run test`
- **Coverage**: Tests use SQLite in-memory database for isolation

## Commit & Pull Request Guidelines

- **Commit format**: Descriptive messages in Indonesian/English
- **PR process**: Standard Laravel development practices
- **Branch naming**: Feature branches recommended for new functionality

---

# Repository Tour

## 🎯 What This Repository Does

LittleStar Studio is a Laravel-based portofolio management system that allows creative professionals to showcase their work through a public portofolio website with an admin panel for content management.

**Key responsibilities:**
- Display portofolio items in an attractive grid layout for public viewing
- Provide detailed portofolio item pages with project information
- Enable admin users to create, edit, and delete portofolio entries
- Handle image uploads and storage for portofolio items

---

## 🏗️ Architecture Overview

### System Context
```
[Public Users] → [Portofolio Website] → [SQLite Database]
                        ↓
[Admin Users] → [Admin Panel] → [File Storage]
```

### Key Components
- **HomeController** - Handles public portofolio display and detail views
- **Admin/PortfolioController** - Manages CRUD operations for portofolio items
- **Portfolio Model** - Represents portofolio items with image, metadata, and user relationships
- **User Model** - Handles authentication with role-based access (admin/public)
- **AdminMiddleware** - Protects admin routes from unauthorized access

### Data Flow
1. Public users browse portofolios via HomeController displaying paginated results
2. Admin users authenticate and access protected admin routes
3. Portofolio CRUD operations store images in public storage and metadata in database
4. Role-based middleware ensures only admin users can modify content

---

## 📁 Project Structure [Partial Directory Tree]

```
littlestar-std/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/           # Admin-specific controllers
│   │   │   │   └── PortfolioController.php
│   │   │   └── HomeController.php
│   │   └── Middleware/
│   │       └── AdminMiddleware.php
│   └── Models/
│       ├── Portfolio.php        # Portofolio item model
│       └── User.php            # User authentication model
├── database/
│   ├── migrations/             # Database schema definitions
│   ├── factories/              # Model factories for testing
│   └── seeders/               # Database seeders
├── resources/
│   ├── views/
│   │   ├── admin/             # Admin panel templates
│   │   ├── auth/              # Authentication views
│   │   ├── layouts/           # Shared layout templates
│   │   ├── home.blade.php     # Public portofolio grid
│   │   └── portfolio-detail.blade.php
│   ├── js/                    # JavaScript assets
│   └── sass/                  # SCSS stylesheets
├── routes/
│   └── web.php                # Application routes
├── storage/
│   └── app/public/            # Uploaded portofolio images
├── tests/
│   ├── Feature/               # Integration tests
│   └── Unit/                  # Unit tests
├── composer.json              # PHP dependencies
├── package.json               # Node.js dependencies
└── vite.config.js            # Frontend build configuration
```

### Key Files to Know

| File | Purpose | When You'd Touch It |
|------|---------|---------------------|
| `routes/web.php` | Application routing | Adding new pages/endpoints |
| `app/Http/Controllers/HomeController.php` | Public portofolio display | Modifying public views |
| `app/Http/Controllers/Admin/PortfolioController.php` | Admin portofolio management | Changing admin functionality |
| `app/Models/Portfolio.php` | Portofolio data model | Modifying portofolio structure |
| `resources/views/home.blade.php` | Main portofolio page | Updating public design |
| `database/migrations/` | Database schema | Adding/modifying database fields |
| `vite.config.js` | Frontend build setup | Changing asset compilation |
| `composer.json` | PHP dependencies | Adding Laravel packages |

---

## 🔧 Technology Stack

### Core Technologies
- **Language:** PHP (^8.2) - Modern PHP with strong typing support
- **Framework:** Laravel (^12.0) - Full-stack web framework with Eloquent ORM
- **Database:** SQLite - Lightweight database for development and small deployments
- **Frontend:** Blade Templates + Bootstrap 5 + Sass - Server-side rendering with responsive CSS

### Key Libraries
- **Laravel UI** - Authentication scaffolding and UI components
- **Vite** - Modern frontend build tool for asset compilation
- **Bootstrap 5** - CSS framework for responsive design
- **Tailwind CSS** - Utility-first CSS framework for custom styling

### Development Tools
- **PHPUnit** - Testing framework for PHP applications
- **Laravel Pint** - Code style fixer for consistent formatting
- **Faker** - Generate fake data for testing and seeding
- **Concurrently** - Run multiple development processes simultaneously

---

## 🌐 External Dependencies

### Required Services
- **File Storage** - Local storage for portofolio images in `storage/app/public`
- **SQLite Database** - Stores user accounts, portofolio metadata, and application data

### Optional Integrations
- **Mail Service** - Configured for password reset functionality (currently set to log driver)
- **Queue System** - Database-based queue for background job processing

### Environment Variables

```bash
# Required
APP_KEY=                    # Laravel application encryption key
DB_CONNECTION=sqlite        # Database connection type
APP_URL=http://localhost    # Application base URL

# Optional
MAIL_MAILER=log            # Mail driver (log, smtp, etc.)
QUEUE_CONNECTION=database   # Queue driver for background jobs
CACHE_STORE=database       # Cache storage driver
```

---

## 🔄 Common Workflows

### Portofolio Management Workflow
1. Admin logs in via `/login` with admin credentials
2. Admin accesses portofolio management at `/admin/portfolios`
3. Admin creates new portofolio with image upload and metadata
4. System stores image in `storage/app/public/portfolios/`
5. Portofolio appears on public homepage immediately

**Code path:** `AdminMiddleware` → `PortfolioController@store` → `Portfolio Model` → `Storage`

### Public Portofolio Viewing
1. User visits homepage at `/`
2. HomeController fetches paginated portofolios from database
3. Portofolio grid displays with image thumbnails and basic info
4. User clicks portofolio for detailed view at `/portfolio/{id}`

**Code path:** `HomeController@index` → `Portfolio Model` → `home.blade.php`

---

## 📈 Performance & Scale

### Performance Considerations
- **Image Storage:** Portofolio images stored locally in `storage/app/public`
- **Database:** SQLite suitable for small to medium portofolio collections
- **Pagination:** Portofolio listings paginated (12 items per page)

### Monitoring
- **Logs:** Laravel logs stored in `storage/logs/`
- **Debug:** Debug mode controlled via `APP_DEBUG` environment variable

---

## 🚨 Things to Be Careful About

### 🔒 Security Considerations
- **Authentication:** Laravel's built-in authentication with role-based access control
- **File Uploads:** Image validation enforced (jpeg, png, jpg, gif, max 2MB)
- **Admin Access:** Protected by AdminMiddleware checking user role
- **CSRF Protection:** Laravel's CSRF middleware protects forms

### Data Handling
- **Image Storage:** Files stored in `storage/app/public` - ensure proper permissions
- **Database:** SQLite file location and backup considerations for production
- **User Roles:** Admin role assignment must be done manually in database

*Updated at: 2025-01-27 15:30:00 UTC*