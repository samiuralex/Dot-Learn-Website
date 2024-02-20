<?php


$query = "DELETE FROM teachers WHERE name={$_POST['id']} LIMIT 1";


mysql_query ($query);

if (mysql_affected_rows() == 1) { 

?>

            <strong>Profile Delete Successfully</strong><br /><br />
    
<?php
 } else { 

?>
    
            <strong>Deletion Failed</strong><br /><br />
    

<?php
} 
?>