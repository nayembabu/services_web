<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Notification extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('notification_model');
        $this->load->helpers('date');
    }

    public function index()
    {
        $data = array();
        $data['title'] = 'Notifications';
        $data['notifications'] = $this->notification_model->get_latest_notifications();
        $data['content'] = $this->load->view('dashboard/notification', $data, true);

        // load dashboard

        $this->load->view('dashboard/index', $data);
    }

    public function show($id)
    {

        $data = array();
        $data['data'] = $this->notification_model->getById($id);
        $data['title'] = ' Edit Notifications';
        $data['content'] = $this->load->view('dashboard/show', $data, true);

        // load dashboard

        $this->load->view('dashboard/index', $data);
    }

    // Upload image

    public function upload_img($id)
    {
        if (isset($_FILES['image_file']['name'])) {
            $config['upload_path'] = './upload/nid';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image_file')) {
                echo $this->upload->display_errors();
            } else {
                $this->notification_model->upload_nid('image_file', $id);
            }
        }
    }
}
