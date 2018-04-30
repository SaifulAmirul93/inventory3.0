<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_request extends CI_Model {

    
    /**
     * @name string TABLE_NAME Holds the name of the table in use by this model
     */
    const TABLE_NAME = 'request';

    /**
     * @name string PRI_INDEX Holds the name of the tables' primary index used in this model
     */
    const PRI_INDEX = 're_id';
     /**
     * Inserts new data into database
     *
     * @param Array $data Associative array with field_name=>value pattern to be inserted into database
     * @return mixed Inserted row ID, or false if error occured
     */
    public function insert(Array $data) {
        if ($this->db->insert(self::TABLE_NAME, $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }
    /**
     * Retrieves record(s) from the database
     *
     * @param mixed $where Optional. Retrieves only the records matching given criteria, or all records if not given.
     *                      If associative array is given, it should fit field_name=>value pattern.
     *                      If string, value will be used to match against PRI_INDEX
     * @return mixed Single record if ID is given, or array of results
     */
    public function get($where = NULL) {
       
        $this->db->select('*');
        $this->db->from(self::TABLE_NAME);
         $this->db->where(self::PRI_INDEX, $where);
        if ($where !== NULL) {
            if (is_array($where)) {
                foreach ($where as $field=>$value) {
                    $this->db->where($field, $value);
                }
            } else {
                $this->db->where(self::PRI_INDEX, $where);
            }
        }
        $result = $this->db->get()->result();

        if ($result) {
            if ($where !== NULL) {
                return array_shift($result);
            } else {
                return $result;
            }
        } else {
            return false;
        }
    }

        /**
     * Updates selected record in the database
     *
     * @param Array $data Associative array field_name=>value to be updated
     * @param Array $where Optional. Associative array field_name=>value, for where condition. If specified, $id is not used
     * @return int Number of affected rows by the update query
     */
    public function update(Array $data, $where = array()) {
            if (!is_array($where)) {
                $where = array(self::PRI_INDEX => $where);
            }
        $this->db->update(self::TABLE_NAME, $data, $where);
        return $this->db->affected_rows();
    }

        /**
     * Deletes specified record from the database
     *
     * @param Array $where Optional. Associative array field_name=>value, for where condition. If specified, $id is not used
     * @return int Number of rows affected by the delete query
     */
    public function delete($where = array()) {

        $where = array(self::PRI_INDEX => $where);
        $delete =array('del' => 1);
            
        $this->db->update(self::TABLE_NAME, $delete, $where);
        
        return $this->db->affected_rows();
    }

    public function count($filter = NULL, $like = null, $where = null, $delete = 0)
    {
        $this->db->from(self::TABLE_NAME);
        
	    $this->db->where('del', $delete);
	    	
        if($filter != NULL || $like != NULL)
        {
            if (is_array($filter) && $filter != NULL) 
            {
                foreach ($filter as $key => $value) {
                     $this->db->or_where(self::PRI_INDEX, $value);
                }
            }

            if (is_array($like) && $like != NULL) {
                $this->db->like($like);
            }
            return $this->db->count_all_results();
        }
        else 
        {
            return $this->db->count_all_results();            
        }
    }

    public function get_curr( $limit = 10, $start = 0, $filter = array(), $like = NULL ,$where = NULL,$st = NULL,$delete = 0)
    {
        $this->db->from('request re');

        $this->db->join('department de', 'de.dp_id = re.dp_id', 'left');
        $this->db->join('invento_users iu', 'iu.id = re.us_id', 'left');
        $this->db->join('request_status rs', 'rs.rs_id = re.rs_id', 'left');
        
        
        $this->db->where('del', $delete);
	    
        $this->db->limit($limit, $start);

    	if($filter != NULL){
            if(is_array($filter))
            {
             
                foreach ($filter as $key => $value) 
                {
                     $this->db->where($key , $value);
                }	
    		}
    	}
    	
    	if($like != null){
    		if(is_array($like)){
    			$this->db->like($like);
    		}
        }

        $this->db->order_by('re.re_date', 'desc');

    	return $this->db->get()->result();
        
    }

    public function getList($where = NULL)
    {
        
        $this->db->select('*');
        $this->db->from('request re');

        $this->db->join('department de', 'de.dp_id = re.dp_id', 'left');
        $this->db->join('invento_users iu', 'iu.id = re.us_id', 'left');
        $this->db->join('request_status rs', 'rs.rs_id = re.rs_id', 'left');
        $this->db->join('request_barcode rb', 'rb.re_id = re.re_id', 'left');

        if ($where !== NULL) 
        {
            if (is_array($where)) 
            {
                foreach ($where as $field => $value)
                {
                    $this->db->where($field, $value);    
                }   
            }
            else 
            {
                $this->db->where('re.re_id', $where);   
            }
        }

        $result = $this->db->get()->result();
        $data = array();

        foreach ($result as $key) 
        {
            
            $this->db->select('*');

            $this->db->from('request_item ri');

            $this->db->join('invento_items it', 'it.it_id = ri.it_id', 'left');

            $this->db->join('barcode ba', 'ba.item_id = it.it_id', 'left');

            $this->db->join('unit un', 'un.un_id = it.un_id', 'left');
            
            $this->db->join('type ty', 'ty.ty_id = it.ty_id', 'left');

            $this->db->join('invento_subcategories sub', 'it.su_category = sub.su_id', 'left');

            $this->db->join('invento_categories ct', 'ct.ct_id = sub.cat_id', 'left');

            $this->db->where('ri.re_id', $key->re_id);
            
            $res2 = $this->db->get()->result();

            $this->db->select('username');
            $this->db->from('invento_users');
            $this->db->where('id', $key->us_id);
            
            $res3 = $this->db->get()->result();
            
            $res3 = array_shift($res3);

            $this->db->select('username');
            $this->db->from('invento_users');
            $this->db->where('id', $key->ve_id);

            $res4 = $this->db->get()->result();
            
            $res4 = array_shift($res4);

            $data[] = array(
                'verified' => $res4,                
                'user' => $res3,
                'request' => $key,
                'item' => $res2
             );
            
             return $data;
        }

        
        
    }


}

