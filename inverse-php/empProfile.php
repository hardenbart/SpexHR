<?php
include('dbconnection.php'); 
include('includes/header.php'); 
include('includes/navbar.php');
?>
    <?php 
		// Register user
		if(isset($_POST['btnsignup']))
        {
                $depName=$_POST['txtName'];
                $depBday=$_POST['txtBirthday'];
                $dependanstDetails = array();

                $schoolName = $_POST['txtSchoolName'];
                $schoolAddress = $_POST['txtSchoolAddress'];
                $schoolDegree = $_POST['txtDegree'];
                $yearGraduated = $_POST['txtYearGraduated'];
                $schoolDetails = array();

                $fname = trim($_POST['fname']);
                $mname = trim($_POST['mname']);
                $lname = trim($_POST['lname']);
                $position = trim($_POST['position']);
                $birthday =  trim($_POST['birthday']);
                $birthplace = trim($_POST['birthplace']);
                $citizenship = $_POST['citizenship'];
                $sex = $_POST['sex'];
                $contactno = $_POST['contactno'];
                $civilstatus = $_POST['civilstatus'];
                $address = $_POST['address'];
                $sssno = $_POST['sssno'];
                $pagibigno = $_POST['pagibigno'];
                $tinno = $_POST['tinno'];
                $philhealthno = $_POST['philhealthno'];
                $nameofhusband = $_POST['nameofhusband'];
                $occupationofhusband = $_POST['occupationofhusband'];
                $nameofwife = $_POST['nameofwife'];
                $occupationofwife = $_POST['occupationofwife'];
                $fullname = $fname . $mname . $lname;
                $fullnamedependant = $fname ." ". $mname ." ". $lname;
                $uuid = $_POST['uuid'];

                $filename = $fullname ."_". $uuid . "_" . $_FILES["uploadfile"]["name"];
                $tempname = $_FILES["uploadfile"]["tmp_name"]; 
                $folder = "pictures/".$filename;
                move_uploaded_file($tempname, $folder);

                
                for($i = 0; $i < count($depName); $i++){
                    $query = "('".$uuid."','". $fullname ."','" .$depName[$i]. "','" .$depBday[$i]."')";
                    array_push($dependanstDetails, $query);
                }

                for($s = 0; $s < count($schoolName); $s++){
                    $query = "('".$uuid."','". $fullname ."','" .$schoolName[$s]. "','" .$schoolAddress[$s]."','" .$schoolDegree[$s]."','" .$yearGraduated[$s]."')";
                    array_push($schoolDetails, $query);
                }
                mysqli_begin_transaction($con);

                try{
                    $dependantsValue = join(",", $dependanstDetails);
                    $insertDepQuery = "insert into employeee_dependant(uuid,employeeName,dependantName,dependantBirthday) values ".$dependantsValue. ";";
                    $insertDep = mysqli_query($con,$insertDepQuery);

                    $schoolValue = join(",", $schoolDetails);
                    echo "<script>alert(".$schoolValue.")</script>";
                    $insertSchoolQuery = "insert into employee_einfo(uuid,fullname,schoolname,address,degree,yeargraduated) values ".$schoolValue. ";";
                    $insertSchool = mysqli_query($con,$insertSchoolQuery);

                    $msg=mysqli_query($con,"insert into employee_pinfo(fname,mname,lname,position,birthday,birthplace,citizenship,sex,contactno,civilstatus,address,sssno,pagibigno,tinno,philhealthno,nameofhusband,occupationofhusband,nameofwife,occupationofwife,filename,uuid) 
                    values('$fname','$mname','$lname','$position','$birthday','$birthplace','$citizenship','$sex','$contactno','$civilstatus','$address','$sssno','$pagibigno','$tinno','$philhealthno','$nameofhusband','$occupationofhusband','$nameofwife','$occupationofwife','$filename','$uuid')");

                    if($insertDep && $msg && $insertSchool){
                        mysqli_commit($con);
                        echo "<script>alert('Register successfully');</script>";
                    }
                    else{
                        mysqli_rollback($con);
                    }
                }
                catch(mysqli_sql_exception $exception){
                    mysqli_rollback($mysqli);
                    echo "<script>alert('Error! Please Refresh the page');</script>";
                }
		}
        
	?>
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Employee's Profile</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item">Employee's Data</li>
                                <li class="breadcrumb-item active">Employee's Profile</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="card">     
                    <div class="col-lg-12"> 
                        <div class="row mt-2">
                            <div class="col-lg-10">
                            </div>
                            <div class="col-lg-2">
                                <button class="btn btn-info" data-toggle="modal" data-target="#addnewModal">Add New Employee</button>
                            </div>
                        </div>
                        <div class="row mt-2">    
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="font-weight-bold text-center display nowrap table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th><b>EMP-ID</b></th>
                                                <th><b>PICTURE</b></th>
                                                <th><b>EMPLOYEE NAME</b></th>
                                                <th><b>ACTION</b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            <?php $ret=mysqli_query($con,"select id,filename,fname,mname,lname from employee_pinfo group by id asc");
                                                while($row=mysqli_fetch_array($ret))
                                                {?>
                                            <tr>
                                                <td class=""><?php echo "SPXHR-000". $row['id'];?></td>
                                                <td><?php echo "<img height = '80' width='80' src='pictures/" . $row['filename']."'>"?></td>
                                                <td><?php echo $row['fname']. " " .$row['mname']. " " .$row['lname']?></td>
                                                <td>
                                                    <button class="btn btn-primary" data-toggle="modal" data-target="#personaldetailsModal">Personal Details</button>
                                                    <button class="btn btn-info" data-toggle="modal" data-target="#EducationdetailsModal">Educational Details</button>
                                                    <button class="btn btn-danger" data-toggle="modal" data-target="#jobdetailsModal">Job Details</button>
                                                    <button class="btn btn-success" data-toggle="modal" data-target="#allowancedetailsModal">Allowance/Agency Details</button>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add New Employee Modal  -->
                <div class="modal fade" id="addnewModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl2 modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Add New Employee</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body wizard-content">
                                            <form method='post' action="empProfile.php" enctype="multipart/form-data">
                                                <div class="card">
                                                    <div class="card-body shadow-lg rounded">
                                                    <h5 class="card-title">Personal Info</h5>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <img id='img-upload'/>
                                                        </div>
                                                    </div>
			                                        <input type="text" class="form-control d-none" name="uuid" id="uuid">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <p class="text-center font-weight-bold mt-2">Upload Image</p>
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <span class="input-group-btn">
                                                                        <span class="btn btn-default btn-file">
                                                                            Browse… <input type="file" id="imgInp" name="uploadfile">
                                                                        </span>
                                                                    </span>
                                                                    <input type="text" class="form-control" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                          <div class="form-group col-md-3">
                                                            <label>Last Name</label>
                                                            <input type="text" class="form-control" id="lname" name="lname" required>
                                                          </div>
                                                          <div class="form-group col-md-3">
                                                            <label>First Name</label>
                                                            <input type="text" class="form-control" id="fname" name="fname" required>
                                                          </div>
                                                          <div class="form-group col-md-3">
                                                            <label>Middle Name</label>
                                                            <input type="text" class="form-control" id="mname" name="mname" required>
                                                          </div>
                                                          <div class="form-group col-md-3">
                                                            <label>Position</label>
                                                            <input type="text" class="form-control" id="position" name="position" required>
                                                          </div>
                                                    </div>
                                                    <div class="form-row">
                                                            <div class="form-group col-md-3">
                                                              <label>Date of Birthday</label>
                                                              <input type="date" class="form-control" id="birthday" name="birthday">
                                                            </div>
                                                            <div class="form-group col-md-5">
                                                              <label>Birth Place</label>
                                                              <input type="text" class="form-control" id="birthplace" name="birthplace">
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <label>Citizenship</label>
                                                                <input type="text" class="form-control" id="citizenship" name="citizenship" value="Filipino" readonly>
                                                              </div>
                                                            <div class="col-md-2">
                                                                <label for="gender">Sex</label>
                                                                <select class="form-control" name="sex" required="">
                                                                    <option value="" disabled="" selected="">Select Gender</option>
                                                                    <option value="MALE">MALE</option>
                                                                    <option value="FEMALE">FEMALE</option>
                                                                </select>
                                                            </div>
                                                    </div>
                                                    <div class="form-row">
                                                            <div class="form-group col-md-3">
                                                              <label>Contact Number</label>
                                                              <input type="text" class="form-control" id="contactno" name="contactno">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label for="civilstatus">CivilStatus:</label>
                                                                <select class="form-control" required="" name="civilstatus">
                                                                    <option value="" disabled="" selected="">Select Civil Status</option>--&gt;
                                                                    <option value="SINGLE">Single</option>
                                                                    <option value="WIDOWED">Widowed</option>
                                                                    <option value="MARRIED">Married</option>
                                                                    <option value="SEPARATED">Separated</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                              <label>Permanent Address (Full Address) </label>
                                                              <input type="text" class="form-control" id="address" name="address">
                                                            </div>
                                                    </div>
                                                    <div class="form-row">
                                                            <div class="form-group col-md-3">
                                                              <label>SSS Number</label>
                                                              <input type="text" class="form-control" id="sssno" name="sssno">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                              <label>Pag-Ibig Number</label>
                                                              <input type="text" class="form-control" id="pagibigno" name="pagibigno">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                              <label>TIN Number</label>
                                                              <input type="text" class="form-control" id="tinno" name="tinno">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                              <label>Philhealth Number</label>
                                                              <input type="text" class="form-control" id="philhealthno" name="philhealthno">
                                                            </div>
                                                    </div>
                                                    <div class="form-row">
                                                            <div class="form-group col-md-3">
                                                              <label>Name of Husband</label>
                                                              <input type="text" class="form-control" id="nameofhusband" name="nameofhusband">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                              <label>Occupation of Husband</label>
                                                              <input type="text" class="form-control" id="occupationofhusband" name="occupationofhusband">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                              <label>Name of Wife</label>
                                                              <input type="text" class="form-control" id="nameofwife" name="nameofwife">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                              <label>Occupation of Wife</label>
                                                              <input type="text" class="form-control" id="occupationofwife" name="occupationofwife">
                                                            </div>
                                                    </div>
                                                    </div>
                                                </div>

                                                <div class="card">
                                                    <div class="card-body shadow-lg rounded">
                                                            <h5 class="card-title">Full Name and Birthday of Dependants</h5>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="table-responsive">
                                                                        <table id="example23"
                                                                            class="font-weight-bold text-center display nowrap table table-hover table-striped table-bordered"
                                                                            cellspacing="0" width="100%">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Dependant Name</th>
                                                                                    <th>Dependant Birthday</th>
                                                                                    <th>Action</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td><input type="text" class="form-control" name="txtName[]" id="txtName" /></td>
                                                                                    <td><input type="date" class="form-control" name="txtBirthday[]" id="txtBirthday" /></td>
                                                                                    <td><input type='button' class='btn btn-danger' value='Remove' onclick='remove_row(this)'>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-12">
                                                                            <button type="button" class="btn btn-info float-right" onclick="AddDependant()" value="Add" >Add</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div> 
                                                    </div>
                                                </div>

                                                <div class="card">
                                                    <div class="card-body shadow-lg rounded">
                                                        <h5 class="card-title">Scholastic Records</h5>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="table-responsive">
                                                                    <table id="exampleschool" class="font-weight-bold text-center display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>School Name</th>
                                                                                <th>Address</th>
                                                                                <th>Degree</th>
                                                                                <th>Year Graduated</th>
                                                                                <th>Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                             <tr>
                                                                                <td><input type="text" class="form-control" id="txtSchoolName" name="txtSchoolName[]"/></td>
                                                                                <td><input type="text" class="form-control" id="txtSchoolAddress" name="txtSchoolAddress[]"/></td>
                                                                                <td>
                                                                                    <select class="form-control" id="txtDegree" name="txtDegree[]">
                                                                                        <option>Primary</option>
                                                                                        <option>Secondary</option>
                                                                                        <option>Associate's degree</option>
                                                                                        <option>Bachelor's degree</option>
                                                                                        <option>Master's degree</option>
                                                                                        <option>Doctoral degree</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td><input type="text" class="form-control" id="txtYearGraduated" name="txtYearGraduated[]"/></td>
                                                                                <td><input type='button' class='btn btn-danger' value='Remove' onclick='remove_row(this)'></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <button type="button" class="btn btn-info float-right" onclick="AddSchool()" value="AddSchool" >Add</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="card">
                                                    <div class="card-body shadow-lg rounded">
                                                        <h5 class="card-title">Medical Records (Leave as Empty if No Medical Records)</h5>
                                                        <div class="form-row mt-1">
                                                            <div class="col-md-12">
                                                            <label>Do you have any present or past medical history which will present special consideration as to job assignments? If so, indicate the condition...</label>
                                                            <input type="text" class="form-control" id="txtmed1">
                                                            </div>
                                                        </div>
                                                        <div class="form-row mt-1">
                                                            <div class="col-md-12">
                                                            <label>Have you had any illnesses, hospitalization, or accidents in the past two years? If yes, please explain…..</label>
                                                            <input type="text" class="form-control" id="txtmed2">
                                                            </div>
                                                        </div>
                                                        <div class="form-row mt-1">
                                                            <div class="col-md-12">
                                                            <label>Check any of this conditions you have or have had:</label>
                                                            <div class="form-group clearfix">
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="checkbox" name="s6[]" value="s1"><label>&nbsp;Allergic Disorders (Asthma, Hay Fever, Hives or A Like)</label>
                                                                </div>
                                                                <br>
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="checkbox" name="s6[]" value="s2"><label>&nbsp;Musculoskeletal (Fractured Bone, Disc or Joint)</label>
                                                                </div>
                                                                <br>
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="checkbox" name="s6[]" value="s3"><label>&nbsp;Cardiovascular Conditions (Elevated Blood Pressure, Anemia, Heart Abnormalities)</label>
                                                                </div>
                                                                <br>
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="checkbox" name="s6[]" value="s4"><label>&nbsp;Vision Problems (Glasses, Defects, or Disease)</label>
                                                                </div>
                                                                <br>
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="checkbox" name="s6[]" value="s5"><label>&nbsp;Gastrointestinal Problems (Ulcers, Liver, Bowel Prob)</label>
                                                                </div>
                                                                <br>
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="checkbox" name="s6[]" value="Wala Sa Nabangit"><label>&nbsp;Wala Sa Nabangit</label>
                                                                </div>
											                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card">
                                                    <div class="card-body shadow-lg rounded">
                                                        <h5 class="card-title">Work Experience</h5>
                                                        <div class="form-row mt-1">
                                                            <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="table-responsive">
                                                                        <table id="examplework" class="font-weight-bold text-center display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Name and Address of Employer</th>
                                                                                    <th colspan="2">Date Range</th>
                                                                                    <th>Nature of your work</th>
                                                                                    <th colspan="2">Monthly Salary Before & After</th>
                                                                                    <th>Reason for Leaving</th>
                                                                                    <th>Action</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td><input type="text" class="form-control" id="txtWorkName" name="txtWorkName[]"></td>
                                                                                    <td><input type="date" id="txtWorkDatefrom" name="txtWorkDatefrom[]"></td><td><input type="date" id="txtWorkDateto" name="txtWorkDateto[]"></td>
                                                                                    <td><input type="text" class="form-control" id="txtNatureWork" name="txtNatureWork[]"></td>
                                                                                    <td><input type="text" class="form-control" id="txtSalary1" name="txtSalary1[]"></td>
                                                                                    <td><input type="text" class="form-control" id="txtSalary2" name="txtSalary2[]"></td>
                                                                                    <td><input type="text" class="form-control" id="txtReason" id="txtReason[]"></td>
                                                                                    <td><input type='button' class='btn btn-danger' value='Remove' onclick='remove_row(this)'></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-row mt-2">
                                                                <div class="form-group col-md-12">
                                                                    <button type="button" class="btn btn-info float-right" onclick="AddWork()" value="AddWork" >Add</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="card mt-3">
                                                    <div class="card-body shadow-lg rounded">
                                                        <h5 class="card-title">General Information</h5>
                                                            <div class="form-row mt-1">
                                                                <div class="col-md-4">
                                                                    <label>Approximate monthly minimum salary desired</label>
                                                                    <input type="text" class="form-control" id="txtmed1">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Have you employed in Manufacturing firm Before?</label>
                                                                    <input type="text" class="form-control" id="txtmed1">
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label>Where?</label>
                                                                    <input type="text" class="form-control" id="txtmed1">
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label>When?</label>
                                                                    <input type="text" class="form-control" id="txtmed1">
                                                                </div>
                                                            </div>
                                                        <div class="form-row mt-1">
                                                            <div class="col-md-4">
                                                                <label>Kinds and grades of government examination taken</label>
                                                                <input type="text" class="form-control" id="txtmed2">
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label>Can you drive?</label>
                                                                <input type="text" class="form-control" id="txtmed2">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label>Indicate channel of application</label>
                                                                <select id="dchoices" name="dchoices" class="form-control">
                                                                    <option value="d1">College placement office</option>
                                                                    <option value="d2">Walk-in</option>
                                                                    <option value="d3">Letter</option>
                                                                    <option value="d4">Employment Agency (specify)</option>
                                                                    <option value="d5">Advertisement (specify)</option>
                                                                    <option value="d6">Referred By (name)</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-3" id="txtspecify" style="display: none;">
                                                                <label>Specify/Name</label>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                 <div class="card">
                                                    <div class="card-body shadow-lg rounded">
                                                        <h4 class="font-weight-bold">WARRANTY AND WAIVER: I certify that the above information is true and correct, and hereby authorized the 
                                                        company to verify said given information. If hired, I further agree to undergo the pre-employment and periodic 
                                                        examinations required by the company and authorized the company to use the results in matters related to my 
                                                        employment.</h4>
                                                        <div class="input-group mt-3">
                                                            <div class="col-md-10">
                                                                <div class="icheck-primary">
                                                                    <input type="checkbox" id="agreeTerms" name="terms" value="agree" required="" style="width: 20px; height: 20px;">
                                                                    <label style="font-size: 1.125rem;">
                                                                        &nbsp;I agree to the <label style="color: blue;">WARRANTY AND WAIVER.</label>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <button type="submit" name="btnsignup" class="btn btn-primary float-right">Submit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                 </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
                <!-- Add Personal Details Modal  -->
                <div class="modal fade" id="personaldetailsModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl2 modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Personal Details</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                        
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </div>
                </div>
                <!-- Add Education Details Modal  -->
                <div class="modal fade" id="EducationdetailsModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl2 modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Educational Details</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                               
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                          </div>
                        </div>
                </div>
                <!-- Add Job Details Modal  -->
                <div class="modal fade" id="jobdetailsModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl2 modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Personal Details</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                           
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </div>
                </div>
                <!-- Add Allowance/Recruitment Details Modal  -->
                <div class="modal fade" id="allowancedetailsModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl2 modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Allowance and Agency Details</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                           
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
  <script>
        $(document).ready(function () {
            toggleFields();
            $("#dchoices").change(function () {
                toggleFields();
            });
        });
        function toggleFields() {
            if ($("#dchoices").val() === "d4")
                $("#txtspecify").show();
            else if ($("#dchoices").val() === "d5")
                $("#txtspecify").show();
            else if ($("#dchoices").val() === "d6")
                $("#txtspecify").show();
            else
                $("#txtspecify").hide();
        }
        $(function () {
            var customers = new Array();
            for (var i = 0; i < customers.length; i++) {
                AddRow(customers[i][0], customers[i][1]);
            }
        });   
        function AddDependant(){
            var tr=document.createElement("tr");
            tr.innerHTML="<td><input type='text' class='form-control' name='txtName[]' id='txtName' /></td><td><input type='date' class='form-control' name='txtBirthday[]' id='txtBirthday' /></td><td><input type='button' class='btn btn-danger' value='Remove' onclick='remove_row(this)'></td>";
            document.getElementById("example23").appendChild(tr);
        }
        function remove_row(e){
            var n=document.querySelector("#example23").querySelectorAll("tr").length;
            if(n>1&&confirm("Are You Sure You Want To Delete?")==true)
            {
                var ele=e.parentNode.parentNode;
                ele.remove();
            }
        }

        function AddSchool(){
            var tr=document.createElement("tr");
            tr.innerHTML="<td><input type='text' class='form-control' id='txtSchoolName' name='txtSchoolName[]'/></td><td><input type='text' class='form-control' id='txtSchoolAddress' name='txtSchoolAddress[]'/></td> <td><select class='form-control' id='txtDegree' name='txtDegree[]'> <option>Primary</option><option>Secondary</option><option>Associate's degree</option><option>Bachelor's degree</option><option>Master's degree</option><option>Doctoral degree</option></select></td><td><input type='text' class='form-control' id='txtYearGraduated' name='txtYearGraduated[]'/></td><td><input type='button' class='btn btn-danger' value='Remove' onclick='remove_School(this)'></td>";
            document.getElementById("exampleschool").appendChild(tr);
        }
        function remove_School(e){
            var n=document.querySelector("#exampleschool").querySelectorAll("tr").length;
            if(n>1&&confirm("Are You Sure You Want To Delete?")==true)
            {
                var ele=e.parentNode.parentNode;
                ele.remove();
            }
        }

        function AddWork(){
            var tr=document.createElement("tr");
            tr.innerHTML="<td><input type='text' class='form-control' id='txtWorkName' name='txtWorkName[]'></td><td><input type='date' id='txtWorkDatefrom' name='txtWorkDatefrom[]'></td><td><input type='date' id='txtWorkDateto' name='txtWorkDateto[]'></td><td><input type='text' class='form-control' id='txtNatureWork' name='txtNatureWork[]'></td><td><input type='text' class='form-control' id='txtSalary1' name='txtSalary1[]'></td><td><input type='text' class='form-control' id='txtSalary2' name='txtSalary2[]'></td><td><input type='text' class='form-control' id='txtReason' id='txtReason[]'></td><td><input type='button' class='btn btn-danger' value='Remove' onclick='remove_Work(this)'></td>";
            document.getElementById("examplework").appendChild(tr);
        }
        function remove_Work(e){
            var n=document.querySelector("#examplework").querySelectorAll("tr").length;
            if(n>1&&confirm("Are You Sure You Want To Delete?")==true)
            {
                var ele=e.parentNode.parentNode;
                ele.remove();
            }
        }

        function generateUUID() {
			var d = new Date().getTime();
			var uuid = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function (c) {
				var r = (d + Math.random() * 16) % 16 | 0;
				d = Math.floor(d / 16);
				return (c == 'x' ? r : (r & 0x3 | 0x8)).toString(16);
			});
			return uuid;
		};
		document.getElementById('uuid').value = generateUUID();
	</script>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
