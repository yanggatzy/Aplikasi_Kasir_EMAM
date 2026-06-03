# Perintah Penting - Emam POS

---

## Laravel

```bash
# Jalankan development server
php artisan serve

# Migrasi database (buat tabel)
php artisan migrate

# Migrasi ulang dari awal (HAPUS semua data)
php artisan migrate:fresh

# Migrasi + isi data seeder
php artisan migrate:fresh --seed

# Jalankan seeder saja
php artisan db:seed

# Buat controller
php artisan make:controller NamaController

# Buat model
php artisan make:model NamaModel

# Buat migration
php artisan make:migration nama_tabel

# Buat seeder
php artisan make:seeder NamaSeeder

# Lihat semua route
php artisan route:list

# Clear cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear

# Generate app key
php artisan key:generate
```

---

## NPM / Vite

```bash
# Install semua package (pertama kali / setelah clone)
npm install

# Jalankan dev server (mode development, auto reload)
npm run dev

# Build untuk production
npm run build
```

---

## Git Push ke GitHub

```bash
# Cek perubahan file
git status

# Tambahkan semua file ke staging
git add .

# Commit dengan pesan
git commit -m "pesan commit kamu"

# Push ke GitHub
git push origin main
```

### Setup awal (jika repo baru)
```bash
git init
git remote add origin https://github.com/username/nama-repo.git
git branch -M main
git add .
git commit -m "first commit"
git push -u origin main
```

---

## Urutan Setup Project (setelah clone dari GitHub)

```bash
# 1. Install PHP dependencies
composer install

# 2. Install JS dependencies
npm install

# 3. Copy file environment
cp .env.example .env

# 4. Generate app key
php artisan key:generate

# 5. Buat database di phpMyAdmin / MySQL, lalu set di .env
# DB_DATABASE=emam

# 6. Migrasi + seed database
php artisan migrate:fresh --seed

# 7. Build assets
npm run build

# 8. Jalankan server
php artisan serve
```
