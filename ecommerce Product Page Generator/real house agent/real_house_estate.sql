
CREATE TABLE `real_house_estate` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `size` varchar(200) NOT NULL,
  `garage` varchar(200) NOT NULL,
  `bedroom` varchar(200) NOT NULL,
  `bathrooms` varchar(200) NOT NULL,
  `agent` varchar(200) NOT NULL,
  `dates` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `address` varchar(20000) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

