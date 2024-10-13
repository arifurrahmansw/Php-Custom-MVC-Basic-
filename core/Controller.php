<?php
class Controller {
  public function view($view, $data = []) {
    require_once "resources/views/$view.php";
  }
}
