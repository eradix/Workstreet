<?php


/**
 * Main controller
 */
class Controller
{

	public function view($view, $data = [])
	{
		extract($data);
		$filename = '../app/views/' . $view . ".view.php";
		if (file_exists($filename)) {
			require $filename;
		} else {
			echo "Could not find the view file $filename";
		}
	}

	public function load_model($model)
	{
		if (file_exists("../app/models/" . $model . ".php")) {
			include "../app/models/" . $model . ".php";
			return $model = new $model();
		}
		$this->view('_404');
		return false;
	}
}
