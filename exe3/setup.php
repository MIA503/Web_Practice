<?php 
include_once 'function.php';

//createTable('survey', 
//			'id int NOT NULL AUTO_INCREMENT,
//      first_name varchar(16) DEFAULT NULL,
//      last_name varchar(16) DEFAULT NULL,
  //    age int(3) DEFAULT NULL,
    //  sport1 varchar(255) DEFAULT NULL,
      //sport2 varchar(255) DEFAULT NULL,
      //sport3 varchar(255) DEFAULT NULL,
      //email varchar(255) NOT NULL,
      //reward float DEFAULT 1.00,
      //PRIMARY KEY (id)');

createTable("sports",
			"uid int NOT NULL,
			sport varchar(255) DEFAULT '--',
			FOREIGN KEY (uid) REFERENCES survey(id)");
?>