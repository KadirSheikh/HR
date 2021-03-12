<?php include 'common/connect.php';?>
<?php 
$data = $_POST['data'];

// echo $data;
$query = "INSERT INTO `employee_tbl`( `emp_id`,`company`,`firstname`, `job_location`,`designation`, `doj`, `pf_app`, `esic_app`, `basic_sal`, `con_allow`, `edu_allow`, `sp_allow`,`days_to_be_cal`,`total_att`) VALUES $data";
$result = mysqli_query($conn , $query);
    
    if($result){
        echo json_encode(array(
            "status" => "ok",
            "message" => "Excel Imported Successfully."
        ));
       
    }else{
         echo json_encode(array(
            "status" => "notok",
            "message" => "Failed to Import Excel."
        ));
        
    }



?>