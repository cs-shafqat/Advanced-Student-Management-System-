
 <!-- sidebar menu Employee-->
 <?php $sql="SELECT * FROM employee_authority WHERE user_id='$id' AND school_reg='$reg' ";
                $result=mysql_query($sql);
                $row=mysql_fetch_array($result);
                ?>
            <div id="sidebar-menu" class="main_menu_side ">
              <div class="menu_section">
                <ul class="nav side-menu">

                  <li class="">
                            <a href="welcome.php"><i class="fa fa-home fa-fw"></i> Home </a>
                        </li>
                        <li><a ><i class="fa fa-paper-plane fa-fw"></i>Message<span class="fa fa-chevron-down pull-right"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="compose_message.php">Compose</a>
                                <li><a href="view_message.php">inbox</a>
                                <li><a href="view_sent_message.php">sentbox</a>
                                </li>
                            </ul>
                        </li>
                        <li >
                            <a href="sent_request.php"><i class="fa fa-file fa-fw"></i>Request</a>
                        </li>
                        
                        <?php if($row['a_1']==1||$row['a_2']==1||$row['a_3']==1||$row['a_4']==1||$row['a_5']==1||$row['a_6']==1||$row['a_7']==1||$row['a_8']==1||$row['a_9']==1||$row['a_10']==1) {?>
                            <li><a ><i class="fa fa-users  fa-fw "> </i>  Student<span class="fa fa-chevron-down pull-right"></span></a>
                              <ul class="nav child_menu">
                                <?php if($row['a_1']==1){?>
                                <li><a href="add_student.php">Add Student</a>
                                </li>
                                <?php } if($row['a_1']==1||$row['a_2']==1||$row['a_3']==1){?>
                                <li><a href="view_student.php">View Student</a>
                                </li>
                                <?php } if($row['a_3']==1){?>
                                <li><a href="edit_student_profile.php">Edit Student</a>
                                </li>
                                <?php } if($row['a_4']==1){?>
                                <li><a href="add_student_attendance.php">Add Student Attendance</a>
                                </li>
                                <?php } if($row['a_4']==1||$row['a_5']==1||$row['a_6']==1){?>
                                <li><a href="view_student_attendance.php">View Student Attendance</a>
                                </li>
                                <?php } if($row['a_6']==1){?>
                                <li><a href="edit_student_attendance.php">Edit Student Attendance</a>
                                </li>
                                <?php } if($row['a_7']==1){?>
                                <li><a href="#">Add Student Result</a>
                                </li>
                                <?php } if($row['a_7']==1||$row['a_8']==1||$row['a_9']==1){?>
                                <li><a href="#">View Student Result</a>
                                </li>
                                <?php } if($row['a_9']==1){?>
                                <li><a href="#">Edit Student Result</a>
                                </li>
                                <?php } if($row['a_10']==1){?>
                                <li><a href="view_student_request.php">View Student Request</a>
                                </li>
                                <?php } ?>
                              </ul>
                            </li>
                          <?php } if($row['a_1']==1||$row['a_2']==1||$row['a_3']==1){?>
                            <li><a ><i class="fa fa-users  fa-fw "> </i>  Parent<span class="fa fa-chevron-down pull-right"></span></a>
                              <ul class="nav child_menu">
                                <?php if($row['a_1']==1){?>
                                <li><a href="add_parent.php">Add Parent</a>
                                </li>
                                <?php } if($row['a_1']==1||$row['a_2']==1||$row['a_3']==1){?>
                                <li><a href="view_parent.php">View Parents</a>
                                </li>
                                <?php } if($row['a_3']==1){?>
                                <li><a href="edit_parent.php">Edit Parents</a>
                                </li>
                                <?php } ?>
                                </ul>
                            </li>
                            <?php } if($row['a_11']==1||$row['a_12']==1||$row['a_13']==1||$row['a_14']==1||$row['a_15']==1||$row['a_16']==1||$row['a_17']==1){?>
                            <li><a ><i class="fa fa-users  fa-fw "> </i>Employee<span class="fa fa-chevron-down pull-right"></span></a>
                              <ul class="nav child_menu">
                                <?php if($row['a_11']==1){?>
                                <li><a href="add_employee.php">Add Employee</a>
                                </li>
                                <?php } if($row['a_11']==1||$row['a_12']==1||$row['a_13']==1){?>
                                <li><a href="view_employee.php">View Employee</a>
                                </li>
                                <?php } if($row['a_13']==1){?>
                                <li><a href="edit_employee.php">Edit Employee</a>
                                </li>
                                <?php } if($row['a_14']==1){?>
                                <li><a href="#">Add Employee Attendance</a>
                                </li>
                                <?php } if($row['a_14']==1||$row['a_15']==1||$row['a_16']==1){?>
                                <li><a href="#">View Employee Attendance</a>
                                </li>
                                <?php } if($row['a_16']==1){?>
                                <li><a href="#">Edit Employee Attendance</a>
                                </li><?php } if($row['a_17']==1){?>
                                <li><a href="view_employee_request.php">View Employee Request</a>
                                </li>
                                <?php } ?>
                              </ul>
                            </li>
                            <?php } if($row['a_18']==1||$row['a_19']==1||$row['a_20']==1){?>
                            <li><a> <i class="fa fa-building fa-fw "> </i>Class<span class="fa fa-chevron-down pull-right"></span></a>
                              <ul class="nav child_menu">
                                <?php if($row['a_18']==1){?>
                                <li><a href="add_class.php">Add Class</a>
                                </li>
                                <?php } if($row['a_18']==1||$row['a_19']==1||$row['a_20']==1){?>
                                <li><a href="view_class.php">View Class</a>
                                </li>
                                <?php } if($row['a_20']==1){?>
                                <li><a href="update_class.php">Edit Class</a>
                                </li>
                                <?php } ?>
                              </ul>
                            </li> 
                            <?php } if($row['a_18']==1||$row['a_19']==1||$row['a_20']==1||$row['a_21']==1){?>
                             <li><a > <i class="fa fa-book fa-fw "> </i>Subject<span class="fa fa-chevron-down pull-right"></span></a>
                              <ul class="nav child_menu">
                                <?php if($row['a_18']==1){?>
                                <li><a href="add_course.php">Add Subject</a>
                                </li>
                                <?php } if($row['a_18']==1||$row['a_19']==1||$row['a_20']==1){?>
                                <li><a href="view_course.php">View Subject</a>
                                </li>
                                <?php } if($row['a_20']==1){?>
                                <li><a href="update_course.php">Edit Subject</a>
                                </li>
                                <?php }if($row['a_21']==1){?>
                                <li><a href="assign_class_subject.php">Assigning Class Subject</a>
                                </li>
                                <li><a href="class_subject_detail.php">View Class-Subject Details </a>
                                </li>
                                <?php } ?>
                              </ul>
                            </li>
                            <?php }if($row['a_26']==1){ ?>
                            <li><a > <i class="fa fa-dollar fa-fw "> </i>Finance/Accountant<span class="fa fa-chevron-down pull-right"></span></a>
                              <ul class="nav child_menu">
                                <li><a href="#">Fee Voucher</a>
                                </li>
                                <li><a href="#">Fee Submission</a>
                                </li>
                                <li><a href="#">Fine</a>
                                </li>
                                <li><a href="#">Previous Fee Records</a>
                                </li>
                              </ul>
                            </li> 
                            <?php } if($row['a_22']==1||$row['a_23']==1){?>
                            <li>
                            <a><i class="fa fa-exchange fa-fw"></i>Others<span class="fa fa-chevron-down pull-right"></span></a>
                            <ul class="nav child_menu">
                                <?php if($row['a_22']==1){ ?>
                                <li><a > Previous Records<span class="fa fa-chevron-down pull-right"></span> </a>
                                   <ul class="nav child_menu">
                                <li><a href="#">Student Attendance</a>
                                </li>
                                <li><a href="#">Employee Attendance</a>
                                </li>
                                <li><a href="#">Result</a>
                                </li>
                              </ul>
                                </li>
                                <?php }if($row['a_23']==1){ ?>
                                <li><a href="#">Change Class</a>
                                </li>
                                <?php } ?>
                              </ul>
                        </li>
                        <?php }if($row['a_24']==1){ ?>  
                        <li>
                            <a ><i class="fa fa-bell-o fa-fw"></i>Notification<span class="fa fa-chevron-down pull-right"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="add_notification.php">Add Notification</a>
                                </li>
                                <li><a href="view_notification.php">View Notification</a>
                                </li>
                              </ul>
                        </li> 
                        <?php }?>                     
                         <li>
                            <a href="#"><i class="fa fa-calendar-o fa-fw"></i>TimeTable</a>
                            
                        </li>
                        <?php if($row['a_25']==1){ ?> 
                        <li>
                            <a href="employee_authorities.php"><i class="fa fa-exchange fa-fw"></i>Assigning Authorities</a>
                            
                        </li>
                        <?php }?> 
                  </ul>     
                        
                   </div>
              </div>
 <!-- /sidebar menu Employee -->