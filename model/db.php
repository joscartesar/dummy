<?php

/**
 * @file database handler
 */

/**
 * Db connection and raw queries
 */

class Db {

  /**
   * Constructor, connection to database
   */

  function Db() {
    $this->_con = mysqli_connect("localhost", "dummyUser", "dummy", "dummyBlog");

    //Check connection:
    if (mysqli_connect_errno($this->_con)) {
      die("Failed to connect to MySQL: ". mysqli_connect_error());
    }
  }

  /**
   * Execute query
   * @param: $sql -> SQL query
   * @return: query result set
   */
  function fetch($sql) {
    $result = mysqli_query($this->_con, $sql);
    return $result;
  }

  /**
   * Execute query
   * @param: $sql -> SQL query
   * @return: first row of the query
   */
  function fetch_row($sql) {
    $sql.= ' LIMIT 0,1';
    $result = mysqli_query($this->_con, $sql);
    $row = mysqli_fetch_array($result);
    return $row;
  }
}

global $db;
$db = new Db;


?>

