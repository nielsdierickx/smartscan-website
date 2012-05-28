<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function get_categories()
    {
        $this->db->select('*')->from('categories');
        $query = $this->db->get();
        return $query->result();  
    }

    function get_products_by_category($categoryid, $promotions = null)
    {
        if($promotions != null)
        {
            $array = array();

            foreach ($promotions as $promotion)
            {
                $array[] = $promotion->product_id;
            }

            $this->db->select('*')->from('products')->where('category', $categoryid)->where_not_in('id', $array);
            $query = $this->db->get();
            return $query->result(); 
        }
        else
        {
            $this->db->select('*')->from('products')->where('category', $categoryid);
            $query = $this->db->get();
            return $query->result(); 
        }
    }

    function get_category_by_id($categoryid)
    {
        $this->db->select('*')->from('categories')->where('id', $categoryid);
        $query = $this->db->get();
        return $query->row(); 
    }

    function search_in_category($search, $catid)
    {
        $this->db->select('*')->from('products')->where('category', $catid)->like('name', $search);
        $query = $this->db->get();
        return $query->result();
    }
}