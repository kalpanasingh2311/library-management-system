<?php
if(!isset($_SESSION))
{
    session_start();
}
if(isset($_SESSION['library']))


{
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
                        <span class="breadcrumb-item active">Add Book</span>
                       
                     </div>
                  </div>
                  <!--/ Breadcrumb End -->
          <?php
          date_default_timezone_set("Asia/Calcutta"); 
          $id = $_POST['id'];
  $enrollment = $_POST['enrollment'];
                        $sql=$connection->prepare("SELECT * FROM `book_issue` where enrollment = ? and id = '$id'");
                        $sql->bind_param('s', $enrollment);
                        $sql->execute();
                        $result=$sql->get_result();
                        while($row=$result->fetch_array())


 if($row['return_date']==''){
 $date1 = date_create($row['entry_date']);
$date2 = date_create(date('Y-m-d'));

$diff = date_diff($date1, $date2);
 $d = $diff->format('%a');
 if($d> 10){
$fine = ($d -10)*10;

 }
 else{
   $fine = 0;
 }

                              }
?>
                    
<form  method="post" enctype="multipart/form-data">
   <div <?php if($fine == 0){ ?> style="display:none;" <?php } ?>>

      total fine:
      <input type="number" name="totalfine"  readonly class="form-control"  value="<?=$fine?>">
      <br>
      paidfine:
      <input type="number" name="payfine"  class="form-control"  value="0">
      
      <input type="hidden" name="id"  value="<?=$id?>">
      <input type="hidden" name="enrollment"  value="<?=$enrollment?>">
   </div>
    
     <br>
   <input type="submit" name="submit" id="" value="submit" class="btn btn-primary">

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
if(isset($_POST['submit'])){

$totalfine = $_POST['totalfine'];
$payfine = $_POST['payfine'];
$duesfine = $totalfine - $payfine;
$id = $_POST['id'];
$enrollment = $_POST['enrollment'];
$date = date('Y-m-d');
 echo $sql = "update book_issue set return_date = '$date', totalfine = '$totalfine', paynow = '$payfine', duesfine = '$duesfine' where id = '$id'";
$query = mysqli_query($connection, $sql);
if($sql){
 ?>     
  <script> 
  alert("book return Successfully");
  window.location.href = "book_issue.php?enrollment=<?=$enrollment?>";
  </script>
 <?php 

    
}

}

}
else{

header('Location:index.php');
}
 ?>