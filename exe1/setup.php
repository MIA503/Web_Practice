<?php // rnsetup.php
include_once 'function.php';

//createTable('users', 
//			'user VARCHAR(16), pass VARCHAR(16),INDEX(user(6))');

//createTable('places', 
//		   'activity VARCHAR(20),quantity INT,available INT,INDEX(activity(6))');

//createTable('reservations', 			
//			'reservenum INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, user VARCHAR(16), activity VARCHAR(20),childnum INT,INDEX(user(6)),INDEX(activity(6))');
			
//queryMysql("INSERT INTO places VALUES('soccer',6,6)");
//queryMysql("INSERT INTO places VALUES('volley',8,8)");
//queryMysql("UPDATE places SET available = 6 WHERE activity='soccer'");
//queryMysql("UPDATE places SET available = 8 WHERE activity='volley'");
//queryMysql("UPDATE places SET available = 4 WHERE activity='swimming'");

queryMysql("DELETE FROM users WHERE user = 'kk' ");

createTable('orders', 'reservid INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, user VARCHAR(16), participant INT UNSIGNED,starttime VARCHAR(20), endtime VARCHAR(20), sth INT UNSIGNED, stm INT UNSIGNED, eth IINT UNSIGNED, etm INT UNSIGNED, INDEX(user(6))');

?>
