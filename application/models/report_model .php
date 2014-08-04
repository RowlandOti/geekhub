<?php
class Report_model extends CI_Model
{
    
    function __construct()
    {
        parent::__construct();
    }
    
    function method_count($method)
    {
        $sql   = "SELECT * FROM entries WHERE method = ?";
        $query = $this->db->query($sql, $method);
        $value = $query->num_rows();
        return $value;
    }
    
    function entry_count()
    {
        $sql   = "SELECT * FROM entries";
        $query = $this->db->query($sql);
        $value = $query->num_rows();
        return $value;
    }
    
}