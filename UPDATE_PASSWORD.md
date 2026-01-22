# Update Password di Database

## Password Asli:
- Username: `nando`
- Password asli: `example-admin1-1jan`

## Hash Password untuk Database:
```
$2y$12$h2uwg58awQ/AOj88un7IL.nR9TnGMnaJ/CFk0c37wt3bT78wWg.bm
```

## Cara Update di Database:

### Opsi 1: Menggunakan HeidiSQL/phpMyAdmin
1. Buka database `simasjid`
2. Buka tabel `user`
3. Edit record dengan username `nando`
4. Update kolom `password` dengan hash berikut:
   ```
   $2y$12$h2uwg58awQ/AOj88un7IL.nR9TnGMnaJ/CFk0c37wt3bT78wWg.bm
   ```
5. Save

### Opsi 2: Menggunakan SQL Query
```sql
UPDATE `user` 
SET `password` = '$2y$12$h2uwg58awQ/AOj88un7IL.nR9TnGMnaJ/CFk0c37wt3bT78wWg.bm' 
WHERE `username` = 'nando';
```

### Opsi 3: Menggunakan Tinker (Laravel)
```php
php artisan tinker
```
Kemudian jalankan:
```php
$user = App\Models\User::where('username', 'nando')->first();
$user->password = 'example-admin1-1jan';
$user->save();
```

## Setelah Update:
- Login dengan:
  - Username: `nando`
  - Password: `example-admin1-1jan`
