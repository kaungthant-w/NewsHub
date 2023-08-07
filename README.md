#NewsHub
##Table of Contents
* [General Information](#general-information)
* [Technologies](#technologies)
* [Features](#features)
* [Screenshots](#screenshots)
* [Setup](#setup)
* [Contact](#contact)

## General Information
Welcome to our News Hub website (https://newsapp.kyawmyothant.com/), your ultimate source for comprehensive news coverage. Our platform features a dynamic banner highlighting top stories, categorized sections for easy navigation, constantly updated latest and breaking news, dedicated segments for travel, captivating photo and video galleries, all managed through a robust admin panel with varying user roles. Join us to stay informed and engaged with a diverse range of current events and topics from around the globe.


##Technologies
* laravel 9.52.9
* Javascript
* query 3.6.0
* tailwindcss 3.0
* bootstrap 5.3.0
* CSS3
* Admin Template ( Admin LTE for Backend)


##Features
* Banner
* Categories menu
* Latest news
* Breaking news
* Travel News
* Photo Gallery
* Video Gallery

##Screenshots
![Algorithm schema]([https://github.com/kaungthant-w/NewsHub/tree/master/public/screenshoot/Group 1.png](https://github.com/kaungthant-w/NewsHub/tree/master/public/screenshoot/Group 1.png)

![Algorithm schema]([https://github.com/kaungthant-w/NewsHub/tree/master/public/screenshoot/Group 2.png](https://github.com/kaungthant-w/NewsHub/tree/master/public/screenshoot/Group 2.png)

![Algorithm schema]([https://github.com/kaungthant-w/NewsHub/tree/master/public/screenshoot/Group 3.png](https://github.com/kaungthant-w/NewsHub/tree/master/public/screenshoot/Group 3.png)

![Algorithm schema]([https://github.com/kaungthant-w/NewsHub/tree/master/public/screenshoot/Group 4.png](https://github.com/kaungthant-w/NewsHub/tree/master/public/screenshoot/Group 4.png)


##Setup
1. Install XAMPP or WAMPP
2. Open XAMPP Control panal and start [apache] and [mysql] .
   cd C:\xampp\htdocs\
3. Clone project from github
   ```
    > git clone https://github.com/kaungthant-w/NewsHub.git
   ```
4. Install package dependency
     cd NewsHub
   ```
    > npm install
    > composer install
    > composer update
   ```
5. Set the basic config
   > cp .env.example .env
   > php artisan key.generate
   
6. databasename - NewsHub
   > php artisan storage:link
   > php artisan migrate:fresh --seed
   > php artisan serve
   > npm run dev
7. Visit  http://127.0.0.1:8000/ in your favorite browser.
8. if you want to access the NewsHub super admin dashboard:
   email : admin@gmail.com
   password : password
