<?php include 'common/connect.php';?>

<?php 

session_start();
session_regenerate_id( true );
date_default_timezone_set('Asia/Kolkata');


function generate_token() {
  // Check if a token is present for the current session
  
      // No token present, generate a new one
      $token = md5(uniqid(rand(), TRUE));
      $_SESSION["token"] = $token;

  return $token;
}

function verify_token($token){
    if ( $token != $_SESSION["token"]) {
        // Reset token
        unset($_SESSION["token"]);
        die("CSRF token validation failed");
      }
}


if(isset($_GET['id'])){
    $id = base64_decode($_GET['id']);
}else{
    die("Unauthorized");
}

?>

<body>

    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="loader-bar"></div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <?php include 'common/nav.php';?>
            <?php 
            function update($postData,$id,$connect){
                $updateString = "";
                foreach($postData as $key=>$value){
                    if(!empty($value)){
                        $updateString .= "`".$key."`='".$value."',";
                    }
                }
                $updateString = rtrim($updateString, ",");
                $updateString .= "WHERE `id`='".$id."'";
                
                $sql = "UPDATE `employee_tbl` SET ".$updateString."";
                $update = mysqli_query($connect, $sql);
                if($update){
                                       echo '
                                            <script>
                                            swal("Data Updated Successfully!", " " , "success").then(() => {
                                                window.location.href="show_emp_data.php";
                                              });
                                            </script>
                                            ';
            
                    }else{
                        echo '
                        <script>
                        swal("Failed to update data!", " " , "error");
                        </script>
                        ';
                    }
        }
        
        
            if($_SERVER["REQUEST_METHOD"] == "POST"){
            
                update($_POST,$id,$conn);
                // $_POST data
                // ID for where condition
                // Pass Connection
                
            }
            ?>
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <?php include 'common/side.php';?>

                    <?php 
                    
                    $query = "SELECT * FROM `employee_tbl` WHERE id=$id";
                    $data = mysqli_query($conn , $query);
                    while($row = mysqli_fetch_assoc($data)){
                      ?>

                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">

                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-header start -->
                                    <div class="page-header card">
                                        <div class="card-block">
                                            <h5 class="m-b-10">Enter Employee Data</h5>
                                            <!-- <p class="text-muted m-b-10">lorem ipsum dolor sit amet, consectetur
                                                    adipisicing elit</p> -->
                                            <ul class="breadcrumb-title b-t-default p-t-10">
                                                <li class="breadcrumb-item">
                                                    <a href="index.html"> <i class="fa fa-home"></i> </a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="#!">Basic Componenets</a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="#!">Basic Form Inputs</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-sm-12">

                                                <div class="card">

                                                    <div class="card-block">
                                                        <h4 class="sub-title">Add Employee Data</h4>
                                                        <form action="" method="POST">
                                                            <div class="form-row">


                                                                <input type="hidden" class="form-control"
                                                                    name="csrf_token"
                                                                    value="<?php echo generate_token(); ?>">


                                                                <div class="col-12 col-sm-3 form-group">
                                                                    <label>First name: </label>
                                                                    <input type="text" class="form-control"
                                                                        name="firstname" placeholder="Enter First Name"
                                                                        value="<?php echo $row['firstname']; ?>">
                                                                </div>
                                                                <div class="col-12 col-sm-3 form-group">
                                                                    <label>Middle name:</label>
                                                                    <input type="text" class="form-control"
                                                                        name="midname" placeholder="Enter Middle Name"
                                                                        value="<?php echo $row['midname']; ?>">
                                                                </div>
                                                                <div class="col-12 col-sm-3 form-group">
                                                                    <label>Last name:</label>
                                                                    <input type="text" class="form-control"
                                                                        name="lastname" placeholder="Enter Last Name"
                                                                        value="<?php echo $row['lastname']; ?>">
                                                                </div>
                                                                <div class="col-12 col-sm-3 form-group">
                                                                    <label>Company name: </label>
                                                                    <select id="company_name" name="company" class="form-control">
                                                                        <?php 
                                                                        
                                                                        $query = "SELECT DISTINCT company FROM employee_tbl";
                                                                        $result = mysqli_query($conn , $query);
                                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                                            ?>
                                                                            <option value="<?php echo $row['company']; ?>" <?php 
                                                                                if(isset($_POST['companyName'])){
                                                                                    if($_POST['companyName'] == $row['company']){
                                                                                        echo "selected";
                                                                                    }else {
                                                                                        echo "";
                                                                                    }
                                                                                }
                                                                            ?>><?php echo $row['company']; ?></option>
                                                                            <?php
                                                                            
                                                                        }
                                                                        
                                                                        ?>
                                                    
                                          
                                                </select>
                                                                </div>
                                                               

                                                            </div>

                                                            <div class="form-row">

                                                                <div class="col-12 col-sm-6 form-group">
                                                                    <label>Current Address:</label>

                                                                    <textarea class="form-control" id="curr_add"
                                                                        name="current_address" rows="4" cols="50"
                                                                        placeholder="Enter Current Address"
                                                                        value=""><?php echo $row['current_address']; ?></textarea>
                                                                </div>



                                                                <div class="col-12 col-sm-6 form-group">

                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <label>Permanent Address:</label>
                                                                        </div>

                                                                        <div class="col-sm-8">
                                                                            <div class="form-check">
                                                                                <input type="checkbox"
                                                                                    class="form-check-input"
                                                                                    id="myCheck" onclick="myFunction()">
                                                                                <label class="form-check-label"
                                                                                    for="exampleCheck1">Same as
                                                                                    current address.</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>



                                                                    <textarea class="form-control" id="per_add"
                                                                        name="permanent_address" rows="4" cols="50"
                                                                        placeholder="Enter Permanent Address"><?php echo $row['permanent_address']; ?></textarea>
                                                                </div>

                                                            </div>

                                                            <div class="form-row">
                                                            <div class="col-12 col-sm-3 form-group">
                                                                    <label>Employee Id:</label>
                                                                    <input type="number" class="form-control"
                                                                        name="emp_id" placeholder="Enter Employee Id">
                                                                </div>

                                                                <div class="col-12 col-sm-3 form-group">
                                                                
                                                                    <label>Email:</label>
                                                                    <input type="email" class="form-control"
                                                                        name="email" placeholder="Enter Email"
                                                                        value="<?php echo $row['email']; ?>">
                                                                </div>

                                                                <div class="col-12 col-sm-3 form-group">
                                                                    <label>Mobile: </label>
                                                                    <input type="number" class="form-control"
                                                                        name="mobile" placeholder="Enter Mobile Number"
                                                                        value="<?php echo $row['mobile']; ?>">
                                                                </div>
                                                                <div class="col-12 col-sm-3 form-group">
                                                                    <label>Phone:</label>
                                                                    <input type="number" class="form-control"
                                                                        name="phone" placeholder="Enter Phone Number"
                                                                        value="<?php echo $row['phone']; ?>">
                                                                </div>

                                                            </div>

                                                            <div class="form-row">




                                                                <div class="col-12 col-sm-4 form-group">
                                                                    <label>Emergency Mobile: </label>
                                                                    <input type="number" class="form-control"
                                                                        name="em_mobile"
                                                                        placeholder="Enter Emergency Mobile Number" value="<?php echo $row['em_mobile']; ?>">
                                                                </div>
                                                                <div class="col-12 col-sm-4 form-group">
                                                                    <label>Emergency Phone:</label>
                                                                    <input type="number" class="form-control"
                                                                        name="em_phone"
                                                                        placeholder="Enter Emergency Phone Number" value="<?php echo $row['em_phone']; ?>">
                                                                </div>
                                                                <div class="col-12 col-sm-4 form-group">
                                                                    <label>Basic Salary:</label>
                                                                    <input type="number" class="form-control"
                                                                        name="basic_sal" placeholder="Basic Salary"
                                                                        value="<?php echo $row['basic_sal']; ?>">
                                                                </div>
                                                              

                                                            </div>




                                                            <div class="form-row">
                                                                <div class="col-12 col-sm-4 form-group">
                                                                    <label>DOB: </label>
                                                                    <input type="date" class="form-control" name="dob"
                                                                        placeholder="Enter First Name"
                                                                        value="<?php echo $row['dob']; ?>">
                                                                </div>
                                                                <div class="col-12 col-sm-4 form-group">
                                                                    <label>PAN: </label>
                                                                    <input type="text" class="form-control" name="pan"
                                                                        placeholder="Enter PAN Number"
                                                                        value="<?php echo $row['pan']; ?>">
                                                                </div>
                                                                <div class="col-12 col-sm-4 form-group">
                                                                    <label>Aadhar:</label>
                                                                    <input type="number" class="form-control"
                                                                        name="aadhar" placeholder="Enter Aadhar Number"
                                                                        value="<?php echo $row['aadhar']; ?>">
                                                                </div>


                                                            </div>

                                                            <div class="form-row">
                                                                <div class="col-12 col-sm-4 form-group">
                                                                    <label>Bank: </label>
                                                                    <input type="text" class="form-control" name="bank"
                                                                        placeholder="Enter Bank Name"
                                                                        value="<?php echo $row['bank']; ?>">
                                                                </div>
                                                                <div class="col-12 col-sm-4 form-group">
                                                                    <label>IFSC:</label>
                                                                    <input type="text" class="form-control" name="ifsc"
                                                                        placeholder="Enter IFSC Number"
                                                                        value="<?php echo $row['ifsc']; ?>">
                                                                </div>
                                                                <div class="col-12 col-sm-4 form-group">
                                                                    <label>Account Number: </label>
                                                                    <input type="number" class="form-control"
                                                                        name="acc_no" placeholder="Enter Account Number"
                                                                        value="<?php echo $row['acc_no']; ?>">
                                                                </div>



                                                            </div>

                                                            <div class="form-row">
                                                                <div class="col-12 col-sm-4 form-group">
                                                                    <label>Branch:</label>
                                                                    <input type="text" class="form-control"
                                                                        name="branch" placeholder="Enter Branch Name"
                                                                        value="<?php echo $row['branch']; ?>">
                                                                </div>
                                                                <div class="col-12 col-sm-4 form-group">
                                                                    <label>Marital Status: </label>

                                                                    <select name="marital_status" class="form-control">


                                                                        <option value="married">Married</option>
                                                                        <option value="unmarried">Unmarried</option>
                                                                    </select>

                                                                </div>
                                                                <div class="col-12 col-sm-4 form-group">
                                                                    <label>Spouse:</label>
                                                                    <input type="text" class="form-control"
                                                                        name="spouse" placeholder="Spouse Name"
                                                                        value="<?php echo $row['spouse']; ?>">
                                                                </div>



                                                            </div>

                                                            <div class="form-row">
                                                                <div class="col-12 col-sm-4 form-group">
                                                                    <label>Prohibition Period:</label>
                                                                    <div class="row">
                                                                        <div class="col-12 col-sm-6">

                                                                            <select name="prob_month"
                                                                                class="form-control">

                                                                                <option value="jan">January</option>
                                                                                <option value="feb">February</option>
                                                                                <option value="march">March</option>
                                                                                <option value="april">April</option>
                                                                                <option value="may">May</option>
                                                                                <option value="june">June</option>
                                                                                <option value="july">July</option>
                                                                                <option value="august">August</option>
                                                                                <option value="september">September
                                                                                </option>
                                                                                <option value="october">October</option>
                                                                                <option value="november">November
                                                                                </option>
                                                                                <option value="december">December
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-12 col-sm-6">

                                                                            <select name="prob_day"
                                                                                class="form-control">

                                                                                <option value="1">1</option>
                                                                                <option value="2">2</option>
                                                                                <option value="3">3</option>
                                                                                <option value="4">4</option>
                                                                                <option value="5">5</option>
                                                                                <option value="6">6</option>
                                                                                <option value="7">7</option>
                                                                                <option value="8">8</option>
                                                                                <option value="9">9</option>
                                                                                <option value="10">10</option>
                                                                                <option value="11">11</option>
                                                                                <option value="12">12</option>
                                                                                <option value="13">13</option>
                                                                                <option value="14">14</option>
                                                                                <option value="15">15</option>
                                                                                <option value="16">16</option>
                                                                                <option value="17">17</option>
                                                                                <option value="18">18</option>

                                                                                <option value="19">19</option>
                                                                                <option value="20">20</option>
                                                                                <option value="21">21</option>
                                                                                <option value="22">22</option>
                                                                                <option value="23">23</option>
                                                                                <option value="24">24</option>
                                                                                <option value="25">25</option>
                                                                                <option value="26">26</option>
                                                                                <option value="27">27</option>
                                                                                <option value="28">28</option>
                                                                                <option value="29">29</option>
                                                                                <option value="30">30</option>
                                                                                <option value="31">31</option>

                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-4 form-group">
                                                                    <label>Department: </label>
                                                                    <!-- <span class="color-primary" style="font-size=30px;"><i class="fa fa-plus" aria-hidden="true"></i></span> -->

                                                                    <select name="prob_day" class="form-control">
                                                                        <?php 
                                                                    
                                                                    $query1 = "SELECT * FROM `department`";
                                                                    $data1 = mysqli_query($conn , $query1);
                                                                    while($row1 = mysqli_fetch_assoc($data1)){
                                                                         
                                                                        $name = $row1['name'];
                                                                     ?>
                                                                        <option value="<?php echo $name; ?>">
                                                                            <?php echo $name; ?></option>
                                                                        <?php
                                                                    }
                                                                    
                                                                    
                                                                    ?>

                                                                    </select>
                                                                </div>
                                                                <div class="col-12 col-sm-4 form-group">
                                                                    <label>Designation:</label>
                                                                    <input type="text" class="form-control"
                                                                        name="designation"
                                                                        placeholder="Enter Designation"
                                                                        value="<?php echo $row['designation']; ?>">
                                                                </div>


                                                            </div>

                                                            <div class="form-row">


                                                                <div class="col-12 col-sm-4 form-group">
                                                                    <label>Date of Offer Letter:</label>
                                                                    <input type="date" class="form-control"
                                                                        name="doi_offer"
                                                                        value="<?php echo $row['doi_offer']; ?>">
                                                                </div>
                                                                <div class="col-12 col-sm-4 form-group">
                                                                    <label>Date of Approval: </label>
                                                                    <input type="date" class="form-control" name="doa"
                                                                        value="<?php echo $row['doa']; ?>">
                                                                </div>
                                                                <div class="col-12 col-sm-4 form-group">
                                                                    <label>Date of Join:</label>
                                                                    <input type="date" class="form-control" name="doj"
                                                                        value="<?php echo $row['doj']; ?>">
                                                                </div>

                                                            </div>


                                                            <div class="form-row">
                                                                <div class="col-12 col-sm-4 form-group">
                                                                    <label>UAN: </label>
                                                                    <input type="text" class="form-control" name="uan"
                                                                        placeholder="Enter UAN"
                                                                        value="<?php echo $row['uan']; ?>">
                                                                </div>
                                                                <div class="col-12 col-sm-4 form-group">
                                                                    <label>IP:</label>
                                                                    <input type="text" class="form-control" name="ip"
                                                                        placeholder="Enter IP"
                                                                        value="<?php echo $row['ip']; ?>">
                                                                </div>
                                                                <div class="col-12 col-sm-4 form-group">
                                                                    <label>Date of Completion of Prohibition Period:
                                                                    </label>
                                                                    <input type="date" class="form-control"
                                                                        name="com_prob_date"
                                                                        value="<?php echo $row['com_prob_date']; ?>">
                                                                </div>



                                                            </div>

                                                            <div class="form-row">
                                                                <div class="col-12 col-sm-4 form-group">
                                                                    <label>Date of Issue: </label>
                                                                    <input type="date" class="form-control"
                                                                        name="doi_confirm" placeholder=""
                                                                        value="<?php echo $row['doi_confirm']; ?>">
                                                                </div>
                                                                <div class="col-12 col-sm-4 form-group">
                                                                    <label>Job Location:</label>
                                                                    <input type="text" class="form-control"
                                                                        name="job_location" placeholder="Job Location"
                                                                        value="<?php echo $row['job_location']; ?>">
                                                                </div>
                                                                <div class="col-12 col-sm-4 form-group">
                                                                    <label>Previous Year Experience:</label>
                                                                    <div class="row">
                                                                        <div class="col-12 col-sm-6">

                                                                            <select name="prev_exp_mon"
                                                                                class="form-control">
                                                                                <option>Months</option>
                                                                                <option value="0">0</option>
                                                                                <option value="1">1</option>
                                                                                <option value="2">2</option>
                                                                                <option value="3">3</option>
                                                                                <option value="4">4</option>
                                                                                <option value="5">5</option>
                                                                                <option value="6">6</option>
                                                                                <option value="7">7</option>
                                                                                <option value="8">8</option>
                                                                                <option value="9">9</option>

                                                                            </select>
                                                                        </div>
                                                                        <div class="col-12 col-sm-6">

                                                                            <select name="prev_exp_yr"
                                                                                class="form-control">
                                                                                <option>Years</option>
                                                                                <option value="0">0</option>
                                                                                <option value="1">1</option>
                                                                                <option value="2">2</option>
                                                                                <option value="3">3</option>
                                                                                <option value="4">4</option>
                                                                                <option value="5">5</option>
                                                                                <option value="6">6</option>
                                                                                <option value="7">7</option>
                                                                                <option value="8">8</option>
                                                                                <option value="9">9</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="form-row">
                                                                <div class="col-12 col-sm-4 form-group">
                                                                    <label>Confirm Date:</label>
                                                                    <input type="date" class="form-control"
                                                                        name="confirm_date" placeholder=""
                                                                        value="<?php echo $row['confirm_date']; ?>">
                                                                </div>
                                                                <div class="col-12 col-sm-4 form-group">
                                                                    <label>PF Applicability:</label>
                                                                    <select name="pf_app" class="form-control">

                                                                        <option value="1">Yes</option>
                                                                        <option value="0">No</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-12 col-sm-4 form-group">
                                                                    <label>ESIC Applicability:</label>
                                                                    <select name="esic_app" class="form-control">

                                                                        <option value="1">Yes</option>
                                                                        <option value="0">No</option>
                                                                    </select>
                                                                </div>

                                                            </div>



                                                            <div class="form-row">


                                                              
                                                                <div class="col-12 col-sm-4 form-group">
                                                                    <label>Conveyance Allowance: </label>
                                                                    <input type="number" class="form-control"
                                                                        name="con_allow"
                                                                        placeholder="Enter Conveyance Allowance"
                                                                        value="<?php echo $row['con_allow']; ?>">
                                                                </div>
                                                                <div class="col-12 col-sm-4 form-group">
                                                                    <label>Education Allowance:</label>
                                                                    <input type="number" class="form-control"
                                                                        name="edu_allow"
                                                                        placeholder="Enter Education Allowance"
                                                                        value="<?php echo $row['edu_allow']; ?>">
                                                                </div>
                                                                <div class="col-12 col-sm-4 form-group">
                                                                    <label>Special Allowance:</label>
                                                                    <input type="number" class="form-control"
                                                                        name="sp_allow"
                                                                        placeholder="Enter Special Allowance"
                                                                        value="<?php echo $row['sp_allow']; ?>">
                                                                </div>

                                                            </div>

                                                            <button type="submit" class="btn btn-primary mt-3"
                                                                name="add">EDIT</button>

                                                        </form>


                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    }
                    
                    ?>

                </div>
            </div>
        </div>
        <?php include 'common/footer.php';?>



        <script>
        function myFunction() {
            var checkBox = document.getElementById("myCheck");
            if (checkBox.checked == true) {

                document.getElementById("per_add").value +=
                    document.getElementById("curr_add").value;
            } else {
                document.getElementById("per_add").value = "";
            }
        }
        </script>
</body>

</html>