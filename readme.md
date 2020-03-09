## Phone Book API

This a simple phone book api to get, store, update and delete a contact. 

### Set Up

* Clone the repo to your local environment
* run ```composer update```
* Update your .env file to point to your database
* Then run ```php artisan config:clear``` to reflect the new database
* run ```php artisan migrate```
### Models & Database

#### Contact: 
Use to store the contact with the following parameters
* First Name
* Last Name
* Address
* Company
* Phone Number ( unique )


#### Call Logs
Use to store the calls between contacts

* contact From ID
* contact To ID
* outbound 
* inbound 
* voicemail 

### Routes

* ```GET /contacts``` gets all the contacts in order by first name
* ```POST /contacts```  creates a new user with first name, last name and phone as required
* ```GET /conatcs/{id}``` Gets a specific contact
* ```PUT /contacts/{id}``` Updates a specific contact
* ```DELETE /contacts/{id}``` Deletes a specific contact with the call logs
* ```GET /search ``` Search a contact based on first or last name or phone number
* ```GET /contacts/call_logs/{contact_id}``` Gets the specific contact call logs

### Seeder

To test you can run the seeder command
```php artisan db:seed```
