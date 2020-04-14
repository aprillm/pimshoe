# PIMSHOE

PIMSHOE is a pricing and inventory management system designed by Tyler Hiu, Joe Kriviski and April Morrison

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

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
Using the ERD, set up your database using MYSQL Workbench and 
populate the fields with test values
```

4. File Upload

```
After setting up RDS and EC2 as stated prior, change into the 
/var/www/html directory on your EC2 to upload code. Using you choice of 
upload method, populate the server with all the files that 
are provided. 
```

End with an example of getting some data out of the system or using it for a little demo

## Running the tests

To test system, go to your EC2's IP address, the index page should come up. 

### Break down into end to end tests

Explain what these tests test and why

```
Give an example
```

### And coding style tests

Explain what these tests test and why

```
Give an example
```

## Deployment

Add additional notes about how to deploy this on a live system

## Built With

* [Bootstrap](http://www.dropwizard.io/1.0.2/docs/) - CSS for HTML code
* [PHP] (https://www.php.net/) - Used for scripting
* [HTML](https://html.com/) - Used for page creation
* [MYSQL Workbench](https://www.mysql.com/products/workbench/) - Used for database modification and population
* [Amazon Webservices] (https://aws.amazon.com/)- Used to set up RDS and EC2

## Contributing

Please read [CONTRIBUTING.md](https://gist.github.com/PurpleBooth/b24679402957c63ec426) for details on our code of conduct, and the process for submitting pull requests to us.

## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, see the [tags on this repository](https://github.com/your/project/tags). 

## Authors

* **Billie Thompson** - *Initial work* - [PurpleBooth](https://github.com/PurpleBooth)

See also the list of [contributors](https://github.com/your/project/contributors) who participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Acknowledgments

* Hat tip to anyone whose code was used
* Inspiration
* etc
