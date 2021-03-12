<?php include 'common/connect.php';?>

<?php
function convert($data){
    if($data == 0){
        return 'No';
    }else{
        return 'Yes';
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


                    <style>
                    .bg-warning {
                        background-color: #ffeaa7 !important;
                        color: black !important;
                    }

                    .bg-success {
                        background-color: #81ecec !important;
                        color: black !important;
                    }
                    </style>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-header card">
                                        <div class="card-block">
                                            <h5 class="m-b-10">Add Employees in Bulk</h5>

                                            <ul class="breadcrumb-title b-t-default p-t-10">
                                                <li class="breadcrumb-item">
                                                    <a href="index.html"> <i class="fa fa-home"></i> </a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="#!">Add Bulk Employees</a>
                                                </li>
                                                <!-- <li class="breadcrumb-item"><a href="#!">Bootstrap Basic Tables</a>
                                                </li> -->
                                            </ul>
                                        </div>
                                    </div>
                                    <div id="message"></div>

                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <div id="msg"></div>
                                        <div class="card" id="emp_card">
                                            <div class="card-header">
                                                <!-- <h5>Employee Salary Record</h5><br><br> -->

                                                <!-- Month:
                                                <select id="global_month">
                                                    <option value="31">Jan</option>
                                                    <option value="28">Feb</option>
                                                    <option value="31">Mar</option>
                                                    <option value="30">Apr</option>
                                                    <option value="31">May</option>
                                                    <option value="30">Jun</option>
                                                    <option value="31">Jul</option>
                                                    <option value="30">Aug</option>
                                                    <option value="31">Sep
                                                    </option>
                                                    <option value="30">Oct</option>
                                                    <option value="31">Nov
                                                    </option>
                                                    <option value="30">Dec
                                                    </option>
                                                </select> -->


                                                <div class="card-header-right">
                                                    <ul class="list-unstyled card-option">
                                                        <li><i class="fa fa-chevron-left"></i></li>
                                                        <li><i class="fa fa-window-maximize full-card"></i></li>
                                                        <li><i class="fa fa-minus minimize-card"></i></li>
                                                        <li><i class="fa fa-refresh reload-card"></i></li>
                                                        <li><i class="fa fa-times close-card"></i></li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <div class="card-block table-border-style">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered display nowrap" id="table_id"
                                                        style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Sr.No</th>
                                                                <th>Emp.Code</th>
                                                                <th>Name of Employee</th>
                                                                <th>Location</th>
                                                                <th>Designation</th>
                                                                <th>DOJ</th>
                                                                <th class="bg-warning">Basic Salary</th>
                                                                <th class="bg-warning">Conveyance Allowance</th>
                                                                <th class="bg-warning">Education Allowance</th>
                                                                <th class="bg-warning">Special Allowance</th>
                                                                <th class="bg-warning">Days to be calculated on</th>
                                                                <th class="bg-success">Total Days Attended</th>
                                                                <th>PF Applicable</th>
                                                                <th>ESIC Applicable</th>
                                                                <th>Basic Salary</th>
                                                                <th>Conveyance Allowance</th>
                                                                <th>Education Allowance</th>
                                                                <th>Special Allowance</th>
                                                                <th>Gross Salary</th>
                                                                <th>Incentive (Extras)</th>
                                                                <th>Total Gross Salary</th>
                                                                <th>Employer PF</th>
                                                                <th>PF Admin</th>
                                                                <th>Employer ESIC</th>
                                                                <th>CTC</th>
                                                                <th>Employee PF</th>
                                                                <th>Employee ESIC</th>
                                                                <th>PT</th>
                                                                <th>Advance</th>
                                                                <th>Balance Advance</th>
                                                                <th>Other Deduction</th>
                                                                <th>Total Deductions</th>
                                                                <th>Net take Salary</th>
                                                                <th>Remark</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="salary_table">

                                                            <tr class="tr">
                                                                <td></td>
                                                                <td class="emp_id"></td>
                                                                <td class="name">

                                                                </td>
                                                                <td class="job_location">
                                                                </td>
                                                                <td class="designation">
                                                                </td>

                                                                <td class="doj">

                                                                </td>

                                                                <td class="bg-warning fixed_basic_salary">
                                                                </td>
                                                                <td class="bg-warning fixed_con_allow">
                                                                </td>
                                                                <td class="bg-warning fixed_edu_allow">
                                                                </td>
                                                                <td class="bg-warning fixed_sp_allow">
                                                                </td>
                                                                <td class="bg-warning fixed_days"></td>
                                                                <td contenteditable="true"
                                                                    class="bg-success attended_days"></td>
                                                                <td class="pf_applicable">
                                                                </td>
                                                                <td class="esic_applicable">
                                                                </td>
                                                                <td class="basic_salary">
                                                                </td>
                                                                <td class="con_allow">
                                                                </td>
                                                                <td class="edu_allow">
                                                                </td>
                                                                <td class="sp_allow"></td>
                                                                <td class="gross_salary text-success"></td>
                                                                <td contenteditable="true" class="incentive"></td>
                                                                <td class="total_gross_salary"></td>
                                                                <td class="employer_pf"></td>
                                                                <td class="pf_admin"></td>
                                                                <td class="employer_esic"></td>
                                                                <td class="ctc"></td>
                                                                <td class="employee_pf"></td>
                                                                <td class="employee_esic"></td>
                                                                <td class="pt"></td>
                                                                <td contenteditable="true" class="advance"></td>
                                                                <td contenteditable="true" class="balance_advance"></td>
                                                                <td contenteditable="true" class="other_deduction"></td>
                                                                <td class="total_deduction"></td>
                                                                <td class="net_take_salary"></td>
                                                                <td contenteditable="true" class="remark"></td>
                                                            </tr>


                                                        </tbody>
                                                    </table>

                                                </div>
                                                <div align="right">

                                                    <!-- <button onclick="exportTableToExcel('table_id', 'employee-data')"
                                                        class="btn btn-success mt-2">Excel</button> -->
                                                    <!-- <button  id="save_tbl">Save</button> -->

                                                    <button id="btn_read_HTML_Table"
                                                        class="btn btn-primary mt-2">Save</button>
                                                </div>


                                            </div>

                                        </div>
                                        <div id="message"></div>

                                    </div>
                                   
                                    <!-- Page-body end -->
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

    <?php include 'common/footer.php';?>
    <script>




    
    </script>
</body>

</html>