<?php

/**
 * @file rol handler
 */

include_once("db.php");

/**
 * Object Rol
 **/
class Rol {

  /**
   * Empty constructor
   */
  function Rol () {
  }

  /**
   * Save rol
   * @return: boolean
   */
  function _save() {
    global $db;
    if (empty($this->_rol_id)) {
      $sql = "INSERT INTO rol (name) ";
      $sql.= "VALUES ('". $this->get_rol_name() ."')";
    }
    else {
      $sql = "UPDATE rol SET name='". $this->get_rol_name(). "' ";
      $sql.= "WHERE rol_id=". $this->get_rol_id();
    }
    if ($db->fetch($sql)) {
      return TRUE;
    }
    else {
      return FALSE;
    }
  }

  /**
   * Delete rol
   * @return: boolean
   */
  function _delete() {
    global $db;
    $sql = "DELETE FROM rol WHERE rol_id=". $this->get_rol_id();
    if ($db->fetch($sql)) {
      return TRUE;
    }
    else {
      return FALSE;
    }
  }

  /**
   * Load rol
   * @param: int rol_id
   * @return: boolea
   */
  function _load($rol_id) {
    global $db;
    $sql = "SELECT * FROM rol ";
    $sql.= "WHERE rol_id=". $rol_id;
    if ($row = $db->fetch_row($sql)) {
      $this->set_rol_id($rol_id);
      $this->set_rol_name($row['name']);
      return TRUE;
    }
    else {
      return FALSE;
    }
  }

  /**
   * Get rol id
   * @return: int rol_id
   */
  function get_rol_id() {
    return $this->_rol_id;
  }

  /**
   * Set rol id
   * @param int rol_id
   */
  function set_rol_id($rol_id) {
    $this->_rol_id = $rol_id;
  }

  /**
   * Get rol name
   * @return: String rol_name
   */
  function get_rol_name() {
    return $this->_rol_name;
  }

  /**
   * Set rol name
   * @param: String rol_name
   */
  function set_rol_name($rol_name) {
    $this->_rol_name = $rol_name;
  }

  /**
   * Set rol to user
   * @param: int $user_id
   */
  function rol2user($user_id) {
    global $db;
    $sql = "INSERT INTO user_rol (user_id, rol_id) ";
    $sql.= "VALUES (". $user_id. ", ". $this->get_rol_id(). ")";
    $db->fetch($sql);
  }

  /**
   * Unset rol to user
   * @param: int $user_id
   */
  function unroluser($user_id) {
    global $db;
    $sql = "DELETE FROM user_rol WHERE user_id=". $user_id;
    $db->fetch($sql);
  }
}
?>
