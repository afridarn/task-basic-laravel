# Tugas Pembekalan Backend Developer ADS Intern
## Afrida Rohmatin Nuriyah

### Mini Project: Web Blog  
<br/>

### Penjelasan Tugas 1 dan 2
## Route:
```
- /
- /about
- /login
- /register
- /blogs
- /users
```

## Halaman Home ('/')  
Pada route '/' menggunakan controller `HomeController` yang merupakan controller yang hanya memiliki satu method yaitu invoke. Pada HomeController, route ini akan diarahkan ke view `home.blade.php` yang berisi 'This is Home'

## Halaman About ('/about')  
Pada route '/about' akan mengarah kepada halaman about yang menggunakan controller `PageController` dan method `about`. Pada method `about` di controller `PageController` akan mengembalikan view `about.blade.php`. Di dalam `about.blade.php`, menggunakan beberapa component seperti component `app-layout2` yang didalamnya memuat `navigation bar` serta ada juga component `card` untuk menampung isi dari content About yang dapat mengirimkan data `title`. Dapat dilihat di source code, untuk memanggil component dapat menggunakan  
```php
<x-app-layout2>
```
dan
```php  
<x-card>
```  

## Halaman Login ('/login')  
Pada route ('/login') akan mengarah kepada halaman login yang menggunakan controller `PageController` dan method `login`. Pada method `login` di controller `PageController` akan mengembalikan view `login.blade.php`. Di dalam `login.blade.php`, menggunakan beberapa component seperti component `app-layout2` yang didalamnya memuat `navigation bar` serta ada juga component `input` untuk membuat form dengan mengirimkan data seperti id input dan name input. Selain itu, pada login terdapat juga component `button` yang digunakan untuk menampilkan button dengan mengirimkan data berupa type button dan class button. Dapat dilihat di source code, untuk memanggil component dapat menggunakan  
```php
<x-app-layout2>
```
```php  
<x-input>
```  
```php  
<x-button>
```  

## Halaman Register ('/register')  
Pada route ('/register') akan mengarah kepada halaman register yang menggunakan controller `PageController` dan method `register`. Pada method `register` di controller `PageController` akan mengembalikan view `register.blade.php`. Di dalam `register.blade.php`, menggunakan beberapa component seperti component `app-layout2` yang didalamnya memuat `navigation bar` serta ada juga component `input` untuk membuat form dengan mengirimkan data seperti id input dan name input. Selain itu, pada register terdapat juga component `button` yang digunakan untuk menampilkan button dengan mengirimkan data berupa type button dan class button. Dapat dilihat di source code, untuk memanggil component dapat menggunakan  
```php
<x-app-layout2>
```
```php  
<x-form.type.input>
```  
```php  
<x-form.type.button>
```  

## Halaman Blogs ('/blogs')  
Pada route ('/blogs') akan mengarah kepada halaman blogs yang akan menampilkan seluruh blogs yang dimiliki web ini. Route ini menggunakan controller `BlogController` dan method `index`. Pada method `index` di controller `BlogController` terdapat variabel `$blogs` yang menyimpan data array dari kumpulan blog kemudian akan mengembalikan view `blogs.blade.php` serta mengirimkan data `$blogs` tadi. Di dalam `blogs.blade.php`, menggunakan beberapa component seperti component `app-layout2` yang didalamnya memuat `navigation bar` serta ada juga looping menggunakan `@foreach` untuk menampilkan `$blogs` yang dikirim dari `BlogController`. Selain itu, pada register terdapat juga component `button` yang digunakan untuk menampilkan button dengan mengirimkan data berupa type button dan class button. Dapat dilihat di source code, untuk memanggil component dapat menggunakan  
```php
<x-app-layout2>
```
```php  
<x-card>
```  
```php  
<x-form.type.button>
```  

## Halaman Users ('/users')
Pada route ('/users') akan mengarah kepada halaman users yang akan menampilkan seluruh data user yang disimpan di `UserController`. Route ini menggunakan controller `UserController` dan method `index`. Pada method `index` di controller `UserController` akan mengembalikan view `index.blade.php`. Di dalam `index.blade.php`, menggunakan beberapa component seperti component `app-layout2` yang didalamnya memuat `navigation bar` serta ada juga component `card` untuk menampilkan tabel, yang di dalam tabel tersebut digunakan looping `@foreach` untuk menampikan seluruh user dari `$users` yang dikirim oleh `UserController`. Selain itu, pada users terdapat **middleware** adminkey yang terdapat di `AuthHelper.php`. Di mana jika tidak menuliskan key tersebut maka halaman users tidak dapat diakses dan menampilkan **403 Forbidden** Dapat dilihat di source code, untuk memanggil component dapat menggunakan  
```php
<x-app-layout2>
```
```php  
<x-card>
```  

## Penjelasan Tugas 3  
In the process of writing