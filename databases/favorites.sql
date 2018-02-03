DROP TABLE IF EXISTS `system_user_favorite`;
CREATE TABLE `system_user_favorite`(
`favorite_id` INT(11) NOT NULL,
`stuff_id` INT(11) NOT NULL,
`user_id` INT(11) NOT NULL,
`enterprise_id` INT(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `system_user_favorite`
  ADD PRIMARY KEY (`favorite_id`);

ALTER TABLE `system_user_favorite`
  MODIFY `favorite_id` INT(11) NOT NULL AUTO_INCREMENT;
