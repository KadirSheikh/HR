<?php include 'common/connect.php';?>
<?php 

$id=$_POST["id"];
$delete_emp = "UPDATE `employee_tbl` SET `is_active`='yes' WHERE `id`=$id";
$action =  mysqli_query($conn , $delete_emp);

if($action){
    echo json_encode(array(
        "status" => true,
        "message" => "Employee Activated Successfully."
    ));
}else{
    echo json_encode(array(
        "status" => false,
        "message" => "Failed to Activate Employee."
    ));
}
?>