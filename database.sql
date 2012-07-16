CREATE TABLE `administrators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;