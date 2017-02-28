# SteamAuth
Steam Authorization


##MySQL Create Table

CREATE TABLE IF NOT EXISTS `users` (    `id` int(11) NOT NULL,     `type` int(11) NOT NULL,    `login` text NOT NULL,    `steamid` varchar(70) NOT NULL,    `img` text NOT NULL,    `img_m` text NOT NULL,    `img_f` text NOT NULL) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
