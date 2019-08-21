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
class product
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_product($data,$files){


$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
$brand = mysqli_real_escape_string($this->db->link, $data['brand']);
$category = mysqli_real_escape_string($this->db->link, $data['category']);
$product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
$price = mysqli_real_escape_string($this->db->link, $data['price']);
$type = mysqli_real_escape_string($this->db->link, $data['type']);

$permited = array('jpg','jpeg','png','gif');
$file_name = $_FILES['image']['name'];
$file_size = $_FILES['image']['size'];
$file_temp = $_FILES['image']['tmp_name'];

$div = explode('.', $file_name);
$file_ext = strtolower(end($div));
$unique_image = substr(md5(time()),0,10).'.'.$file_ext;
$uploaded_image = "uploads/".$unique_image;
if($productName=="" || $brand=="" ||$category=="" ||$product_desc=="" ||$price=="" ||
   $type=="" || $file_name==""){
  $alert = "<span class='error'>File must be not empty</span>";
  return $alert;
    }else{
        move_uploaded_file($file_temp , $uploaded_image);
      $query = "INSERT INTO tbl_product(productName,catId,brandId,product_desc,type,price,image) VALUES
        ('$productName','$category','$brand','$product_desc','$type','$price','$unique_image')";
      $result = $this->db->insert($query);
      if($result){
            $alert = "<span class='success'>Insert Product Success</span>>";
            return $alert;
        }else{
            $alert = "<span class='success'>Insert Product Not Success</span>";
            return $alert;
        }
    }
}

   public function show_product(){
    $query = "SELECT  tbl_product.*,tbl_category.catName,tbl_brand.brandName FROM
    tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId
    INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId
     order by tbl_product.productId desc";


    // $query = "SELECT * FROM tbl_product order by productId desc";
    $result = $this->db->select($query);
    return $result;
   }
   public function getproductbyId($id){
     $query = "SELECT * FROM tbl_product where productId = '$id' ";
    $result = $this->db->select($query);
    return $result;
   }
   public function delete_product($id){
    $query = "DELETE  FROM tbl_product where productId = '$id' ";
    $result = $this->db->delete($query);
    if($result){
            $alert = "<span class='success'> Category Delete Success</span>";
            return $alert;
        }else{
            $alert = "<span class='success'> Category Delete Not Success</span>";
            return $alert;
        }
   
   }
   public function update_product($data,$files,$id){
$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
$brand = mysqli_real_escape_string($this->db->link, $data['brand']);
$category = mysqli_real_escape_string($this->db->link, $data['category']);
$product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
$price = mysqli_real_escape_string($this->db->link, $data['price']);
$type = mysqli_real_escape_string($this->db->link, $data['type']);

$permited = array('jpg','jpeg','png','gif');
$file_name = $_FILES['image']['name'];
$file_size = $_FILES['image']['size'];
$file_temp = $_FILES['image']['tmp_name'];

$div = explode('.', $file_name);
$file_ext = strtolower(end($div));

$unique_image = substr(md5(time()),0,10).'.'.$file_ext;
$uploaded_image = "uploads/".$unique_image;
if($productName=="" || $brand=="" ||$category=="" ||$product_desc=="" ||$price=="" ||
   $type=="" ){
  $alert = "<span class='error'>File must be not empty</span>";
  return $alert;
    }else{
      if(!empty($file_name)){
      if($file_size >20480){
      
        $alert = "<span class='success'>Image Size should be less then 2 MB!</span>>";
            return $alert;
      }elseif(in_array($file_ext,$permited) === false){
        // echo "<span class='error'>You can upload only:-".implode(',',$permited)."</span>";
        $alert = "<span class='success'>You can upload only:-".implode(',',$permited)."</span>";
            return $alert;
      }
       move_uploaded_file($file_temp , $uploaded_image);
       $query = "UPDATE tbl_product SET 
       productName ='$productName', 
       catId ='$category', 
       brandId ='$brand', 
       product_desc ='$product_desc', 
       type ='$type', 
       price ='$price', 
       image ='$unique_image' 
       where productId='$id'";
       $result = $this->db->update($query);
        if($result){
            $alert = "<span class='success'> Product Update Success</span>>";
            return $alert;
        }else{
            $alert = "<span class='success'> Product Update Not Success</span>";
            return $alert;
        }
    }else{
       $query = "UPDATE tbl_product SET 
       productName ='$productName', 
       catId ='$category', 
       brandId ='$brand', 
       product_desc ='$product_desc', 
       type ='$type', 
       price ='$price' 
       where productId='$id'";
   }
    }
     $result = $this->db->update($query);
        if($result){
            $alert = "<span class='success'> Product Update Success</span>>";
            return $alert;
        }else{
            $alert = "<span class='success'> Product Update Not Success</span>";
            return $alert;
        }
   }
   public function getproduct_feathered(){
     $query = "SELECT * FROM tbl_product where type = '0' ";
    $result = $this->db->select($query);
    return $result;
   }
   public function getproduct_new(){
    $query = "SELECT * FROM tbl_product order by productId desc LIMIT 4 ";
    $result = $this->db->select($query);
    return $result;
   }
   public function get_details($id){
    $query = "SELECT  tbl_product.*,tbl_category.catName,tbl_brand.brandName FROM
    tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId
    INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId
     Where tbl_product.productId= '$id'";

     $result = $this->db->select($query);
    return $result;
   }
   public function getLastesDell(){
    $query = "SELECT * FROM tbl_product WHERE brandId='4' order by productId desc LIMIT 4 ";
    $result = $this->db->select($query);
    return $result;
   }
   public function getLastesAsus(){
    $query = "SELECT * FROM tbl_product WHERE brandId='5' order by productId desc LIMIT 4 ";
    $result = $this->db->select($query);
    return $result;
   }
  }
?>