<?php require('Function.php'); 
$conn = mysqli_connect("localhost","root","","demo_db");
$op = "";
$id = "";
global $conn;
if (isset($_GET['op']))
    $op = $_GET['op'];

// if (isset($_GET['id']))
    $id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{margin-top:20px;}


/* USER LIST TABLE */
.user-list tbody td > img {
    position: relative;
	max-width: 50px;
	float: left;
	margin-right: 15px;
}
.user-list tbody td .user-link {
	display: block;
	font-size: 1.25em;
	padding-top: 3px;
	margin-left: 60px;
}
.user-list tbody td .user-subhead {
	font-size: 0.875em;
	font-style: italic;
}

/* TABLES */
.table {
    border-collapse: separate;
}
.table-hover > tbody > tr:hover > td,
.table-hover > tbody > tr:hover > th {
	background-color: #eee;
}
.table thead > tr > th {
	border-bottom: 1px solid #C2C2C2;
	padding-bottom: 0;
}
.table tbody > tr > td {
	font-size: 0.875em;
	background: #f5f5f5;
	border-top: 10px solid #fff;
	vertical-align: middle;
	padding: 12px 8px;
}
.table tbody > tr > td:first-child,
.table thead > tr > th:first-child {
	padding-left: 20px;
}
.table thead > tr > th span {
	border-bottom: 2px solid #C2C2C2;
	display: inline-block;
	padding: 0 5px;
	padding-bottom: 5px;
	font-weight: normal;
}
.table thead > tr > th > a span {
	color: #344644;
}
.table thead > tr > th > a span:after {
	content: "\f0dc";
	font-family: FontAwesome;
	font-style: normal;
	font-weight: normal;
	text-decoration: inherit;
	margin-left: 5px;
	font-size: 0.75em;
}
.table thead > tr > th > a.asc span:after {
	content: "\f0dd";
}
.table thead > tr > th > a.desc span:after {
	content: "\f0de";
}
.table thead > tr > th > a:hover span {
	text-decoration: none;
	color: #2bb6a3;
	border-color: #2bb6a3;
}
.table.table-hover tbody > tr > td {
	-webkit-transition: background-color 0.15s ease-in-out 0s;
	transition: background-color 0.15s ease-in-out 0s;
}
.table tbody tr td .call-type {
	display: block;
	font-size: 0.75em;
	text-align: center;
}
.table tbody tr td .first-line {
	line-height: 1.5;
	font-weight: 400;
	font-size: 1.125em;
}
.table tbody tr td .first-line span {
	font-size: 0.875em;
	color: #969696;
	font-weight: 300;
}
.table tbody tr td .second-line {
	font-size: 0.875em;
	line-height: 1.2;
}
.table a.table-link {
	margin: 0 5px;
	font-size: 1.125em;
}
.table a.table-link:hover {
	text-decoration: none;
	color: #2aa493;
}
.table a.table-link.danger {
	color: #fe635f;
}
.table a.table-link.danger:hover {
	color: #dd504c;
}

.table-products tbody > tr > td {
	background: none;
	border: none;
	border-bottom: 1px solid #ebebeb;
	-webkit-transition: background-color 0.15s ease-in-out 0s;
	transition: background-color 0.15s ease-in-out 0s;
	position: relative;
}
.table-products tbody > tr:hover > td {
	text-decoration: none;
	background-color: #f6f6f6;
}
.table-products .name {
	display: block;
	font-weight: 600;
	padding-bottom: 7px;
}
.table-products .price {
	display: block;
	text-decoration: none;
	width: 50%;
	float: left;
	font-size: 0.875em;
}
.table-products .price > i {
	color: #8dc859;
}
.table-products .warranty {
	display: block;
	text-decoration: none;
	width: 50%;
	float: left;
	font-size: 0.875em;
}
.table-products .warranty > i {
	color: #f1c40f;
}
.table tbody > tr.table-line-fb > td {
	background-color: #9daccb;
	color: #262525;
}
.table tbody > tr.table-line-twitter > td {
	background-color: #9fccff;
	color: #262525;
}
.table tbody > tr.table-line-plus > td {
	background-color: #eea59c;
	color: #262525;
}
.table-stats .status-social-icon {
	font-size: 1.9em;
	vertical-align: bottom;
}
.table-stats .table-line-fb .status-social-icon {
	color: #556484;
}
.table-stats .table-line-twitter .status-social-icon {
	color: #5885b8;
}
.table-stats .table-line-plus .status-social-icon {
	color: #a75d54;
}

    </style>
    <style>
        body{
    margin-top:20px;
}
.bg-light-gray {
    background-color: #f7f7f7;
}
.table-bordered thead td, .table-bordered thead th {
    border-bottom-width: 2px;
}
.table thead th {
    vertical-align: bottom;
    border-bottom: 2px solid #dee2e6;
}
.table-bordered td, .table-bordered th {
    border: 1px solid #dee2e6;
}


.bg-sky.box-shadow {
    box-shadow: 0px 5px 0px 0px #00a2a7
}

.bg-orange.box-shadow {
    box-shadow: 0px 5px 0px 0px #af4305
}

.bg-green.box-shadow {
    box-shadow: 0px 5px 0px 0px #4ca520
}

.bg-yellow.box-shadow {
    box-shadow: 0px 5px 0px 0px #dcbf02
}

.bg-pink.box-shadow {
    box-shadow: 0px 5px 0px 0px #e82d8b
}

.bg-purple.box-shadow {
    box-shadow: 0px 5px 0px 0px #8343e8
}

.bg-lightred.box-shadow {
    box-shadow: 0px 5px 0px 0px #d84213
}


.bg-sky {
    background-color: #02c2c7
}

.bg-orange {
    background-color: #e95601
}

.bg-green {
    background-color: #5bbd2a
}

.bg-yellow {
    background-color: #f0d001
}

.bg-pink {
    background-color: #ff48a4
}

.bg-purple {
    background-color: #9d60ff
}

.bg-lightred {
    background-color: #ff5722
}

.padding-15px-lr {
    padding-left: 15px;
    padding-right: 15px;
}
.padding-5px-tb {
    padding-top: 5px;
    padding-bottom: 5px;
}
.margin-10px-bottom {
    margin-bottom: 10px;
}
.border-radius-5 {
    border-radius: 5px;
}

.margin-10px-top {
    margin-top: 10px;
}
.font-size14 {
    font-size: 14px;
}

.text-light-gray {
    color: #d6d5d5;
}
.font-size13 {
    font-size: 13px;
}

.table-bordered td, .table-bordered th {
    border: 1px solid #dee2e6;
}
.table td, .table th {
    padding: .75rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
}
    </style>

</head>
<body>
<main id="main" class="main">
       
        <section class="section">
            <div class="row">
                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Schedule</h5>

                            <div class="row g-2">
                            <div class="col-3">
                                <label class="form-label">Program</label>
                                <select id="program" name="academicpro" class="form-select">
                                    <option value="">Select One</option>
                                    <?php getProgram(); ?>
                                </select>
                            </div>
                            
                            <div class="col-2">
                                <a id="searchBtn" style="margin-top: 30px;" href="#" class="btn btn-primary">Search</a>
                            </div>
                        </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
<script>
    document.getElementById('searchBtn').addEventListener('click', function(event) {
        event.preventDefault(); 

        // Get the selected values
        var program = document.getElementById('program').value;
        
        // Construct the URL with the selected values
        var url = '?tag=schedule&op=search';
        url += '&program=' + encodeURIComponent(program);
        
        window.location.href = url;
    });
</script>
</html>

<?php
if (isset($_GET['op']) && $_GET['op'] == 'search' && isset($_GET['tag']) && $_GET['tag'] == 'schedule') {
    $program = "";
    if (isset($_SESSION['id']))
    $id = $_SESSION['id'];

    if (isset($_GET['program']))
        $program = $_GET['program'];
    
        $shiftCheckSql = "SELECT shift_tbl.shiftEN FROM program_tbl
        INNER JOIN shift_tbl ON program_tbl.ShiftID = shift_tbl.ShiftID
        WHERE program_tbl.ProgramID = $program AND shift_tbl.shiftEN = 'Morning'";
$shiftCheckResult = $conn->query($shiftCheckSql);

if ($shiftCheckResult->num_rows > 0) {
?>
    <main id="main" class="main">
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- <h5 class="card-title">Schedule</h5> -->
                            <?php

                   

// Query to get the schedule
$sql = "SELECT * FROM `schedule_tbl` 
INNER JOIN subject_tbl ON schedule_tbl.SubjectID = subject_tbl.SubjectID
INNER JOIN time_tbl ON schedule_tbl.TimeID = time_tbl.TimeID
INNER JOIN lecturer_tbl ON schedule_tbl.LecturerID = lecturer_tbl.LecturerID 
INNER JOIN dayweek_tbl ON schedule_tbl.DayWeekID = dayweek_tbl.DayWeekID 
INNER JOIN room_tbl ON schedule_tbl.RoomID = room_tbl.RoomID
INNER JOIN campus_tbl ON room_tbl.CampusID = campus_tbl.CampusID
WHERE ProgramID = $program AND DayWeekName ='Monday' AND schedule_tbl.LecturerID = $id ";
$rs1 = $conn->query($sql);

// Check if there are any results for the schedule query
if ($rs1 && $rs1->num_rows > 0) {
    $rows = mysqli_fetch_assoc($rs1);
    $room = $rows['RoomName'];
} else {
    $room = null; // Set room to null if no results
}

// Query to get the program details
$sql_Pro = "SELECT * FROM program_tbl 
INNER JOIN faculty_tbl ON program_tbl.FacultyID = faculty_tbl.FacultyID
INNER JOIN major_tbl ON program_tbl.MajorID = major_tbl.MajorID
INNER JOIN year_tbl ON program_tbl.YearID = year_tbl.YearID
INNER JOIN semester_tbl ON program_tbl.SemesterID = semester_tbl.SemesterID
INNER JOIN academicyear_tbl ON program_tbl.AcademicYearID = academicyear_tbl.AcademicYearID
INNER JOIN batch_tbl ON program_tbl.BatchID = batch_tbl.BatchID
INNER JOIN campus_tbl ON program_tbl.CampusID = campus_tbl.CampusID
INNER JOIN degree_tbl ON program_tbl.DegreeID = degree_tbl.DegreeID
INNER JOIN shift_tbl ON program_tbl.ShiftID = shift_tbl.ShiftID 
WHERE ProgramID='$program'";
$rs = $conn->query($sql_Pro);

// Check if there are any results for the program query
if ($rs && $rs->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($rs)) {
        ?>
        <div class="row d-flex justify-content-center">
            <div class="col-4">
                <h6>Faculty: <?php echo $row['FacultyEN'] ?></h6>
                <h6>Major: <?php echo $row['MajorEN'] ?></h6>
                <h6>Batch: <?php echo $row['BatchEN'] ?></h6>
            </div>
            <div class="col-4 text-center">
                <h4>Academic Year: <?php echo $row['AcademicYear'] ?></h4>
            </div>
            <div class="col-4" style="text-align: end;">
                <h6>Year: <?php echo $row['YearEN'] ?></h6>
                <h6>Semester: <?php echo $row['SemesterEN'] ?></h6>
                <h6>Shift: <?php echo $row['ShiftEN'] ?></h6>
                <?php if ($room) { ?>
                    <h6>Room: <?php echo $room ?></h6>
                <?php } ?>
            </div>
        </div>
        <?php
    }
}
?>

                            <!-- Schedule -->
                            <div class="container">
                                <div class="timetable-img text-center">
                                    <img src="img/content/timetable.png" alt="">
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered text-center">
                                        <thead>
                                            <tr class="bg-light-gray">
                                                <th class="text-uppercase">Time</th>
                                                <th class="text-uppercase">Monday</th>
                                                <th class="text-uppercase">Tuesday</th>
                                                <th class="text-uppercase">Wednesday</th>
                                                <th class="text-uppercase">Thursday</th>
                                                <th class="text-uppercase">Friday</th>
                                                <th class="text-uppercase">Saturday</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="align-middle">8:00->9:30(AM)</td>
                                                <td>
                                                <?php
                                                $sql = "SELECT * FROM `schedule_tbl` 
                                                INNER JOIN subject_tbl ON schedule_tbl.SubjectID = subject_tbl.SubjectID
                                                INNER JOIN time_tbl ON schedule_tbl.TimeID = time_tbl.TimeID
                                                INNER JOIN lecturer_tbl ON schedule_tbl.LecturerID = lecturer_tbl.LecturerID 
                                                INNER JOIN dayweek_tbl ON schedule_tbl.DayWeekID = dayweek_tbl.DayWeekID 
                                                INNER JOIN room_tbl ON schedule_tbl.RoomID = room_tbl.RoomID
                                                INNER JOIN campus_tbl ON room_tbl.CampusID = campus_tbl.CampusID
                                                WHERE ProgramID = $program AND DayWeekName ='Monday' AND schedule_tbl.LecturerID = $id ";
                                                $rs=$conn->query($sql);
                                                while($rw = mysqli_fetch_assoc($rs)){
                                            ?>
                                                    <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13" style="color: black;" ><?php echo $rw['SubjectEN'] ?></span>
                                                    <div class="margin-10px-top font-size14"><?php echo $rw['RoomName'] ?>/<?php echo $rw['CampusEN'] ?></div>
                                                    <div class="font-size13 text-light-gray"><?php echo $rw['LecturerName'] ?></div>
                                                <?php } ?>
                                                </td>
                                                <td>
                                                <?php
                                                $sql = "SELECT * FROM `schedule_tbl` 
                                                INNER JOIN subject_tbl ON schedule_tbl.SubjectID = subject_tbl.SubjectID
                                                INNER JOIN time_tbl ON schedule_tbl.TimeID = time_tbl.TimeID
                                                INNER JOIN lecturer_tbl ON schedule_tbl.LecturerID = lecturer_tbl.LecturerID 
                                                INNER JOIN dayweek_tbl ON schedule_tbl.DayWeekID = dayweek_tbl.DayWeekID 
                                                INNER JOIN room_tbl ON schedule_tbl.RoomID = room_tbl.RoomID
                                                INNER JOIN campus_tbl ON room_tbl.CampusID = campus_tbl.CampusID
                                                WHERE ProgramID = $program AND DayWeekName ='Tuesday' AND schedule_tbl.LecturerID = $id ";
                                                $rs=$conn->query($sql);
                                                while($rw = mysqli_fetch_assoc($rs)){
                                            ?>
                                                     <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"><?php echo $rw['SubjectEN'] ?></span>
                                                    <div class="margin-10px-top font-size14"><?php echo $rw['RoomName'] ?>/<?php echo $rw['CampusEN'] ?></div>
                                                    <div class="font-size13 text-light-gray"><?php echo $rw['LecturerName'] ?></div>
                                                <?php } ?>
                                                </td>
                                                <td>
                                                <?php
                                                $sql = "SELECT * FROM `schedule_tbl` 
                                                INNER JOIN subject_tbl ON schedule_tbl.SubjectID = subject_tbl.SubjectID
                                                INNER JOIN time_tbl ON schedule_tbl.TimeID = time_tbl.TimeID
                                                INNER JOIN lecturer_tbl ON schedule_tbl.LecturerID = lecturer_tbl.LecturerID 
                                                INNER JOIN dayweek_tbl ON schedule_tbl.DayWeekID = dayweek_tbl.DayWeekID 
                                                INNER JOIN room_tbl ON schedule_tbl.RoomID = room_tbl.RoomID
                                                INNER JOIN campus_tbl ON room_tbl.CampusID = campus_tbl.CampusID
                                                WHERE ProgramID = $program AND DayWeekName ='Wednesday' AND schedule_tbl.LecturerID = $id ";
                                                $rs=$conn->query($sql);
                                                while($rw = mysqli_fetch_assoc($rs)){
                                            ?>
                                                     <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13" style="color: black;" ><?php echo $rw['SubjectEN'] ?></span>
                                                    <div class="margin-10px-top font-size14"><?php echo $rw['RoomName'] ?>/<?php echo $rw['CampusEN'] ?></div>
                                                    <div class="font-size13 text-light-gray"><?php echo $rw['LecturerName'] ?></div>
                                                <?php } ?>
                                                </td>
                                                <td>
                                                <?php
                                                $sql = "SELECT * FROM `schedule_tbl` 
                                                INNER JOIN subject_tbl ON schedule_tbl.SubjectID = subject_tbl.SubjectID
                                                INNER JOIN time_tbl ON schedule_tbl.TimeID = time_tbl.TimeID
                                                INNER JOIN lecturer_tbl ON schedule_tbl.LecturerID = lecturer_tbl.LecturerID 
                                                INNER JOIN dayweek_tbl ON schedule_tbl.DayWeekID = dayweek_tbl.DayWeekID 
                                                INNER JOIN room_tbl ON schedule_tbl.RoomID = room_tbl.RoomID
                                                INNER JOIN campus_tbl ON room_tbl.CampusID = campus_tbl.CampusID
                                                WHERE ProgramID = $program AND DayWeekName ='Thursday' AND schedule_tbl.LecturerID = $id ";
                                                $rs=$conn->query($sql);
                                                while($rw = mysqli_fetch_assoc($rs)){
                                            ?>
                                                    <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13" style="color: black;" ><?php echo $rw['SubjectEN'] ?></span>
                                                    <div class="margin-10px-top font-size14"><?php echo $rw['RoomName'] ?>/<?php echo $rw['CampusEN'] ?></div>
                                                    <div class="font-size13 text-light-gray"><?php echo $rw['LecturerName'] ?></div>
                                                <?php } ?>
                                                </td>
                                                <td>
                                                <?php
                                                $sql = "SELECT * FROM `schedule_tbl` 
                                                INNER JOIN subject_tbl ON schedule_tbl.SubjectID = subject_tbl.SubjectID
                                                INNER JOIN time_tbl ON schedule_tbl.TimeID = time_tbl.TimeID
                                                INNER JOIN lecturer_tbl ON schedule_tbl.LecturerID = lecturer_tbl.LecturerID 
                                                INNER JOIN dayweek_tbl ON schedule_tbl.DayWeekID = dayweek_tbl.DayWeekID 
                                                INNER JOIN room_tbl ON schedule_tbl.RoomID = room_tbl.RoomID
                                                INNER JOIN campus_tbl ON room_tbl.CampusID = campus_tbl.CampusID
                                                WHERE schedule_tbl.ProgramID = $program AND DayWeekName ='Friday' AND schedule_tbl.LecturerID = $id ";
                                                $rs=$conn->query($sql);
                                                while($rw = mysqli_fetch_assoc($rs)){
                                            ?>
                                                     <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13" style="color: black;" ><?php echo $rw['SubjectEN'] ?></span>
                                                    <div class="margin-10px-top font-size14"><?php echo $rw['RoomName'] ?>/<?php echo $rw['CampusEN'] ?></div>
                                                    <div class="font-size13 text-light-gray"><?php echo $rw['LecturerName'] ?></div>
                                                <?php } ?>
                                                </td>
                                                <td>
                                                    <!-- <span class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">English</span>
                                                    <div class="margin-10px-top font-size14">9:00-10:00</div>
                                                    <div class="font-size13 text-light-gray">James Smith</div> -->
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle">9:30->9:45(AM)</td>
                                                <td>
                                                    <!-- <span class="bg-yellow padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Music</span> -->
                                                    <div class="margin-10px-top font-size14">BREAK</div>
                                                </td>
                                                <td class="bg-light-gray">
                                                <!-- <span class="bg-yellow padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Music</span> -->
                                                    <div class="margin-10px-top font-size14">BREAK</div>
                                                </td>
                                                <td>
                                                    <!-- <span class="bg-yellow padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Music</span> -->
                                                    <div class="margin-10px-top font-size14">BREAK</div>
                                                </td>
                                                <td>
                                                    <!-- <span class="bg-yellow padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Music</span> -->
                                                    <div class="margin-10px-top font-size14">BREAK</div>
                                                </td>
                                                <td>
                                                    <!-- <span class="bg-yellow padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Music</span> -->
                                                    <div class="margin-10px-top font-size14">BREAK</div>
                                                </td>
                                                <td class="bg-light-gray">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle">9:45->11:15(AM)</td>
                                                <td>
                                                <?php
                                                $sql = "SELECT * FROM `schedule_tbl` 
                                                INNER JOIN subject_tbl ON schedule_tbl.SubjectID = subject_tbl.SubjectID
                                                INNER JOIN time_tbl ON schedule_tbl.TimeID = time_tbl.TimeID
                                                INNER JOIN lecturer_tbl ON schedule_tbl.LecturerID = lecturer_tbl.LecturerID 
                                                INNER JOIN dayweek_tbl ON schedule_tbl.DayWeekID = dayweek_tbl.DayWeekID 
                                                INNER JOIN room_tbl ON schedule_tbl.RoomID = room_tbl.RoomID
                                                INNER JOIN campus_tbl ON room_tbl.CampusID = campus_tbl.CampusID
                                                WHERE ProgramID = $program AND DayWeekName ='Monday' AND schedule_tbl.LecturerID = $id ";
                                                $rs=$conn->query($sql);
                                                while($rw = mysqli_fetch_assoc($rs)){
                                            ?>
                                                     <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13" style="color: black;" ><?php echo $rw['SubjectEN'] ?></span>
                                                    <div class="margin-10px-top font-size14"><?php echo $rw['RoomName'] ?>/<?php echo $rw['CampusEN'] ?></div>
                                                    <div class="font-size13 text-light-gray"><?php echo $rw['LecturerName'] ?></div>
                                                <?php } ?>
                                                </td>
                                                <td>
                                                <?php
                                                $sql = "SELECT * FROM `schedule_tbl` 
                                                INNER JOIN subject_tbl ON schedule_tbl.SubjectID = subject_tbl.SubjectID
                                                INNER JOIN time_tbl ON schedule_tbl.TimeID = time_tbl.TimeID
                                                INNER JOIN lecturer_tbl ON schedule_tbl.LecturerID = lecturer_tbl.LecturerID 
                                                INNER JOIN dayweek_tbl ON schedule_tbl.DayWeekID = dayweek_tbl.DayWeekID 
                                                INNER JOIN room_tbl ON schedule_tbl.RoomID = room_tbl.RoomID
                                                INNER JOIN campus_tbl ON room_tbl.CampusID = campus_tbl.CampusID
                                                WHERE ProgramID = $program AND DayWeekName ='Tuesday' AND schedule_tbl.LecturerID = $id ";
                                                $rs=$conn->query($sql);
                                                while($rw = mysqli_fetch_assoc($rs)){
                                            ?>
                                                     <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13" style="color: black;" ><?php echo $rw['SubjectEN'] ?></span>
                                                    <div class="margin-10px-top font-size14"><?php echo $rw['RoomName'] ?>/<?php echo $rw['CampusEN'] ?></div>
                                                    <div class="font-size13 text-light-gray"><?php echo $rw['LecturerName'] ?></div>
                                                <?php } ?>
                                                </td>
                                                <td>
                                                <?php
                                                $sql = "SELECT * FROM `schedule_tbl` 
                                                INNER JOIN subject_tbl ON schedule_tbl.SubjectID = subject_tbl.SubjectID
                                                INNER JOIN time_tbl ON schedule_tbl.TimeID = time_tbl.TimeID
                                                INNER JOIN lecturer_tbl ON schedule_tbl.LecturerID = lecturer_tbl.LecturerID 
                                                INNER JOIN dayweek_tbl ON schedule_tbl.DayWeekID = dayweek_tbl.DayWeekID 
                                                INNER JOIN room_tbl ON schedule_tbl.RoomID = room_tbl.RoomID
                                                INNER JOIN campus_tbl ON room_tbl.CampusID = campus_tbl.CampusID
                                                WHERE ProgramID = $program AND DayWeekName ='Wednesday' AND schedule_tbl.LecturerID = $id ";
                                                $rs=$conn->query($sql);
                                                while($rw = mysqli_fetch_assoc($rs)){
                                            ?>
                                                     <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13" style="color: black;" ><?php echo $rw['SubjectEN'] ?></span>
                                                    <div class="margin-10px-top font-size14"><?php echo $rw['RoomName'] ?>/<?php echo $rw['CampusEN'] ?></div>
                                                    <div class="font-size13 text-light-gray"><?php echo $rw['LecturerName'] ?></div>
                                                <?php } ?>
                                                </td>
                                                <td>
                                                <?php
                                                $sql = "SELECT * FROM `schedule_tbl` 
                                                INNER JOIN subject_tbl ON schedule_tbl.SubjectID = subject_tbl.SubjectID
                                                INNER JOIN time_tbl ON schedule_tbl.TimeID = time_tbl.TimeID
                                                INNER JOIN lecturer_tbl ON schedule_tbl.LecturerID = lecturer_tbl.LecturerID 
                                                INNER JOIN dayweek_tbl ON schedule_tbl.DayWeekID = dayweek_tbl.DayWeekID 
                                                INNER JOIN room_tbl ON schedule_tbl.RoomID = room_tbl.RoomID
                                                INNER JOIN campus_tbl ON room_tbl.CampusID = campus_tbl.CampusID
                                                WHERE ProgramID = $program AND DayWeekName ='Thursday' AND schedule_tbl.LecturerID = $id ";
                                                $rs=$conn->query($sql);
                                                while($rw = mysqli_fetch_assoc($rs)){
                                            ?>
                                                     <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13" style="color: black;" ><?php echo $rw['SubjectEN'] ?></span>
                                                    <div class="margin-10px-top font-size14"><?php echo $rw['RoomName'] ?>/<?php echo $rw['CampusEN'] ?></div>
                                                    <div class="font-size13 text-light-gray"><?php echo $rw['LecturerName'] ?></div>
                                                <?php } ?>
                                                </td>
                                                <td>
                                                <?php
                                                $sql = "SELECT * FROM `schedule_tbl` 
                                                INNER JOIN subject_tbl ON schedule_tbl.SubjectID = subject_tbl.SubjectID
                                                INNER JOIN time_tbl ON schedule_tbl.TimeID = time_tbl.TimeID
                                                INNER JOIN lecturer_tbl ON schedule_tbl.LecturerID = lecturer_tbl.LecturerID 
                                                INNER JOIN dayweek_tbl ON schedule_tbl.DayWeekID = dayweek_tbl.DayWeekID 
                                                INNER JOIN room_tbl ON schedule_tbl.RoomID = room_tbl.RoomID
                                                INNER JOIN campus_tbl ON room_tbl.CampusID = campus_tbl.CampusID
                                                WHERE ProgramID = $program AND DayWeekName ='Friday' AND schedule_tbl.LecturerID = $id ";
                                                $rs=$conn->query($sql);
                                                while($rw = mysqli_fetch_assoc($rs)){
                                            ?>
                                                     <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13" style="color: black;" ><?php echo $rw['SubjectEN'] ?></span>
                                                    <div class="margin-10px-top font-size14"><?php echo $rw['RoomName'] ?>/<?php echo $rw['CampusEN'] ?></div>
                                                    <div class="font-size13 text-light-gray"><?php echo $rw['LecturerName'] ?></div>
                                                <?php } ?>
                                                </td>
                                                <td>
                                                    <!-- <span class="bg-lightred padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Break</span>
                                                    <div class="margin-10px-top font-size14">11:00-12:00</div> -->
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php
    }
    $shiftCheckSql = "SELECT shift_tbl.shiftEN FROM program_tbl
    INNER JOIN shift_tbl ON program_tbl.ShiftID = shift_tbl.ShiftID
    WHERE program_tbl.ProgramID = $program AND shift_tbl.shiftEN = 'Afternoon'";
$shiftCheckResult = $conn->query($shiftCheckSql);
    if($shiftCheckResult->num_rows > 0) {
?>
    <main id="main" class="main">
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- <h5 class="card-title">Schedule</h5> -->
                            <?php
// Query to get the schedule
$sql = "SELECT * FROM `schedule_tbl` 
INNER JOIN subject_tbl ON schedule_tbl.SubjectID = subject_tbl.SubjectID
INNER JOIN time_tbl ON schedule_tbl.TimeID = time_tbl.TimeID
INNER JOIN lecturer_tbl ON schedule_tbl.LecturerID = lecturer_tbl.LecturerID 
INNER JOIN dayweek_tbl ON schedule_tbl.DayWeekID = dayweek_tbl.DayWeekID 
INNER JOIN room_tbl ON schedule_tbl.RoomID = room_tbl.RoomID
INNER JOIN campus_tbl ON room_tbl.CampusID = campus_tbl.CampusID
WHERE ProgramID = $program AND DayWeekName ='Monday' AND schedule_tbl.LecturerID = $id ";
$rs1 = $conn->query($sql);

// Check if there are any results for the schedule query
if ($rs1 && $rs1->num_rows > 0) {
    $rows = mysqli_fetch_assoc($rs1);
    $room = $rows['RoomName'];
} else {
    $room = null; // Set room to null if no results
}

// Query to get the program details
$sql_Pro = "SELECT * FROM program_tbl 
INNER JOIN faculty_tbl ON program_tbl.FacultyID = faculty_tbl.FacultyID
INNER JOIN major_tbl ON program_tbl.MajorID = major_tbl.MajorID
INNER JOIN year_tbl ON program_tbl.YearID = year_tbl.YearID
INNER JOIN semester_tbl ON program_tbl.SemesterID = semester_tbl.SemesterID
INNER JOIN academicyear_tbl ON program_tbl.AcademicYearID = academicyear_tbl.AcademicYearID
INNER JOIN batch_tbl ON program_tbl.BatchID = batch_tbl.BatchID
INNER JOIN campus_tbl ON program_tbl.CampusID = campus_tbl.CampusID
INNER JOIN degree_tbl ON program_tbl.DegreeID = degree_tbl.DegreeID
INNER JOIN shift_tbl ON program_tbl.ShiftID = shift_tbl.ShiftID 
WHERE ProgramID='$program'";
$rs = $conn->query($sql_Pro);

// Check if there are any results for the program query
if ($rs && $rs->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($rs)) {
        ?>
        <div class="row d-flex justify-content-center">
            <div class="col-4">
                <h6>Faculty: <?php echo $row['FacultyEN'] ?></h6>
                <h6>Major: <?php echo $row['MajorEN'] ?></h6>
                <h6>Batch: <?php echo $row['BatchEN'] ?></h6>
            </div>
            <div class="col-4 text-center">
                <h4>Academic Year: <?php echo $row['AcademicYear'] ?></h4>
            </div>
            <div class="col-4" style="text-align: end;">
                <h6>Year: <?php echo $row['YearEN'] ?></h6>
                <h6>Semester: <?php echo $row['SemesterEN'] ?></h6>
                <h6>Shift: <?php echo $row['ShiftEN'] ?></h6>
                <?php if ($room) { ?>
                    <h6>Room: <?php echo $room ?></h6>
                <?php } ?>
            </div>
        </div>
        <?php
    }
}
?>

                            <!-- Schedule -->
                            <div class="container">
                                <div class="timetable-img text-center">
                                    <img src="img/content/timetable.png" alt="">
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered text-center">
                                        <thead>
                                            <tr class="bg-light-gray">
                                                <th class="text-uppercase">Time</th>
                                                <th class="text-uppercase">Monday</th>
                                                <th class="text-uppercase">Tuesday</th>
                                                <th class="text-uppercase">Wednesday</th>
                                                <th class="text-uppercase">Thursday</th>
                                                <th class="text-uppercase">Friday</th>
                                                <th class="text-uppercase">Saturday</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="align-middle">2:00->3:30(PM)</td>
                                                <td>
                                                <?php
                                                $sql = "SELECT * FROM `schedule_tbl` 
                                                INNER JOIN subject_tbl ON schedule_tbl.SubjectID = subject_tbl.SubjectID
                                                INNER JOIN time_tbl ON schedule_tbl.TimeID = time_tbl.TimeID
                                                INNER JOIN lecturer_tbl ON schedule_tbl.LecturerID = lecturer_tbl.LecturerID 
                                                INNER JOIN dayweek_tbl ON schedule_tbl.DayWeekID = dayweek_tbl.DayWeekID 
                                                INNER JOIN room_tbl ON schedule_tbl.RoomID = room_tbl.RoomID
                                                INNER JOIN campus_tbl ON room_tbl.CampusID = campus_tbl.CampusID
                                                WHERE ProgramID = $program AND DayWeekName ='Monday' AND schedule_tbl.LecturerID = $id ";
                                                $rs=$conn->query($sql);
                                                while($rw = mysqli_fetch_assoc($rs)){
                                            ?>
                                                    <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13" style="color: black;" ><?php echo $rw['SubjectEN'] ?></span>
                                                    <div class="margin-10px-top font-size14"><?php echo $rw['RoomName'] ?>/<?php echo $rw['CampusEN'] ?></div>
                                                    <div class="font-size13 text-light-gray"><?php echo $rw['LecturerName'] ?></div>
                                                <?php } ?>
                                                </td>
                                                <td>
                                                <?php
                                                $sql = "SELECT * FROM `schedule_tbl` 
                                                INNER JOIN subject_tbl ON schedule_tbl.SubjectID = subject_tbl.SubjectID
                                                INNER JOIN time_tbl ON schedule_tbl.TimeID = time_tbl.TimeID
                                                INNER JOIN lecturer_tbl ON schedule_tbl.LecturerID = lecturer_tbl.LecturerID 
                                                INNER JOIN dayweek_tbl ON schedule_tbl.DayWeekID = dayweek_tbl.DayWeekID 
                                                INNER JOIN room_tbl ON schedule_tbl.RoomID = room_tbl.RoomID
                                                INNER JOIN campus_tbl ON room_tbl.CampusID = campus_tbl.CampusID
                                                WHERE ProgramID = $program AND DayWeekName ='Tuesday' AND schedule_tbl.LecturerID = $id ";
                                                $rs=$conn->query($sql);
                                                while($rw = mysqli_fetch_assoc($rs)){
                                            ?>
                                                     <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13" style="color: black;" ><?php echo $rw['SubjectEN'] ?></span>
                                                    <div class="margin-10px-top font-size14"><?php echo $rw['RoomName'] ?>/<?php echo $rw['CampusEN'] ?></div>
                                                    <div class="font-size13 text-light-gray"><?php echo $rw['LecturerName'] ?></div>
                                                <?php } ?>
                                                </td>
                                                <td>
                                                <?php
                                                $sql = "SELECT * FROM `schedule_tbl` 
                                                INNER JOIN subject_tbl ON schedule_tbl.SubjectID = subject_tbl.SubjectID
                                                INNER JOIN time_tbl ON schedule_tbl.TimeID = time_tbl.TimeID
                                                INNER JOIN lecturer_tbl ON schedule_tbl.LecturerID = lecturer_tbl.LecturerID 
                                                INNER JOIN dayweek_tbl ON schedule_tbl.DayWeekID = dayweek_tbl.DayWeekID 
                                                INNER JOIN room_tbl ON schedule_tbl.RoomID = room_tbl.RoomID
                                                INNER JOIN campus_tbl ON room_tbl.CampusID = campus_tbl.CampusID
                                                WHERE ProgramID = $program AND DayWeekName ='Wednesday' AND schedule_tbl.LecturerID = $id ";
                                                $rs=$conn->query($sql);
                                                while($rw = mysqli_fetch_assoc($rs)){
                                            ?>
                                                    <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13" style="color: black;" ><?php echo $rw['SubjectEN'] ?></span>
                                                    <div class="margin-10px-top font-size14"><?php echo $rw['RoomName'] ?>/<?php echo $rw['CampusEN'] ?></div>
                                                    <div class="font-size13 text-light-gray"><?php echo $rw['LecturerName'] ?></div>
                                                <?php } ?>
                                                </td>
                                                <td>
                                                <?php
                                                $sql = "SELECT * FROM `schedule_tbl` 
                                                INNER JOIN subject_tbl ON schedule_tbl.SubjectID = subject_tbl.SubjectID
                                                INNER JOIN time_tbl ON schedule_tbl.TimeID = time_tbl.TimeID
                                                INNER JOIN lecturer_tbl ON schedule_tbl.LecturerID = lecturer_tbl.LecturerID 
                                                INNER JOIN dayweek_tbl ON schedule_tbl.DayWeekID = dayweek_tbl.DayWeekID 
                                                INNER JOIN room_tbl ON schedule_tbl.RoomID = room_tbl.RoomID
                                                INNER JOIN campus_tbl ON room_tbl.CampusID = campus_tbl.CampusID
                                                WHERE ProgramID = $program AND DayWeekName ='Thursday' AND schedule_tbl.LecturerID = $id ";
                                                $rs=$conn->query($sql);
                                                while($rw = mysqli_fetch_assoc($rs)){
                                            ?>
                                                    <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13" style="color: black;" ><?php echo $rw['SubjectEN'] ?></span>
                                                    <div class="margin-10px-top font-size14"><?php echo $rw['RoomName'] ?>/<?php echo $rw['CampusEN'] ?></div>
                                                    <div class="font-size13 text-light-gray"><?php echo $rw['LecturerName'] ?></div>
                                                <?php } ?>
                                                </td>
                                                <td>
                                                <?php
                                                $sql = "SELECT * FROM `schedule_tbl` 
                                                INNER JOIN subject_tbl ON schedule_tbl.SubjectID = subject_tbl.SubjectID
                                                INNER JOIN time_tbl ON schedule_tbl.TimeID = time_tbl.TimeID
                                                INNER JOIN lecturer_tbl ON schedule_tbl.LecturerID = lecturer_tbl.LecturerID 
                                                INNER JOIN dayweek_tbl ON schedule_tbl.DayWeekID = dayweek_tbl.DayWeekID 
                                                INNER JOIN room_tbl ON schedule_tbl.RoomID = room_tbl.RoomID
                                                INNER JOIN campus_tbl ON room_tbl.CampusID = campus_tbl.CampusID
                                                WHERE ProgramID = $program AND DayWeekName ='Friday' AND schedule_tbl.LecturerID = $id ";
                                                $rs=$conn->query($sql);
                                                while($rw = mysqli_fetch_assoc($rs)){
                                            ?>
                                                     <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13" style="color: black;" ><?php echo $rw['SubjectEN'] ?></span>
                                                    <div class="margin-10px-top font-size14"><?php echo $rw['RoomName'] ?>/<?php echo $rw['CampusEN'] ?></div>
                                                    <div class="font-size13 text-light-gray"><?php echo $rw['LecturerName'] ?></div>
                                                <?php } ?>
                                                </td>
                                                <td>
                                                    <!-- <span class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">English</span>
                                                    <div class="margin-10px-top font-size14">9:00-10:00</div>
                                                    <div class="font-size13 text-light-gray">James Smith</div> -->
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle">3:30->3:45(PM)</td>
                                                <td>
                                                    <!-- <span class="bg-yellow padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Music</span> -->
                                                    <div class="margin-10px-top font-size14">BREAK</div>
                                                </td>
                                                <td class="bg-light-gray">
                                                <!-- <span class="bg-yellow padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Music</span> -->
                                                    <div class="margin-10px-top font-size14">BREAK</div>
                                                </td>
                                                <td>
                                                    <!-- <span class="bg-yellow padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Music</span> -->
                                                    <div class="margin-10px-top font-size14">BREAK</div>
                                                </td>
                                                <td>
                                                    <!-- <span class="bg-yellow padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Music</span> -->
                                                    <div class="margin-10px-top font-size14">BREAK</div>
                                                </td>
                                                <td>
                                                    <!-- <span class="bg-yellow padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Music</span> -->
                                                    <div class="margin-10px-top font-size14">BREAK</div>
                                                </td>
                                                <td class="bg-light-gray">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle">3:45->5:15(PM)</td>
                                                <td>
                                                <?php
                                                $sql = "SELECT * FROM `schedule_tbl` 
                                                INNER JOIN subject_tbl ON schedule_tbl.SubjectID = subject_tbl.SubjectID
                                                INNER JOIN time_tbl ON schedule_tbl.TimeID = time_tbl.TimeID
                                                INNER JOIN lecturer_tbl ON schedule_tbl.LecturerID = lecturer_tbl.LecturerID 
                                                INNER JOIN dayweek_tbl ON schedule_tbl.DayWeekID = dayweek_tbl.DayWeekID 
                                                INNER JOIN room_tbl ON schedule_tbl.RoomID = room_tbl.RoomID
                                                INNER JOIN campus_tbl ON room_tbl.CampusID = campus_tbl.CampusID
                                                WHERE ProgramID = $program AND DayWeekName ='Monday' AND schedule_tbl.LecturerID = $id ";
                                                $rs=$conn->query($sql);
                                                while($rw = mysqli_fetch_assoc($rs)){
                                            ?>
                                                    <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13" style="color: black;" ><?php echo $rw['SubjectEN'] ?></span>
                                                    <div class="margin-10px-top font-size14"><?php echo $rw['RoomName'] ?>/<?php echo $rw['CampusEN'] ?></div>
                                                    <div class="font-size13 text-light-gray"><?php echo $rw['LecturerName'] ?></div>
                                                <?php } ?>
                                                </td>
                                                <td>
                                                <?php
                                                $sql = "SELECT * FROM `schedule_tbl` 
                                                INNER JOIN subject_tbl ON schedule_tbl.SubjectID = subject_tbl.SubjectID
                                                INNER JOIN time_tbl ON schedule_tbl.TimeID = time_tbl.TimeID
                                                INNER JOIN lecturer_tbl ON schedule_tbl.LecturerID = lecturer_tbl.LecturerID 
                                                INNER JOIN dayweek_tbl ON schedule_tbl.DayWeekID = dayweek_tbl.DayWeekID 
                                                INNER JOIN room_tbl ON schedule_tbl.RoomID = room_tbl.RoomID
                                                INNER JOIN campus_tbl ON room_tbl.CampusID = campus_tbl.CampusID
                                                WHERE ProgramID = $program AND DayWeekName ='Tuesday' AND schedule_tbl.LecturerID = $id ";
                                                $rs=$conn->query($sql);
                                                while($rw = mysqli_fetch_assoc($rs)){
                                            ?>
                                                     <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13" style="color: black;" ><?php echo $rw['SubjectEN'] ?></span>
                                                    <div class="margin-10px-top font-size14"><?php echo $rw['RoomName'] ?>/<?php echo $rw['CampusEN'] ?></div>
                                                    <div class="font-size13 text-light-gray"><?php echo $rw['LecturerName'] ?></div>
                                                <?php } ?>
                                                </td>
                                                <td>
                                                <?php
                                                $sql = "SELECT * FROM `schedule_tbl` 
                                                INNER JOIN subject_tbl ON schedule_tbl.SubjectID = subject_tbl.SubjectID
                                                INNER JOIN time_tbl ON schedule_tbl.TimeID = time_tbl.TimeID
                                                INNER JOIN lecturer_tbl ON schedule_tbl.LecturerID = lecturer_tbl.LecturerID 
                                                INNER JOIN dayweek_tbl ON schedule_tbl.DayWeekID = dayweek_tbl.DayWeekID 
                                                INNER JOIN room_tbl ON schedule_tbl.RoomID = room_tbl.RoomID
                                                INNER JOIN campus_tbl ON room_tbl.CampusID = campus_tbl.CampusID
                                                WHERE ProgramID = $program AND DayWeekName ='Wednesday' AND schedule_tbl.LecturerID = $id ";
                                                $rs=$conn->query($sql);
                                                while($rw = mysqli_fetch_assoc($rs)){
                                            ?>
                                                     <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13" style="color: black;" ><?php echo $rw['SubjectEN'] ?></span>
                                                    <div class="margin-10px-top font-size14"><?php echo $rw['RoomName'] ?>/<?php echo $rw['CampusEN'] ?></div>
                                                    <div class="font-size13 text-light-gray"><?php echo $rw['LecturerName'] ?></div>
                                                <?php } ?>
                                                </td>
                                                <td>
                                                <?php
                                                $sql = "SELECT * FROM `schedule_tbl` 
                                                INNER JOIN subject_tbl ON schedule_tbl.SubjectID = subject_tbl.SubjectID
                                                INNER JOIN time_tbl ON schedule_tbl.TimeID = time_tbl.TimeID
                                                INNER JOIN lecturer_tbl ON schedule_tbl.LecturerID = lecturer_tbl.LecturerID 
                                                INNER JOIN dayweek_tbl ON schedule_tbl.DayWeekID = dayweek_tbl.DayWeekID 
                                                INNER JOIN room_tbl ON schedule_tbl.RoomID = room_tbl.RoomID
                                                INNER JOIN campus_tbl ON room_tbl.CampusID = campus_tbl.CampusID
                                                WHERE ProgramID = $program AND DayWeekName ='Thursday' AND schedule_tbl.LecturerID = $id ";
                                                $rs=$conn->query($sql);
                                                while($rw = mysqli_fetch_assoc($rs)){
                                            ?>
                                                    <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13" style="color: black;" ><?php echo $rw['SubjectEN'] ?></span>
                                                    <div class="margin-10px-top font-size14"><?php echo $rw['RoomName'] ?>/<?php echo $rw['CampusEN'] ?></div>
                                                    <div class="font-size13 text-light-gray"><?php echo $rw['LecturerName'] ?></div>
                                                <?php } ?>
                                                </td>
                                                <td>
                                                <?php
                                                $sql = "SELECT * FROM `schedule_tbl` 
                                                INNER JOIN subject_tbl ON schedule_tbl.SubjectID = subject_tbl.SubjectID
                                                INNER JOIN time_tbl ON schedule_tbl.TimeID = time_tbl.TimeID
                                                INNER JOIN lecturer_tbl ON schedule_tbl.LecturerID = lecturer_tbl.LecturerID 
                                                INNER JOIN dayweek_tbl ON schedule_tbl.DayWeekID = dayweek_tbl.DayWeekID 
                                                INNER JOIN room_tbl ON schedule_tbl.RoomID = room_tbl.RoomID
                                                INNER JOIN campus_tbl ON room_tbl.CampusID = campus_tbl.CampusID
                                                WHERE ProgramID = $program AND DayWeekName ='Friday' AND schedule_tbl.LecturerID = $id ";
                                                $rs=$conn->query($sql);
                                                while($rw = mysqli_fetch_assoc($rs)){
                                            ?>
                                                     <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13" style="color: black;" ><?php echo $rw['SubjectEN'] ?></span>
                                                    <div class="margin-10px-top font-size14"><?php echo $rw['RoomName'] ?>/<?php echo $rw['CampusEN'] ?></div>
                                                    <div class="font-size13 text-light-gray"><?php echo $rw['LecturerName'] ?></div>
                                                <?php } ?>
                                                </td>
                                                <td>
                                                    <!-- <span class="bg-lightred padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Break</span>
                                                    <div class="margin-10px-top font-size14">11:00-12:00</div> -->
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php
}

$shiftCheckSql = "SELECT shift_tbl.shiftEN FROM program_tbl
INNER JOIN shift_tbl ON program_tbl.ShiftID = shift_tbl.ShiftID
WHERE program_tbl.ProgramID = $program AND shift_tbl.shiftEN = 'Evening'";
$shiftCheckResult = $conn->query($shiftCheckSql);
if($shiftCheckResult->num_rows > 0)
{
?>
<main id="main" class="main">
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- <h5 class="card-title">Schedule</h5> -->
                            <?php
// Query to get the schedule
$sql = "SELECT * FROM `schedule_tbl` 
INNER JOIN subject_tbl ON schedule_tbl.SubjectID = subject_tbl.SubjectID
INNER JOIN time_tbl ON schedule_tbl.TimeID = time_tbl.TimeID
INNER JOIN lecturer_tbl ON schedule_tbl.LecturerID = lecturer_tbl.LecturerID 
INNER JOIN dayweek_tbl ON schedule_tbl.DayWeekID = dayweek_tbl.DayWeekID 
INNER JOIN room_tbl ON schedule_tbl.RoomID = room_tbl.RoomID
INNER JOIN campus_tbl ON room_tbl.CampusID = campus_tbl.CampusID
WHERE ProgramID = $program AND DayWeekName ='Monday' AND schedule_tbl.LecturerID = $id ";
$rs1 = $conn->query($sql);

// Check if there are any results for the schedule query
if ($rs1 && $rs1->num_rows > 0) {
    $rows = mysqli_fetch_assoc($rs1);
    $room = $rows['RoomName'];
} else {
    $room = null; // Set room to null if no results
}

// Query to get the program details
$sql_Pro = "SELECT * FROM program_tbl 
INNER JOIN faculty_tbl ON program_tbl.FacultyID = faculty_tbl.FacultyID
INNER JOIN major_tbl ON program_tbl.MajorID = major_tbl.MajorID
INNER JOIN year_tbl ON program_tbl.YearID = year_tbl.YearID
INNER JOIN semester_tbl ON program_tbl.SemesterID = semester_tbl.SemesterID
INNER JOIN academicyear_tbl ON program_tbl.AcademicYearID = academicyear_tbl.AcademicYearID
INNER JOIN batch_tbl ON program_tbl.BatchID = batch_tbl.BatchID
INNER JOIN campus_tbl ON program_tbl.CampusID = campus_tbl.CampusID
INNER JOIN degree_tbl ON program_tbl.DegreeID = degree_tbl.DegreeID
INNER JOIN shift_tbl ON program_tbl.ShiftID = shift_tbl.ShiftID 
WHERE ProgramID='$program'";
$rs = $conn->query($sql_Pro);

// Check if there are any results for the program query
if ($rs && $rs->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($rs)) {
        ?>
        <div class="row d-flex justify-content-center">
            <div class="col-4">
                <h6>Faculty: <?php echo $row['FacultyEN'] ?></h6>
                <h6>Major: <?php echo $row['MajorEN'] ?></h6>
                <h6>Batch: <?php echo $row['BatchEN'] ?></h6>
            </div>
            <div class="col-4 text-center">
                <h4>Academic Year: <?php echo $row['AcademicYear'] ?></h4>
            </div>
            <div class="col-4" style="text-align: end;">
                <h6>Year: <?php echo $row['YearEN'] ?></h6>
                <h6>Semester: <?php echo $row['SemesterEN'] ?></h6>
                <h6>Shift: <?php echo $row['ShiftEN'] ?></h6>
                <?php if ($room) { ?>
                    <h6>Room: <?php echo $room ?></h6>
                <?php } ?>
            </div>
        </div>
        <?php
    }
}
?>

                            <!-- Schedule -->
                            <div class="container">
                                <div class="timetable-img text-center">
                                    <img src="img/content/timetable.png" alt="">
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered text-center">
                                        <thead>
                                            <tr class="bg-light-gray">
                                                <th class="text-uppercase">Time</th>
                                                <th class="text-uppercase">Monday</th>
                                                <th class="text-uppercase">Tuesday</th>
                                                <th class="text-uppercase">Wednesday</th>
                                                <th class="text-uppercase">Thursday</th>
                                                <th class="text-uppercase">Friday</th>
                                                <th class="text-uppercase">Saturday</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="align-middle">05:30->6:40(PM)</td>
                                                <td>
                                                <?php
                                                $sql = "SELECT * FROM `schedule_tbl` 
                                                INNER JOIN subject_tbl ON schedule_tbl.SubjectID = subject_tbl.SubjectID
                                                INNER JOIN time_tbl ON schedule_tbl.TimeID = time_tbl.TimeID
                                                INNER JOIN lecturer_tbl ON schedule_tbl.LecturerID = lecturer_tbl.LecturerID 
                                                INNER JOIN dayweek_tbl ON schedule_tbl.DayWeekID = dayweek_tbl.DayWeekID 
                                                INNER JOIN room_tbl ON schedule_tbl.RoomID = room_tbl.RoomID
                                                INNER JOIN campus_tbl ON room_tbl.CampusID = campus_tbl.CampusID
                                                WHERE ProgramID = $program AND DayWeekName ='Monday' AND schedule_tbl.LecturerID = $id ";
                                                $rs=$conn->query($sql);
                                                while($rw = mysqli_fetch_assoc($rs)){
                                            ?>
                                                    <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13" style="color: black;" ><?php echo $rw['SubjectEN'] ?></span>
                                                    <div class="margin-10px-top font-size14"><?php echo $rw['RoomName'] ?>/<?php echo $rw['CampusEN'] ?></div>
                                                    <div class="font-size13 text-light-gray"><?php echo $rw['LecturerName'] ?></div>
                                                <?php } ?>
                                                </td>
                                                <td>
                                                <?php
                                                $sql = "SELECT * FROM `schedule_tbl` 
                                                INNER JOIN subject_tbl ON schedule_tbl.SubjectID = subject_tbl.SubjectID
                                                INNER JOIN time_tbl ON schedule_tbl.TimeID = time_tbl.TimeID
                                                INNER JOIN lecturer_tbl ON schedule_tbl.LecturerID = lecturer_tbl.LecturerID 
                                                INNER JOIN dayweek_tbl ON schedule_tbl.DayWeekID = dayweek_tbl.DayWeekID 
                                                INNER JOIN room_tbl ON schedule_tbl.RoomID = room_tbl.RoomID
                                                INNER JOIN campus_tbl ON room_tbl.CampusID = campus_tbl.CampusID
                                                WHERE ProgramID = $program AND DayWeekName ='Tuesday' AND schedule_tbl.LecturerID = $id ";
                                                $rs=$conn->query($sql);
                                                while($rw = mysqli_fetch_assoc($rs)){
                                            ?>
                                                     <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13" style="color: black;" ><?php echo $rw['SubjectEN'] ?></span>
                                                    <div class="margin-10px-top font-size14"><?php echo $rw['RoomName'] ?>/<?php echo $rw['CampusEN'] ?></div>
                                                    <div class="font-size13 text-light-gray"><?php echo $rw['LecturerName'] ?></div>
                                                <?php } ?>
                                                </td>
                                                <td>
                                                <?php
                                                $sql = "SELECT * FROM `schedule_tbl` 
                                                INNER JOIN subject_tbl ON schedule_tbl.SubjectID = subject_tbl.SubjectID
                                                INNER JOIN time_tbl ON schedule_tbl.TimeID = time_tbl.TimeID
                                                INNER JOIN lecturer_tbl ON schedule_tbl.LecturerID = lecturer_tbl.LecturerID 
                                                INNER JOIN dayweek_tbl ON schedule_tbl.DayWeekID = dayweek_tbl.DayWeekID 
                                                INNER JOIN room_tbl ON schedule_tbl.RoomID = room_tbl.RoomID
                                                INNER JOIN campus_tbl ON room_tbl.CampusID = campus_tbl.CampusID
                                                WHERE ProgramID = $program AND DayWeekName ='Wednesday' AND schedule_tbl.LecturerID = $id ";
                                                $rs=$conn->query($sql);
                                                while($rw = mysqli_fetch_assoc($rs)){
                                            ?>
                                                     <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13" style="color: black;" ><?php echo $rw['SubjectEN'] ?></span>
                                                    <div class="margin-10px-top font-size14"><?php echo $rw['RoomName'] ?>/<?php echo $rw['CampusEN'] ?></div>
                                                    <div class="font-size13 text-light-gray"><?php echo $rw['LecturerName'] ?></div>
                                                <?php } ?>
                                                </td>
                                                <td>
                                                <?php
                                                $sql = "SELECT * FROM `schedule_tbl` 
                                                INNER JOIN subject_tbl ON schedule_tbl.SubjectID = subject_tbl.SubjectID
                                                INNER JOIN time_tbl ON schedule_tbl.TimeID = time_tbl.TimeID
                                                INNER JOIN lecturer_tbl ON schedule_tbl.LecturerID = lecturer_tbl.LecturerID 
                                                INNER JOIN dayweek_tbl ON schedule_tbl.DayWeekID = dayweek_tbl.DayWeekID 
                                                INNER JOIN room_tbl ON schedule_tbl.RoomID = room_tbl.RoomID
                                                INNER JOIN campus_tbl ON room_tbl.CampusID = campus_tbl.CampusID
                                                WHERE ProgramID = $program AND DayWeekName ='Thursday' AND schedule_tbl.LecturerID = $id ";
                                                $rs=$conn->query($sql);
                                                while($rw = mysqli_fetch_assoc($rs)){
                                            ?>
                                                    <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13" style="color: black;" ><?php echo $rw['SubjectEN'] ?></span>
                                                    <div class="margin-10px-top font-size14"><?php echo $rw['RoomName'] ?>/<?php echo $rw['CampusEN'] ?></div>
                                                    <div class="font-size13 text-light-gray"><?php echo $rw['LecturerName'] ?></div>
                                                <?php } ?>
                                                </td>
                                                <td>
                                                <?php
                                                $sql = "SELECT * FROM `schedule_tbl` 
                                                INNER JOIN subject_tbl ON schedule_tbl.SubjectID = subject_tbl.SubjectID
                                                INNER JOIN time_tbl ON schedule_tbl.TimeID = time_tbl.TimeID
                                                INNER JOIN lecturer_tbl ON schedule_tbl.LecturerID = lecturer_tbl.LecturerID 
                                                INNER JOIN dayweek_tbl ON schedule_tbl.DayWeekID = dayweek_tbl.DayWeekID 
                                                INNER JOIN room_tbl ON schedule_tbl.RoomID = room_tbl.RoomID
                                                INNER JOIN campus_tbl ON room_tbl.CampusID = campus_tbl.CampusID
                                                WHERE ProgramID = $program AND DayWeekName ='Friday' AND schedule_tbl.LecturerID = $id ";
                                                $rs=$conn->query($sql);
                                                while($rw = mysqli_fetch_assoc($rs)){
                                            ?>
                                                     <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13" style="color: black;" ><?php echo $rw['SubjectEN'] ?></span>
                                                    <div class="margin-10px-top font-size14"><?php echo $rw['RoomName'] ?>/<?php echo $rw['CampusEN'] ?></div>
                                                    <div class="font-size13 text-light-gray"><?php echo $rw['LecturerName'] ?></div>
                                                <?php } ?>
                                                </td>
                                                <td>
                                                    <!-- <span class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">English</span>
                                                    <div class="margin-10px-top font-size14">9:00-10:00</div>
                                                    <div class="font-size13 text-light-gray">James Smith</div> -->
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle">6:40->6:55(PM)</td>
                                                <td>
                                                    <!-- <span class="bg-yellow padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Music</span> -->
                                                    <div class="margin-10px-top font-size14">BREAK</div>
                                                </td>
                                                <td class="bg-light-gray">
                                                <!-- <span class="bg-yellow padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Music</span> -->
                                                    <div class="margin-10px-top font-size14">BREAK</div>
                                                </td>
                                                <td>
                                                    <!-- <span class="bg-yellow padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Music</span> -->
                                                    <div class="margin-10px-top font-size14">BREAK</div>
                                                </td>
                                                <td>
                                                    <!-- <span class="bg-yellow padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Music</span> -->
                                                    <div class="margin-10px-top font-size14">BREAK</div>
                                                </td>
                                                <td>
                                                    <!-- <span class="bg-yellow padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Music</span> -->
                                                    <div class="margin-10px-top font-size14">BREAK</div>
                                                </td>
                                                <td class="bg-light-gray">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle">6:55->08:30(PM)</td>
                                                <td>
                                                <?php
                                                $sql = "SELECT * FROM `schedule_tbl` 
                                                INNER JOIN subject_tbl ON schedule_tbl.SubjectID = subject_tbl.SubjectID
                                                INNER JOIN time_tbl ON schedule_tbl.TimeID = time_tbl.TimeID
                                                INNER JOIN lecturer_tbl ON schedule_tbl.LecturerID = lecturer_tbl.LecturerID 
                                                INNER JOIN dayweek_tbl ON schedule_tbl.DayWeekID = dayweek_tbl.DayWeekID 
                                                INNER JOIN room_tbl ON schedule_tbl.RoomID = room_tbl.RoomID
                                                INNER JOIN campus_tbl ON room_tbl.CampusID = campus_tbl.CampusID
                                                WHERE ProgramID = $program AND DayWeekName ='Monday' AND schedule_tbl.LecturerID = $id ";
                                                $rs=$conn->query($sql);
                                                while($rw = mysqli_fetch_assoc($rs)){
                                            ?>
                                                     <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13" style="color: black;" ><?php echo $rw['SubjectEN'] ?></span>
                                                    <div class="margin-10px-top font-size14"><?php echo $rw['RoomName'] ?>/<?php echo $rw['CampusEN'] ?></div>
                                                    <div class="font-size13 text-light-gray"><?php echo $rw['LecturerName'] ?></div>
                                                <?php } ?>
                                                </td>
                                                <td>
                                                <?php
                                                $sql = "SELECT * FROM `schedule_tbl` 
                                                INNER JOIN subject_tbl ON schedule_tbl.SubjectID = subject_tbl.SubjectID
                                                INNER JOIN time_tbl ON schedule_tbl.TimeID = time_tbl.TimeID
                                                INNER JOIN lecturer_tbl ON schedule_tbl.LecturerID = lecturer_tbl.LecturerID 
                                                INNER JOIN dayweek_tbl ON schedule_tbl.DayWeekID = dayweek_tbl.DayWeekID 
                                                INNER JOIN room_tbl ON schedule_tbl.RoomID = room_tbl.RoomID
                                                INNER JOIN campus_tbl ON room_tbl.CampusID = campus_tbl.CampusID
                                                WHERE ProgramID = $program AND DayWeekName ='Tuesday' AND schedule_tbl.LecturerID = $id ";
                                                $rs=$conn->query($sql);
                                                while($rw = mysqli_fetch_assoc($rs)){
                                            ?>
                                                    <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13" style="color: black;" ><?php echo $rw['SubjectEN'] ?></span>
                                                    <div class="margin-10px-top font-size14"><?php echo $rw['RoomName'] ?>/<?php echo $rw['CampusEN'] ?></div>
                                                    <div class="font-size13 text-light-gray"><?php echo $rw['LecturerName'] ?></div>
                                                <?php } ?>
                                                </td>
                                                <td>
                                                <?php
                                                $sql = "SELECT * FROM `schedule_tbl` 
                                                INNER JOIN subject_tbl ON schedule_tbl.SubjectID = subject_tbl.SubjectID
                                                INNER JOIN time_tbl ON schedule_tbl.TimeID = time_tbl.TimeID
                                                INNER JOIN lecturer_tbl ON schedule_tbl.LecturerID = lecturer_tbl.LecturerID 
                                                INNER JOIN dayweek_tbl ON schedule_tbl.DayWeekID = dayweek_tbl.DayWeekID 
                                                INNER JOIN room_tbl ON schedule_tbl.RoomID = room_tbl.RoomID
                                                INNER JOIN campus_tbl ON room_tbl.CampusID = campus_tbl.CampusID
                                                WHERE ProgramID = $program AND DayWeekName ='Wednesday' AND schedule_tbl.LecturerID = $id ";
                                                $rs=$conn->query($sql);
                                                while($rw = mysqli_fetch_assoc($rs)){
                                            ?>
                                                     <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13" style="color: black;" ><?php echo $rw['SubjectEN'] ?></span>
                                                    <div class="margin-10px-top font-size14"><?php echo $rw['RoomName'] ?>/<?php echo $rw['CampusEN'] ?></div>
                                                    <div class="font-size13 text-light-gray"><?php echo $rw['LecturerName'] ?></div>
                                                <?php } ?>
                                                </td>
                                                <td>
                                                <?php
                                                $sql = "SELECT * FROM `schedule_tbl` 
                                                INNER JOIN subject_tbl ON schedule_tbl.SubjectID = subject_tbl.SubjectID
                                                INNER JOIN time_tbl ON schedule_tbl.TimeID = time_tbl.TimeID
                                                INNER JOIN lecturer_tbl ON schedule_tbl.LecturerID = lecturer_tbl.LecturerID 
                                                INNER JOIN dayweek_tbl ON schedule_tbl.DayWeekID = dayweek_tbl.DayWeekID 
                                                INNER JOIN room_tbl ON schedule_tbl.RoomID = room_tbl.RoomID
                                                INNER JOIN campus_tbl ON room_tbl.CampusID = campus_tbl.CampusID
                                                WHERE ProgramID = $program AND DayWeekName ='Thursday' AND schedule_tbl.LecturerID = $id ";
                                                $rs=$conn->query($sql);
                                                while($rw = mysqli_fetch_assoc($rs)){
                                            ?>
                                                     <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13" style="color: black;" ><?php echo $rw['SubjectEN'] ?></span>
                                                    <div class="margin-10px-top font-size14"><?php echo $rw['RoomName'] ?>/<?php echo $rw['CampusEN'] ?></div>
                                                    <div class="font-size13 text-light-gray"><?php echo $rw['LecturerName'] ?></div>
                                                <?php } ?>
                                                </td>
                                                <td>
                                                <?php
                                                $sql = "SELECT * FROM `schedule_tbl` 
                                                INNER JOIN subject_tbl ON schedule_tbl.SubjectID = subject_tbl.SubjectID
                                                INNER JOIN time_tbl ON schedule_tbl.TimeID = time_tbl.TimeID
                                                INNER JOIN lecturer_tbl ON schedule_tbl.LecturerID = lecturer_tbl.LecturerID 
                                                INNER JOIN dayweek_tbl ON schedule_tbl.DayWeekID = dayweek_tbl.DayWeekID 
                                                INNER JOIN room_tbl ON schedule_tbl.RoomID = room_tbl.RoomID
                                                INNER JOIN campus_tbl ON room_tbl.CampusID = campus_tbl.CampusID
                                                WHERE ProgramID = $program AND DayWeekName ='Friday' AND schedule_tbl.LecturerID = $id ";
                                                $rs=$conn->query($sql);
                                                while($rw = mysqli_fetch_assoc($rs)){
                                            ?>
                                                     <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13" style="color: black;" ><?php echo $rw['SubjectEN'] ?></span>
                                                    <div class="margin-10px-top font-size14"><?php echo $rw['RoomName'] ?>/<?php echo $rw['CampusEN'] ?></div>
                                                    <div class="font-size13 text-light-gray"><?php echo $rw['LecturerName'] ?></div>
                                                <?php } ?>
                                                </td>
                                                <td>
                                                    <!-- <span class="bg-lightred padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Break</span>
                                                    <div class="margin-10px-top font-size14">11:00-12:00</div> -->
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php
}
}
?>