AppLaravel

### Developer
* Regita Lisgiani

### Built With
* [Laravel Version 5.8](https://laravel.com/)

### Package Use
* [Laravel Socialite](https://laravel.com/docs/5.8/socialite)
* [Image Intervention](http://image.intervention.io/getting_started/installation)


### Installation

1. Pertama lakukan clone project dan composer instakk untuk mengupdate laravel  ependencies
```sh
git clone https://gitlab.com/regitalisgianidrajat/saga-articles.git

composer install
```
2. Buat database menggunakan custom command yang telah saya buat dengan mengetik di terminal
```sh
php artisan db:create nama_database
```
3. Configurasi .env (dapat mengambil value dari .env example)
4. Lakukan migrate untuk table dan seeder untuk dummy data
 ```sh
php artisan migrate
php artisan db:seed
```
5. Lakukan artisan serve untuk menjalankan aplikasi
6. ====Link Website
    Website Home Page URL  http://127.0.0.1:8000/
    Website Login Page URL  http://127.0.0.1:8000/sites/login 
    Website Register Page URL  http://127.0.0.1:8000/sites/register 
    (Terdapat di navbar top left untuk memilih menu yang diinginkan)
7. ====Link Dashboard
    Dashboard Login Page URL  http://127.0.0.1:8000/admin


### API DOCUMENTATION

1. Dummy User Admin  
```sh

Role Admin

email:admin@mail.com
password:admin2021
Role Author

emaail:author@mail.com
password:author
    
### Note Dashboard
- Dashboard dapat digunakan menggunakan dua roles yaitu admin dan author
- Masing masing role mempunyai privilege menu (seperti author hanya dapat melakukan CRUD article dan category)

### Note Website
- Website homepage secara default menampilkan 5 article terbaru
- Jika di klik detail akan menuju url berdasarkan slug article 
- Category bisa dicari menggunakan slug category
- Dapat melakukan register dan login
- Dapat melakukan register dan login menggunakan facebook
- Indikator berhasil atau tidak login ditandai dengan nama di banner dan menu login menjadi logout.






