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
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <?php include 'common/side.php';?>
                    <?php 
                    
                    
                    if(isset($_POST['add'])){
    
                        verify_token($_POST["csrf_token"]);

                        $column = "(";
                        $values = "(";
                        foreach($_POST as $key=>$value){
                           
                            if(!empty($value)){
                                $column .= "`".$key."`,";
                                $values .= "'".$value."',";
                            }
                        }
                        $column .= "`create_date`";
                        $column .= ")";
                        $values .= "'".date('Y-m-d H:i:s')."'";
                        $values .= ")";
                        
                     $sql = "INSERT INTO `employee_tbl` ".$column." VALUES ".$values." ";
                        
                        $insert = mysqli_query($conn, $sql);
                        if($insert){
                                
                                // $select = mysqli_query($connect, "SELECT `report_id` FROM `report_tbl` WHERE `id` = ".mysqli_insert_id($connect)."");
                                // $row = mysqli_fetch_assoc($select);
                                // $report_id = $row['report_id'];
                                echo '
                                    <script>
                                    swal("Employee Added Successfully!", " " , "success").then(() => {
                                        window.location.href="show_emp_data.php";
                                      });
                                    </script>
                                    ';
                    
                            }else{
                                echo 'failed';
                            }
                        
                    }
                    
                    ?>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">

                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                <div id="message"></div>
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
                                                <li class="breadcrumb-item"><a href="#!">Add Employee</a>
                                                </li>
                                                <!-- <li class="breadcrumb-item"><a href="#!">Basic Form Inputs</a>
                                                </li> -->
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="page-header card">
                                        <div class="card-block">
                                            <h5 class="m-b-10 text-success">Import Excel Sheet for Bulk Entries</h5>

                                            <ul class="breadcrumb-title b-t-default p-t-10">
                                                <div class="conatiner">
                                                    <div class="row">
                                                         <div class="col-md-3">
                                                         <label >Company Name:</label>
                                                         <input type="text" id="com_name" class="form-control" placeholder="Enter Company Name">
                                                         </div>
                                                        <div class="col-md-3">
                                                       
                                                            <label>Upload Excel:</label>
                                                            <input class="form-control" type="file" id="input"
                                                                accept=".xls,.xlsx">
                                                        </div>
                                                        <div class="col-md-2 mt-4">
                                                            <button class="btn btn-success "
                                                                id="button_att">Import</button>
                                                        </div>
                                                        
                                                        <!-- <div class="col-md-12">
                                                        <pre id="jsondata"></pre>
                                                    </div> -->
                                                    </div>
                                                </div>
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
                                                                        name="firstname" placeholder="Enter First Name">
                                                                </div>
                                                                <div class="col-12 col-sm-3 form-group">
                                                                    <label>Middle name:</label>
                                                                    <input type="text" class="form-control"
                                                                        name="midname" placeholder="Enter Middle Name">
                                                                </div>
                                                                <div class="col-12 col-sm-3 form-group">
                                                                    <label>Last name:</label>
                                                                    <input type="text" class="form-control"
                                                                        name="lastname" placeholder="Enter Last Name">
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
                                                                        placeholder="Enter Current Address"></textarea>
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
                                                                        placeholder="Enter Permanent Address"></textarea>
                                                                </div>

                                                            </div>

                                                            <div class="form-row">

                                                                <div class="col-12 col-sm-4 form-group">
                                                                    <label>Employee Code:</label>
                                                                    <input type="number" class="form-control"
                                                                        name="emp_id" placeholder="Enter Employee Id">
                                                                </div>


                                                                <div class="col-12 col-sm-4 form-group">
                                                                    <label>Mobile: </label>
                                                                    <input type="number" class="form-control"
                                                                        name="mobile" placeholder="Enter Mobile Number">
                                                                </div>
                                                                <div class="col-12 col-sm-4 form-group">
                                                                    <label>Phone:</label>
                                                                    <input type="number" class="form-control"
                                                                        name="phone" placeholder="Enter Phone Number">
                                                                </div>

                                                            </div>

                                                            <div class="form-row">


                                                                <div class="col-12 col-sm-4 form-group">
                                                                    <label>Email:</label>
                                                                    <input type="email" class="form-control"
                                                                        name="email" placeholder="Enter Email">
                                                                </div>

                                                                <div class="col-12 col-sm-4 form-group">
                                                                    <label>Emergency Mobile: </label>
                                                                    <input type="number" class="form-control"
                                                                        name="em_mobile"
                                                                        placeholder="Enter Emergency Mobile Number">
                                                                </div>
                                                                <div class="col-12 col-sm-4 form-group">
                                                                    <label>Emergency Phone:</label>
                                                                    <input type="number" class="form-control"
                                                                        name="em_phone"
                                                                        placeholder="Enter Emergency Phone Number">
                                                                </div>


                                                            </div>




                                                            <div class="form-row">
                                                                <div class="col-12 col-sm-4 form-group">
                                                                    <label>DOB: </label>
                                                                    <input type="date" class="form-control" name="dob"
                                                                        placeholder="Enter First Name">
                                                                </div>
                                                                <div class="col-12 col-sm-4 form-group">
                                                                    <label>PAN: </label>
                                                                    <input type="text" class="form-control" name="pan"
                                                                        placeholder="Enter PAN Number" id="pancard">

                                                                    <div class="col-md-12 ">
                                                                        <div style="display:none; color:red;"
                                                                            id="pan-error"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-sm-4 form-group">
                                                                    <label>Aadhar:</label>
                                                                    <input type="text" class="form-control"
                                                                        name="aadhar" placeholder="Enter Aadhar Number"
                                                                        id="aadharno">

                                                                    <div class="col-md-12 ">
                                                                        <div style="display:none; color:red;"
                                                                            id="aadharno-error"></div>
                                                                    </div>
                                                                </div>


                                                            </div>

                                                            <div class="form-row">
                                                                <div class="col-12 col-sm-4 form-group">
                                                                    <label>Bank: </label>
                                                                    <input type="text" class="form-control" name="bank"
                                                                        placeholder="Enter Bank Name">
                                                                </div>
                                                                <div class="col-12 col-sm-4 form-group">
                                                                    <label>IFSC:</label>
                                                                    <input type="text" class="form-control" name="ifsc"
                                                                        placeholder="Enter IFSC Number">
                                                                </div>
                                                                <div class="col-12 col-sm-4 form-group">
                                                                    <label>Account Number: </label>
                                                                    <input type="number" class="form-control"
                                                                        name="acc_no"
                                                                        placeholder="Enter Account Number">
                                                                </div>



                                                            </div>

                                                            <div class="form-row">
                                                                <div class="col-12 col-sm-4 form-group">
                                                                    <label>Branch:</label>
                                                                    <input type="text" class="form-control"
                                                                        name="branch" placeholder="Enter Branch Name">
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
                                                                        name="spouse" placeholder="Spouse Name">
                                                                </div>



                                                            </div>

                                                            <div class="form-row">
                                                                <div class="col-12 col-sm-4 form-group">
                                                                    <label>Prohibition Period Start:</label>
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


                                                                    <div class="input-group">
                                                                        <select name="department" class="form-control"
                                                                            id="select_dep">

                                                                            <?php 
                                                                    
                                                                    $query = "SELECT * FROM `department`";
                                                                    $data = mysqli_query($conn , $query);
                                                                    while($row = mysqli_fetch_assoc($data)){
                                                                        $id = $row['id']; 
                                                                        $name = $row['name'];
                                                                     ?>
                                                                            <option value="<?php echo $id; ?>">
                                                                                <?php echo $name; ?></option>
                                                                            <?php
                                                                    }
                                                                    
                                                                    
                                                                    ?>

                                                                        </select>
                                                                        <div class="input-group-append">


                                                                            <button class="btn btn-outline-primary"
                                                                                type="button" data-toggle="modal"
                                                                                data-target="#myModal"><i
                                                                                    class="fa fa-plus"
                                                                                    aria-hidden="true"></i></button>


                                                                        </div>
                                                                    </div>


                                                                </div>
                                                                <div class="col-12 col-sm-4 form-group">
                                                                    <label>Designation:</label>
                                                                    <input type="text" class="form-control"
                                                                        name="designation"
                                                                        placeholder="Enter Designation">
                                                                </div>


                                                            </div>

                                                            <div class="form-row">


                                                                <div class="col-12 col-sm-4 form-group">
                                                                    <label>Date of Offer Letter:</label>
                                                                    <input type="date" class="form-control"
                                                                        name="doi_offer" placeholder="">
                                                                </div>
                                                                <div class="col-12 col-sm-4 form-group">
                                                                    <label>Date of Approval: </label>
                                                                    <input type="date" class="form-control" name="doa">
                                                                </div>
                                                                <div class="col-12 col-sm-4 form-group">
                                                                    <label>Date of Join:</label>
                                                                    <input type="date" class="form-control" name="doj">
                                                                </div>

                                                            </div>


                                                            <div class="form-row">
                                                                <div class="col-12 col-sm-4 form-group">
                                                                    <label>UAN: </label>
                                                                    <input type="text" class="form-control" name="uan"
                                                                        placeholder="Enter UAN">
                                                                </div>
                                                                <div class="col-12 col-sm-4 form-group">
                                                                    <label>IP:</label>
                                                                    <input type="text" class="form-control" name="ip"
                                                                        placeholder="Enter IP">
                                                                </div>
                                                                <div class="col-12 col-sm-4 form-group">
                                                                    <label>Date of Completion of Prohibition Period:
                                                                    </label>
                                                                    <input type="date" class="form-control"
                                                                        name="com_prob_date">
                                                                </div>



                                                            </div>

                                                            <div class="form-row">
                                                                <div class="col-12 col-sm-4 form-group">
                                                                    <label>Date of Issue: </label>
                                                                    <input type="date" class="form-control"
                                                                        name="doi_confirm" placeholder="">
                                                                </div>
                                                                <div class="col-12 col-sm-4 form-group">
                                                                    <label>Job Location:</label>
                                                                    <input type="text" class="form-control"
                                                                        name="job_location" placeholder="Job Location">
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
                                                                        name="confirm_date" placeholder="">
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

                                                                <div class="col-12 col-sm-3 form-group">
                                                                    <label>Basic Salary:</label>
                                                                    <input type="number" class="form-control"
                                                                        name="basic_sal" placeholder="Basic Salary">
                                                                </div>

                                                                <div class="col-12 col-sm-3 form-group">
                                                                    <label>Conveyance Allowance: </label>
                                                                    <input type="number" class="form-control"
                                                                        name="con_allow"
                                                                        placeholder="Enter Conveyance Allowance">
                                                                </div>
                                                                <div class="col-12 col-sm-3 form-group">
                                                                    <label>Education Allowance:</label>
                                                                    <input type="number" class="form-control"
                                                                        name="edu_allow"
                                                                        placeholder="Enter Education Allowance">
                                                                </div>
                                                                <div class="col-12 col-sm-3 form-group">
                                                                    <label>Special Allowance:</label>
                                                                    <input type="number" class="form-control"
                                                                        name="sp_allow"
                                                                        placeholder="Enter Special Allowance">
                                                                </div>

                                                            </div>

                                                            <button type="submit" class="btn btn-primary mt-3"
                                                                name="add">ADD</button>

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
                </div>
            </div>
        </div>
        <?php include 'common/footer.php';?>
        <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Add Department
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" id="close_btn">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="input-group mb-3">

                            <input type="text" class="form-control" placeholder="Department Name" id="department"
                                aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="button" id="add_department">Add</button>
                            </div>
                        </div>

                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>


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

        $(document).ready(function() {
            $('button#add_department').on('click', function(e) {

                $dep_name = $('#department').val();

                e.preventDefault();

                $.ajax({
                    url: 'add_department.php',
                    method: 'POST',
                    data: {
                        name: $dep_name
                    },
                    success: function(response) {
                        $('#select_dep').html(response);
                        $("#close_btn").trigger("click");


                    }
                });


            });

        });



        //disable button

        // $(document).ready(function () {
        //     $('button[type="submit"]').attr('disabled', true);
        //     $('input[type="text"],textarea').on('keyup', function () {
        //         var curr_add = $("#curr_add").val();
        //         var per_add = $("#per_add").val();

        //         var firstname = $('input[name="firstname"]').val();
        //         var midname = $('input[name="midname"]').val();
        //         var lastname = $('input[name="lastname"]').val();

        //         var email = $('input[name="email"]').val();
        //         var mobile = $('input[name="mobile"]').val();
        //         var phone = $('input[name="phone"]').val();

        //         var pan = $('input[name="pan"]').val();
        //         var aadhar = $('input[name="aadhar"]').val();



        //         if (curr_add != '' && per_add != '' && firstname != '' && midname != '' && lastname != '' && email != '' && mobile != '' && phone != '' && pan != '' && aadhar != '') {
        //             $('button[type="submit"]').attr('disabled', false);
        //         } else {
        //             $('button[type="submit"]').attr('disabled', true);
        //         }
        //     });
        // });


        //import excel sheet

        let selectedFile;
        console.log(window.XLSX);
        document.getElementById('input').addEventListener("change", (event) => {
            selectedFile = event.target.files[0];
        })

        let data = [{
            "name": "jayanth",
            "data": "scd",
            "abc": "sdef"
        }]


        document.getElementById('button_att').addEventListener("click", () => {
            XLSX.utils.json_to_sheet(data, 'out.xlsx');
            if (selectedFile) {
                let fileReader = new FileReader();
                fileReader.readAsBinaryString(selectedFile);
                fileReader.onload = (event) => {
                    let data = event.target.result;
                    let workbook = XLSX.read(data, {
                        type: "binary"
                    });
                    // console.log(workbook);
                    workbook.SheetNames.forEach(sheet => {

                          function  convertToInt(value) {
                              if(value == "Yes"){
                                  return 1;
                              }else{
                                  return 0;
                              }
                              
                          }

                          function convertDate(val) {
                            var date = new Date(val);
                            return date.toUTCString();
                              
                          }

                        var arr = [];
                        var com_name = "";
                        var arr_db = [];
                        let rowObject = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[
                            sheet]);

                        // rowObject.forEach((val , key) => {
                        //     console.log(val , key);
                        // })

                        // for ( var property in rowObject[0] ) {
                        //     console.log( property ); 
                        // }

                        var companyName = document.getElementById('com_name').value;


                        rowObject.forEach((i, value) => {
                            if (typeof i['__EMPTY'] === "number") {
                                arr.push({
                                    "emp_code": i['__EMPTY'],
                                    "name": i['__EMPTY_1'],
                                    "location": i['__EMPTY_2'],
                                    "designation": i['__EMPTY_3'],
                                    "doj": i['__EMPTY_4'],
                                    "pf_app": convertToInt(i['__EMPTY_5']),
                                    "esic_app": convertToInt(i['__EMPTY_6']),
                                    "basic_sal": i['__EMPTY_7'],
                                    "con_allow": i['__EMPTY_8'],
                                    "edu_allow": i['__EMPTY_9'],
                                    "spe_allow": i['__EMPTY_10'],
                                    "days_to_be_cal": i['__EMPTY_22'],
                                    "total_att": i['__EMPTY_23']
                                });

                            }
                            //   console.log(i);


                        });

                        if (arr.length != 0) {
                        //   console.log(arr);
                            var sql = "("
                            arr.forEach((i, value) => {


                                if (typeof i.emp_code === "number") {
                                    sql += "'" + i.emp_code + "'," +"'" + companyName + "',"+ "'" + i.name + "'," +
                                        "'" +
                                        i.location + "'," + "'" + i.designation + "'," +
                                        "'" + i
                                        .doj + "'," + "'" + i.pf_app + "'," + "'" + i
                                        .esic_app +
                                        "'," + "'" + i.basic_sal + "'," + "'" + i
                                        .con_allow +
                                        "'," + "'" + i.edu_allow + "'," + "'" + i
                                        .spe_allow +
                                        "'," + "'" + i.days_to_be_cal + "'," + "'" + i
                                        .total_att + "')," + "(";

                                };

                            });


                            // sql += "),";
                            sql = sql.slice(0, -2);




                            $.ajax({
                                url: 'save_bulk_data.php',
                                method: 'POST',
                                data: {
                                    data: sql

                                },
                                success: function(response) {
                                    // console.log(response);

                                    var response = JSON.parse(response);
                                     console.log(response);

                                    if (response.status == "notok" || response.status == "duplicate") {
                                        $('#message').html(
                                            '<div class="alert alert-danger">' +
                                            response
                                            .message + '</div>');
                                        // console.log('notok');

                                    } else {
                                        $('#message').html(
                                            '<div class="alert alert-success">' +
                                            response
                                            .message + '</div>');
                                        // console.log('ok');
                                    }

                                }
                            });
                        }






                    });
                }
            }
        });
        </script>



</body>

</html>