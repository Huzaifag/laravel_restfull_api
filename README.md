# How to Build a REST API With Laravel: PHP Full Course

## 1.1 Introduction

A RESTful API in Laravel is an implementation of a **REST (Representational State Transfer)** architecture, which is a set of principles for designing networked applications. In Laravel, RESTful APIs allow you to expose your application's functionality and data to other systems (e.g., front-end apps, mobile apps, or third-party services) over HTTP.

### Key Concepts of RESTful APIs in Laravel:

1. **Resources**: REST revolves around resources, which are typically entities in your application (e.g., users, posts, products). Each resource is represented by a unique URL.
2. **HTTP Methods**: RESTful APIs use HTTP methods to perform actions on resources:
    - `GET`: Retrieve data (e.g., fetch a list of users or a single user).
    - `POST`: Create a new resource (e.g., add a new user).
    - `PUT/PATCH`: Update an existing resource (e.g., edit user details).
    - `DELETE`: Remove a resource (e.g., delete a user).
3. **Statelessness**: Each API request is independent and contains all the information needed to process it (e.g., authentication tokens, request data).
4. **JSON Responses**: RESTful APIs typically return data in JSON format, which is lightweight and easy to parse.

### Use Cases for RESTful APIs in Laravel:

1. **Mobile Applications**: Provide a backend for mobile apps to interact with your Laravel application (e.g., user authentication, fetching data).
2. **Single Page Applications (SPAs)**: Enable front-end frameworks like React, Vue.js, or Angular to communicate with your Laravel backend.
3. **Third-Party Integrations**: Allow external systems or services to interact with your application (e.g., payment gateways, analytics tools).
4. **Microservices Architecture**: Use RESTful APIs to enable communication between different services in a distributed system.
5. **Public APIs**: Expose parts of your application to external developers for integration (e.g., providing a weather API or e-commerce product catalog).

### Example in Laravel:

Laravel makes it easy to build RESTful APIs using **routes**, **controllers**, and **Eloquent models**. Here's a simple example:

```php
use App\Http\Controllers\UserController;

Route::get('/users', [UserController::class, 'index']); // Fetch all users
Route::get('/users/{id}', [UserController::class, 'show']); // Fetch a single user
Route::post('/users', [UserController::class, 'store']); // Create a new user
Route::put('/users/{id}', [UserController::class, 'update']); // Update a user
Route::delete('/users/{id}', [UserController::class, 'destroy']); // Delete a user
```

Each route corresponds to a specific HTTP method and action in the `UserController`. This structure adheres to RESTful principles.

## 2. Getting Started

### 2.1 Creating the Project

```bash
composer create-project "laravel/laravel:^10.0" example-app

composer global require laravel/installer

laravel new example-app

composer require laravel/sanctum
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
```

2.2 Designing and Seeding the Database

```php
php artisan make:model Costumer --all
php artisan make:model Invoice --all
```

**Relationships**

```php

//Invoice Model
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

//Customer Model
    public function invoices(): HasMany
    {
        return $this->hasMany(Invoice::class);
    }
```

**Factories**

```php
//Customer Factory
public function definition(): array
    {
        $type = $this->faker->randomElement(['individual', 'company']);
        $name = $type === 'individual' ? $this->faker->name() : $this->faker->company();
        return [
            'name' => $name,
            'type' => $type,
            'email' => $this->faker->email(),
            'address' => $this->faker->address(),
            'city' => $this->faker->city(),
            'state' => $this->faker->state(),
            'postal_code' => $this->faker->postcode(),
        ];
    }

//Invoice Factory
    public function definition(): array
    {
        $status = $this->faker->randomElement(['paid', 'billed', 'void']);
        return [
            'customer_id' => Customer::factory(),
            'amount' => $this->faker->numberBetween(100, 1000),
            'status' => $status,
            'billed_date' => $this->faker->dateTimeThisDecade(),
            'paid_date' => $status === 'paid' ? $this->faker->dateTimeThisDecade() : null,
        ];
    }
```

**Seeder**

```php
//Customer Seeder
public function run(): void
    {
        Customer::factory()
        ->count(25)
        ->hasInvoices(10)
        ->create();

        Customer::factory()
        ->count(100)
        ->hasInvoices(5)
        ->create();

        Customer::factory()
        ->count(100)
        ->hasInvoices(3)
        ->create();

        Customer::factory()
        ->count(100)
        ->create();
    }

    //Database Seeder 
    public function run(): void
    {
        $this->call([
            CustomerSeeder::class,
        ]);
    }
```


```bash
php artisan migrate:fresh --seed
```

## 3. Providing Data
### 3.1 Versioning and Defining Routes
```php

```
   00:26:17 3.2 Transforming Database Data Into JSON
   00:35:48 3.3 Filtering Data
   00:49:47 3.4 Filtering More Data
   00:58:49 3.5 Including Related Data

4. Manipulating Data
   01:05:37 4.1 Creating Resources With POST Requests
   01:14:48 4.2 Updating With PUT and PATCH
   01:22:51 4.3 Implementing Bulk Insert

5. Authentication
   01:33:41 5.1 Protecting Routes With Sanctum
   01:41:29 5.2 Authorizing Requests With Token Abilities
