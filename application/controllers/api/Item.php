<?php

header('Access-Control-Allow-Origin: *');

if($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
	header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
	header('Access-Control-Allow-Headers: Content-Type');
	exit;
}

//required for REST API
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Item extends REST_Controller {

	/**
	 * Get All Data from this method.
	 *
	 * @return Response
	 */
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->model('Item_model', 'wm');
	}

	/**
	 * Get All Data from this method.
	 *
	 * @return Response
	 */
	public function index_get($id = 0)
	{
		$websites = $this->wm->index_get($id);
		echo $this->response($websites, REST_Controller::HTTP_OK);
	}

	/**
	 * Get All Data from this method.
	 *
	 * @return Response
	 */
	public function index_post()
	{
		$input = $this->input->post();
		$result = $this->wm->index_post($input);

		if ($result === FALSE) {
			$this->response(array('status' => 'failed'), REST_Controller::HTTP_OK);
		} else {
			$this->response(array('status' => 'success'), REST_Controller::HTTP_OK);
		}

		//$this->response(['Item created successfully.'], REST_Controller::HTTP_OK);
	}

	/**
	 * Get All Data from this method.
	 *
	 * @return Response
	 */
	public function index_put($id)
	{
		$input = $this->put();
		$result = $this->wm->index_put($id, $input);

		if ($result === FALSE) {
			$this->response(array('status' => 'failed'), REST_Controller::HTTP_OK);
		} else {
			$this->response(array('status' => 'success'), REST_Controller::HTTP_OK);
		}

		//$this->response(['Item updated successfully.'], REST_Controller::HTTP_OK);
	}

	/**
	 * Get All Data from this method.
	 *
	 * @return Response
	 */
	public function index_delete($id)
	{
		$result = $this->wm->index_delete($id);

		if ($result === FALSE) {
			$this->response(array('status' => 'failed'));
		} else {
			$this->response(array('status' => 'success'));
		}

//		$this->response(['Item deleted successfully.'], REST_Controller::HTTP_OK);
	}

}
