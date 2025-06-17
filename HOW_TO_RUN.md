# 🛍️ TokoRiko - Quick Setup

## Installation

```bash
# 1. Clone repository
git clone <repository-url>
cd tokoriko

# 2. Install dependencies
composer install
npm install

# 3. Environment setup
cp .env.example .env

# 4. Database setup (edit .env for your database)
php artisan migrate
php artisan storage:link
```

## Running

**Development (2 terminals):**

```bash
# Terminal 1
php artisan serve

# Terminal 2
npm run dev
```
