<?php

// $filepath = realpath(dirname(_FILE_));
// include_once ($filepath.'../lib/database.php');
// include_once ($filepath.'../helper/format.php');
include_once(dirname(__FILE__) . '/../lib/database.php'); 
include_once(dirname(__FILE__) . '/../helper/format.php'); 
?>
<?php
/**
 * summary
 */
class brand
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_brand($brandName){
$brandName = $this->fm->validation($brandName);

$brandName = mysqli_real_escape_string($this->db->link, $brandName);

if(empty($brandName) ){
	$alert = "Brand must be not empty";
	return $alert;
    }else{
    	$query = "INSERT INTO tbl_brand(brandName) VALUES('$brandName')";
    	$result = $this->db->insert($query);
    	if($result){
            $alert = "<span class='success'>Insert Category Success</span>>";
            return $alert;
        }else{
            $alert = "<span class='success'>Insert Category Not Success</span>";
            return $alert;
        }
    }
}
   public function show_brand(){
    $query = "SELECT * FROM tbl_brand order by brandId desc";
    $result = $this->db->select($query);
    return $result;
   }
   public function getbrandbyId($id){
     $query = "SELECT * FROM tbl_brand where brandId = '$id' ";
    $result = $this->db->select($query);
    return $result;
   }
   public function update_brand($brandName,$id){
    $brandName = $this->fm->validation($brandName);
    $brandName = mysqli_real_escape_string($this->db->link, $brandName);
    $id = mysqli_real_escape_string($this->db->link, $id);
    if(empty($brandName) ){
    $alert = "Brand must be not empty";
    return $alert;
    }else{
        $query = "UPDATE tbl_brand SET brandName ='$brandName' where brandId='$id'";
        $result = $this->db->update($query);
        if($result){
            $alert = "<span class='success'> Brand Update Success</span>>";
            return $alert;
        }else{
            $alert = "<span class='success'> Brand Update Not Success</span>";
            return $alert;
        }
    }
   }
   public function delete_brand($id){
    $query = "DELETE  FROM tbl_brand where brandId = '$id' ";
    $result = $this->db->delete($query);
    if($result){
            $alert = "<span class='success'> Brand Delete Success</span>";
            return $alert;
        }else{
            $alert = "<span class='success'> Brand Delete Not Success</span>";
            return $alert;
        }
   
   }
}
?>