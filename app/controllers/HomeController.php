<?php
require_once 'app/Models/ApiModel.php';
class HomeController extends Controller
{
  public function index()
  {
    try {
      $model = new ApiModel();
      $data = $model->getAPIdata();
      $this->view('landing/index', ['rows' => $data]);
    } catch (Exception $e) {
      error_log($e->getMessage());
      dd($e->getMessage());
      $errorMessage = 'An error occurred while fetching data. Please try again later.';
      $this->view('landing/index', ['apiData' => [], 'errorMessage' => $errorMessage]);
    }
  }
}
