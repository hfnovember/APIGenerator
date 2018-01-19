<?php


/**********************************************************************************/
/*** THIS FILE HAS BEEN AUTOMATICALLY GENERATED BY THE PANICKAPPS API GENERATOR ***/

/*                It is HIGHLY suggested that you do not edit this file.          */

/* DATABASE:		Nicos */
/* FILE:		sessions.php */
/* TABLE:		sessions */
/* DATETIME:		2018-01-19 10:12:48pm */
/* DESCRIPTION:		N/A*/

/**********************************************************************************/
			


include_once("../../DBLogin.php");

class Sessions implements JsonSerializable {

	//-------------------- Attributes --------------------

    private $SessionID;
    private $UserID;
    private $InitiatedOn;
    private $FinalizedOn;
    private $ClientIPAddress;

	//-------------------- Constructor --------------------

    public function __construct(
		$SessionID, 
		$UserID, 
		$InitiatedOn, 
		$FinalizedOn, 
		$ClientIPAddress
		) {
        $this->SessionID = $SessionID;
		$this->UserID = $UserID;
		$this->InitiatedOn = $InitiatedOn;
		$this->FinalizedOn = $FinalizedOn;
		$this->ClientIPAddress = $ClientIPAddress;
    }

	//-------------------- Getter Methods --------------------

	/**
     * @return varchar(255)
     */
     public function getSessionID() { return $this->SessionID; }

	/**
     * @return int(10) unsigned
     */
     public function getUserID() { return $this->UserID; }

	/**
     * @return int(10) unsigned
     */
     public function getInitiatedOn() { return $this->InitiatedOn; }

	/**
     * @return int(10) unsigned
     */
     public function getFinalizedOn() { return $this->FinalizedOn; }

	/**
     * @return varchar(255)
     */
     public function getClientIPAddress() { return $this->ClientIPAddress; }


	//-------------------- Setter Methods --------------------

	/**
     * @param $value int(10) unsigned
     */
     public function setUserID($value) { $this->UserID = $value; }

	/**
     * @param $value int(10) unsigned
     */
     public function setInitiatedOn($value) { $this->InitiatedOn = $value; }

	/**
     * @param $value int(10) unsigned
     */
     public function setFinalizedOn($value) { $this->FinalizedOn = $value; }

	/**
     * @param $value varchar(255)
     */
     public function setClientIPAddress($value) { $this->ClientIPAddress = $value; }


	//-------------------- Static (Database) Methods --------------------

            
            
    /**
     * Creates a database entry with the given object's data.
     * @param $t1_object Sessions
     * @return bool
     */
    public static function create($sessions_object) {
        $conn = dbLogin();
        $sql = "INSERT INTO sessions (SessionID, UserID, InitiatedOn, FinalizedOn, ClientIPAddress) VALUES (\"" . $sessions_object->SessionID . "\", $sessions_object->UserID, $sessions_object->InitiatedOn, $sessions_object->FinalizedOn, \"" . $sessions_object->ClientIPAddress . "\")";
        if ($conn->query($sql) === TRUE) return true;
        else return false;
    }


     /**
     * Retrieves a database entry matching the ID value provided.
     * @param $id varchar(255)
     * @return bool|Sessions
     */
    public static function getByID($id) {
        $conn = dbLogin();
        $sql = "SELECT * FROM sessions WHERE SessionID = '" . $id . "'";
        $result = $conn->query($sql);
        $sqlRowItemAsAssocArray = null;
        if ($result->num_rows > 0) {
            $sqlRowItemAsAssocArray = $result->fetch_assoc();
            $object = new Sessions(
				$sqlRowItemAsAssocArray["SessionID"], 
				$sqlRowItemAsAssocArray["UserID"], 
				$sqlRowItemAsAssocArray["InitiatedOn"], 
				$sqlRowItemAsAssocArray["FinalizedOn"], 
				$sqlRowItemAsAssocArray["ClientIPAddress"]);
            return $object;
        }
        else return false;
    }


    /**
     * Retrieves all entries or up to a specified limit from the database. Use 0 or negative values as limit to retrieve all entries.
     * @param $limit int
     * @return array|bool
     */
    public static function getMultiple($limit) {
        $conn = dbLogin();
        $sql = "SELECT * FROM sessions";
        if ($limit > 0) $sql .= " LIMIT " . $limit;
        $result = $conn->query($sql);
        $itemsArray = array();
        if ($result->num_rows > 0) {
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $object = new Sessions(
				$row["SessionID"], 
				$row["UserID"], 
				$row["InitiatedOn"], 
				$row["FinalizedOn"], 
				$row["ClientIPAddress"]);
                    array_push($itemsArray, $object);
                }
            }
            return $itemsArray;
        }
        return false;
    }


    /**
     * Updates a database entry with the given object's data.
     * @param $t1_object Sessions
     * @return bool
     */
    public static function update($sessions_object) {
        $conn = dbLogin();
        $sql = "UPDATE sessions SET UserID = " . $sessions_object->getUserID() . ", InitiatedOn = " . $sessions_object->getInitiatedOn() . ", FinalizedOn = " . $sessions_object->getFinalizedOn() . ", ClientIPAddress = \"" . $sessions_object->getClientIPAddress() . "\" WHERE SessionID = \"" . $sessions_object->getSessionID() . "\"";
        if ($conn->query($sql) === TRUE) return true;
        else return false;
    }


    /**
     * Deletes an entry from the database given the object's data.
     * @param $t1_object Sessions
     * @return bool
     */
    public static function delete($sessions_object) {
        $conn = dbLogin();
        $sql = "DELETE FROM sessions WHERE SessionID = \"" . $sessions_object->getSessionID() . "\"";
        if ($conn->query($sql) === TRUE) return true;
        else return false;
    }


    /**
     * Returns the number of entries in the database.
     * @return int
     */
    public static function getSize() {
        $conn = dbLogin();
        $sql = "SELECT COUNT(SessionID) FROM sessions";
        $result = $conn->query($sql);
        return $result->fetch_array()[0];
    }


    /**
     * Returns true if the database is empty or false otherwise.
     * @return bool
     */
    public static function isEmpty() {
        $conn = dbLogin();
        $sql = "SELECT COUNT(SessionID) FROM sessions";
        $result = $conn->query($sql);
        return ($result->fetch_array()[0] == 0);
    }


    /**
     * Searches the database for matches in the given field-value pairs in the given associative array.
     * The array should be in the format FieldName -> ValueToSearch where both values are strings.
     * @return array|bool
     */
    public static function searchByFields($fieldsAndValuesAssocArray) {
        $conn = dbLogin();
        
        $combinedWhereClause = "";
        
        foreach ($fieldsAndValuesAssocArray as $field => $value) {
            $combinedWhereClause .= $field . " = \"" . $value . "\" AND ";
        }
        $combinedWhereClause = substr($combinedWhereClause, 0, strlen($combinedWhereClause) - 4);
        
        $sql = "SELECT * FROM sessions WHERE " . $combinedWhereClause;
        $result = $conn->query($sql);
        $itemsArray = array();
        while ($row = $result->fetch_object()) array_push($itemsArray, $row);
        return $itemsArray;
    }

	//-------------------- JSON Generation Methods --------------------

    /**
     * Specifies how objects of this class should be converted to JSON format.
     * @return string
     */
    public function jsonSerialize() {
        $jsonStr = "{
		\"SessionID\": \"" . $this->SessionID. "\",
		\"UserID\": $this->UserID,
		\"InitiatedOn\": $this->InitiatedOn,
		\"FinalizedOn\": $this->FinalizedOn,
		\"ClientIPAddress\": \"" . $this->ClientIPAddress. "\" }";
        return $jsonStr;
    }
    
    /**
     * Converts an array of Sessions objects to a JSON Array.
     * @param $Sessions_array Sessions Array
     * @return bool|string
     */
    public static function toJSONArray($Sessions_array) {
        $strArray = "[ ";
        foreach ($Sessions_array as $i) {
            $strArray .= $i->jsonSerialize() . ", ";
        }
        $strArray = substr($strArray, 0, strlen($strArray) - 3);
        $strArray .= "} ] ";
        return $strArray;
    }

}

?>