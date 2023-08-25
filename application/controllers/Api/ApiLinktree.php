<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ApiLinktree extends CI_Controller
{
    public $access_log;

    public $user_agent;

    public function __construct()
    {
        parent::__construct();

        $this->access_log = $this->readJsonFile('access_log.json');
        $this->user_agent = user_agent();
    }

    public function redirectCount()
    {
        $key = $this->input->post('key');

        $this->pushNewData($key);

        write_file('application/_data/access_log.json', json_encode($this->access_log));

        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode([
                'success' => true
            ]));
    }

    private function pushNewData($key)
    {
        if (!is_array($this->access_log)) $this->access_log = array();

        $newData = [];

        $newData['pages'] = $key;
        $newData['client_ip'] = $this->input->ip_address();
        $newData['agent'] = $this->user_agent['agent_string'];
        $newData['platform'] = $this->user_agent['platform'];
        $newData['browser'] = $this->user_agent['browser'];
        $newData['city'] = $this->user_agent['city'];
        $newData['region'] = $this->user_agent['region'];
        $newData['country'] = $this->user_agent['country'];
        $newData['loc'] = $this->user_agent['loc'];
        $newData['timestamps'] = date("Y-m-d H:i:s");

        array_push($this->access_log, $newData);
    }

    private function readJsonFile($filename)
    {
        return json_decode(file_get_contents("application/_data/" . $filename), true);
    }
}
