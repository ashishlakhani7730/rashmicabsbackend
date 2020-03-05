<?php 
ob_start();
class state_city_model extends CI_Model
{
  	  function get_unique_states()
	   {
        $query = $this->db->query("SELECT DISTINCT state FROM cities");
        
            return $query->result();
        
      }
    
    function get_cities_from_state($state)
	 {
        $query = $this->db->query("SELECT city_name FROM cities WHERE state = '{$state}'");          
       
            return $query->result();
      
    }

}
?> 