## I used an already prepared dashboard
## Steps to setup

- Clone the project
- Navigate to the root folder of the project
- Run "composer update" command
- Use "php artisan migrate:fresh --seed" command to create the initial data needed for the system.
- Super admin credentials are: Email:(admin@admin.com), Password:(admin), Change them.

## APIs
- [DOMAIN]/api/booking/list-seats/{TRIP_ID}
- [DOMAIN]/api/booking/book-seat/{SEAT_ID}