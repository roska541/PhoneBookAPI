## Phone Book API

This a simple phone book api to get, store, update and delete a contact, with a simple call log history which contains the user making the call "contact_from_id" and the user reciving "contact_to_id" 

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
Make sure to add the header of each call the key: ```Accpet : application/json```  
* ```GET /contacts``` gets all the contacts in order by first name
* ```POST /contacts```  creates a new user with first name, last name and phone as required
* ```GET /conatcs/{id}``` Gets a specific contact
* ```PUT /contacts/{id}``` Updates a specific contact
* ```DELETE /contacts/{id}``` Deletes a specific contact with the call logs
* ```GET /search ``` Search a contact based on first or last name or phone number (params: first_name, last_name, phone_number)
* ```GET /contacts/call_logs/{contact_id}``` Gets the specific contact call logs

### Seeder

To test you can run the seeder command
```php artisan db:seed```
