<?php include 'common/connect.php';?>
<?php 
$data = $_POST['data'];
$month = $_POST['month'];
$year = $_POST['year'];
$comName = $_POST['company_name'];
$flag = true;
$global =  $month."-".$year;

$query = "SELECT * FROM `salary_record_tbl`";
$result = mysqli_query($conn , $query);
$results = array();
while ($row = mysqli_fetch_assoc($result)) {
    $results[] = $row['create_at'];
    $com_name = $row['company'];
}




// check for same month and year
foreach ($results as &$value) {
$timestamp = strtotime($value);
$db_global = date('M-Y', $timestamp);

if($global != $db_global && $comName !=  $com_name){
    $flag = true;
}else{
   $flag = false;
}
}



if($flag || empty($results)){
    $query = "INSERT INTO `salary_record_tbl`(`company`,`sr_no`, `emp_id`, `name`, `location`, `designatioin`, `department`,`basic_sal`, `con_allow`, `edu_allow`, `spe_allow`, `day_to_be_cal`, `total_day_attend`, `pf_app`, `esic_app`, `basic_sal_cal`, `con_allow_cal`, `edu_allow_cal`, `spec_allow_cal`, `gross_sal`, `incentive`, `total_gross_sal`, `emplr_pf`, `pf_admin`, `emplr_esic`, `ctc`, `emp_pf`, `emp_esic`, `pt`, `advance`, `bal_advance`, `other_ded`, `total_ded`, `net_take_sal`, `remark`) VALUES $data";
    $result = mysqli_query($conn , $query);
    
    if($result){
        echo json_encode(array(
            "status" => "ok",
            "message" => "Data Saved Successfully."
        ));
       
    }else{
         echo json_encode(array(
            "status" => "notok",
            "message" => "Failed to Save Data."
        ));
        
    }
}else{
    echo json_encode(array(
        "status" => "duplicate",
        "message" => "Duplicate Entries"
    ));
    
}





?>