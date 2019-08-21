<?php
// $filepath = realpath(dirname(_FILE_));
include_once(dirname(__FILE__) . '/../lib/database.php'); 
include_once(dirname(__FILE__) . '/../helper/format.php'); 
// include_once ($filepath.'../lib/database.php');
// include_once ($filepath.'../helper/format.php');
?>
<?php
/**
 * summary
 */
class user
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    
}
?>