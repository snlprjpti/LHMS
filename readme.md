1. clone it from git. 
2. run composer update.
3. Make database and name it 'lhms'

4. Run the following command to generate your app key:
   php artisan key:generate
   php artisan migrate:fresh --seed
5. Then start your server:
   php artisan serve
6. credentials
admin
    email = admin@gmail.com
    password = admin
 
 Staff
    email = staff@gmail.com
    password = staff
        
 Employee
    email = employee@gmail.com
    password = employee
