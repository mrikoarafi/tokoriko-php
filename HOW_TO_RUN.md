# 🛍️ TokoRiko - Quick Setup

## Installation

```bash
# 1. Install dependencies
composer install
npm install

# 2. Environment setup in your terminal
cp .env.example .env
php artisan key:generate

# 3. Database setup (edit .env for your database)
php artisan migrate
```

## Running

**Development (2 terminals):**

```bash
# Terminal 1
php artisan serve

# Terminal 2
npm run dev
```
