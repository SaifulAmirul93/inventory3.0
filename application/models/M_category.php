<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_category extends CI_Model {

    /**
     * @name string TABLE_NAME Holds the name of the table in use by this model
     */
    const TABLE_NAME = 'invento_categories';

    /**
     * @name string PRI_INDEX Holds the name of the tables' primary index used in this model
     */
    const PRI_INDEX = 'ct_id';

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
     public function getList($where = NULL) {

        $this->db->select("*");
        $this->db->from(self::TABLE_NAME);
        $this->db->where('cat_id', $where);
        $result = $this->db->get()->result();

        return $result;

    }
    public function getList1($where = NULL) {

        $this->db->select("*");
        $this->db->from(self::TABLE_NAME);
        $this->db->where('ty_id', $where);
        $result = $this->db->get()->result();

        return $result;

    }
     public function getName($where = NULL) {

        $this->db->select("ct_name");
        $this->db->from(self::TABLE_NAME);
        $this->db->where('ct_id', $where);
        $result = $this->db->get()->result();

        return array_shift($result);

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


      

         public function getLvl(){
            $this->db->select("*");
            $this->db->from('invento_categories');
            $result = $this->db->get()->result();
            return $result;
        }

        public function getLvl2(){
            $this->db->select("*");
            $this->db->from('invento_subcategories');
            $result = $this->db->get()->result();
            return $result;
        }

        public function getAll($where = null , $all = false, $del = 0)
        {
            $this->db->select('*');
            $this->db->from('invento_categories ca');
            if ($where !== NULL) {
                if (is_array($where)) {
                    foreach ($where as $field=>$value) {
                        $this->db->where($field, $value);
                    }
                } else {
                    $this->db->where('ca.ct_id', $where);
                }
            }
            if($del != 1){              
                $this->db->where('ca.del', $del);
            } 
            $this->db->join('type ty', 'ca.ty_id = ty.ty_id', 'left');
          
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


     public function del($data = array(), $where = array()) {
            if (!is_array($where)) {
                $where =array(self::PRI_INDEX => $where);
                $del_id =array('del' => $data);
            }
          $this->db->update(self::TABLE_NAME, $del_id, $where);
          return $this->db->affected_rows();
      }
}
        
?>

