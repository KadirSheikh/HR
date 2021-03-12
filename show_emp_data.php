<?php include 'common/connect.php';?>


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

                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-header start -->
                                    <div class="page-header card">
                                        <div class="card-block">
                                            <h5 class="m-b-10">Display Employees Data</h5>

                                            <ul class="breadcrumb-title b-t-default p-t-10">
                                                <li class="breadcrumb-item">
                                                    <a href="index.html"> <i class="fa fa-home"></i> </a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="#!">All Employees</a>
                                                </li>
                                                <!-- <li class="breadcrumb-item"><a href="#!">Bootstrap Basic Tables</a>
                                                </li> -->
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- Page-header end -->
                                    <div id="message"></div>

                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Employee Records</h5>
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
                                                    <table class="table" id="tbl">
                                                        <thead>
                                                            <tr>
                                                                <th>Sr.No</th>
                                                                <th>Emp.Code
                                                                <th>Name of Employee</th>
                                                                <th>Location</th>
                                                                <th>Designation</th>
                                                                <th>Edit</th>
                                                                <th>Detail</th>
                                                                <th>Delete</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php 
                                                                    
                                                                    $query = "SELECT * FROM `employee_tbl`";
                                                                    $data = mysqli_query($conn , $query);
                                                                    $count = 0;
                                                                    while($row = mysqli_fetch_assoc($data)){
                                                                        $id = $row['id'];
                                                                        $firstname = $row['firstname'];
                                                                        $lastname = $row['lastname'];
                                                                        $designation = $row['designation'];
                                                                        $job_location = $row['job_location'];
                                                                        $is_active = $row['is_active'];
                                                                        $emp_code = $row['emp_id'];
                                                                        $count ++;
                                                                    

                                                                        ?>
                                                            <?php 
                                                                        if($is_active == 'yes'){
                                                                            ?>
                                                            <tr id="<?php echo $count; ?>">

                                                                <th scope="row"><?php echo $count; ?></th>
                                                                <td><?php echo $emp_code; ?></td>
                                                                <td><?php echo $firstname ." ".$lastname; ?></td>
                                                                <td><?php echo $job_location; ?></td>
                                                                <td><?php echo $designation; ?></td>
                                                                <td>
                                                                    <a href="edit_emp.php?id=<?php echo base64_encode($id); ?>"
                                                                        class="text-primary" style="font-size:30px;"><i
                                                                            class="fa fa-edit" data-toggle="tooltip"
                                                                            data-placement="top"
                                                                            title="Edit Record"></i></a>

                                                                </td>
                                                                <td>
                                                                    <a href="emp_details.php?id=<?php echo base64_encode($id); ?>"
                                                                        class="text-secondary"
                                                                        style="font-size:30px;cursor:pointer;"
                                                                        data-toggle="tooltip" data-placement="top"
                                                                        title="Record Details"><i
                                                                            class="fa fa-info-circle"
                                                                            aria-hidden="true"></i></a>

                                                                </td>
                                                                <td>
                                                                    <span data-id="<?php echo $count; ?>"
                                                                        class="text-danger" id="<?php echo $id; ?>"
                                                                        style="font-size:30px;cursor:pointer;"
                                                                        data-toggle="tooltip" data-placement="top"
                                                                        title="Delete Record"><i class="fa fa-trash"
                                                                            aria-hidden="true"></i></span>

                                                                </td>
                                                            </tr>

                                                            <?php
                                                                        }
                                                                        ?>

                                                            <?php

                                                                    }
                                                                     ?>




                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div id="msg"></div>
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
    $(document).ready(function() {
        $('span.text-danger').on('click', function(e) {
            var tr_id = $(this).attr('data-id');
            var span = $(this);

            e.preventDefault();
            $.ajax({
                url: 'delete_emp.php',
                method: 'POST',
                data: {
                    id: this.id
                },
                success: function(response) {
                    var response = JSON.parse(response);
                    if (response.status == true) {
                        $('#message').html('<div class="alert alert-success">' + response
                            .message + '</div>');
                        $('tr#' + tr_id).hide();

                    } else {
                        $('#message').html('<div class="alert alert-danger">' + response
                            .message + '</div>');
                    }

                }
            });


        });


        var tbody = $("#tbl tbody");

        if (tbody.children().length == 0) {
            $('#tbl').hide();
            $('#msg').html('<h2 align="center">No Record.</h2>')
        } else {
            $('#tbl').show();
        }

    });
    </script>
</body>

</html>