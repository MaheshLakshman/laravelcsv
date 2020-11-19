<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Laravel with CSV file upload

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

### Login

#### 1. Register a User

 Method = POST,

 Url = localhost/laravelcsv/public/api/register

 Authorization = No

 Parameters = 

           {
            "name":"mahesh",
            "email":"maheshlakshmananc@gmail.com",
            "password":"12345678",
            "password_confirmation":"12345678"
            }

Response

       {
            "success": true,
            "msg": "Registered Successfully..!"
        }
#### 2. Login


 Method = POST,

 Url = localhost/laravelcsv/public/api/login

 Authorization = No

 Parameters = 

           {
            "email":"maheshlakshmananc@gmail.com",
            "password":"12345678"
            }

Response

        {
            "success": true,
            "data": {
                "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL2xhcmF2ZWxjc3ZcL3B1YmxpY1wvYXBpXC9sb2dpbiIsImlhdCI6MTYwNTc2NzI3NiwiZXhwIjoxNjA1NzcwODc2LCJuYmYiOjE2MDU3NjcyNzYsImp0aSI6Im5QM0ZmYk5TMTZSNHYzMmEiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.zbALhoCYX_b8_uesFhOvGAGag42f3nLxMOu1Od92pgs",
            "token_type": "bearer",
            "expires_in": 3600
        }
}

### 3.Upload csv file

 Method = POST,

 Url = localhost/laravelcsv/public/api/auth/upload

 Authorization = Yes (Pass your token from login api)

Parameters = (use form-data file option in postman)

           
            csv_file <button class="button-save large">Big Fat Button</button>,
            
Response

           {
                "success": true,
                "msg": "Success"
            }
