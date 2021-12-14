<?php 

	
	//****Start of Database Model*********//
    class Database extends CI_Model{


    	//****Start of Insert Data*********//
    	public function insert($table,$data)
    	{

    		$this->db->set($data);
			$flag = $this->db->insert($table,$data);
			return $flag;
    	}
    	//****End of Insert Data**********//


    	//****Start of Select Data***********//
    	public function select($table)
    	{
    		$query = $this->db->get($table);
		    return $query->result_array();
    	}
    	//****End of Select Data************//


    	//**Start of Select With Where **********//
    	public function selectWhere($table,$data)
    	{
    		$this->db->where($data);
    		$query = $this->db->get($table);
    		$result = $query->result_array();
        	return $result[0];
    	}
    	//***End of Select With Where**********//



    	//***Start of Select Row*********//
    	public function selectRow($table,$data)
    	{

    		 $this->db->where($data);
	        $query = $this->db->get($table);
	        return $query->row();
    	}
    	//***End of Select Row**********//

    	//**Start of Delete Function*******//
      	public function delete($table,$where)
      	{
      		 $this->db->where($where);
      		 $result = $this->db->delete($table);
      	}
		//***End of Delete Function******//


    }
	//****End of Database Model**********//


?>