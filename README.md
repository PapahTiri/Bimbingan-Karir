<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Poliklinik

Aplikasi manajemen poliklinik berbasis Laravel 12 dan laravel breeze.

## Fitur

- Manajemen user (dokter, pasien)
- Jadwal periksa dokter
- Pembuatan janji periksa pasien
- Pemeriksaan dan detail periksa
- Manajemen obat

## Instalasi

1. **Clone repository**
   ```sh
   git clone https://github.com/PapahTiri/poliklinik.git
   cd poliklinik
   ```

2. **Install dependency PHP & JS**
   ```sh
   composer install
   npm install
   ```

3. **Copy file environment**
   ```sh
   cp .env.example .env
   ```

4. **Generate key aplikasi**
   ```sh
   php artisan key:generate
   ```

5. **Migrasi dan seed database**
   ```sh
   php artisan migrate --seed
   ```

6. **Jalankan server**
   ```sh
   php artisan serve
   ```

7. **Jalankan Vite (opsional, untuk asset frontend)**
   ```sh
   npm run dev
   ```

## Struktur Folder

- `app/` : Kode aplikasi (model, controller, dsb)
- `database/` : Migrasi dan seeder database
- `routes/` : Routing aplikasi
- `resources/` : View dan asset frontend
- `public/` : Public root untuk web server

## Kontribusi

Pull request dan issue sangat diterima!

## Lisensi

MIT
