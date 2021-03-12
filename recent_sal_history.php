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
                                            <h5 class="m-b-10">Employees Recent Salary</h5>

                                            <ul class="breadcrumb-title b-t-default p-t-10">
                                                <li class="breadcrumb-item">
                                                    <a href="index.html"> <i class="fa fa-home"></i> </a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="#!">Recent Salary Record</a>
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
                                                <h5>Recent Salary </h5><br><br>

                                                Month:
                                                <select id="global_month">
                                                    <option value="31">Jan</option>
                                                    <option value="28">Feb</option>
                                                    <option value="31">Mar</option>
                                                    <option value="30">Apr</option>
                                                    <option value="31">May</option>
                                                    <option value="30">Jun</option>
                                                    <option value="31">Jul</option>
                                                    <option value="31">Aug</option>
                                                    <option value="30">Sep</option>
                                                    <option value="31">Oct</option>
                                                    <option value="30">Nov</option>
                                                    <option value="31">Dec</option>
                                                </select>
                                                Year:
                                                <select id="global_year">
                                                    <option value="2021">2021</option>
                                                    <option value="2022">2022</option>
                                                    <option value="2023">2023</option>
                                                    <option value="2024">2024</option>
                                                    <option value="2025">2025</option>
                                                    <option value="2026">2026</option>
                                                    <option value="2027">2027</option>
                                                    <option value="2028">2028</option>
                                                    <option value="2029">2029</option>
                                                    <option value="2030">2030</option>

                                                </select> &nbsp;&nbsp;&nbsp;&nbsp;

                                                <button class="btn btn-sm  btn-primary"
                                                    id="get_recent_data">Get Data</button>


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
                                            <div class="table-responsive" id="tbl_con">
                                                <!-- display data here -->
                                             </div>
                                            </div>

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
    $('#get_recent_data').click(function() {

        // console.log($('#global_month option:selected').text(), $('#global_year option:selected').text());



        $.ajax({
            url: 'get_recent_data.php',
            method: 'POST',
            data: {
                
                month: $('#global_month option:selected').text(),
                year: $('#global_year option:selected').text()

            },
            success: function(response) {
                $('#tbl_con').html(response);
 
            //    console.log(response);

            }
        });
    });
    </script>
</body>

</html>