
/*see my family */
SELECT * FROM `friend` WHERE lname = 'torres';


/*see all may babies */
SELECT `friend`.`fname`, `birthdate`.`month`, `birthdate`.`day`
FROM `friend` 
	LEFT JOIN `birthdate` ON `birthdate`.`id` = `friend`.`ID`
WHERE `birthdate`.`month` = '5'
ORDER BY `birthdate`.`day`;


/*see friend gift preferences */
SELECT `friend`.`fname`, `gifts`.`giftpref`
FROM `friend` 
	LEFT JOIN `gifts` ON `gifts`.`id` = `friend`.`ID`
	ORDER BY `gifts`.`giftpref`;
	
#from those who prefer a gift card, from what store
SELECT `friend`.`fname`, `gifts`.`giftpref`, `gifts`.`store`
FROM `friend` 
	LEFT JOIN `gifts` ON `gifts`.`id` = `friend`.`ID`
	WHERE  `gifts`.`giftpref` = 'Prefer a Giftcard';
	
	
	
/* from may babes what girst do they want */
	
SELECT `friend`.`fname`, `birthdate`.`day`, `gifts`.`giftpref`, `gifts`.`store`, `gifts`.`restaurant`
FROM `friend`
	LEFT JOIN `birthdate` ON `birthdate`.`id` = `friend`.`ID`
    LEFT JOIN `gifts` ON `gifts`.`id` = `friend`.`ID`
WHERE `birthdate`.`month` = '5'
ORDER BY `birthdate`.`day`;
	
	
	/* from all FAMILY what girst do they want */
	
SELECT *
FROM `friend`
	LEFT JOIN `birthdate` ON `birthdate`.`id` = `friend`.`ID`
    LEFT JOIN `gifts` ON `gifts`.`id` = `friend`.`ID`
WHERE lname = 'torres'
ORDER BY `birthdate`.`month`, `birthdate`.`day`;
	
	
	/* from all UPCOMING FAMILY what girst do they want */
SELECT * FROM `friend` LEFT JOIN `birthdate` ON `birthdate`.`id` = `friend`.`ID` 
	LEFT JOIN `gifts` ON `gifts`.`id` = `friend`.`ID` 
WHERE lname = 'torres' AND `birthdate`.`month` > '5'
ORDER BY `birthdate`.`month`, `birthdate`.`day` 
	