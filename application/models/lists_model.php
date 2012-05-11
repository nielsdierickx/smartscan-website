<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lists_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    function get_lists_user($id)
    {
        $query = $this->db->get_where('lists', array('user_id' => $id));
        return $query->result();
    }

    function get_list_by_id($id)
    {
        $this->db->select('*')->from('lists')->where('id', $id)->limit(1);
        $query = $this->db->get();
        return $query->row(); 
    }

    function get_all_by_name($name, $userid)
    {
        $this->db->select('*')->from('lists')->where('user_id', $userid)->like('name', $name);
        $query = $this->db->get();
        return $query->result();
    }

    function get_product_count($listid)
    {
        return $this->db->where('list_id', $listid)->count_all_results('list_details');
    }

    function get_list_id($listname, $userid)
    {
        $this->db->select('id')->from('lists')->where('name', $listname)->where('user_id', $userid)->limit(1);
        $query = $this->db->get();
        return $query->row('id'); 
    }

    function get_products($listid)
    {
        $this->db->select('list_details.id as listdetailid, list_details.list_id, list_details.amount, products.*')->from('list_details')->where('list_id', $listid)->join('products', 'products.id = list_details.product_id');
        $query = $this->db->get();
        return $query->result(); 
    }

    function delete_list($id)
    {
        $this->db->delete('lists', array('id' => $id)); 
    }

    function delete_product($id)
    {
        $this->db->delete('list_details', array('id' => $id)); 
    }

    function insert($list)
    {
        $this->db->insert('lists', $list);
    }

}