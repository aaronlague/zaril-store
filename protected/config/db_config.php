<?php
//define('DB_SERVER', 'FLEXIADMIN');
//define('DB_SERVER', 'localhost');
//define('DB_SERVER', '66.63.178.35\localhost');
//define('DB_SERVER', '66.63.178.35');
define('DB_SERVER', 'localhost');
//define('DB_USERNAME', 'sa');
define('DB_USERNAME', 'root');
//define('DB_PASSWORD', '');
//define('DB_DATABASE', 'zaril_db');

//define('DB_USERNAME', 'zarilph_admin');
//define('DB_PASSWORD', 'zaril123');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'zarilph_zaril_db');

class db_config {

	/*** SQL Server Settings Start ***/
	public function connect() {  
	 	$link = mysqli_connect( DB_SERVER, DB_USERNAME, DB_PASSWORD, "zarilph_zaril_db");
	 	if($link){
	  		//echo "Connection established.<br />";
	 	}else{
	  		echo "Connection could not be established.<br />";
	  		die( print_r( mysqli_connect_error(), true));
	 	}
	 	return $link;
	}
	
	public function mquery($query, $link){
		$query.= "; SELECT SCOPE_IDENTITY() AS IDENTITY_COLUMN_NAME"; 
		$result = mysqli_query($link, $query);
		if( $result === false ){
			echo "Error in executing query.</br>";
	     	die( print_r( mysqli_connect_error(), true));
		}else{
			return $result;
		}
	}
	
	
	public function mquery_insert($table, $data, $connect){
		
		foreach($data as $key=>$val) {
			$q.= "$key, ";
			$v.="'" . $val. "'" . ", ";
		}
	
		$q = rtrim($q, ', ');
		$v = rtrim($v, ', ');

		$sql="INSERT INTO ".$table." (". $q .") VALUES (". $v .")";
		//echo $sql;
		return $connect->query($sql);
	}

	
	public function mquery_update($table, $data, $where='1'){
		$q="UPDATE ".$table." SET ";
	
		foreach($data as $key=>$val) {
			if(strtolower($val)=='null') $q.= "$key = NULL, ";
			elseif(strtolower($val)=='now()') $q.= "$key = NOW(), ";
			else $q.= "$key='".$this->escape($val)."', ";
		}
	
		$q = rtrim($q, ', ') . ' WHERE '.$where.';';
		return $this->mquery($q);
	}

	public function fetcharray($query){
		return mysqli_fetch_array($query);
	}

	public function numrows($query){
		return mysqli_num_rows($query);
	}

	
	public function query_delete($table, $where) {
		return $this->mquery("DELETE FROM ".$table." WHERE ".$where."");
	}
	
	public function numhasrows($query){
		return mysql_num_rows($query);
	}
	public function fetchobject($query){
		return @sqlsrv_fetch_object($query);
	}
	
	/*** SQL Server Settings End ***/

		
	/*** Random Value Function ***/
	public function random_value(){
		$ipbits = explode(".", $_SERVER["REMOTE_ADDR"]); 
		list($usec, $sec) = explode(" ",microtime()); 
		$usec = (integer) ($usec * 65536); 
		$sec = ((integer) $sec) & 0xFFFF; 
		return sprintf("%08x%04x%04x",($ipbits[0] << 24)|($ipbits[1] << 16) | ($ipbits[2] << 8) | $ipbits[3], $sec, $usec); 	
	}

	public function escape($string){
		return addslashes($string);
	}	
	public function strip($string){
		return stripslashes($string);
	}
}
?>