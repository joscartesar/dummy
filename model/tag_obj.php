<?php
/**
 * @file Object model handler
 */

include_once("db.php");

/**
 * Object Tag
 */
class Tag {

  /**
   * Empty constructor
   */
  function Tag() {
  }

  /**
   * Save tag
   * @param:
   * @return: boolean
   */
  function _save() {
    global $db;
    if (empty($this->_id)) {
      $sql = "INSERT INTO tag (name) ";
      $sql.= "values ('". $this->_name. "')";
    }
    else {
      $sql = "UPDATE tag SET name='". $this->_name. "' ";
      $sql.= "WHERE tag_id=". $this->_id;
    }
    if ($db->fetch($sql)) {
      return true;
    }
    else {
      return false;
    }
  }

  /**
   * Delete tag
   * @param:
   * @return: boolean
   */
  function _delete() {
    global $db;
    $sql = "DELETE FROM tag WHERE tag_id=". $this->_id;
    if ($db->fetch($sql)) {
      return true;
    }
    else {
      return false;
    }
  }

  /**
   * Load tag
   * @param: int id
   * @return: boolean
   */
  function _load($id) {
    global $db;
    $sql = "SELECT * FROM tag ";
    $sql.= "WHERE tag_id=". $id;
    if ($row = $db->fetch_row($sql)) {
      $this->set_id($id);
      $this->set_name($row['name']);
      return true;
    }
    else {
      return false;
    }
  }

  /**
   * Load tags
   * @param:
   * @return: boolean
   */
  function _load_all() {
    global $db;
    $sql = "SELECT * FROM tag ";
    $result = $db->fetch($sql);
    $this->_tags = array();
    while ($row = mysqli_fetch_array($result)) {
      $id = $row['tag_id'];
      $content = array("name" => $row['name']);
      $this->set_tags($id, $content);
    }
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
   * Get name
   * @param:
   * @return: String name
   */
  function get_name() {
    return $this->_name;
  }

  /**
   * Set name
   * @param: String name
   * @return:
   */
  function set_name($name) {
    $this->_name = $name;
  }

  /**
   * Get tags
   * @param:
   * @return: asoc.array [tag_id] => ([tag_field] => value) tags
   */
  function get_tags() {
    return $this->_tags;
  }

  /**
   * Set tags
   * @param: int $key, asoc.array $value
   * @return:
   */
  function set_tags($key, $value) {
    $this->_tags[$key] = $value;
  }
}
?>
