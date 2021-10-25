<?
	//		21/3/2550
	/*
	 $DATASOURCE = array( 
	 "fmmax"=>array("SERVER"=>"203.150.225.235","DRIVER"=>"mysqli","DBNAME"=>"fmmax","USER"=>"fmmax","PASSWORD"=>"c,Hd:N[vp"),
	 "member"=>array("SERVER"=>"203.150.225.235","DRIVER"=>"mysqli","DBNAME"=>"systemmember","USER"=>"ifeelmax","PASSWORD"=>"c,Hd:N[vp"),
	 "maxrock"=>array("SERVER"=>"203.150.225.235","DRIVER"=>"mysqli","DBNAME"=>"maxontherock","USER"=>"ifeelmax","PASSWORD"=>"c,Hd:N[vp"),
	 "maxhbd"=>array("SERVER"=>"203.150.225.235","DRIVER"=>"mysqli","DBNAME"=>"maxhbd","USER"=>"ifeelmax","PASSWORD"=>"c,Hd:N[vp")
	);
	*/

if ($_SERVER["SERVER_NAME"] == "www.cool93.net" || $_SERVER["SERVER_NAME"] == "cool93.net" || $_SERVER["SERVER_NAME"] == "demo.cool93.net" || $_SERVER["SERVER_NAME"] == "ms.cool93.net" || $_SERVER["SERVER_NAME"] == "sl1.lb.cool93.net") {

	$DATASOURCE = array( 
	 "cool93"=>array("SERVER"=>"203.150.225.235","DRIVER"=>"mysql","DBNAME"=>"cool93","USER"=>"cool93","PASSWORD"=>"cL*)93A"),
	 "game"=>array("SERVER"=>"203.150.225.235","DRIVER"=>"mysql","DBNAME"=>"game","USER"=>"cool93","PASSWORD"=>"cL*)93A"),
	 "systemmember"=>array("SERVER"=>"203.150.225.235","DRIVER"=>"mysql","DBNAME"=>"systemmember","USER"=>"cool93","PASSWORD"=>"cL*)93A")
	);

} elseif ($_SERVER["SERVER_NAME"] == "www.coolism.net" || $_SERVER["SERVER_NAME"] == "coolism.net" ) {

	$DATASOURCE = array( 
	 "cool93"=>array("SERVER"=>"192.168.100.162","DRIVER"=>"mysql","DBNAME"=>"cool93","USER"=>"cool93","PASSWORD"=>"cL*)93A"),
	 "game"=>array("SERVER"=>"192.168.100.162","DRIVER"=>"mysql","DBNAME"=>"game","USER"=>"cool93","PASSWORD"=>"cL*)93A"),	
	 "systemmember"=>array("SERVER"=>"192.168.100.162","DRIVER"=>"mysql","DBNAME"=>"systemmember","USER"=>"cool93","PASSWORD"=>"cL*)93A"), "degree"=>array("SERVER"=>"202.142.212.163","DRIVER"=>"mysql","DBNAME"=>"app_coolism","USER"=>"coolism","PASSWORD"=>"App@CooLism#DB")
	);
	
} elseif ($_SERVER["SERVER_NAME"] == "dev.coolism.net") {

	$DATASOURCE = array( 
	 "cool93"=>array("SERVER"=>"202.142.212.162","DRIVER"=>"mysql","DBNAME"=>"cool93","USER"=>"cool93","PASSWORD"=>"cL*)93A"),
	 "game"=>array("SERVER"=>"202.142.212.162","DRIVER"=>"mysql","DBNAME"=>"game","USER"=>"cool93","PASSWORD"=>"cL*)93A"),
	 "systemmember"=>array("SERVER"=>"202.142.212.162","DRIVER"=>"mysql","DBNAME"=>"systemmember","USER"=>"cool93","PASSWORD"=>"cL*)93A")
	);

} else {

	$DATASOURCE = array( 
	 "cool93"=>array("SERVER"=>"localhost","DRIVER"=>"mysql","DBNAME"=>"cool93","USER"=>"root","PASSWORD"=>"root"),
	 "game"=>array("SERVER"=>"localhost","DRIVER"=>"mysql","DBNAME"=>"game","USER"=>"root","PASSWORD"=>"root"),
	 "systemmember"=>array("SERVER"=>"localhost","DRIVER"=>"mysql","DBNAME"=>"systemmember","USER"=>"root","PASSWORD"=>"root")
	);


}

?>
