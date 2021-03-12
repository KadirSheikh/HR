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
                                            <h5 class="m-b-10">Calculate Employees Salary</h5>

                                            <ul class="breadcrumb-title b-t-default p-t-10">
                                                <li class="breadcrumb-item">
                                                    <a href="index.html"> <i class="fa fa-home"></i> </a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="#!">Salary</a>
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
                                                <h5>Employee Salary Record</h5><br><br>

                                              

                                                <form action="" method="post">
                                                Company Name:
                                                <select id="company_name" name="companyName">
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
                                                
                                                <input type="submit" class="btn btn-sm btn-round btn-primary" value="Get" name="getCompanyData">

                                                </form>



                                                Month:
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
                                                </select>


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
                                                                <th>Department</th>
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
                                                            <?php
                                                           

                                                            if(isset($_POST['getCompanyData'])){

                                                           
                                                                $counter = 1;
                                                                $com_name = $_POST['companyName'];
                                                                 $query = "SELECT * FROM `employee_tbl` WHERE company LIKE '%$com_name%'";
                                                                $select = mysqli_query($conn, $query);
                                                                while($row = mysqli_fetch_assoc($select)){
                                                            ?>
                                                            <?php
                                                            
                                                            if($row['is_active'] == 'yes'){

                                                                ?>
                                                            <tr class="tr_<?php echo $counter; ?>">
                                                                <td><?php echo $counter; ?></td>
                                                                <td class="emp_id"><?php echo $row['emp_id'] ?></td>
                                                                <td class="name">
                                                                    <?php echo $row['firstname'].' '.$row['midname'].' '.$row['lastname'] ?>
                                                                </td>
                                                                <td class="job_location">
                                                                    <?php echo $row['job_location'] ?></td>
                                                                <td class="designation">
                                                                    <?php echo $row['designation'] ?></td>

                                                                <?php 
                                                                     $id = $row['department'];
                                                                     $dep_query = "SELECT * FROM `department` WHERE `id`= $id";
                                                                     $dep_data = mysqli_query($conn , $dep_query);
                                                                     $dep_row = mysqli_fetch_assoc($dep_data)
                                                                         ?>
                                                                <td class="department">
                                                                    <?php echo $dep_row['name'] ?>
                                                                </td>

                                                                <td class="bg-warning fixed_basic_salary">
                                                                    <?php echo $row['basic_sal'] ?></td>
                                                                <td class="bg-warning fixed_con_allow">
                                                                    <?php echo $row['con_allow'] ?></td>
                                                                <td class="bg-warning fixed_edu_allow">
                                                                    <?php echo $row['edu_allow'] ?></td>
                                                                <td class="bg-warning fixed_sp_allow">
                                                                    <?php echo $row['sp_allow'] ?></td>
                                                                <td contenteditable="true"  class="bg-warning fixed_days"></td>
                                                                <td contenteditable="true"
                                                                    class="bg-success attended_days"></td>
                                                                <td class="pf_applicable">
                                                                    <?php echo convert($row['pf_app']); ?></td>
                                                                <td class="esic_applicable">
                                                                    <?php echo convert($row['esic_app']); ?></td>
                                                                <td class="basic_salary"><?php echo $row['basic_sal'] ?>
                                                                </td>
                                                                <td class="con_allow"><?php echo $row['con_allow'] ?>
                                                                </td>
                                                                <td class="edu_allow"><?php echo $row['edu_allow'] ?>
                                                                </td>
                                                                <td class="sp_allow"><?php echo $row['sp_allow'] ?></td>
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

                                                            <?php
                                                            }
                                                            
                                                            ?>

                                                            <?php
                                                                $counter++;
                                                                }
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>

                                                </div>
                                                <div align="right">

                                                    <button onclick="exportTableToExcel('table_id', 'employee-data')"
                                                        class="btn btn-success mt-2">Excel</button>
                                                    <!-- <button  id="save_tbl">Save</button> -->

                                                    <button id="btn_read_HTML_Table"
                                                        class="btn btn-primary mt-2">Save</button>
                                                </div>


                                            </div>

                                        </div>
                                        <div id="message"></div>

                                    </div>
                                    <div class="page-header card">
                                        <div class="card-block">
                                            <h5 class="m-b-10">Import Sheet for Attendance</h5>

                                            <ul class="breadcrumb-title b-t-default p-t-10">
                                                <div class="conatiner">
                                                    <div class="row">

                                                        <div class="col-md-3">

                                                            <input class="form-control" type="file" id="input"
                                                                accept=".xls,.xlsx">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <button class="btn btn-primary"
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

    var global_month = 31;
    var global_year = new Date().getFullYear();

    // var sql = "";
    function cal_basic_allow(thiss) {
        console.log(thiss[0]);
        console.log("calculating basic allow")
        // basic_salary = con_allow = edu_allow = sp_allow = attended_days = 0;
        basic_salary = parseInt($(thiss[0]).find('.fixed_basic_salary').text()) || 0;
        con_allow = parseInt($(thiss[0]).find('.fixed_con_allow').text()) || 0;
        edu_allow = parseInt($(thiss[0]).find('.fixed_edu_allow').text()) || 0;
        sp_allow = parseInt($(thiss[0]).find('.fixed_sp_allow').text()) || 0;
        attended_days = parseInt($(thiss[0]).find('.attended_days').text()) || 0;
        fixed_days = parseInt($(thiss[0]).find('.fixed_days').text()) || 0;
        console.log(attended_days);

        $(thiss[0]).find('.basic_salary').text(parseInt(((basic_salary * attended_days) / fixed_days).toFixed()));
        $(thiss[0]).find('.con_allow').text(parseInt(((con_allow * attended_days) / fixed_days).toFixed()));
        $(thiss[0]).find('.edu_allow').text(parseInt(((edu_allow * attended_days) / fixed_days).toFixed()));
        $(thiss[0]).find('.sp_allow').text(parseInt(((sp_allow * attended_days) / fixed_days).toFixed()));
    }

    function cal_gross_salary(thiss) {
        console.log('calculating gross salary');

        basic_salary = parseInt($(thiss[0]).find('.basic_salary').text()) || 0;
        con_allow = parseInt($(thiss[0]).find('.con_allow').text()) || 0;
        edu_allow = parseInt($(thiss[0]).find('.edu_allow').text()) || 0;
        sp_allow = parseInt($(thiss[0]).find('.sp_allow').text()) || 0;
        incentive = parseInt($(thiss[0]).find('.incentive').text()) || 0;

        gross_salary = basic_salary + con_allow + edu_allow + sp_allow;
        console.log(gross_salary);
        $(thiss[0]).find('.gross_salary').text(gross_salary);
        return parseInt(gross_salary);
    }

    function cal_total_gross_salary(thiss) {
        console.log('calculating total gross salary');

        basic_salary = parseInt($(thiss[0]).find('.basic_salary').text()) || 0;
        con_allow = parseInt($(thiss[0]).find('.con_allow').text()) || 0;
        edu_allow = parseInt($(thiss[0]).find('.edu_allow').text()) || 0;
        sp_allow = parseInt($(thiss[0]).find('.sp_allow').text()) || 0;
        incentive = parseInt($(thiss[0]).find('.incentive').text()) || 0;

        total_gross_salary = basic_salary + con_allow + edu_allow + sp_allow + incentive;
        // console.log(total_gross_salary)
        $(thiss[0]).find('.total_gross_salary').text(total_gross_salary);
        return parseInt(total_gross_salary);
    }

    function cal_employer_pf(thiss) {
        console.log('calculating Employer PF');

        gross = parseInt($(thiss[0]).find('.total_gross_salary').text()) || 0;

        if ($(thiss[0]).find('.pf_applicable').text().trim() == 'Yes') {
            if (gross >= 15000) {
                pf = 1800;
            } else {
                pf = (gross * 0.12).toFixed();
            }
        } else {
            pf = 0;
        }

        $(thiss[0]).find('.employer_pf').text(pf)
        return parseInt(pf);
    }

    function cal_employee_pf(thiss) {
        console.log('calculating Employee PF');

        gross = parseInt($(thiss[0]).find('.total_gross_salary').text()) || 0;


        if ($(thiss[0]).find('.pf_applicable').text().trim() == 'Yes') {
            if (gross >= 15000) {
                employee_pf = 1800;
            } else {
                employee_pf = (gross * 0.12).toFixed();
            }
        } else {
            employee_pf = 0;
        }
        // console.log(employee_pf);
        $(thiss[0]).find('.employee_pf').text(employee_pf)
        return parseInt(employee_pf);
    }

    function cal_pf_admin(thiss) {
        console.log('calculating PF Admin');

        gross = parseInt($(thiss[0]).find('.total_gross_salary').text()) || 0;

        if ($(thiss[0]).find('.pf_applicable').text().trim() == 'Yes') {
            if (gross >= 15000) {
                pf_admin = 150;
            } else {
                pf_admin = (gross * 0.01).toFixed();
            }
        } else {
            pf_admin = 0;
        }

        $(thiss[0]).find('.pf_admin').text(pf_admin);
        return parseInt(pf_admin);
    }

    function cal_employer_esic(thiss) {
        console.log('calculating Employer ESIC');

        gross = parseInt($(thiss[0]).find('.total_gross_salary').text()) || 0;

        if ($(thiss[0]).find('.esic_applicable').text().trim() == 'Yes') {
            if (gross >= 21000) {
                employer_esic = 0;
            } else {
                employer_esic = (gross * 0.0325).toFixed();
            }
        } else {
            employer_esic = 0;
        }

        $(thiss[0]).find('.employer_esic').text(employer_esic)
        return parseInt(employer_esic);

    }

    function cal_employee_esic(thiss) {
        console.log('calculating Employee ESIC');

        gross = parseInt($(thiss[0]).find('.total_gross_salary').text()) || 0;

        if ($(thiss[0]).find('.esic_applicable').text().trim() == 'Yes') {
            if (gross >= 21000) {
                employee_esic = 0;
            } else {
                employee_esic = (gross * 0.0075).toFixed();
            }
        } else {
            employee_esic = 0;
        }

        $(thiss[0]).find('.employee_esic').text(employee_esic)
        return parseInt(employee_esic);
    }

    function cal_ctc(thiss) {
        console.log('Calculating CTC');

        total_gross_salary = cal_total_gross_salary(thiss)
        pf = cal_employer_pf(thiss);
        pf_admin = cal_pf_admin(thiss);
        employer_esic = cal_employer_esic(thiss);

        ctc = total_gross_salary + pf + pf_admin + employer_esic;
        $(thiss[0]).find('.ctc').text(ctc);
        return parseInt(ctc);
    }

    function cal_pt(thiss) {
        console.log('calculating PT');
        gross = parseInt($(thiss[0]).find('.total_gross_salary').text()) || 0;

     if($(thiss[0]).find('.job_location').text().trim() == 'Factory'){
        if (gross >= 33334) {
            pt = 208;
        } else if (gross >= 25001) {
            pt = 167;
        } else if(gross > 18751) {
            pt = 125;
        }else {
            pt = 0;
        }

     }else{
        

        if (gross >= 10000) {
            pt = 200;
        } else if (gross > 7500 && gross < 10000) {
            pt = 175;
        } else {
            pt = 0;
        }
     }


        $(thiss[0]).find('.pt').text(pt)
        return parseInt(pt);
    }

    function cal_total_deduction(thiss) {
        console.log('Calculating Total Deduction');
        employer_pf = parseInt($(thiss[0]).find('.employer_pf').text()) || 0;
        pf_admin = parseInt($(thiss[0]).find('.pf_admin').text()) || 0;
        employer_esic = parseInt($(thiss[0]).find('.employer_esic').text()) || 0;
        employee_pf = parseInt($(thiss[0]).find('.employee_pf').text()) || 0;
        employee_esic = parseInt($(thiss[0]).find('.employee_esic').text()) || 0;
        pt = parseInt($(thiss[0]).find('.pt').text()) || 0;
        advance = parseInt($(thiss[0]).find('.advance').text()) || 0;
        other_deduction = parseInt($(thiss[0]).find('.other_deduction').text()) || 0;
        total_deduction = employer_pf + pf_admin + employer_esic + employee_pf + employee_esic + pt + advance +
            other_deduction;
        $(thiss[0]).find('.total_deduction').text(total_deduction);
        return parseInt(total_deduction);
    }

    function cal_net_salary(thiss) {
        console.log('Calculating Net Salary');
        total_gross_salary = cal_total_gross_salary(thiss);
        total_deduction = cal_total_deduction(thiss);
        net_salary = total_gross_salary - total_deduction;
        $(thiss[0]).find('.net_take_salary').text(net_salary);
        return parseInt(net_salary);
    }

    $(document).ready(function() {

        //datatable


        // $('#table_id').DataTable({
        //     dom: 'Bfrtip',
        //     buttons: [
        //         'copy', 'csv', 'excel', 'pdf', 'print'
        //     ]
        // });



        $('#salary_table > tr').each(function() {
            console.log('ready');
            $(this).find('.fixed_days').text(parseInt(global_month));
            $(this).find('.attended_days').text(parseInt(global_month));

            cal_basic_allow($(this));
            cal_gross_salary($(this));
            cal_total_gross_salary($(this))
            cal_employer_pf($(this));
            cal_pf_admin($(this));
            cal_employer_esic($(this));
            cal_ctc($(this));
            cal_employee_pf($(this));
            cal_employee_esic($(this));
            cal_pt($(this));
            cal_total_deduction($(this));
            cal_net_salary($(this));
            console.log('ready end');
        });

        $('#salary_table > tr > td').keyup(function() {
            console.log('keyup');
            // console.log($(this).parent()[0]);
            cal_basic_allow($(this).parent())
            cal_gross_salary($(this).parent());
            cal_total_gross_salary($(this).parent());
            cal_employer_pf($(this).parent());
            cal_pf_admin($(this).parent());
            cal_employer_esic($(this).parent());
            cal_ctc($(this).parent());
            cal_employee_pf($(this).parent());
            cal_employee_esic($(this).parent());
            cal_pt($(this).parent());
            cal_total_deduction($(this).parent());
            cal_net_salary($(this).parent());
            console.log('keyup end');
        })



        $('#global_month').change(function() {
            // console.log(this.value);

            global_month = this.value;
            $('#salary_table > tr').each(function() {
                console.log(global_month);

                $(this).find('.fixed_days').text(parseInt(global_month));
                $(this).find('.attended_days').text(parseInt(global_month));
                // console.log($(this).parent());
                cal_basic_allow($(this));
                // cal_gross_salary($(this));
                // cal_total_gross_salary($(this))
                // cal_employer_pf($(this));
                // cal_pf_admin($(this));
                // cal_employer_esic($(this));
                // cal_ctc($(this));
                // cal_employee_pf($(this));
                // cal_employee_esic($(this));
                // cal_pt($(this));
                // cal_total_deduction($(this));
                // cal_net_salary($(this));

                console.log('change end');
            });


        });


        //read table row

        $('#btn_read_HTML_Table').click(function() {
            var html_table_data = "";
            var bRowStarted = true;

            var sql = "";
            $('#table_id tbody > tr').each(function() {

                sql += "(";
                sql += "'" + $('#company_name option:selected').text() + "',";
                $('td', this).each(function() {


                    sql += "'" + $(this).text().trim() + "',";

                });
                sql = sql.slice(0, -1);
                sql += "),";

            });
            sql = sql.slice(0, -1);
            console.log(sql);


            // console.log($('#global_month').val() , global_year);

            $.ajax({
                url: 'save_tbl_data.php',
                method: 'POST',
                data: {
                    data: sql,
                    month: $('#global_month option:selected').text(),
                    year: global_year,
                    company_name : $('#company_name option:selected').text()

                },
                success: function(response) {

                    var response = JSON.parse(response);
                    //  console.log(response);

                    if (response.status == "notok" || response.status == "duplicate") {
                        $('#message').html('<div class="alert alert-danger">' + response
                            .message + '</div>');
                        // console.log('notok');

                    } else {
                        $('#message').html('<div class="alert alert-success">' + response
                            .message + '</div>');
                        // console.log('ok');
                    }

                }
            });
        });

        // var tbody = $("#table_id tbody");

        // if (tbody.children().length == 0) {
        //     $('#emp_card').hide();
        //     $('#msg').html('<h2 align="center">No Record.</h2>')
        // } else {
        //     $('#emp_card').show();
        // }


    });


       //import att sheet

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
                
                    
                     var arr = [];
                    let rowObject = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheet]);
                
                   rowObject.forEach((i , value) => {
                    //    console.log(i['__EMPTY_1'] , i['__EMPTY_47']);

                       arr.push({
                          "emp_code": i['__EMPTY_1'],
                          "attendance":i['__EMPTY_47']
                       })
                   });

                //    console.log(arr);

                    $('#salary_table > tr').each(function() {
                        // console.log($(this).find('.emp_id').text());
                        arr.forEach((i , value) => {
                        //    console.log(i.emp_code , parseInt($(this).find('.emp_id').text()));

                        if(i.emp_code == parseInt($(this).find('.emp_id').text())){
                            $(this).find('.attended_days').text(i.attendance);
                        }

                           

                        });

                cal_basic_allow($(this));
                cal_gross_salary($(this));
                cal_total_gross_salary($(this))
                cal_employer_pf($(this));
                cal_pf_admin($(this));
                cal_employer_esic($(this));
                cal_ctc($(this));
                cal_employee_pf($(this));
                cal_employee_esic($(this));
                cal_pt($(this));
                cal_total_deduction($(this));
                cal_net_salary($(this));
                   

                    });

                    

                });
            }
        }
    });



// export to excel
    function exportTableToExcel(tableID, filename = '') {
        var downloadLink;
        var dataType = 'application/vnd.ms-excel';
        var tableSelect = document.getElementById(tableID);
        var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

        // Specify file name
        filename = filename ? filename + '.xls' : 'excel_data.xls';

        // Create download link element
        downloadLink = document.createElement("a");

        document.body.appendChild(downloadLink);

        if (navigator.msSaveOrOpenBlob) {
            var blob = new Blob(['\ufeff', tableHTML], {
                type: dataType
            });
            navigator.msSaveOrOpenBlob(blob, filename);
        } else {
            // Create a link to the file
            downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

            // Setting the file name
            downloadLink.download = filename;

            //triggering the function
            downloadLink.click();
        }
    }






    </script>
</body>

</html>