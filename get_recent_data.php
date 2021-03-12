<?php
include 'common/connect.php'; 

$month = $_POST['month'];
$year = $_POST['year'];

$global_month =  date('m', strtotime($month));

$date =  $year."-".$global_month;

                                                
echo '<table class="table table-bordered display nowrap" id="table_id"
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
<tbody id="salary_table">';

$counter = 1;
$query = "SELECT * FROM `salary_record_tbl` WHERE `create_at` LIKE '$date%'";
$result = mysqli_query($conn , $query);
while ($row = mysqli_fetch_assoc($result)) {
   
   

      
    echo'<tr class="tr_'.$counter.'">
        <td>'.$counter.'</td>
        <td class="emp_id">'.$row['emp_id'] .'</td>
        <td class="name">
             '.$row['name'].'
        </td>
        <td class="job_location">
             '.$row['location'].' </td>
        <td class="designation">
            '.$row['designatioin'].'</td> 
        <td class="department">'.$row['department'].'</td> 
       

        <td class="bg-warning fixed_basic_salary">
             '.$row['basic_sal'].'</td>
        <td class="bg-warning fixed_con_allow">
             '.$row['con_allow'].'</td>
        <td class="bg-warning fixed_edu_allow">
             '.$row['edu_allow'].'</td>
        <td class="bg-warning fixed_sp_allow">
             '.$row['spe_allow'].'</td>
        <td class="bg-warning fixed_days">'.$row['day_to_be_cal'].'</td>
        <td class="bg-success attended_days">'.$row['total_day_attend'].'</td>
        <td class="pf_applicable">
             '.$row['pf_app'].'</td>
        <td class="esic_applicable">
             '.$row['esic_app'].'</td>
        <td class="basic_salary"> '.$row['basic_sal_cal'].'
        </td>
        <td class="con_allow"> '.$row['con_allow_cal'].'
        </td>
        <td class="edu_allow"> '.$row['edu_allow_cal'].'
        </td>
        <td class="sp_allow"> '.$row['spec_allow_cal'].'</td>
        <td class="gross_salary text-success">'.$row['gross_sal'].'</td>
        <td class="incentive">'.$row['incentive'].'</td>
        <td class="total_gross_salary">'.$row['total_gross_sal'].'</td>
        <td class="employer_pf">'.$row['emplr_pf'].'</td>
        <td class="pf_admin">'.$row['pf_admin'].'</td>
        <td class="employer_esic">'.$row['emplr_esic'].'</td>
        <td class="ctc">'.$row['ctc'].'</td>
        <td class="employee_pf">'.$row['emp_pf'].'</td>
        <td class="employee_esic">'.$row['emp_esic'].'</td>
        <td class="pt">'.$row['pt'].'</td>
        <td class="advance">'.$row['advance'].'</td>
        <td class="balance_advance">'.$row['bal_advance'].'</td>
        <td class="other_deduction">'.$row['other_ded'].'</td>
        <td class="total_deduction">'.$row['total_ded'].'</td>
        <td class="net_take_salary">'.$row['net_take_sal'].'</td>
        <td class="remark">'.$row['remark'].'</td>
    </tr>';

  
    

        $counter++;
        }
    


echo'</tbody>
</table>';








?>