<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php
if(isset($_GET['brandId']) || $_GET('brandId')!=NULL){
    $id = $_GET['brandId'];
}
$brand = new brand();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     $brandName = $_POST['brandName'];
    
     $updateBrand = $brand->update_brand($brandName,$id);
}
?>
<?php ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa thương hiệu</h2>
                <?php
if(isset($updateBrand)){
    echo $updateBrand;
}
                ?>
                <?php
                $get_brand_name = $brand->getbrandbyId($id);
                if($get_brand_name){
                    while($result = $get_brand_name->fetch_assoc()){
                
                ?>
               <div class="block copyblock"> 
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value ="<?php echo $result['brandName']?>" name="brandName" placeholder="Làm ơn sửa thương hiệu sản phẩm..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Edit" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php
                    }
                    }
                    ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>