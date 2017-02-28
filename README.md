# SteamAuth
Steam Authorization


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
