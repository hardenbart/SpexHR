<?php
session_start();
include('includes/header.php'); 
include('includes/navbar.php');
?>
<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Dashboard</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <!-- column -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Total Employee</h5>
                                <div class="d-flex m-t-30 m-b-20 no-block align-items-center">
                                    <span class="display-5 text-info"><i class="icon-people"></i></span>
                                    <a href="javscript:void(0)" class="link display-5 ml-auto">23</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- column -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Leave Request</h5>
                                <div class="d-flex m-t-30 m-b-20 no-block align-items-center">
                                    <span class="display-5 text-purple"><i class="icon-folder-alt"></i></span>
                                    <a href="javscript:void(0)" class="link display-5 ml-auto">169</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- column -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Total Present Today</h5>
                                <div class="d-flex m-t-30 m-b-20 no-block align-items-center">
                                    <span class="display-5 text-success"><i class="icon-user"></i></span>
                                    <a href="javscript:void(0)" class="link display-5 ml-auto">311</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- column -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Total Absent Today</h5>
                                <div class="d-flex m-t-30 m-b-20 no-block align-items-center">
                                    <span class="display-5 text-primary"><i class="icon-user"></i></span>
                                    <a href="javscript:void(0)" class="link display-5 ml-auto">117</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- column -->
                </div>
            </div>
            <div class="col-lg-6">
                <div class="news-slide m-b-15">
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                        <!-- Carousel items -->
                        <div class="carousel-inner">
                            <div class="active carousel-item">
                                <div class="overlaybg"><img src="../assets/images/news/Mission.png" class="img-fluid" />
                                </div>
                                <div class="news-content carousel-caption"><span
                                        class="label label-info label-rounded">Mission</span>
                                    <h4>To enable people and businesses throughout the world to realize their
                                        full potential.</h4> <a href="javascript:void(0)">Read More</a>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="overlaybg"><img src="../assets/images/news/Vission.png" /></div>
                                <div class="news-content carousel-caption"><span
                                        class="label label-primary label-rounded">Vission</span>
                                    <h4>To provide ubiquitous, secure, and seamless access to information
                                        resources in all forms through a reliable and robust infrastructure.
                                    </h4> <a href="javascript:void(0)">Read More</a>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="overlaybg"><img src="../assets/images/news/CompanyProfile.png" />
                                </div>
                                <div class="news-content carousel-caption"><span
                                        class="label label-success label-rounded">Company Profile</span>
                                    <h4>Sample Company is a leading, highly innovative software house, systems
                                        integrator and technology provider, established to provide leading edge
                                        intelligent technical solutions.</h4> <a href="javascript:void(0)">Read
                                        More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Column -->
            <div class="col-lg-8 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex m-b-10 align-items-center no-block">
                            <h5 class="card-title ">Today Attendance's</h5>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table id="example23"
                                        class="font-weight-bold text-center display nowrap table table-hover table-striped table-bordered"
                                        cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Department</th>
                                                <th>Time In</th>
                                                <th>Time Out</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td>HR Department</td>
                                                <td>8:00 AM</td>
                                                <td>-</td>
                                                <td class="text-success">Present</td>
                                            </tr>
                                            <tr>
                                                <td>Garrett Winters</td>
                                                <td>IT Department</td>
                                                <td>8:01 AM</td>
                                                <td>-</td>
                                                <td class="text-success">Present</td>
                                            </tr>
                                            <tr>
                                                <td>Ashton Cox</td>
                                                <td>IT Department</td>
                                                <td>8:02 AM</td>
                                                <td>-</td>
                                                <td class="text-success">Present</td>
                                            </tr>
                                            <tr>
                                                <td>Cedric Kelly</td>
                                                <td>HR Department</td>
                                                <td>8:08 AM</td>
                                                <td>-</td>
                                                <td class="text-success">Present</td>
                                            </tr>
                                            <tr>
                                                <td>Airi Satou</td>
                                                <td>IT Department</td>
                                                <td>8:30 AM</td>
                                                <td>-</td>
                                                <td class="text-success">Present</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Column -->
            <div class="col-lg-4 col-md-12">
                <div class="row">
                    <!-- Column -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Current Events</h5>
                            </div>
                            <ul class="feeds">
                                <li>
                                    <div class="bg-success">
                                        <i class="ti-user"></i>
                                    </div>
                                    <span class="text-muted">&nbsp;&nbsp;July 04, 2021</span>&nbsp;&nbsp; Garrett
                                    Winters's Birthday.
                                </li>
                                <li>
                                    <div class="bg-warning">
                                        <i class="ti-user"></i>
                                    </div>
                                    <span class="text-muted">&nbsp;&nbsp; July 14, 2021</span>&nbsp;&nbsp; Tiger Nixon's
                                    Birthday.
                                </li>
                                <li>
                                    <div class="bg-danger">
                                        <i class="ti-files"></i>
                                    </div>
                                    <span class="text-muted">&nbsp;&nbsp;July 20, 2021</span>&nbsp;&nbsp; Eid al-Adha.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>