<div class="col-md-6 col-md-offset-3">
  <div class="clearfix"></div>
           <div class="x_panel">
                  <div class="x_title">
                    <h2 style="align:center;">Student Fee Details</h2>
                                        <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                   

                    <div class="table-responsive">
                      <table  class="table table-striped jambo_table table-bordered">
                        <thead>
                                
                          <tr class="headings">
                            <th class="column-title" >Fee Details</th>
                            <th class="column-title" style="text-align:center;">Amount</th>
                            
                          </tr>
                        </thead>

                        <tbody>
                          
                            <?php
                               
                                  $sql = "SELECT * FROM fee_details WHERE class_tital='$class' AND student_id='$sid' AND school_reg = '$reg' AND session='$ses'";
                                  $result=mysql_query($sql);
                                 
                                  if (mysql_num_rows($result) > 0) {
                                  // output data of each row
                                  $row= mysql_fetch_array( $result);
                                  
                                  $fee=$row['fee'];
                                  $rfee=$row['remaining_duies'];
                                  $fine=$row['fine'];
                                  $efee=$row['extra_fee'];
                                  $total=$fee+$rfee+$fine+$efee;
                                 
                                  ?>
                            <tr class="even pointer">
                                <td class=" ">Fee</td>
                                <td class=" " style="text-align:center;"><?php echo $fee?></td>
                            </tr>
                            <tr class="odd pointer">
                                <td class=" " >Fine</td>
                                <td class=" " style="text-align:center;"><?php echo $fine?></td>
                            </tr>
                            <tr class="even pointer">
                                <td class=" " >Exta Fee</td>
                                <td class=" " style="text-align:center;"><?php echo $efee?></td>
                            </tr>
                            <tr class="odd pointer">
                                <td class=" " >Remaining Dues</td>
                                <td class=" " style="text-align:center;"><?php echo $rfee?></td>
                            </tr>
                            <tr class="even pointer">
                                <td class=" ">Total</td>
                                <td class=" " style="text-align:center;"><?php echo $total?></td>
                            </tr>
                            
                            

                           
                          <?php
                      
                            }  else {
                            echo "No result Found";
                            }
                            ?>
                          
                        </tbody>
                      </table>
                    </div>
              </div>
                </div>
              </div>
        
                <div class="clearfix"></div>
          <div class="col-md-6 col-md-offset-3">
          <div class="clearfix"></div>
           <div class="x_panel">
                  <div class="x_title">
                    <h2 style="align:center;">Fine Details</h2>
                                        <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <div class="table-responsive">
                      <table class="table table-striped jambo_table table-bordered">
                        <thead>
                                
                          <tr class="headings">
                            
                            <th class="column-title" >Fine Title</th>
                            <th class="column-title" >Date</th>
                            <th class="column-title" >Amount</th>
                            
                            
                          </tr>
                        </thead>

                        <tbody>
                          
                            <?php
                               
                                  $sql = "SELECT * FROM fine_details WHERE student_id='$sid' AND school_reg = '$reg' AND session='$ses'";
                                  $result=mysql_query($sql);
                                 
                                  if (mysql_num_rows($result) > 0) {
                                  // output data of each row
                                  while($row= mysql_fetch_array( $result) ) {
                                  $title=$row['fine_title'];
                                  $d=$row['fine_date'];
                                  $fee=$row['amount'];
                                  
                                  
                                  
                                 
                                  ?>
                            <tr class="even pointer">
                            <td class=" "><?php echo $title?></td>
                            <td class=" "><?php echo $d ?> </td>
                            <td class=" "><?php echo $fee?> </td> 
                            

                            
                          </tr>                          <?php
                        }
                            }  else {
                            echo "No result Found";
                            }
                            ?>
                          
                        </tbody>
                      </table>
                    </div>
              </div>
                </div>
              </div>
        
                <div class="clearfix"></div>
               

                <div class="col-md-6 col-md-offset-3">
                    <div class="clearfix"></div>
           <div class="x_panel">
                  <div class="x_title">
                    <h2 style="align:center;">Extra Fee</h2>
                                        <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <div class="table-responsive">
                      <table  class="table table-striped jambo_table table-bordered">
                        <thead>
                                
                          <tr class="headings">
                            <th class="column-title" >Extra Fee Title</th>
                            <th class="column-title" >Discription</th>
                            <th class="column-title" >Amoount</th>
                            
                          </tr>
                        </thead>

                        <tbody>
                          <tr class="even pointer">
                            <?php
                                
                                  $sql = "SELECT * FROM extra_fees WHERE school_reg = '$reg' AND session='$ses'";
                                  $result=mysql_query($sql);
                                 
                                  if (mysql_num_rows($result) > 0) {
                                  // output data of each row
                                  while($row= mysql_fetch_array( $result) ) {
                                  $title=$row['extra_fee_tital'];
                                  $dis=$row['extra_fee_discription'];
                                  $fee=$row['amount'];
                                  
                                  
                                  
                                 
                                  ?>
                            
                            <td class=" "><?php echo $title?></td>
                            
                            <td class=" "><?php echo $dis ?> </td>
                            <td class=" "><?php echo $fee?> </td> 
                            

                           
                          </tr>
                          <?php
                        }
                            }  else {
                            echo "No result Found";
                            }
                            ?>
                          
                        </tbody>
                      </table>
                    </div>
              </div>
                </div>
              </div>
        
                <div class="clearfix"></div>