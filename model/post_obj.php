<?php
/**
 * @file Object model handler
 */

include_once("db.php");

/**
 * Object Post
 */

class Post {

  /**
   * Empty constructor
   */
  function Post() {
  }

  /**
   * Save post
   * @param:
   * @return: boolean
   */
  function _save() {
    global $db;
    if (empty($this->_id)) {
      $sql = "INSERT INTO post (title, body, date, abstract) ";
      $sql.= "values ('". $this->_title. "', '<p>". $this->_body. "</p>', ";
      $sql.= "UNIX_TIMESTAMP(NOW()), '<p>". $this->_abstract. "</p>')";
    }
    else {
      $sql = "UPDATE post SET title='". $this->_title. "', ";
      $sql.= "body='". $this->_body. "', ";
      $sql.= "abstract='". $this->_abstract. "', ";
      $sql.= "date_update=UNIX_TIMESTAMP(NOW()) ";
      $sql.= "WHERE post_id=". $this->_id;
    }
    if ($db->fetch($sql)) {
      return true;
    }
    else {
      return false;
    }
  }

  /**
   * Save post tags
   * @param: asoc. array $tags
   * @param: boolean $new
   * @return:
   */
  function _save_tags($id, $tags, $new) {
    global $db;
    $queries = array();
    if ($new) {
      foreach ($tags as $key => $value) {
        $sql = "INSERT INTO post_tag (post_id, tag_id) ";
        $sql.= "values (". $id. ", ". $key. ")";
        array_push($queries, $sql);
      }
    }
    else {
      $sql = "SELECT t.tag_id AS tag_id, t.name AS name FROM tag AS t ";
      $sql.= "INNER JOIN post_tag AS pt ON pt.tag_id = t.tag_id ";
      $sql.= "WHERE pt.post_id=". $this->_id;
      $result = $db->fetch($sql);
      $tags_old = array();
      while ($row = mysqli_fetch_array($result)) {
        $id = $row['tag_id'];
        $content = array("name" => $row['name']);
        $tags_old[$id] = $content;
      }
      $delete = array();
      foreach ($tags_old as $key => $value) {
        if (!array_key_exists($key, $tags)) {
          $delete[$key] = $value;
        }
      }
      foreach ($delete as $key => $value) {
        $sql = "DELETE FROM post_tag ";
        $sql.= "WHERE post_id=". $this->_id. " AND tag_id=". $key;
        array_push($queries, $sql);
      }
      $update = array();
      foreach ($tags as $key => $value) {
        if (!array_key_exists($key, $tags_old)) {
          $update[$key] = $value;
        }
      }
      foreach ($update as $key => $value) {
        $sql = "INSERT INTO post_tag (post_id, tag_id) ";
        $sql.= "values (". $this->_id. ", ". $key. ")";
        array_push($queries, $sql);
      }
    }
    foreach ($queries as $query) {
      $db->fetch($query);
    }
  }

  /**
   * Delete post
   * @param:
   * @return: boolean
   */
  function _delete() {
    global $db;
    $sql = "DELETE FROM post WHERE post_id=". $this->_id;
    if ($db->fetch($sql)) {
      return true;
    }
    else {
      return false;
    }
  }

  /**
   * Load post
   * @param: int id
   * @return: boolean
   */
  function _load($id) {
    global $db;
    $sql = "SELECT * FROM post ";
    $sql.= "WHERE post_id=". $id;
    if ($row = $db->fetch_row($sql)) {
      $this->set_id($id);
      $this->set_title($row['title']);
      $this->set_body($row['body']);
      $this->set_abstract($row['abstract']);
      $this->set_date($row['date']);
      $this->set_date_update($row['date_update']);
      $sql = "SELECT t.tag_id AS tag_id, t.name AS name FROM tag AS t ";
      $sql.= "INNER JOIN post_tag AS pt ON pt.tag_id = t.tag_id ";
      $sql.= "WHERE pt.post_id=". $this->_id;
      $result = $db->fetch($sql);
      $this->_tags = array();
      while ($row = mysqli_fetch_array($result)) {
        $id = $row['tag_id'];
        $content = array("name" => $row['name']);
        $this->set_tags($id, $content);
      }
      return true;
    }
    else {
      return false;
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
   * Get title
   * @param:
   * @return: String title
   */
  function get_title() {
    return $this->_title;
  }

  /**
   * Set title
   * @param: String title
   * @return:
   */
  function set_title($title) {
    $this->_title = $title;
  }

  /**
   * Get body
   * @param:
   * @return: String body
   */
  function get_body() {
    return $this->_body;
  }

  /**
   * Set body
   * @param: String body
   * @return:
   */
  function set_body($body) {
    $this->_body = $body;
  }

  /**
   * Get abstract
   * @param:
   * @return: String abstract
   */
  function get_abstract() {
    return $this->_abstract;
  }

  /**
   * Set abstract
   * @param: String abstract
   * @return:
   */
  function set_abstract($abstract) {
    $this->_abstract = $abstract;
  }

  /**
   * Get date
   * @param:
   * @return: int date
   */
  function get_date() {
    return $this->_date;
  }

  /**
   * Set date
   * @param: int date
   * @return:
   */
  function set_date($date) {
    $this->_date = $date;
  }

  /**
   * Get date update
   * @param:
   * @return: int date_update
   */
  function get_date_update() {
    return $this->_date_update;
  }

  /**
   * Set date update
   * @param: int date_update
   * @return:
   */
  function set_date_update($date_update) {
    $this->_date_update = $date_update;
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

