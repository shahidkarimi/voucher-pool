# voucher-pool

## How to Install
* Step 1: `git clone https://github.com/shahidkarimi/voucher-pool.git`
* Step 2: Change the .env file according to you database credentials
* Step 3: `composer install`
* Step 4: Run Migration `php artisan migrate`
* Step 5: Run database Seeder `php artisan db:seed`

## Unite tests
 These features are covered in unit tests
 * List all voucher codes for a particular user
 * Validate a recipeient email address
 * Validate a voucher code
 * Redeem a voucher code
 * 
 ##### Run unit tests
 To run the unit tests just enter the following command in terminal:
 `./vendor/bin/phpunit`

## How to Run the front end
If you want to run the front end to enter voucher codes and user manually do these stuff. 
Run comand: `php artisan serve`
The application will run at `http://localhost:8080`


## API Endpoints


#### List all voucher codes
    POST /api/voucher/all
###### POST JSON Payload

    {
      "email": "<valid email address>",
    }
#### Output 
```
[
    {
        "code": "XkKp8Jki",
        "offer": "Black Friday Offer"
    },
    {
        "code": "CO9UZJX3",
        "offer": "Black Firday Offer"
    },
    {
        "code": "3BAWBLAY",
        "offer": "Xit Xat Offer"
    },
    {
        "code": "MEWJ5KQY",
        "offer": "Fomxong Day"
    }
]
``` 
#### Redeem a voucher code
    POST /api/voucher/redeem
###### POST JSON Payload

    {
      "email": "<valid email address>",
      "code": "<a valid voucher code>"
    }
#### Output 
```
{
    "percentage_discount": 60
}
``` 
#### Note

You can browse Postman collection of these calls from here
https://documenter.getpostman.com/view/3208923/voucherpool-project/7EABvTZ#90d497a9-0147-d904-abf1-2c71f13d2e8f