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
        $this->db->select('list_details.id as listdetailid, list_details.list_id, list_details.amount, products.*, promotions.*')->from('list_details')
        ->where('list_id', $listid)
        ->join('products', 'products.id = list_details.product_id')
        ->join('promotions', 'promotions.id = list_details.promotion_id', 'left');

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

    function update_amount_plus($id)
    {
        $this->db->set('amount', 'amount+1', FALSE)->where('id',$id)->update('list_details');
    }

    function update_amount_minus($id)
    {
        $this->db->set('amount', 'amount-1', FALSE)->where('id',$id)->update('list_details');
        
        $this->db->select('amount')->from('list_details')->where('id', $id);
        $result = $this->db->get();

        if($result->row('amount') <= 0)
        {
            $this->delete_product($id);
        }
    }

    // Product toevoegen aan lijst
    function add_product($product)
    { 
        if ($this->db->select('*')->from('list_details')->where('list_id', $product['list_id'])->where('product_id', $product['product_id'])->count_all_results() == 0)
        {
            // Product staat nog niet in de lijst, insert
            $this->db->insert('list_details', $product); 
        }
        else
        {
            // Product is al toegevoegd, update het aantal
            $this->db->set('amount', 'amount+'.$product['amount'], FALSE)
            ->where('list_id',$product['list_id'])
            ->where('product_id',$product['product_id'])
            ->update('list_details');
        }       
    }

}