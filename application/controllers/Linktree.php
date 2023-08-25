<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Linktree extends CI_Controller
{
	public $list_pills;
	public $list_badge;

	public function __construct()
	{
		parent::__construct();

		$this->list_pills = $this->readJsonFile('data_menu.json');
		$this->list_badge = $this->readJsonFile('data_badge.json');
	}

	public function index($param = null)
	{
		$data['isRoot'] = $param == null ? true : false;
		$data['pills'] = $this->getCurrentPagePills($this->list_pills, $param);
		$data['badges'] = $this->list_badge;

		$this->renderView('index', $data);
	}

	private function renderView($view, $vars = array(), $return = FALSE)
	{
		$this->load->view('_partials/head');
		$this->load->view($view, $vars, $return);
		$this->load->view('_partials/footer');
	}

	private function readJsonFile($filename)
	{
		return json_decode(file_get_contents("application/_data/" . $filename), true);
	}

	private function getCurrentPagePills($data, $parent)
	{
		$newData = array();
		foreach ($data as $d) {
			if ($d['parent'] == $parent) {
				array_push($newData, $d);
			}
		}

		return $newData;
	}
}
