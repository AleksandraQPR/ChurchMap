CREATE DATABASE koscioly;
USE koscioly;

CREATE TABLE `churches` (
  `id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `longitude` float NOT NULL,
  `latitude` float NOT NULL,
  `altitude` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `churches`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `churches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,