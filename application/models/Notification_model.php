<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Notification_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('dd_helper');
    }



    public function get_latest_notifications()
    {
        $all_notifications = $this->db->select('*')
            ->where('status', '1')
            ->order_by('created_at', 'DESC')
            ->get('nid_request');

        return $all_notifications->result();
        // dd($all_notifications);
        // exit();
    }


    // count all noti
    public function count_all()
    {
        $data = $this->db->count_all_results('nid_request');
        return $data;
        // dd($data);
    }


    public function getById($id)
    {
        $data =  $this->db->get_where('nid_request', array('id' => $id))->row();
        return $data;
    }

    function nid_upload($data)
    {
        dd($data);
        
    }
}
