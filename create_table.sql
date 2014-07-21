CREATE TABLE IF NOT EXISTS `articles` (
  `article_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `article_title` varchar(255) DEFAULT NULL,
  `article_text` text,
  `username` varchar(100) default NULL,
  PRIMARY KEY (`article_id`)
) ENGINE=InnoDB DEFAULT  CHARSET=utf8 AUTO_INCREMENT=5;

CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `comment_user_name` varchar(255) DEFAULT NULL,
  `comment_text` text,
  `article_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `fk_comments_articles_idx` (`article_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;
 
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comments_articles` FOREIGN KEY (`article_id`)
  REFERENCES `articles` (`article_id`) ON DELETE CASCADE ON UPDATE CASCADE;

CREATE TABLE IF NOT EXISTS `USERS`(
`id` mediumint(8) unsigned NOT NULL auto_increment,
`username` varchar(100) NOT NULL,
`password` varchar(80) NOT NULL,
`email` varchar(125) NOT NULL,
`full_name` varchar(200) NOT NULL,
`created_at` datetime default NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=20;

CREATE TABLE IF NOT EXISTS `ci_sessions` (
session_id varchar(40) DEFAULT '0' NOT NULL,
ip_address varchar(16) DEFAULT '0' NOT NULL,
user_agent varchar(120) NOT NULL,
last_activity int(10) unsigned DEFAULT 0 NOT NULL,
user_data text NOT NULL,
PRIMARY KEY (session_id),
KEY `last_activity_idx` (`last_activity`)
);
-- Dump data to table `articles`

INSERT INTO `articles` (`article_id`, `article_title`, `article_text`) VALUES
(1, 'Combine two email contact forms?', 'Hi,I have a email contact form that works fine - it has one textfield and a submit-button...'),
(2, 'Images only showing in index template', 'My template images are only showing in the index template.
      The   Javascript was doing the same until I added {site_url} to the path.  I tried that with the images and they show in view rendered Template but not on the live site page. What am I doing wrong?'),
(3, 'PHP Syntax viewable in view source code', 'I have a template that require PHP syntax. On the preferences option, i allowing PHP and set the PHP parsing stage to output...');

-- Dump data to table `comments`

INSERT INTO `comments` (`comment_id`, `comment_user_name`, `comment_text`, `article_id`) VALUES
(4, 'Giraffentoast', 'Not to sound harsh, but how is this connected to ExpressionEngine?', 2),
(5, 'Giraffentoast', 'Your paths are most probably wrong.', 2),
(6, 'Giraffentoast', 'That’s not possible.', 2);
