DELIMITER $$

CREATE
    /*[DEFINER = { user | CURRENT_USER }]*/
    TRIGGER `test`.`trigger_rating_sum_avg` BEFORE UPDATE
    ON `test`.`product_rating`
    FOR EACH ROW BEGIN
	SET NEW.`rating_count` = NEW.`rating_1`+NEW.`rating_2`+NEW.`rating_3`+NEW.`rating_4`+NEW.`rating_5`;
	SET NEW.`rating_sum` = NEW.`rating_1`*1 + NEW.`rating_2`*2 + NEW.`rating_3`*3 + NEW.`rating_4`*4 + NEW.`rating_5`*5;
	SET NEW.`avg_rating` = ROUND((NEW.`rating_sum`/ NEW.`rating_count`) * 2) / 2;
	END$$

DELIMITER ;