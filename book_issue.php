<?php
if(!isset($_SESSION))
{
    session_start();
}
if(isset($_SESSION['library']))


{
   date_default_timezone_set("Asia/Calcutta"); 
?>
<!DOCTYPE html>
<html lang="zxx">
   <head>
      <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <?php include "head.php" ?>
    
    <style>
          .form-group1 input[type="text"], .form-group1 input[type="email"], .form-group1 input[type="date"], .form-group1 textarea, .form-group1 input[type="password"], .form-group1 input[type="date"], select{
        border: 1px solid #E9E9E9;
        font-size: 0.9em;
        width: 100%;
        outline: none;
        padding: 0.5em 1em;
        color: #000!important;
        margin-top: 0.5em;
        font-family: 'Muli-Regular';
            border: 1px solid #132043!important;
                box-shadow: 0 -3px 6px 2px rgb(0 0 0 / 20%);
                    box-shadow: inset 0 0 12px #cfa966, 0 0 6px #132043;
      }
      .form-group1 select {
        width: 100%;
        border: 1px solid #E9E9E9;
        font-size: 0.9em;
        width: 100%;
        outline: none;
        padding: 0.5em 1em;
        color: #999;
        margin-top: 0.5em;
        font-family: 'Muli-Regular';
      }
      .imagePreview {
        width: 92%;
        height: 140px;
        background-position: center center;
        background-color: #fff;
        background-size: cover;
        background-repeat: no-repeat;
        display: inline-block;
        box-shadow: 0 -3px 6px 2px rgba(0,0,0,.2);
            box-shadow: inset 0 0 22px #cfa966, 0 0 6px #132043;
            /* margin-right: 24px; */
      }
      .alert{
          color: #fff!important;
    background-color: #132043;
    border-color: #d3a558;
    text-transform: uppercase;
    font-size: 17px;
      }
      .alert span{
        color:#fff!important;
        text-transform: uppercase;
        font-size: 17px;

      }
      li{
          text-align:justify;
      }
       ::placeholder{
          color:#cfcccc;
      }
    </style>
    
   </head>
   <body>
     
            <!--================================-->
            <!-- Sidebar Menu Start -->
            <!--================================-->
          <?php include "navbar.php"; ?>
          
       <style> 
         #barcodeInput {
            width: 300px;
            padding: 10px;
            border: 1px solid #ccc;
        }
        
        .error-message {
            color: red;
            display: none; 
        }
    </style>

         
            <div class="page-inner">
                
                
               <!--================================-->
               <!-- Main Wrapper Start -->
               <!--================================-->
               <div id="main-wrapper">
                   
                  <!--================================-->
                  <!-- Breadcrumb Start -->
                  <!--================================-->
                  <div class="pageheader pd-t-25 pd-b-35">
                      
                  
                    
                    
                     <div class="breadcrumb pd-0 mg-0">
                        <a class="breadcrumb-item" href="index.html"><i class="icon ion-ios-home-outline"></i> Home</a>
                        <!--<a class="breadcrumb-item" href="#">Tables</a>-->
                        <span class="breadcrumb-item active">issu_Book</span>
                       
                     </div>
                  </div>
                  <!--/ Breadcrumb End -->
          
                <?php
                
                $enrollment = $_GET['enrollment'];
                

               $sql = "SELECT * FROM `book_issue` where enrollment='$enrollment' and (return_date is null or return_date = '')";
               $query = mysqli_query($connection, $sql);
               $count = mysqli_num_rows($query);
               if($count <2){
                ?>
<form action="book_issue_submit.php" method="post" enctype="multipart/form-data">
    
    enrolment:
    <input type="text" name="enrolment"  class="form-control" readonly  value="<?=$enrollment?>">
    <br>
    
    <input type="text" id="barcode" name="bookcode" autocomplete="off" class="form-control">

    <div id="subject">Subject will appear here</div>
    
    <br>
   <input type="submit" name="submit" id="" value="submit" class="btn btn-primary">

</form>

<script>
        document.getElementById("barcode").addEventListener("input", function () {
            var barcode = this.value;

            if (barcode.length > 0) {
               var xhr = new XMLHttpRequest();
                  xhr.open("POST", "fetch_subject1.php", true);
                  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                  xhr.onreadystatechange = function () {
                     if (xhr.readyState === 4 && xhr.status === 200) {
                        document.getElementById("subject").innerHTML = xhr.responseText;
                     }
                  };

xhr.send("barcode=" + encodeURIComponent(barcode));

            } else {
                document.getElementById("subject").innerText = "Subject will appear here";
            }
        });
    </script>
<?php
               }
               else{
                  ?>
               <h3 style="color:red"> Alreday 2 book Issued</h3>
                  <?php
               }
               ?>
             
    
    
    

<div class="col-sm-6">
                                       <div class="form-group ft-right">
                                          <input id="foo-search" type="text" placeholder="Search" class="form-control" autocomplete="off">
                                       </div>
                                    </div>
                                
                              <table id="foo-filtering" class="table table-bordered table-hover toggle-circle" data-page-size="50">
                                 <thead>
                        <tr>
                          <th>Slno</th>
                          
                           <th>
                            student Name
                          </th>
                          <th>
                            enrollment
                          </th>
                          <th>
                            book name
                          </th>
                          <th>barcode</th>
                          <th>issue date</th>
                         
                          
                          <th>Current fine</th>
                          <th>Previous Dues</th>
                           <th>Return date</th>
                           <th>Received <br>payment</th>
                        </tr>
                      </thead>
                                 <tbody>
                                    <?php
                                    $a = 1;
                                    $f = 0;
                                    $pf=0;
                                    $fine=0;
                        $enrollment = $_GET['enrollment'];
                        $sql=$connection->prepare("SELECT * FROM `book_issue` where enrollment = ? order by id desc");
                        $sql->bind_param('s', $enrollment);
                        $sql->execute();
                        $result=$sql->get_result();
                        while($row=$result->fetch_array())
                            { 
                        $enrollmet = $row['enrollment'];
                        
                        $sql1 = "select * from admission where enrollment = '$enrollment'";
                        $query1 = mysqli_query($connection , $sql1);
                        $row1 = mysqli_fetch_array($query1);
                       
                             
                         $book_barcode =$row['book_barcode'];
                          $sql2 ="select * from books where barcode='$book_barcode'";
                         $query2 = mysqli_query($connection, $sql2);
                         $row2 = mysqli_fetch_array($query2);


                         ?>
                         
                     
                            <th><?=$a++;?></th>
                          
                          <td class="py-1">
                            <?=$row1['name_student']?>
                          </td>  
                          <td>
                            <?=$enrollmet?>
                          </td>
                              <td><?=$row2['subject'];?>
                              <br><?=$row2['author']; ?>
                           </td>
                              <td>
                           <?=$row['book_barcode']?>
                          </td>
                          <td>
                           <?=$row['entry_date']?>
                          </td>
                          
                          
                           <td>
                             <?php
                              if($row['return_date']==''){
$date1 = date_create($row['entry_date']);
$date2 = date_create(date('Y-m-d'));
$diff = date_diff($date1, $date2);
 $d = $diff->format('%a'); // Output: +364 days
 if($d> 10){
$fine = ($d -10)*10;
echo $fine;
 }
 $f = $f + $fine;
                              }
?>
                           </td>

                           <td>
                             <?=$row['duesfine'];
                              ?>
                              <?php
                                 $pf = $pf + $row['duesfine'] - $row['paynow'];
                              ?>
                           </td>

                             <td>
                           <?=$row['return_date']?>

                           <?php
                                if($row['return_date']==''){
                                    ?>
<form method="post" action="book_return.php">

<input type="hidden" name="totalfine"  value="<?=$pf?>">
<input type="hidden" name="id"  value="<?=$row['id']?>">
<input type="hidden" name="enrollment"  value="<?=$enrollment?>">
<input type="submit" name="Return" id="">
</form>

                                    <!-- <a href="book_return.php?id=<?=$row['id']?>&enrollment=<?=$enrollment?>">Return</a> -->
                                    <?php
                                }
                           ?>
                          </td>
                          <td>
                                <?=$row['paynow']?>
                          </td>
                        </tr>
                        
                        <?php
                          }
                        ?>
                       
                                 </tbody>
                                 <tfoot>
                                    <tr>
                                       <td colspan="5">
                                          <div class="ft-right">
                                             <ul class="pagination"></ul>
                                          </div>
                                       </td>
                                    </tr>
                                 </tfoot>
                              </table>
                              <table style="width:100%">

                                 <?php
       $p = 0;
       $id = $_GET['enrollment'];
         $sql11 = "select * from finaclear where enrollment = '$enrollment'";
         $query11 = mysqli_query($connection , $sql11);
         if(mysqli_num_rows($query11)>0){
           while( $row11 = mysqli_fetch_array($query11)){
            ?>
       <tr>
         <td>

            <?= $row11['paynow']?>
         </td>
         <td>
            <?=$row11['date']?>

         </td>
       </tr>
      
       <?php
       $p = $p+ $row11['paynow'];
            }
         }
            ?> 
            </table>
        <h2>Previous Dues: <?=$x = $pf -$p?></h2>                  
        <h2>Current Fine : <?=$f;?></h2>
        <h2>Total Fine : <?=$f+$x;?></h2>   
    
   
<form method="post" action="totalfine.php">
   <input type="hidden" name="enrollment" value="<?=$enrollment?>">
   <input type="hidden" name="fine" value="<?=$f+$pf;?>">
   <input type="submit" value="Pay Fine" name="submit" class="btn btn-warning">
</form>

    
               
               </div>
               <!--/ Main Wrapper End -->
            </div>


 


    <?php include "footer.php"; ?>
    <script>
       // Row Toggler
       $('#foo-row-toggler').footable();

       // Accordion
       $('#foo-accordion').footable().on('footable_row_expanded', function(e) {
        $('#foo-accordion tbody tr.footable-detail-show').not(e.row).each(function() {
          $('#foo-accordion').data('footable').toggleDetail(this);
        });
       });
       // Filtering
       var filtering = $('#foo-filtering');
       filtering.footable().on('footable_filtering', function (e) {
        var selected = $('#foo-filter-status').find(':selected').val();
        e.filter += (e.filter && e.filter.length > 0) ? ' ' + selected : selected;
        e.clear = !e.filter;
       });

       // Filter status
       $('#foo-filter-status').change(function (e) {
        e.preventDefault();
        filtering.trigger('footable_filter', {filter: $(this).val()});
       });

       // Search input
       $('#foo-search').on('input', function (e) {
         
        e.preventDefault();
        filtering.trigger('footable_filter', {filter: $(this).val()});
        
       });

    </script>
   </body>
</html>
<?php
}
else{

header('Location:index.php');
}
 ?>

                                    


