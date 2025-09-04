Setup:
## php artisan install:api 
# php artisan passport:install
# php artisan passport:client --personal
# php artisan migrate --path=/database/migrations/
# php artisan db:seed --class=BarangaySeeder OR php artisan db:seed
# php artisan db:seed --class=ResidentsSeeder OR php artisan db:seed

#this willl create a new model with controller & migration
# php artisan make:model {Resident} -c -m 

#Create interface
# php artisan make:interface ResidentRepositoryInterface

#Create a service provider instance
# php artisan make:provider {ResidentServiceProvider}

#Create Request Class
# php artisan make:request StoreResidentRequest
# php artisan make:request UpdateResidentRequest

#Create a resource provider instance
# php artisan make:resource ResidentResource

#Cherry-pick migration
# php artisan migrate --path=/database/migrations/2024_09_11_132738_create_residents_table.php

################################################################
prompt: 

generate a BlotterType model with controller, repository, repositoryinterface, resource, requests, provider & sample postman request

model properties:
type
description
category


## for debugging
cd /storage/logs
sudo truncate -s 0 laravel.log
less laravel.log

php artisan optimize:clear
php artisan route:clear
php artisan config:cache


## TODOs:
# fix reports on issuances / certificate
# print function for blotters
# print function for resident's profile
