<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Promotions_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function get_promotions()
    {
        $this->db->select('promotions.id as promotionid, discount, products.*')->from('promotions')
        ->where('date_start <=', date('Y-m-d h:m:s'))
        ->where('date_end >=', date('Y-m-d h:m:s'))
        ->join('products', 'products.id = promotions.product_id');

        $query = $this->db->get();
        return $query->result(); 
    }

    function get_promotions_by_category($category)
    {
        $this->db->select('promotions.id as promotionid, promotions.product_id, promotions.date_start, promotions.date_end, promotions.discount, products.*')->from('promotions')
        ->where('date_start <=', date('Y-m-d h:m:s'))
        ->where('date_end >=', date('Y-m-d h:m:s'))
        ->where('products.category', $category)
        ->join('products', 'products.id = promotions.product_id');
        
        $query = $this->db->get();
        return $query->result(); 
    }
}