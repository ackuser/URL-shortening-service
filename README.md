# URL-shortening-service
Technical Test
Produce a URL shortening service of your own. Think http://bit.ly or http://goo.gl.

It must be built using PHP and MySQL. We would like you to host it at your own URL as well as host the source code in a public GitHub or Bitbucket repository.

You must demonstrate the following;
1. Knowledge of MVC development.
2. Ability to follow PSR standards, specifically 0 to 2.
3. Knowledge of database best practices.
4. Ability to create simple but effective user interfaces (use of front-end frameworks are acceptable).
5. Show us DRY, extensible development. (http://en.wikipedia.org/wiki/Don%27t_repeat_yourself)
You must avoid using an open source PHP framework, but plugin and open source libraries are acceptable.

## Prerequisite

I suppose we already have a basic LAMP environment installed

Clone the project under /var/www

```
$ cd /var/www
```
```
$ git clone git@github.com:ackuser/URL-shortening-service.git
```

Restart MySQL and Apache

```
$ /etc/init.d/mysql restart
```
```
$ apache2ctl restart
```

## Configure DB

Restore the db from terminal, example

```
$ cd DumpURLShortServices
```
```
$ mysql -u root -p URLss < /URLss_URLShortServices.sql
```

Check the details of the connection in backend.php and modify it putting your own password if necessary

```
$servername = "localhost";
$username = "root";
$password = '';
$dbname = "URLss";
```
## Usage

Check it online

go to (http://localhost/URL-shortening-service/)

Then you can insert a long url, as long as you want to make it shorter

NOTE: For simplicity I didn't parse some errors we can get back, neither I put the configuration of the domain nor Database with more than one table (not in the requirements). I am also sending back to the client all the
data from the db.


## Testing only backend

Post request with data

```
$ curl 'http://localhost/URL-shortening-service/backend.php' -H 'Content-Type: application/x-www-form-urlencoded; charset=UTF-8' --data 'url=http://testingreallylongislikethis.com'
```

NOTE: use a different url in the curl each time you are testing only backend.


### Next release, suggestions:

* PHPUnit
* Composer
* Pagination
* Plugin
* More PSR standards oriented
* Parser errors
* Apache configuration for a LAMP environment
* Apache Virtual Host configuration for our domain
