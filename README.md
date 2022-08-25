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
Membuat `table users` melalui migration dengan kolom-kolom yang diminta pada soal
```php
public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('city');
            $table->timestamps();
        });
    }  
```  
Membuat `table stores` melalui migration. Tabel stores memiliki relasi dengan tabel users yaitu one to one sehingga ada column `user_id` sebagai foreign key yang mereference ke `tabel users` column id  
```php
 public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('name', 45);
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }
```
Membuat `table products` melalui migration. Tabel products memiliki relasi dengan tabel stores yaitu many to one sehingga terdapat column `store_id` sebagai foreign key yang mereference ke `tabel stores` dengan column id
```php
public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->double('price');
            $table->longText('description');
            $table->string('photo');
            $table->foreignId('store_id')->constrained();
            $table->timestamps();
        });
    }
```
Membuat `table product_reviews` melalui migration. Tabel product_reviews memiliki relasi dengan tabel products yaitu many to one sehingga terdapat column `product_id` sebagai foreign key yang mereference ke `table products` dengan column id. Selain itu, tabel ini juga memiliki relasi ke tabel users yaitu many to one sehingga terdapat column `user_id` sebagai foreign key yang mereference ke `table users` tepatnya column id.  
```php
public function up()
    {
        Schema::create('product_reviews', function (Blueprint $table) {
            $table->id();
            $table->integer('score');
            $table->string('review');
            $table->foreignId('product_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }
```
Membuat `factory` untuk user pada file `UserFactory.php` agar mengembalikan data dummy yang diminta
```php
public function definition()
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'city' => fake()->city(),
        ];
    }
```
Memanggil `UserFactory` di `DatabaseSeeder.php` agar saat seeder dijalankan data users dapat terbentuk
```php
  public function run()
    {
        \App\Models\User::factory(10)->create();
    }
```  
Membuat 3 file seeder: `StoreSeeder.php`, `ProductSeeder.php`, dan `ProductReviewSeeder.php` untuk membuat data dummy masing-masing table. Di sini saya menggunakan factory via seeder dengan menjalankan looping untuk 10 data menggunakan bantuan faker 

**StoreSeeder.php**
```php
public function run()
    {
        //
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {
            DB::table('stores')->insert([
                'name'    => Str::ucfirst($faker->asciify('**** store')),
                'user_id' => $faker->numberBetween(1, 10),
                'created_at' => $created_at = now()->subDays(rand(1, 100)),
                'updated_at' => $created_at
            ]);
        }
    }
```
**ProductSeeder.php**
```php
 public function run()
    {
        //
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {
            DB::table('products')->insert([
                'name'    => Str::ucfirst($faker->word()),
                'slug'      => $faker->unique()->slug(),
                'price'       => $faker->randomFloat(2, 1000, 100000),
                'description' => Str::ucfirst($faker->paragraph()),
                'photo'       => $faker->imageUrl(),
                'store_id'    => $faker->numberBetween(1, 10),
                'created_at' => $created_at = now()->subDays(rand(1, 100)),
                'updated_at' => $created_at
            ]);
        }
    }
```
**ProductReviewSeeder.php**
```php
public function run()
    {
        //
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {
            DB::table('product_reviews')->insert([
                'score' => $faker->numberBetween(1, 10),
                'review' => Str::ucfirst($faker->paragraph()),
                'product_id' => $faker->numberBetween(1, 10),
                'user_id' => $faker->numberBetween(1, 10),
                'created_at' => $created_at = now()->subDays(rand(1, 100)),
                'updated_at' => $created_at
            ]);
        }
    }
```  
Memanggil class masing-masing seeder dalam `DatabaseSeeder.php`  
```php
  public function run()
    {
        \App\Models\User::factory(10)->create();
        $this->call(StoreSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ProductReviewSeeder::class);
    }
```  
  
Menjalankan command **php artisan migrate --seed**