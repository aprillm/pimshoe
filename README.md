# PIMSHOE

PIMSHOE is a pricing and inventory management system designed by Tyler Hiu, Joe Kriviski and April Morrison

## Getting Started

These instructions will get you a copy of the project up and running on your own server for development and testing purposes. See below for notes on how to deploy the project on a live system.

### Prerequisites

What things you need to install the software and how to install them

```
You will require an AWS EC2 instance, a AWS RDS instance, 
and MYSQL Workbench to properly get this program 
running and properly alter aspects of this program. Ensure 
that the RDS and EC2 are able to connect with each other and that 
you are able to connect to the RDS via MYSQL Workbench. 
```

### Installing

A step by step series of examples that tell you how to get a development env running

1. Only continue if you have properly set up AWS and RDS instances:

```
If you have completed the set up of RDS and EC2, continue to step 2
```

2. EC2

```
For this program to run correctly on your EC2 instance, ensure 
that you have installed apache and php on your EC2. PIMSHOE 
will NOT run without these two things installed. 
```

3. RDS

```
Using the provided SQL code, create the database using MYSQL workbench in your RDS. You
Will need to populate the database with you own test values. 
```

4. File Upload

```
After setting up RDS and EC2 as stated prior, change into the 
/var/www/html directory on your EC2 to upload code. Using you choice of 
upload method, populate the server with all the files that  
are provided in the PHP folder ON A SINGLE SERVER without seperating the files into different folders. 
```

End with an example of getting some data out of the system or using it for a little demo

## Running the tests

To test system, go to your EC2's IP address, the index page should come up. To test if functionality works, 
use the data you populated the database with for the search/login fields.

## Built With

* [Bootstrap](http://www.dropwizard.io/1.0.2/docs/) - CSS for HTML code
* [PHP](https://www.php.net/) - Used for scripting
* [HTML](https://html.com/) - Used for page creation
* [MYSQL Workbench](https://www.mysql.com/products/workbench/) - Used for database modification and population
* [Amazon Webservices](https://aws.amazon.com/)- Used to host RDS and EC2


## Authors

* **Tyler Hiu** - *Initial work*
* **Joe Kriviski** - *Initial work*
* **April Morrison** - *Initial work*



