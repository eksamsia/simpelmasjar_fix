<?php
defined('BASEPATH') or exit('No direct script access allowed');
include 'application/controllers/auth/DefaultController.php';

class AdminController extends DefaultController
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *         http://example.com/index.php/welcome
     *    - or -
     *         http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct()
    {
        parent::__construct();
        $this->checkLogin();
    }

    public function index()
    {
        $data['list_rr'] = $this->getData();
        $this->load->view('users/page/home', $data);
    }

    private function getData()
    {
        $this->load->database();
        $this->db->select('*');
        $this->db->order_by("id", "asc");
        return $this->db->get('master_ruang')->result();
    }

}