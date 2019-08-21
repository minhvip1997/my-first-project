<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';?>
<?php
if(isset($_GET['catId']) || $_GET('catId')!=NULL){
    $id = $_GET['catId'];
}
$cat = new category();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     $catName = $_POST['catName'];
    
     $updateCat = $cat->update_category($catName,$id);
}
?>
<?php ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sua danh mục</h2>
                <?php
if(isset($updateCat)){
    echo $updateCat;
}
                ?>
                <?php
                $get_cate_name = $cat->getcatbyId($id);
                if($get_cate_name){
                    while($result = $get_cate_name->fetch_assoc()){
                
                ?>
               <div class="block copyblock"> 
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value ="<?php echo $result['catName']?>" name="catName" placeholder="Làm ơn sua danh mục sản phẩm..." class="medium" />
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