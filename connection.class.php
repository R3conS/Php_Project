<?php
class DB{
	private $host;
	private $username;
	private $password;
	private $database;
	private $connection;

	public function __construct($host=null,$username=null,$password=null,$database=null){
		if ($host!=null){
			$this->host=$host;
			$this->username=$username;
			$this->password=$password;
			$this->database=$database;
		}
		try{
			$this->connection = new mysqli($host,$username,$password,$database);
			if (!$this->connection){
				throw new Exception("connection_aborted", 1);
				
			}
			else if (!mysqli_select_db($this->connection,$this->database)) {
				throw new Exception("No such database",mysqli_connect_error());
			}
	}catch(mysqli_sql_exception $exception){
		throw new Exception($exception, 1);
		}

	}
	public function get_connection(){
		return $this->connection;
	}
	public function Connection_close(){
		mysqli_close($this->connection);
	}
	public function table_rowsing($result){
		if (mysqli_num_rows($result) > 0) {
    		while($row = mysqli_fetch_assoc($result)) {
        	echo "- PId: " . $row["id"]. "  - Name: " . $row["name"]. " - PCode: " . $row["code"]. " - Image: " .$row["image"]. "- Price: " . $row["price"]."€<br>";
        	}
		} 
		if(isset($_GET['id'])){

		}else{
			throw new Exception("Nothing selected", 1);	
			}
	}

}

?>