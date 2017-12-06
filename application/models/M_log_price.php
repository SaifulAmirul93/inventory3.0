<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_log_price extends CI_Model {

    /**
     * @name string TABLE_NAME Holds the name of the table in use by this model
     */
    const TABLE_NAME = 'invento_price';

    /**
     * @name string PRI_INDEX Holds the name of the tables' primary index used in this model
     */
    const PRI_INDEX = 'pi_id';

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
        // if ($where !== NULL) {
        //     if (is_array($where)) {
        //         foreach ($where as $field=>$value) {
        //             $this->db->where($field, $value);
        //         }
        //     } else {
        //         $this->db->where(self::PRI_INDEX, $where);
        //     }
        // }
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
        // echo "<script>alert($where);</script>";

        $this->db->select("*");
        $this->db->from(self::TABLE_NAME);
        $this->db->where('cat_id', $where);
        $result = $this->db->get()->result();

        return $result;




        // $this->db->select('*');
        // $this->db->from(self::TABLE_NAME);
        // if ($where !== NULL) {
        //     if (is_array($where)) {
        //         foreach ($where as $field=>$value) {
        //             $this->db->where($field, $value);
        //         }
        //     } else {
        //         $this->db->where('cat_id', $where);
        //     }
        // }
        // $result = $this->db->get()->result();
        // echo "<script>alert($result);</script>";
        // if ($result) {
        //     if ($where !== NULL) {
        //         return array_shift($result);
        //     } else {
        //         return $result;
        //     }
        // } else {
        //     return false;
        // }
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

     public function total_stat($wh)
          {
      
            
            $this->db->from(self::TABLE_NAME);
            $this->db->where('lg_type', $wh);
            $result = $this->db->count_all_results();

            return $result;
                    
          }

      public function updateQty1($qty , $wh , $id , $st)
      {
      
        $this->db->select('*');
        $this->db->from(self::TABLE_NAME);
        $this->db->where(self::PRI_INDEX, $wh);
        $result=$this->db->get()->result();
        $arr=array_shift($result);
        //$qty = $arr->it_qty - $qty;
        print_r($arr);


        // $arr = array_shift($this->db->get()->result());
        if($st==1)
        {
          $total = $arr->it_qty + $qty;
        }
        else if($st==2)
        {
          $total = $arr->it_qty-$qty;
        }
        
        $a = array(
          'it_qty' => $total
        );


        $diff=$qty - $arr->it_qty; 

        //$this->update($a , $arr->it_id);

        

        $arr1 = array(
          'cat_id' => $arr->ct_category,
          'lg_type' => $st,
          'lg_item' => $arr->it_id,
          'lg_fromqty' =>$arr->it_qty,
          'lg_toqty' => $qty,
          'lg_qtyDiff' => $diff,
          'us_user' => $id

        );

        echo "<br>";
        print_r($arr1);

        //$this->db->insert('ship_log', $arr1);

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

    


      // public function getList()
      //   {


      //       $arr = $this->db->select('*')->from(self::TABLE_NAME)->get();
            
            /*$this->db->select('*');
            $this->db->from(self::TABLE_NAME);*/
            /*  if ($where !== NULL) {
            if (is_array($where)) {
                foreach ($where as $field=>$value) {
                    $this->db->where($field, $value);
                }
            } else {
                $this->db->where(self::PRI_INDEX, $where);
            }
        }*/

           /* $arr = $this->db->get();*/

           /* for ($i=0; $i < sizeof($result); $i++) { 
                $result[$i]->supplier = $this->db->get()->result();
            }*/
        //     return $arr->result();
        // }

         public function getLvl(){
            $this->db->select("*");
            $this->db->from('invento_categories');
            $result = $this->db->get()->result();
            return $result;
        }

        public function getAll($where = null , $all = false)
        {
            $this->db->select('*');
            $this->db->from('invento_price pi');
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
                $this->db->where('pi.pi_id >', 0);
            }

            $this->db->join('status st', 'pi.pi_type = st.sta_id', 'left');  

            $this->db->join('item_status is', 'pi.pi_type = is.is_id', 'left');  

            $this->db->join('invento_items it', 'pi.pi_item = it.it_id', 'left');

            $this->db->join('invento_categories cat', 'pi.cat_id = cat.ct_id', 'left');

            $this->db->join('invento_subcategories sub', 'pi.su_id = sub.su_id', 'left');

            $this->db->join('invento_users us', 'pi.us_user = us.id', 'left');

            $this->db->order_by('pi.pi_date', 'desc');

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
}
        
?>

