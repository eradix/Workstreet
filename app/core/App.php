<?php

/**
 * main class app
 */
class App
{
	protected $controller = "_404";
	protected $method = "index";

	function __construct()
	{
		$arr_url = $this->getUrl();

		$filename = "../app/controllers/" . ucfirst($arr_url[0]) . ".php";

		if (file_exists($filename)) {
			require $filename;
			$this->controller = $arr_url[0];
			unset($arr_url[0]);
		} else {
			require "../app/controllers/" . $this->controller . ".php";
		}

		$myController = new $this->controller();

		$myMethod = $arr_url[1] ?? $this->method;

		if (!empty($arr_url[1])) {

			if (method_exists($myController, strtolower($myMethod))) {
				$this->method = strtolower($myMethod);
				unset($arr_url[1]);
			}
		}
		$arr_url = array_values($arr_url);
		call_user_func_array([$myController, $this->method], $arr_url);
	}

	//pag ndi nahanap ung url redirect sa _404 page
	private function getUrl()
	{
		$url = $_GET['url'] ?? '_404';
		$url = filter_var($url, FILTER_SANITIZE_URL);
		$arr_url = explode("/", $url);
		return $arr_url;
	}
}
