## Rakamin Chat App

How to run project : 

- Clone Repository
- Run
<pre><code>
composer install
</code></pre>
- Setup .env file, you can copy from .env.example
- Add or change .env configuration  below
<pre><code>
BROADCAST_DRIVER=pusher
</code></pre>
<pre><code>
PUSHER_APP_ID=1318124
PUSHER_APP_KEY=eb15b075d9c4b7393b60
PUSHER_APP_SECRET=36b442187ba1babb99b2
PUSHER_APP_CLUSTER=ap1
</code></pre> 
- Add database configuration example : 
<pre><code>
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=rakamin_whatsapp_api_service
DB_USERNAME=root
DB_PASSWORD=
</code></pre>
- Run code below using terminal
<pre><code>
php artisan key:generate
</code></pre>
- Run Laravel Migration to create tables
<pre><code>
php artisan migrate
</code></pre>
- Run Laravel Seeder to fill data dummy
<pre><code>
php artisan db:seed
</code></pre>
- Run Laravel Development Server
<pre><code>
php artisan serve
</code></pre>
- Access to http://127.0.0.1:8000/

##User Dummy
<table>
    <tr>
        <th>Email</td>
        <th>Password</td>
    </tr>
    <tr>
        <th>ahmad@gmail.com</td>
        <th>ahmad123</td>
    </tr>
    <tr>
        <th>budi@gmail.com</td>
        <th>budi123</td>
    </tr>
    <tr>
        <th>lukman@gmail.com</td>
        <th>lukman123</td>
    </tr>
    <tr>
        <th>kevin@gmail.com</td>
        <th>kevin123</td>
    </tr>
</table>
