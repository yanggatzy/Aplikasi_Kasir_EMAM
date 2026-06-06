# Perintah Penting - Emam POS

---

## Setup Awal (Fresh Clone dari GitHub)

Ikuti urutan ini dari atas ke bawah, jangan dilewat.

**Requirement:** PHP 8.3+, Composer, Node.js, MySQL (Laragon)

```bash
# 1. Clone repo
git clone https://github.com/username/nama-repo.git
cd nama-repo

# 2. Install PHP dependencies
composer install

# 3. Copy file environment
cp .env.example .env        # Linux/Mac
copy .env.example .env      # Windows CMD
Copy-Item .env.example .env # Windows PowerShell

# 4. Generate app key
php artisan key:generate
```

**5. Buat database MySQL dulu** — buka phpMyAdmin atau MySQL, buat database baru bernama `emam`.

```bash
# 6. Edit .env — ubah bagian database:
#   DB_CONNECTION=mysql
#   DB_HOST=127.0.0.1
#   DB_PORT=3306
#   DB_DATABASE=emam
#   DB_USERNAME=root
#   DB_PASSWORD=

# 7. Migrasi + isi data awal
php artisan migrate:fresh --seed

# 8. Install JS dependencies
npm install

# 9. Build assets (untuk pertama kali)
npm run build
```

**Selesai.** Lanjut ke bagian "Jalankan Development" di bawah.

---

## Jalankan Development (Sehari-hari)

Buka **2 terminal** dan jalankan masing-masing:

```bash
# Terminal 1 — Laravel server
php artisan serve

# Terminal 2 — Vite (auto reload CSS/JS)
npm run dev
```

Atau pakai 1 perintah sekaligus (semua jalan bersamaan):

```bash
composer run dev
```

Buka browser → `http://localhost:8000`

---

## Database

```bash
# Migrasi + isi ulang data (HAPUS semua data lama)
php artisan migrate:fresh --seed

# Migrasi saja (tanpa hapus data)
php artisan migrate

# Isi seeder saja (tanpa migrasi ulang)
php artisan db:seed
```

---

## Clear Cache

```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear
php artisan optimize:clear #sering di pake yang ini
```

---

## Artisan — Buat File Baru

```bash
php artisan make:controller NamaController
php artisan make:model NamaModel
php artisan make:migration nama_tabel
php artisan make:seeder NamaSeeder

# Lihat semua route
php artisan route:list
```

---

## NPM / Vite

```bash
# Install ulang package (setelah clone / ada perubahan package.json)
npm install

# Dev mode (auto reload, pakai ini saat development)
npm run dev

# Build untuk production
npm run build
```

---

## Git

```bash
# Cek perubahan
git status

# Tambah semua file
git add .

# Commit
git commit -m "pesan commit kamu"

# Push ke GitHub
git push origin main
```

### Setup remote (sekali saja, kalau repo baru)
```bash
git init
git remote add origin https://github.com/username/nama-repo.git
git branch -M main
git add .
git commit -m "first commit"
git push -u origin main
```
