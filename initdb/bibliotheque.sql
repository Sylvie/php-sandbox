USE bibliotheque;

CREATE TABLE `user` (
                             `id` int(10) unsigned NOT NULL auto_increment,
                             `name` varchar(255) collate utf8_general_ci NOT NULL default '',
                             `favourite_food` varchar(255) collate utf8_general_ci NOT NULL default '',
                             PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=10 ;

INSERT INTO `user` (`name`, `favourite_food`) VALUES
    ('Alice', 'Sushis'),
    ('Bob', 'Lasagnes');
