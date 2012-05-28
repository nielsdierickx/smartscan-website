<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transactions_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function get_recent_transactions($userid)
    {
        $this->db->select('transactions.id as transactionid, transactions.*, products.*, promotions.*')->from('transactions')
        ->where('user_id', $userid)
        ->where('date >= DATE_SUB(NOW(), INTERVAL 7 DAY)') 
        ->join('products', 'products.id = transactions.product_id')
        ->join('promotions', 'promotions.id = transactions.promotion_id', 'left');

        $query = $this->db->get();
        return $query->result(); 
    }

    function get_transactions($userid)
    {
        $recent_transactions = $this->get_recent_transactions($userid);

        if(count($recent_transactions) > 0)
        {
            $array = array();

            foreach ($recent_transactions as $transaction)
            {
                $array[] = $transaction->transactionid;
            }

            $this->db->select('transactions.id as transactionid, transactions.*, products.*, promotions.*')->from('transactions')
            ->where('user_id', $userid)
            ->where_not_in('transactions.id', $array)
            ->join('products', 'products.id = transactions.product_id')
            ->join('promotions', 'promotions.id = transactions.promotion_id', 'left');

            $query = $this->db->get();
            return $query->result();
        }
        else
        {
            $this->db->select('transactions.id as transactionid, transactions.*, products.*, promotions.*')->from('transactions')
            ->where('user_id', $userid)
            ->join('products', 'products.id = transactions.product_id')
            ->join('promotions', 'promotions.id = transactions.promotion_id', 'left');

            $query = $this->db->get();
            return $query->result();   
        }
        
    }

    function get_transaction($id, $userid)
    {
        $this->db->select('transactions.id as transactionid, transactions.product_id as tproduct_id, transactions.*, products.*, promotions.*')->from('transactions')
        ->where('user_id', $userid)
        ->where('transactions.id', $id)
        ->join('products', 'products.id = transactions.product_id')
        ->join('promotions', 'promotions.id = transactions.promotion_id', 'left');

        $query = $this->db->get();
        return $query->row();
    }

    function get_product_transactions($id, $userid)
    {
        $this->db->select('transactions.id as transactionid, transactions.*, products.*')->from('transactions')
        ->where('user_id', $userid)
        ->where('transactions.product_id', $id)
        ->join('products', 'products.id = transactions.product_id');

        $query = $this->db->get();
        return $query->result();
    }
}