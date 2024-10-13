<?php
require_once '../app/Models/ApiModel.php';
class HomeController extends Controller
{
  public function index()
  {
    try {
      $apiModel = new ApiModel();
      $apiData = $apiModel->getAPIdata();
      $this->view('landing/index', ['rows' => $apiData]);
    } catch (Exception $e) {
      error_log($e->getMessage());
      dd($e->getMessage());
      $errorMessage = 'An error occurred while fetching data. Please try again later.';
      $this->view('landing/index', ['apiData' => [], 'errorMessage' => $errorMessage]);
    }
  }
}
