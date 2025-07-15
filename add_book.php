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
        /* Style for the search input and suggestion list */
        /*#authorInput {*/
            /*width: 300px;*/
        /*    padding: 10px;*/
        /*    border: 1px solid #ccc;*/
        /*}*/

        /*#authorList, #publisherList {*/
        /*    border: 1px solid #ccc;*/
        /*    max-height: 150px;*/
        /*    overflow-y: auto;*/
        /*    width: 300px;*/
        /*    background-color: white;*/
        /*    position: absolute;*/
        /*    z-index: 1;*/
        /*    display: none;*/
        /*}*/

        /*#authorList div, #publisherList div {*/
        /*    padding: 10px;*/
        /*    cursor: pointer;*/
        /*}*/

        /*#authorList div:hover, #publisherList div:hover {*/
        /*    background-color: #ddd;*/
        /*}*/
        
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
                        <span class="breadcrumb-item active">Add Book</span>
                       
                     </div>
                  </div>
                  <!--/ Breadcrumb End -->
          
               
             
    
     
    
    <script>
        $(document).ready(function(){
            // When typing in the input field
            $("#authorInput").keyup(function(){
                let query = $(this).val();
                console.log(query);
                if (query !== '') {
                    // Send the query to the backend for suggestions
                    $.ajax({
                        url: "fetch_authors.php", // PHP script to fetch data
                        method: "POST",
                        data: {query: query},
                        success: function(data) {
                            $("#authorList").fadeIn();
                            $("#authorList").html(data);
                        }
                    });
                } else {
                    $("#authorList").fadeOut();
                }
            });

            // When an author is clicked, set the value in the input field and hide the list
            $(document).on('click', '.aut', function(){
                $("#authorInput").val($(this).text());
                $("#authorList").fadeOut();
            });

           
        });
    </script>
     <script>
        $(document).ready(function(){
            // When typing in the input field
            $("#publisherInput").keyup(function(){
                let query = $(this).val();
             
                if (query !== '') {
                    // Send the query to the backend for suggestions
                    $.ajax({
                        url: "fetch_publisher.php", // PHP script to fetch data
                        method: "POST",
                        data: {query: query},
                        success: function(data) {
                            $("#publisherList").fadeIn();
                            $("#publisherList").html(data);
                        }
                    });
                } else {
                    $("#publisherList").fadeOut();
                }
            });

            // When an author is clicked, set the value in the input field and hide the list
            $(document).on('click', '.pub', function(){
                $("#publisherInput").val($(this).text());
                $("#publisherList").fadeOut();
            });

           
        });
    </script>
    
    <script>
        $(document).ready(function(){
            // When typing in the input field
            $("#subjectInput").keyup(function(){
                let query = $(this).val();
             
                if (query !== '') {
                    // Send the query to the backend for suggestions
                    $.ajax({
                        url: "fetch_subject.php", // PHP script to fetch data
                        method: "POST",
                        data: {query: query},
                        success: function(data) {
                            $("#subjectList").fadeIn();
                            $("#subjectList").html(data);
                        }
                    });
                } else {
                    $("#subjectList").fadeOut();
                }
            });

            // When an author is clicked, set the value in the input field and hide the list
            $(document).on('click', '.sub', function(){
                $("#subjectInput").val($(this).text());
                $("#subjectList").fadeOut();
            });

           
        });
    </script>
    
    
  

    <script>
        $(document).ready(function(){
            $("#barcodeInput").keyup(function(){
                let barcode = $(this).val();
                
                if (barcode !== '') {
                    // Send the barcode to the backend for existence check
                    $.ajax({
                        url: "check_barcode.php", // PHP script to check barcode
                        method: "POST",
                        data: {barcode: barcode},
                        success: function(data) {
                            if (data === 'exists') {
                                $("#barcodeError").fadeIn(); // Show error message
                            } else {
                                $("#barcodeError").fadeOut(); // Hide error message
                            }
                        }
                    });
                } else {
                    $("#barcodeError").fadeOut(); // Hide error message if input is empty
                }
            });
        });
    </script>
               
               <form id="bookForm">
        <label>Barcode: </label>
        <!--<input type="text"  id="barcode" required><br>-->
        
        
          <input type="text" id="barcodeInput" name="barcode" class="form-control" placeholder="Type barcode..." autocomplete="off">
    <div class="error-message" id="barcodeError">Barcode already exists!</div><br>
        
        <label>Subject: </label>
        <!--<input type="text" name="subject" class="form-control" id="subject" required><br>-->
         <input type="text" id="subjectInput"  name="subject" placeholder="Type Subject name..." autocomplete="off" class="form-control" required>
    <div id="subjectList"></div><br>
    
        <label>Author: </label>
        <!--<input type="text"  class="form-control" id="author" required><br>-->
        
         <input type="text" id="authorInput" name="author" placeholder="Type author name..." autocomplete="off" class="form-control" required>
    <div id="authorList"></div><br>
        
        <label>Publisher: </label>
        <!--<input type="text" name="publisher" class="form-control" id="publisher" required><br>-->
           <input type="text" id="publisherInput" name="publisher" placeholder="Type Publisher name..." autocomplete="off" class="form-control" required>
    <div id="publisherList"></div><br>
        
        <label>Edition: </label><input type="text" name="edition" class="form-control" id="edition" required><br>
        <input type="submit" class="btn btn-primary" value="Add Book">
    </form>
    
    
    
    
    
    <script>
        // Add book using AJAX
        $("#bookForm").on("submit", function(e) {
            e.preventDefault();
            $.ajax({
                url: "add_book_submit.php",
                type: "POST",
                data: $(this).serialize(),
                success: function(response) {
                    if (response === 'duplicate') {
                        alert("Barcode already exists!");
                    } else if (response === 'success') {
                        alert("Book added successfully!");
                        
                        $('#bookForm')[0].reset();
                    } else {
                        alert("Error adding book.");
                    }
                }
                   
                });
            });
        // });

        // Initial load
    </script>
    
               
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