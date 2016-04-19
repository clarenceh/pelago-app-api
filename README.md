Testing App for Pelago
-----------------------

### Build with
- PHP 7
- Laravel 5

### Run on
- Nginx
- MySQL

### Application information
- Name: pelago-app-api
- Description: This app provides the RESTful API backend for front-end clients

### Sample request (for local env.)
| Action | Command |
| ------ | ------- |
| List all users | curl -v http://api.pelago.app/user |
| List an user by id | curl -v http://api.pelago.app/user/{id} |
| Create a new user | curl -v -H "Content-Type: application/json" -X POST -d '{"name": "user3", "email": "user3@pelago.event", "password": "123456", "tel": "33333333", "nationality": "Taiwan"}' http://api.pelago.app/user |
| Delete an user by id | curl -v -X DELETE http://api.pelago.app/user/{id} |