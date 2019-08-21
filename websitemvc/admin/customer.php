<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
include_once(dirname(__FILE__) . '/../classes/customer.php');
include_once(dirname(__FILE__) . '/../helper/format.php');
?>
<?php
if(isset($_GET['customerid']) || $_GET('customerid')!=NULL){
    $id = $_GET['customerid'];
}
$cs = new customer();

?>
<?php ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sua danh mục</h2>
               
                <?php
                $get_customer = $cs->show_customers($id);
                if($get_customer){
                    while($result = $get_customer->fetch_assoc()){
                
                ?>
               <div class="block copyblock"> 
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>Name</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value ="<?php echo $result['name']?>" name="catName"  class="medium" />
                            </td>
                        </tr>
						<tr>
                            <td>Phone</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value ="<?php echo $result['phone']?>" name="catName"  class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value ="<?php echo $result['city']?>" name="catName"  class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Country</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value ="<?php echo $result['country']?>" name="catName"  class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value ="<?php echo $result['address']?>" name="catName"  class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Zipcode</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value ="<?php echo $result['zipcode']?>" name="catName"  class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value ="<?php echo $result['email']?>" name="catName"  class="medium" />
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