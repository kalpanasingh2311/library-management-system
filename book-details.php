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
          
          
         

            <!-- Page Inner Start -->
            <!--================================-->
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
                        <span class="breadcrumb-item active">Edit Book Details</span>
                       
                     </div>
                  </div>
                  <!--/ Breadcrumb End -->
          <?php
          $id = $_GET['id'];
          // $sql = "select * from books where id = '$id'";
          // $query = mysqli_query($connection, $sql);
          // $row = mysqli_fetch_array($query);
          
          $sql = $connection->prepare("SELECT * FROM books WHERE id = ?");
          $sql->bind_param("i", $id);
          $sql->execute();
          $result = $sql->get_result();
      

          $row = $result->fetch_array();
        
          ?>
               
               <form id="bookForm" method="post" action="update-books.php">
        <label>Barcode: </label><input type="text" name="barcode" class="form-control" id="barcode"  value="<?=$row['barcode']?>" required readonly><br>
        <label>Subject: </label><input type="text" name="subject" class="form-control" id="subject" value="<?=$row['subject']?>"  required><br>
        <label>Author: </label><input type="text" name="author" class="form-control" id="author"  value="<?=$row['author']?>" required><br>
              <label>Publisher: </label><input type="text" name="publisher" class="form-control" id="publisher"  value="<?=$row['publisher']?>" required><br>
        <label>Edition: </label><input type="text" name="edition" class="form-control" id="edition" value="<?=$row['edition']?>"  required><br>
        <input type="submit" class="btn btn-primary" value="Update">
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
