<?php

class ApiModel extends Model
{
  private $apiUrl = "https://jsonplaceholder.typicode.com/posts";

  public function getAPIdata()
  {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $this->apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    if ($httpCode !== 200) {
      error_log("API request failed with HTTP code: " . $httpCode);
      return [];
    }
    $data = json_decode($response, true);
    return $data !== null ? $data : [];
  }
}
