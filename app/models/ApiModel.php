<?php

class ApiModel extends Model {
  public function fetchData() {
    $apiUrl = "https://jsonplaceholder.typicode.com/posts";
    $response = file_get_contents($apiUrl);
    if ($response === FALSE) {
      return [];
    }
    return json_decode($response, true);
  }
}
