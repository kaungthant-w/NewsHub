# NewsHub
![video gallery](public/screenshoot/Group%201.png)

## About
NewsHub is a project aimed at providing users with a centralized platform to access news articles from different sources. It is developed and maintained by [Kyaw Myo Thant](https://www.newshub.kyawmyothant.com).

## Table of Contents
* [General Information](#general-information)
* [Technologies](#technologies)
* [Features](#features)
* [Screenshots](#screenshots)
* [Setup](#setup)
* [Contact](#contact)

## General Information
Welcome to our `NewsHub` website (https://newshub.kyawmyothant.com/), your ultimate source for comprehensive news coverage. Our platform features a dynamic banner highlighting top stories, categorized sections for easy navigation, constantly updated latest and breaking news, dedicated segments for travel, captivating photo and video galleries, all managed through a robust admin panel with varying user roles. Join us to stay informed and engaged with a diverse range of current events and topics from around the globe.


## Technologies
* laravel 9.52.9
* Javascript
* query 3.6.0
* tailwindcss 3.0
* bootstrap 5.3.0
* CSS3
* Admin Template ( Admin LTE for Backend)


## Features
* Multivendor Role (SuperAdmin, Admin, editor, reporter and user )
* Permission
* Review System
* Banner
* Categories menu
* Breaking news
* Latest news
* Popular News
* Travel News
* Photo Gallery
* Video Gallery

## Screenshots

### Admin Dashboard
![video gallery](public/screenshoot/admindashboard.png)



## Setup
1. Install XAMPP or WAMPP
2. Open XAMPP Control Panel and start both Apache and MySQL services.
   ```
   cd C:\xampp\htdocs\
   ```
4. Clone the project from GitHub.
   ```
    > git clone https://github.com/kaungthant-w/NewsHub.git
   ```
5. Install package dependencies.
   ```
     cd NewsHub
    > npm install
    > composer install
    > composer update
   ```
6. Configure the basic settings.
   ```
   > cp .env.example .env
   > php artisan key.generate
   ```
   
7. Set up the database.
   Create a database named "NewsHub".
   ```
   > php artisan storage:link
   > php artisan migrate:fresh --seed
   > php artisan serve
   > npm run dev
   ```
9. Visit  http://127.0.0.1:8000/ in your favorite browser.
10. To access the NewsHub super admin dashboard:
    ```
    email : admin@gmail.com
    password : password
    ```
    


## MIT License

Copyright (c) 2023 Kyaw Myo Thant

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES, OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT, OR OTHERWISE, ARISING FROM, OUT OF, OR IN CONNECTION WITH THE SOFTWARE OR THE USE, OR OTHER DEALINGS IN THE SOFTWARE.
