<?php
require_once '../app/models/ApiModel.php';
class HomeController extends Controller {
  public function index() {
  //   if (true) { 
  //     throw new Exception("An error occurred while fetching data.");
  // }
    $apiModel = new ApiModel();
    $apiData = $apiModel->fetchData();
    $this->view('landing/index', ['apiData' => $apiData]);
  }
}
