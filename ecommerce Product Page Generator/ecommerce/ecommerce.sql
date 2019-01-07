 CREATE TABLE IF NOT EXISTS `tbl_ecommerce` (  
  `id` int(11) NOT NULL AUTO_INCREMENT,  
  `name` varchar(255) NOT NULL,  
  `image` varchar(255) NOT NULL,  
  `price` double(10,2) NOT NULL,  
  PRIMARY KEY (`id`)  
 ) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;  