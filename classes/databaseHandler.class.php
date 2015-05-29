<?php
	class databaseHandler {
		private $mysqli;
		private $loc 		= 'stefan-boonstra.com';	//Location for the database
		private $user 		= 'stefanbo_roam';			//User for the database
		private $password 	= '019283';					//Password for the user
		private $db 		= 'stefanbo_roam';			//Database name


		/*
		* Construct Function for the database object
		* @param none
		* @return none
		* Use $db = new databaseHandler(); to create a new object
		*/
		function __construct() {
			//Connect to the database and show error upon fail.
			$this->mysqli = new mysqli($this->loc, $this->user, $this->password, $this->db);
				if ($this->mysqli->connect_errno) {
					echo "Failed to connect to MySQL: (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error;
				};
		}

		/*
		* Function to close an opened database connection
		* @param none
		* @return none
		*/
		public function close_db(){
			$this->mysqli->close();
		}

		/*
		* Getter for the mysqli object.
		* @param none
		* @return none
		* Must be use to allow the retrieval of the object, since it's a private field.
		*/
		public function getMysqli(){
			return $this->mysqli;
		}
}
?>