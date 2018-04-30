<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

class Barcode_library
{
	// public function __construct()
	// {
	//     $this->obj =& get_instance();
	// }

    public function set_barcode($id  = null,$location = null)
    {
        
        $file = Zend_Barcode::draw('code128', 'image', array('text'=>$id), array());
		$id = time().$id;
        $store_image = imagepng($file,"{$location}/{$id}.png");
        return $id.'.png';
	}
}

?>
