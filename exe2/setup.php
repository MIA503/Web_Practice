<?php // rnsetup.php
include_once 'function.php';

//xcreateTable('users', 'user VARCHAR(16), pass VARCHAR(16), INDEX(user(6))');

createTable('orders', 'reservid INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, user VARCHAR(16), participant INT,starttime VARCHAR(10), endtime VARCHAR(10), sth INT, stm INT, eth INT, etm INT, INDEX(user(6))');

//createTable('reservations', 			
//			'reservenum INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, user VARCHAR(16), activity VARCHAR(20),childnum INT,INDEX(user(6)),INDEX(activity(6))');
			
//queryMysql("INSERT INTO places VALUES('soccer',6,6)");
//queryMysql("INSERT INTO places VALUES('volley',8,8)");

//queryMysql(" places SET available = 6 WHERE activity='soccer'");
//queryMysql("UPDATE places SET available = 8 WHERE activity='volley'");
//queryMysql("UPDATE places SET available = 4 WHERE activity='swimming'");

?>
