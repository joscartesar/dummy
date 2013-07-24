<?php

/**
 * @file user handler
 */

include_once("db.php");

define('ANONYMOUS_USER_ID', 1);
define('ANONYMOUS_USER_USERNAME', "anonymous");

/**
 * Object User
 */

class User {

  /**
   * Empty constructor
   */
  function User() {
    $this->set_id(ANONYMOUS_USER_ID);
    $this->set_username(ANONYMOUS_USER_USERNAME);
  }

  /**
   * Save user 
   * @param:
   * @return: boolean
   */
  function _save($password) {
    global $db;
    if (empty($this->_id)) {
      $sql = "INSERT INTO user (username, password) ";
      $sql.= "values ('". $this->get_username(). "', ";
      $sql.= "'". $password. "')";
    }
    else {
      $sql = "UPDATE user SET username='". $this->get_username(). "', ";
      $sql.= "password='". $password. "' ";
      $sql.= "WHERE user_id=". $this->get_id();
    }
    if ($db->fetch($sql)) {
      return TRUE;
    }
    else {
      return FALSE;
    }
  }

  /**
   * Delete user
   * @param:
   * @return: boolean
   */
  function _delete() {
    global $db;
    $sql = "DELETE FROM user WHERE user_id=". $this->get_id();
    if ($db->fetch($sql)) {
      return TRUE;
    }
    else {
      return FALSE;
    }
  }

  /**
   * Load user
   * @param: int id
   * @return: boolean
   */
  function _load($id) {
    global $db;
    $sql = "SELECT * FROM user ";
    $sql.= "WHERE user_id=". $id;
    if ($row = $db->fetch_row($sql)) {
      $this->set_id($id);
      $this->set_username($row['username']);
      return TRUE;
    }
    else {
      return FALSE;
    }
  }

  /**
   * Load all users
   * @param:
   * @return: asoc.array $users
   */
  function _load_all() {
    global $db;
    $sql = "SELECT * FROM user";
    $result = $db->fetch($sql);
    $this->_users = array();
    while ($row = mysqli_fetch_array($result)) {
      $id = $row['user_id'];
      $content = array("username" => $row['username']);
      $this->_users[$id] = $content;
    }
    return $this->_users;
  }

  /**
   * Get id
   * @param:
   * @return: int id
   */
  function get_id() {
    return $this->_id;
  }

  /**
   * Set id
   * @param: int id
   * @return:
   */
  function set_id($id) {
    $this->_id = $id;
  }

  /**
   * Get username
   * @param:
   * @return: String username
   */
  function get_username() {
    return $this->_username;
  }

  /**
   * Set username
   * @param: String username
   * @return:
   */
  function set_username($username) {
    $this->_username = $username;
  }

  /**
   * Get user rol
   * @return: String user_rol
   */
  function get_user_rol() {
    global $db;
    $sql = "SELECT r.name AS name FROM rol AS r ";
    $sql.= "INNER JOIN user_rol AS ur ON r.rol_id=ur.rol_id ";
    $sql.= "WHERE ur.user_id=". $this->get_id();
    if ($row = $db->fetch_row($sql)) {
      return $row['name'];
    }
  }

  /**
   * Authentiate user, set global $user to the new user if valid credentials
   * @param: String $username, String $password
   * @return: boolean
   */
  function _authenticate($username, $password) {
    global $db;
    $sql = "SELECT user_id FROM user ";
    $sql.= "WHERE username='". $username. "' ";
    $sql.= "AND password='". $password. "'";
    $row = $db->fetch_row($sql);
    if ($row && $username != ANONYMOUS_USER_USERNAME) {
      $this->set_id($row['user_id']);
      $this->set_username($username);
      return TRUE;
    }
    else {
      return FALSE;
    }
  }

  /**
   * Check user session
   * @param: String session_id
   * @return: user_id (if session exists), NULL (else)
   */
  function _check_session($session) {
    global $db;
    $sql = "SELECT user_id FROM session ";
    $sql.= "WHERE session_id='". $session. "'";
    $row = $db->fetch_row($sql);
    if ($row) {
      return $row['user_id'];
    }
    else {
      return NULL;
    }
  }
}

global $user;
$user = new User;
?>
