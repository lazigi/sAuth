[![script-version](https://img.shields.io/badge/Version-1.0-blue.svg)]() [![php-version](https://img.shields.io/badge/PHP-=>5.5-lightgrey.svg)]() 

#sAuth
Steam Authorization
<br><br><br>
##Installation
Open file `__sAuthConfig.php` and change the following variables for its values
- change `$__sAuth_API` to your API-KEY from http://steamcommunity.com/dev/apikey
- change `$__sAuth_URL_SITE` to your domain name.
<br>
If you are going to use the database, change the value of the variable `$__sAuth_MySQL` to `true`
```php
$__sAuth_MySQL =              true;
```
>SQL query to create a table [here](#create-mysql-table)

<br>
if you need to update user information (a nickname or change the image or url), change the value of the variable `$__sAuth_MySQL_Update` to the true
```php
$__sAuth_MySQL_Update =       true;
```
>Update function only works with `$__sAuth_MySQL`

<br><br><br>
##Redirects
After login script redirects here `$__sAuth_LOGIN`<br>
>Example
```php
$__sAuth_LOGIN =  "/After_login";
```

</br>
After leaving the site redirects the user to the script here `$__sAuth_LOGOUT`
>Example
```php
$__sAuth_LOGOUT =  "/After_leaving";
```

<br><br><br>
##Create MySQL Table
```sql
CREATE TABLE IF NOT EXISTS users ( 
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  login text NOT NULL,
  steamid varchar(70) NOT NULL,
  img text NOT NULL,
  img_m text NOT NULL,
  img_f text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
```
<br />

###If you encounter an error during installation
>php_network_getaddresses: getaddrinfo failed: Name or service not known

---OR---
<br>
>php_network_getaddresses: getaddrinfo failed: Name or service not known

---OR---
<br>
>Access denied for user '`USER_NAME`'@'`SERVER_NAME`' (using password: YES)

---OR---
<br>
>Access denied for user '`USER_NAME`'@'`SERVER_NAME`' to database '`DB_NAME`'

Please check variables for connection database.
<br><br><br>
###Using library
For the script required [OpenID](http://openid.net/developers/libraries/) library





