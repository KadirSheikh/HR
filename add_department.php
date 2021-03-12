<?php include 'common/connect.php';?>
<?php 

$name=$_POST["name"];
$add_dep = "INSERT INTO `department`(`name`) VALUES ('{$name}')";
$action =  mysqli_query($conn , $add_dep);


if($action){
    
    
$query = "SELECT * FROM `department`";
$data =  mysqli_query($conn , $query);
while ($row = mysqli_fetch_assoc($data)) {
    $id = $row['id'];
    $name = $row['name'];

    echo "<option value='{$id}'>{$name}</option>";
}


}

// else{
//     echo json_encode(array(
//         "status" => false,
//         "message" => "Failed to add."
//     ));
// }
?>