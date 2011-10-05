<?php
class User {
	//attributes
	var $_computing_id;
	var $_complete;
	var $_administrator;
	
	function getComputingId() {
		return $this->_computing_id;
	}
	function setComputingId($computing_id) {
		$this->_computing_id = $computing_id;
	}
	function getCompletionDate() {
		return $this->_completion_date;
	}
	function setCompletionDate($completion_date) {
		$this->_completion_date = $completion_date;
	}
	function getFirstName() {
		return $this->_first_name;
	}
	function setFirstName($first_name) {
		$this->_first_name = $first_name;
	}
	function getLastName() {
		return $this->_last_name;
	}
	function setLastName($last_name) {
		$this->_last_name = $last_name;
	}
	function isAdministrator() {
		return $this->_administrator;
	}
	function setAdministrator($value) {
		$this->_administrator = $value;
	}
	function complete() {
		return $this->getCompletionDate() != "0000-00-00";
	}
	function setLdapInfo() {
		$ldapConnection = ldap_connect("ldap.virginia.edu") or die("Could not connect to LDAP server");
		ldap_bind($ldapConnection) or die("Could not bind to LDAP server");
		$userID = $this->getComputingId();
		$result = ldap_search($ldapConnection, "o=University of Virginia, c=US", "uid=$userID");  
		$entries = ldap_get_entries($ldapConnection, $result);
		if ($entries["count"] < 1) {
			$this->setFirstName("");
	    $this->setLastName("");
			return;
		}
		$entry = $entries[0];
    $this->setFirstName($entry["givenname"][0]);
    $this->setLastName($entry["sn"][0]);
	}
	
	function User($computing_id, $completion_date) {
		$this->setComputingId($computing_id);
		$this->setCompletionDate($completion_date);
		$this->setAdministrator(false);  
		$this->setLdapInfo();
	}
}
?>