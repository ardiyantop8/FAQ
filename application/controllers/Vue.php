<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vue extends CI_Controller
{
    public function index()
    {
        $this->load->view('latihanVue');
    }
}
