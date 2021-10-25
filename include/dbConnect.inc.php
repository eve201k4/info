<?php 
//include_once (dirname(__FILE__) . "/class.xmltoarray.inc.php");
//include_once (dirname(__FILE__) . "/adodb/adodb-exceptions.inc.php");
include_once (dirname(__FILE__) . "/adodb/adodb.inc.php"); // include adodb class*/

class dbConnect{
    var $fetchMode = "Default";
	var  $inc_Path;
	var $dsDB;
	var  $connStatus = false;
	var  $db;
	
      function dbConnect($name) {
			$this->inc_Path = dirname(__FILE__) . "/";
			
			$this->getDatasource();   	
			$configDS = $this->dsDB['DATASOURCE'];
  			//$ds = ($configDS[$name])? $configDS[$name]:$configDS["gmember_w"];
			$ds = $configDS[$name];
            $this->db =& $this->connection($ds['DRIVER'],$ds['SERVER'],$ds['USER'],$ds['PASSWORD'],$ds['DBNAME']);
    }

    function connection($dbvendor, $dbHost, $dbUser, $dbPwd, $dbName) {
		global $ADODB_FETCH_MODE; 
		$this->setFetchMode();
		
		$ADODB_ASSOC_CASE = 2;
		$instanceDB =& newAdoConnection($dbvendor); // create a connection
		$this->connStatus = $instanceDB->PConnect($dbHost, $dbUser, $dbPwd, $dbName);
		$instanceDB->_Execute("SET CHARACTER SET utf8");
		$instanceDB->_Execute("SET collation_connection = 'utf8_thai_ci'");
		$this->connStatus = true;
		
        return $instanceDB;
    }

     function getConnectStatus() {
        return $this->connStatus;
    }
	 function getConnections() {
        $this->setUserOnline();
		return $this->db;
    }
 
   function setFetchMode($mode = "Default") {
        $this->fetchMode = $mode;
        $ADODB_FETCH_MODE = $mode;
    }
	function getDatasource(){
		 include(dirname(__FILE__) . "/datasource.php"); // include datasource */
		 $this->dsDB['DATASOURCE'] = $DATASOURCE;
		/* $parser = new XMLParser($this->inc_Path . 'config.xml', 'file', 1);
		 $xmlConfigs = $parser->getTree();
		 $this->setConfigDataSource($xmlConfigs['CONFIG']);*/
	}
}

?>