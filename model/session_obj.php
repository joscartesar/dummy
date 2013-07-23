<?php

/**
 * @file session handler
 */

include_once("db.php");

/**
 * Object Session
 */

class Session {

  /**
   * Empty constructor
   */
  function Session() {
  }

  /**
   * Save session
   * @param:
   * @return: boolean
   */
  function _save() {
    global $db;
    if (empty($this->_session_time)) {
      $sql = "INSERT INTO session (user_id, session_id, time) ";
      $sql.= "values (". $this->get_user_id(). ", ";
      $sql.= "'". $this->get_session_id(). "', ";
      $sql.= "UNIX_TIMESTAMP(NOW()))";
    }
    else {
      $sql = "UPDATE session SET session_id='". $this->get_session_id(). "', ";
      $sql.= "time=UNIX_TIMESTAMP(NOW()) ";
      $sql.= "WHERE user_id=". $this->get_user_id();
    }
    if ($db->fetch($sql)) {
      return TRUE;
    }
    else {
      return FALSE;
    }
  }

  /**
   * Delete session
   * @param:
   * @return: boolean
   */
  function _delete() {
    global $db;
    $sql = "DELETE FROM session WHERE user_id=". $this->get_user_id();
    if ($db->fetch($sql)) {
      return true;
    }
    else {
      return false;
    }
  }

  /**
   * Load session
   * @param: int user_id
   * @return: boolean
   */
  function _load($user_id) {
    global $db;
    $sql = "SELECT * FROM session ";
    $sql.= "WHERE user_id=". $user_id;
    if ($row = $db->fetch_row($sql)) {
      $this->set_user_id($user_id);
      $this->set_session_id($row['session_id']);
      $this->set_session_time($row['time']);
      return TRUE;
    }
    else {
      return FALSE;
    }
  }

  /**
   * Get user id
   * @param:
   * @return: int user_id
   */
  function get_user_id() {
    return $this->_user_id;
  }

  /**
   * Set user_id
   * @param: int user_id
   * @return:
   */
  function set_user_id($user_id) {
    $this->_user_id = $user_id;
  }

  /**
   * Get session id
   * @param:
   * @return: int session_id
   */
  function get_session_id() {
    return $this->_session_id;
  }

  /**
   * Set session_id
   * @param: int session_id
   * @return:
   */
  function set_session_id($session_id) {
    $this->_session_id = $session_id;
  }

  /**
   * Get session time
   * @param:
   * @return: int session_time
   */
  function get_session_time() {
    return $this->_session_time;
  }

  /**
   * Set session_time
   * @param: int session_time
   * @return:
   */
  function set_session_time($session_time) {
    $this->_session_time = $session_time;
  }
}
?>
