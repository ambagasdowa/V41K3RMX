CREATE DATABASE viker_stuff;
USE viker_stuff;

CREATE TABLE `system_users` (
  `user_id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `type` tinyint(2) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `membership_id` int(11) DEFAULT NULL,
  `company` varchar(10) DEFAULT NULL,
  `lang` varchar(5) DEFAULT NULL,
  `active` tinyint(2) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT NULL
);


INSERT INTO `system_users` (`user_id`, `member_id`, `username`, `password`, `type`, `first_name`, `last_name`, `bio`, `membership_id`, `company`, `lang`, `active`, `date_created`) VALUES(1, 4895, 'administrator', '7c4a8d09ca3762af61e59520943dc26494f8941b', 3, 'ATR', 'Agent', NULL, 5, 'TIA', 'EN', 1, '2016-11-24 20:13:33');

ALTER TABLE `system_users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `system_users_system_user_type_type_id_fk` (`type`),
  ADD KEY `system_users_membership_type_id_fk` (`membership_id`);

ALTER TABLE `system_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

CREATE TABLE `system_user_type`(
  `type_id` tinyint(2) NOT NULL DEFAULT '0',
  `type` varchar(20) DEFAULT NULL,
  `description` text
);

INSERT INTO `system_user_type` (`type_id`, `type`, `description`) VALUES
(1, 'administrator', NULL),
(2, 'verifier', NULL),
(3, 'agent', NULL),
(4, 'customer', NULL),
(5, 'traveler', NULL),
(6, 'content', NULL);

ALTER TABLE `system_user_type`
  ADD PRIMARY KEY (`type_id`);


CREATE TABLE `validations` (
  `user_id` int(11) NOT NULL DEFAULT '0',
  `is_supervisor` tinyint(2) DEFAULT NULL,
  `signed_agree` tinyint(2) DEFAULT NULL,
  `signed_on` datetime DEFAULT NULL,
  `val` tinyint(2) DEFAULT NULL,
  `val_on` datetime DEFAULT NULL,
  `unsubscribe` tinyint(2) DEFAULT NULL
);

INSERT INTO `validations` (`user_id`, `is_supervisor`, `signed_agree`, `signed_on`, `val`, `val_on`, `unsubscribe`)
    VALUES(1, 1, 1, '2016-05-25 10:49:12', 1, '2016-05-25 10:48:07', NULL);

ALTER TABLE `validations`
  ADD PRIMARY KEY (`user_id`);



CREATE VIEW `vw_system_users`  AS
    select
        `system_users`.`user_id` AS `user_id`,
        `system_users`.`username` AS `username`,
        `system_users`.`password` AS `password`,
        `system_users`.`first_name` AS `first_name`,
        `system_users`.`last_name` AS `last_name`,
        `system_users`.`bio` AS `bio`,
        `system_users`.`membership_id` AS `membership_id`,
        `system_users`.`company` AS `company`,
        `system_users`.`lang` AS `lang`,
        `system_users`.`active` AS `active`,
        `system_users`.`date_created` AS `date_created`,
        `validations`.`val` AS `val`,
        `validations`.`val_on` AS `val_on`,
        `validations`.`signed_agree` AS `signed_agree`,
        `validations`.`signed_on` AS `signed_on`,
        `validations`.`is_supervisor` AS `is_supervisor`,
        `validations`.`unsubscribe` AS `unsubscribe`,
        `system_user_type`.`type` AS `type`,
        `system_users`.`member_id` AS `member_id`,
        `system_user_type`.`type_id` AS `type_id`
        from (((`system_users`
                left join `validations`
                    on((`system_users`.`user_id` = `validations`.`user_id`)))
                left join `system_user_type`
                    on((`system_users`.`type` = `system_user_type`.`type_id`))
              ));



DROP IF EXISTS `enterprise_stuff`;
CREATE TABLE `enterprise_stuff`(
`stuff_id` INT(11) NOT NULL,
`enterprise_id` INT(11) NOT NULL,
`category_id` INT(11) NOT NULL NULL,
`name_stuff` TEXT DEFAULT NULL,
`desc_stuff` TEXT DEFAULT NULL,
`price_stuff` DECIMAL (10,2) DEFAULT NULL,
`time_stuff` TIME DEFAULT NULL,
`min_items` VARCHAR(4) DEFAULT '1',
`max_items` VARCHAR(4) DEFAULT '20',
`stock_stuff` tinyINT(2) DEFAULT TRUE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `enterprise_stuff`;
  ADD PRIMARY KEY (`stuff_id`);

ALTER TABLE `enterprise_stuff`
  MODIFY `stuff_id` INT(11) NOT NULL AUTO_INCREMENT;

DROP IF EXISTS `category_stuff`;
CREATE TABLE `category_stuff`(
`category_id` INT(11) NOT NULL,
`enterprise_id` INT(11) NOT NULL,
`tab_cat` INT(11) NOT NULL NULL,
`name_cat` TEXT DEFAULT NULL,
`desc_cat` TEXT DEFAULT NULL,
`active_cat` tinyINT(2) DEFAULT TRUE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `category_stuff`
  ADD PRIMARY KEY (`category_id`);

ALTER TABLE `category_stuff`
  MODIFY `category_id` INT(11) NOT NULL AUTO_INCREMENT;



DROP TABLE IF EXISTS `order_enterprise`;
CREATE TABLE `order_enterprise`(
`order_id` INT(11) NOT NULL,
`enterprise_id` INT(11)  DEFAULT NULL,
`user_id` INT(11)  DEFAULT NULL,
`address_id` INT(11)  DEFAULT NULL,
`howmany_stuff` INT(11)  DEFAULT NULL,
`notes_order` TEXT DEFAULT NULL,
`date_order` DATE DEFAULT NULL,
`date_delivery` DATE DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `order_enterprise`
  ADD PRIMARY KEY (`order_id`);

ALTER TABLE `order_enterprise`
  MODIFY `order_id` INT(11) NOT NULL AUTO_INCREMENT;


DROP TABLE IF EXISTS `order_stuff`;
CREATE TABLE `order_stuff`(
`order_stuff_id` INT(11) NOT NULL,
`order_id` INT(11) DEFAULT NULL,
`stuff_id` INT(11) DEFAULT NULL,
`how_many_stuff` INT(11)  DEFAULT NULL,
`price_stuff` DECIMAL(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `order_stuff`
  ADD PRIMARY KEY (`order_stuff_id`);

ALTER TABLE `order_stuff`
  MODIFY `order_stuff_id` INT(11) NOT NULL AUTO_INCREMENT;


DROP TABLE IF EXISTS `system_user_address`;
CREATE TABLE `system_user_address`(
`address_id` INT(11) NOT NULL,
`user_id` INT(11) NOT NULL,
`street` TEXT DEFAULT NULL,
`number` TEXT DEFAULT NULL,
`number_int` TEXT DEFAULT NULL,
`zip_code` TEXT DEFAULT NULL,
`city` TEXT DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `system_user_address`
  ADD PRIMARY KEY (`address_id`);

ALTER TABLE `system_user_address`
  MODIFY `address_id` INT(11) NOT NULL AUTO_INCREMENT;

DROP IF EXISTS `system_user_enterprise`;
CREATE TABLE `system_user_enterprise`(
`enterprise_id` INT(11) NOT NULL,
`address_id` INT(11) NOT NULL,
`user_id` INT(11) NOT NULL,
`name_enterprise` TEXT DEFAULT NULL,
`logo_enterprise` TEXT DEFAULT NULL,
`active_enterprise` TEXT DEFAULT NULL,
`number_int` TEXT DEFAULT NULL,
`zip_code` TEXT DEFAULT NULL,
`city` TEXT DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `system_user_enterprise`
  ADD PRIMARY KEY (`enterprise_id`);

ALTER TABLE `system_user_enterprise`
  MODIFY `enterprise_id` INT(11) NOT NULL AUTO_INCREMENT;


CREATE TABLE `order_special`(
  `order_id` INT(11) NOT NULL,
  `viker_id` INT(11) DEFAULT NULL,
  `geo_lat` TEXT DEFAULT NULL,
  `geo_lng` TEXT DEFAULT NULL,
  `geo_str` TEXT DEFAULT NULL,
  `geo_ext` TEXT DEFAULT NULL,
  `geo_int` TEXT DEFAULT NULL,
  `total_viker` DECIMAL (10,2) DEFAULT NULL,
  `special_delivery` TEXT DEFAULT NULL,
  `date_order` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

ALTER TABLE `order_special`
  ADD PRIMARY KEY (`order_id`);

ALTER TABLE `order_special`
  MODIFY `order_id` INT(11) NOT NULL AUTO_INCREMENT;