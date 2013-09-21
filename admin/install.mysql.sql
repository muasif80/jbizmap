CREATE TABLE IF NOT EXISTS `jm311_jbizmap_biz` (
  `biz_id` int(11) NOT NULL AUTO_INCREMENT,
  `bizname` varchar(50) NOT NULL,
  `bizaddress` varchar(50) NOT NULL,
  `bizloclat` varchar(20) NOT NULL,
  `bizloclng` varchar(20) NOT NULL,
  `bizphone` varchar(50) NOT NULL,
  `bizemail` varchar(50) NOT NULL,
  `bizwebsite` varchar(250) NOT NULL,
  `bizcategory` varchar(50) NOT NULL,
  `bizdescription` text NOT NULL,
  `bizcontactname` varchar(50) NOT NULL,
  PRIMARY KEY (`biz_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
