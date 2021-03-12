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
                        
                        let rowObject = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[
                            sheet]);
                        // console.log(rowObject);
                        rowObject.forEach((i, value) => {

                            arr.push({
                                "emp_code": i['__EMPTY'],
                                "name": i['__EMPTY_1'],
                                "location": i['__EMPTY_2'],
                                "designation": i['__EMPTY_3'],
                                "doj": i['__EMPTY_4'],
                                "pf_app": i['__EMPTY_5'],
                                "esic_app": i['__EMPTY_6'],
                                "basic_sal": i['__EMPTY_7'],
                                "con_allow": i['__EMPTY_8'],
                                "edu_allow": i['__EMPTY_9'],
                                "spe_allow": i['__EMPTY_10'],
                                "days_to_be_cal": i['__EMPTY_22'],
                                "total_att": i['__EMPTY_23']
                            });

                        });
                        console.log(arr);
                        var sql = "("
                        arr.forEach((i, value) => {


                            if (typeof i.emp_code === "number") {
                                sql += "'" + i.emp_code + "'," + "'" + i.name + "'," + "'" +
                                    i.location + "'," + "'" + i.designation + "'," + "'" + i
                                    .doj + "'," + "'" + i.pf_app + "'," + "'" + i.esic_app +
                                    "'," + "'" + i.basic_sal + "'," + "'" + i.con_allow +
                                    "'," + "'" + i.edu_allow + "'," + "'" + i.spe_allow +
                                    "'," + "'" + i.days_to_be_cal + "'," + "'" + i
                                    .total_att + "')," + "(";

                            };

                        });
                        
                        // sql = sql.slice(0, -2);
                     
                       
                        

                        // $.ajax({
                        //     url: 'save_bulk_data.php',
                        //     method: 'POST',
                        //     data: {
                        //         data: sql

                        //     },
                        //     success: function(response) {
                        //         console.log(response);

                        //         // var response = JSON.parse(response);
                        //         // //  console.log(response);

                        //         // if (response.status == "notok" || response.status ==
                        //         //     "duplicate") {
                        //         //     $('#message').html(
                        //         //         '<div class="alert alert-danger">' +
                        //         //         response
                        //         //         .message + '</div>');
                        //         //     // console.log('notok');

                        //         // } else {
                        //         //     $('#message').html(
                        //         //         '<div class="alert alert-success">' +
                        //         //         response
                        //         //         .message + '</div>');
                        //         //     // console.log('ok');
                        //         // }

                        //     }
                        // });





                    });
                }
            }
        });


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