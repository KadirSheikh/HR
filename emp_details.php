<?php include "common/connect.php"; ?>
<?php 

if(isset($_GET['id'])){
    $id = base64_decode($_GET['id']);
}else{
    die("Unauthorized");
}

$query = "SELECT * FROM `employee_tbl` WHERE id=$id";
$data = mysqli_query($conn , $query);
while($row = mysqli_fetch_assoc($data)){

   

    ?>
<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">

        <?php include "common/nav.php"; ?>

        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">
                <?php include "common/side.php"; ?>
                <div class="pcoded-content">
                    <div class="pcoded-inner-content">
                        <!-- Main-body start -->
                        <div class="main-body">
                            <div class="page-wrapper">
                                <!-- Page-header start -->
                                <div class="page-header card">
                                    <div class="card-block">
                                        <h5 class="m-b-10">Employee Detail</h5>

                                        <ul class="breadcrumb-title b-t-default p-t-10">
                                            <li class="breadcrumb-item">
                                                <a href="index.html"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Basic Componenets</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Label Badge</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Page-header end -->

                                <!-- Page body start -->
                                <div class="page-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- Badges card start -->
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="card-header-left">
                                                        <h5>Employee Detail</h5>

                                                    </div>
                                                    <div class="card-header-right"> <i
                                                            class="icofont icofont-spinner-alt-5"></i> </div>
                                                </div>
                                                <div class="card-block">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-xl-3 col-sm-12">
                                                            <div class="badge-box">


                                                                <p><b>Firstname :</b> <?php  echo $row['firstname']; ?>
                                                                </p>

                                                            </div>



                                                        </div>
                                                        <div class="col-lg-4 col-xl-3 col-sm-6">
                                                            <div class="badge-box">


                                                                <p><b>Midname :</b> <?php  echo $row['midname']; ?></p>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-xl-3 col-sm-6">
                                                            <div class="badge-box">


                                                                <p><b>Lastname :</b> <?php  echo $row['lastname']; ?>
                                                                </p>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-xl-3 col-sm-6">
                                                            <div class="badge-box">

    
                                                                <p><b>Company Name :</b> <?php  echo $row['company']; ?>
                                                                </p>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-xl-3 col-sm-6">
                                                            <div class="badge-box">


                                                                <p><b>Date of Birth :</b> <?php  echo $row['dob']; ?>
                                                                </p>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-xl-3 col-sm-6">
                                                            <div class="badge-box">

                                                                <p><b>Current Address
                                                                        :</b><?php  echo $row['current_address']; ?>
                                                                </p>


                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-xl-3 col-sm-6">
                                                            <div class="badge-box">


                                                                <p><b>Permanent Address :</b>
                                                                    <?php  echo $row['permanent_address']; ?>
                                                                </p>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-xl-3 col-sm-6">
                                                            <div class="badge-box">


                                                                <p><b>Mobile Number :</b> <?php  echo $row['mobile']; ?>
                                                                </p>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-xl-3 col-sm-6">
                                                            <div class="badge-box">


                                                                <p><b>Phone Number :</b> <?php  echo $row['phone']; ?>
                                                                </p>

                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-xl-3 col-sm-6">
                                                            <div class="badge-box">


                                                                <p><b>Emergency Mobile Number :</b> <?php  echo $row['em_mobile']; ?>
                                                                </p>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-xl-3 col-sm-6">
                                                            <div class="badge-box">


                                                                <p><b>Emergency Phone Number :</b> <?php  echo $row['em_phone']; ?>
                                                                </p>

                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 col-xl-3 col-sm-6">
                                                            <div class="badge-box">


                                                                <p><b>Email ID :</b> <?php  echo $row['email']; ?>
                                                                </p>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-xl-3 col-sm-6">
                                                            <div class="badge-box">


                                                                <p><b>PAN Card Number :</b> <?php  echo $row['pan']; ?>
                                                                </p>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-xl-3 col-sm-6">
                                                            <div class="badge-box">


                                                                <p><b>Aadhar Card Number :</b>
                                                                    <?php  echo $row['aadhar']; ?>
                                                                </p>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-xl-3 col-sm-6">
                                                            <div class="badge-box">


                                                                <p><b>Bank Name :</b> <?php  echo $row['bank']; ?>
                                                                </p>

                                                            </div>
                                                        </div>




                                                        <div class="col-lg-4 col-xl-3 col-sm-12">
                                                            <div class="badge-box">


                                                                <p><b>IFSC Code :</b> <?php  echo $row['ifsc']; ?>
                                                                </p>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-xl-3 col-sm-6">
                                                            <div class="badge-box">


                                                                <p><b>Account Number :</b>
                                                                    <?php  echo $row['acc_no']; ?></p>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-xl-3 col-sm-6">
                                                            <div class="badge-box">


                                                                <p><b>Branch Name :</b> <?php  echo $row['branch']; ?>
                                                                </p>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-xl-3 col-sm-6">
                                                            <div class="badge-box">


                                                                <p><b>Date of Birth :</b> <?php  echo $row['dob']; ?>
                                                                </p>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-xl-3 col-sm-6">
                                                            <div class="badge-box">

                                                                <p><b>Marital Status
                                                                        :</b><?php  echo $row['marital_status']; ?>
                                                                </p>


                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-xl-3 col-sm-6">
                                                            <div class="badge-box">


                                                                <p><b>Spouse :</b> <?php  echo $row['spouse']; ?>
                                                                </p>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-xl-3 col-sm-6">
                                                            <div class="badge-box">


                                                                <p><b>Mobile Number :</b> <?php  echo $row['mobile']; ?>
                                                                </p>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-xl-3 col-sm-6">
                                                            <div class="badge-box">


                                                                <p><b>Department :</b>
                                                                    <?php  
                                                                    $id = $row['department'];
                                                                   $dep = "SELECT * FROM `department` WHERE id = $id";
                                                                    $data1 = mysqli_query($conn , $dep);
                                                                    
                                                                    while($row1 = mysqli_fetch_assoc($data1)){
                                                                        $name1 = $row1['name'];

                                                                        echo $name1;
                                                                    }

                                                                    ?>
                                                                </p>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-xl-3 col-sm-6">
                                                            <div class="badge-box">


                                                                <p><b>Designation :</b>
                                                                    <?php  echo $row['designation']; ?>
                                                                </p>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-xl-3 col-sm-6">
                                                            <div class="badge-box">


                                                                <p><b>Date of Joining :</b> <?php  echo $row['doj']; ?>
                                                                </p>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-xl-3 col-sm-6">
                                                            <div class="badge-box">


                                                                <p><b>UAN :</b> <?php  echo $row['uan']; ?>
                                                                </p>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-xl-3 col-sm-6">
                                                            <div class="badge-box">


                                                                <p><b>IP :</b> <?php  echo $row['ip']; ?>
                                                                </p>

                                                            </div>
                                                        </div>



                                                        <!--  -->
                                                        <div class="col-lg-4 col-xl-3 col-sm-12">
                                                            <div class="badge-box">


                                                                <p><b>Date of Issue :</b>
                                                                    <?php  echo $row['doi_offer']; ?>
                                                                </p>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-xl-3 col-sm-6">
                                                            <div class="badge-box">


                                                                <p><b>Date of Approval :</b> <?php  echo $row['doa']; ?>
                                                                </p>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-xl-3 col-sm-6">
                                                            <div class="badge-box">


                                                                <p><b>Prohibition Period Start :</b>
                                                                    <?php  echo $row['prob_day'] ." ".$row['prob_month']; ?>
                                                                </p>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-xl-3 col-sm-6">
                                                            <div class="badge-box">


                                                                <p><b>Prohibition Completed :</b>
                                                                    <?php  echo $row['com_prob_date']; ?>
                                                                </p>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-xl-3 col-sm-6">
                                                            <div class="badge-box">

                                                                <p><b>Date of Issue Comfirm
                                                                        :</b><?php  echo $row['doi_confirm']; ?>
                                                                </p>


                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-xl-3 col-sm-6">
                                                            <div class="badge-box">


                                                                <p><b>Job Location :</b>
                                                                    <?php  echo $row['job_location']; ?>
                                                                </p>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-xl-3 col-sm-6">
                                                            <div class="badge-box">


                                                                <p><b>Experience :
                                                                    </b><?php  echo $row['prev_exp_yr']."year"." ".$row['prev_exp_mon']."months"; ?>
                                                                </p>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-xl-3 col-sm-6">
                                                            <div class="badge-box">


                                                                <p><b>PF Applicability :</b> <?php  
                                                            if($row['pf_app'] == true){
                                                                  echo "Yes";
                                                            }else{
                                                                echo "No";
                                                            }
                                                             
                                                            ?>
                                                                </p>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-xl-3 col-sm-6">
                                                            <div class="badge-box">


                                                                <p><b>ESIC Applicability :</b> <?php  
                                                            if($row['pf_app'] == true){
                                                                  echo "Yes";
                                                            }else{
                                                                echo "No";
                                                            }
                                                             
                                                            ?>
                                                                </p>

                                                            </div>
                                                        </div>
                                                     
                                                        <div class="col-lg-4 col-xl-3 col-sm-6">
                                                            <div class="badge-box">


                                                                <p><b>Special Allowance :</b>
                                                                    <?php  echo $row['sp_allow']; ?>
                                                                </p>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-xl-3 col-sm-6">
                                                            <div class="badge-box">


                                                                <p><b>Conveyance Allowance :</b>
                                                                    <?php  echo $row['con_allow']; ?>
                                                                </p>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-xl-3 col-sm-6">
                                                            <div class="badge-box">


                                                                <p><b>Education Allowance :</b>
                                                                    <?php  echo $row['edu_allow']; ?>
                                                                </p>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-xl-3 col-sm-6">
                                                            <div class="badge-box">


                                                                <p><b>Basic Salary :</b>
                                                                    <?php  echo $row['basic_sal']; ?>
                                                                </p>

                                                            </div>
                                                        </div>

                                                 
                                                    </div>
                                                    
                                                    
                                                </div>

                                            </div>

                                            <!-- Badges card end -->
                                        </div>

                                    </div>

                                </div>
                                <!-- Page body end -->
                            </div>
                        </div>
                        <!-- Main-body end -->

                        <div id="styleSelector">

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

<body>





    <?php include "common/footer.php"; ?>


</body>

</html>