[![script-version](https://img.shields.io/badge/Version-1.0-blue.svg)]() [![php-version](https://img.shields.io/badge/PHP-=>5.5-lightgrey.svg)]() 
#SAuth
Steam Authorization

##Installation
Open file `__sAuthConfig.php`
```php
$__SteamAPI = "YOUR_STEAM_API_KEY";
```
<br />
<br />

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

###Ussing lib

###ERROR MySQL
>`SERVER_NAME` - php_network_getaddresses: getaddrinfo failed: Name or service not known
<br />
`USER_NAME`   - Access denied for user ''@'`SERVER_NAME`' (using password: YES)
<br />
`PASSWORD`    - Access denied for user '`USER_NAME`'@'`SERVER_NAME`' (using password: YES)
<br />
`DB_NAME`    - Access denied for user '`USER_NAME`'@'`SERVER_NAME`' to database '`DB_NAME`'
<br />


fdgdfg
