<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_log_rec extends CI_Model {

    /**
     * @name string TABLE_NAME Holds the name of the table in use by this model
     */
    const TABLE_NAME = 'log_received';
    /**
     * @name string PRI_INDEX Holds the name of the tables' primary index used in this model
     */
    const PRI_INDEX = 'lrec_id';
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
     public function getList($where = NULL) {

        $this->db->select("*");
        $this->db->from(self::TABLE_NAME);
        $this->db->where('cat_id', $where);
        $result = $this->db->get()->result();

        return $result;

    }

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

        public function getAll($where = null , $all = false)
        {
            $this->db->select('*');
            $this->db->from('invento_logs lg');
            if ($where !== NULL) {
                if (is_array($where)) {
                    foreach ($where as $field=>$value) {
                        $this->db->where($field, $value);
                    }
                } else {
                    $this->db->where(self::PRI_INDEX, $where);
                }
            }
            if (!$all) {
                $this->db->where('lg.lg_id >', 0);
            }

            $this->db->join('status st', 'lg.lg_type = st.sta_id', 'left');

            $this->db->join('department dp', 'lg.dp_id = dp.dp_id', 'left');   

            $this->db->join('item_status is', 'lg.is_id = is.is_id', 'left');  

            $this->db->join('invento_items it', 'lg.lg_item = it.it_id', 'left');

            $this->db->join('invento_categories cat', 'lg.cat_id = cat.ct_id', 'left');

            $this->db->join('invento_subcategories sub', 'lg.sub_id = sub.su_id', 'left');

            $this->db->join('invento_users us', 'lg.us_user = us.id', 'left');

            $this->db->order_by('lg.lg_date', 'desc');

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
     * Deletes specified record from the database
     *
     * @param Array $where Optional. Associative array field_name=>value, for where condition. If specified, $id is not used
     * @return int Number of rows affected by the delete query
     */
    public function delete($where = array()) {

            $where = array(self::PRI_INDEX => $where);
    
        $this->db->delete(self::TABLE_NAME, $where);
        return $this->db->affected_rows();
    }

    public function count($filter = NULL, $like = null, $where = null,$st = null)
    {
        $this->db->from(self::TABLE_NAME);
        
        $this->db->where("it_id", $where);
        $this->db->where("sta_id", $st);
        
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

    public function get_curr( $limit = 2, $start = 0, $filter = array(), $like = NULL ,$where = NULL,$st = NULL)
    {
        $this->db->select('*');
        $this->db->from('logs lo');  

        $this->db->where("lo.it_id", $where);

        $this->db->where("lo.sta_id", $st);
        
        $this->db->join('invento_items it', 'it.it_id = lo.it_id', 'left');

        $this->db->join('unit un', 'un.un_id = it.un_id', 'left');  

        if ($st == 1) 
        {
            $this->db->join('received rec', 'rec.rec_id = lo.rec_id', 'left');   

            $this->db->join('received_supplier rs', 'rs.rec_id = rec.rec_id', 'left');  

            $this->db->join('supplier sup', 'sup.sup_id = rs.sup_id', 'left'); 
        
            $this->db->join('department dp', 'dp.dp_id = rec.dp_id', 'left');
               
        }
        elseif ($st == 2) 
        {
            $this->db->join('released rel', 'rel.rel_id = lo.rec_id', 'left');   

            $this->db->join('department dp', 'dp.dp_id = rel.dp_id', 'left');
            
        }
        

        $this->db->join('status sta', 'sta.sta_id = lo.sta_id', 'left');


        $this->db->join('invento_users us', 'us.id = lo.us_id', 'left');
                 


        $this->db->limit($limit, $start);
    	if($filter != NULL){
    		if(is_array($filter)){
             
    			foreach ($filter as $key => $value) {
                     $this->db->or_where('bi.bi_code', $value);
                }
    				
    			
    		}
    	}
    	
    	if($like != null){
    		if(is_array($like)){
    			$this->db->like($like);
    		}
        }

    	return $this->db->get()->result();

    }


}
        
?>

