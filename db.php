<?php
	$username="root";
	$password="itht7n5i";
	$database="subaru";
	
	mysql_connect(localhost,$username,$password);
	@mysql_select_db($database) or die( "Unable to select database");

	$models=mysql_query("SELECT * FROM models");
	$result=mysql_query("SELECT * FROM raw_cars");
	
	$modnum=mysql_numrows($models);
	$num=mysql_numrows($result);

/*
		public $model = mysql_result($result,$i,"model");
		public $year = mysql_result($result,$i,"year");
		public $induction = mysql_result($result,$i,"induction");
		public $engine_size = mysql_result($result,$i,"engine_size");
		public $hp = mysql_result($result,$i,"hp");
		public $tq = mysql_result($result,$i,"tq");
		public $weight = mysql_result($result,$i,"weight");
*/

	


	
	
	

		mysql_close();