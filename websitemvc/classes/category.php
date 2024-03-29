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
class category
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_category($catName){
$catName = $this->fm->validation($catName);

$catName = mysqli_real_escape_string($this->db->link, $catName);

if(empty($catName) ){
	$alert = "Category must be not empty";
	return $alert;
    }else{
    	$query = "INSERT INTO tbl_category(catName) VALUES('$catName')";
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
   public function show_category(){
    $query = "SELECT * FROM tbl_category order by catId desc";
    $result = $this->db->select($query);
    return $result;
   }
   public function getcatbyId($id){
     $query = "SELECT * FROM tbl_category where catId = '$id' ";
    $result = $this->db->select($query);
    return $result;
   }
   public function update_category($catName,$id){
    $catName = $this->fm->validation($catName);
    $catName = mysqli_real_escape_string($this->db->link, $catName);
    $id = mysqli_real_escape_string($this->db->link, $id);
    if(empty($catName) ){
    $alert = "Category must be not empty";
    return $alert;
    }else{
        $query = "UPDATE tbl_category SET catName ='$catName' where catId='$id'";
        $result = $this->db->update($query);
        if($result){
            $alert = "<span class='success'> Category Update Success</span>>";
            return $alert;
        }else{
            $alert = "<span class='success'> Category Update Not Success</span>";
            return $alert;
        }
    }
   }
   public function delete_category($id){
    $query = "DELETE  FROM tbl_category where catId = '$id' ";
    $result = $this->db->delete($query);
    if($result){
            $alert = "<span class='success'> Category Delete Success</span>";
            return $alert;
        }else{
            $alert = "<span class='success'> Category Delete Not Success</span>";
            return $alert;
        }
   
   }
}
?>