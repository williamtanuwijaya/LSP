# UCOK UNIVERSITY

Projek ini adalah membuat suatu website pendaftaran calon mahasiswa baru

## Cara Penggunaan

Silahkan untuk git clone project nya

```bash
git clone https://github.com/LSP-P1-UMDP-Skema-Pengembang-Web/batch-6-asesor-faris-williamtanuwijaya.git
```

Setelah di git clone lakukan ini
```bash
cd batch-6-asesor-faris-williamtanuwijaya
```

Setelah itu lakukan konfigurasi
```
composer install
```

dan
```
npm install
```
Silahkan copy file .env.example dan buat file .env dan sesuaikan dengan databasenya.

Setelah itu silahkan untuk melakukan migrasi
```
php artisan migrate
```

Setelah migrate silahkan untuk masukkan seeder akun Admin
```
php artisan db:seed --class=AdminSeeder
```

Setelah dijalankan buka 2 terminal satu nya menjalankan
```
npm run dev
```

Satu nya lagi menjalankan
```
php artisan serve
```

## Authors

- [William Tanuwijaya 2226250012](https://www.github.com/williamtanuwijaya)