## Project : WalletTrail
# By: Amrita Singh 300352629

## Deployment Instruction for WalletTrail

Please follow the execute command/followig instruction step by step to get the project up and running

1. Do a composer install
> composer install

2. Do an npm install
> npm install

3. Execute migrations with seed
> php artisan migrate --seed

4. Inside the database/sql folder, there is an sql file named WalletTrailTestData.sql. Run that file to add an account and some data for testing.

7. Finally start server
> php artisan serve

## Credentials

1. For testing Admin page, please use the following credentials, as Admin account cannot be created.
Email: admin@admin.com
Password: password

2. Credentials for test user account that we added through sql script. (or you can create your own account)
Email: test@test.com
Password: password