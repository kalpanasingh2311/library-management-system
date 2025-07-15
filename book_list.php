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
                        <a class="breadcrumb-item" href="index.php"><i class="icon ion-ios-home-outline"></i> Home</a>
                        <!--<a class="breadcrumb-item" href="#">Tables</a>-->
                        <span class="breadcrumb-item active">Book List</span>
                     </div>
                  </div>
                  <!--/ Breadcrumb End -->
                  <div class="row row-xs clearfix">
                     
                     <div class="col-md-12 col-lg-12">
                        <div class="card mg-b-20">
                           <div class="card-header">
                              <h4 class="card-header-title">
                                 Book List
                              </h4>
                              <div class="card-header-btn">
                                 <a  href="#" data-toggle="collapse" class="btn card-collapse" data-target="#collapse3" aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
                                
                                 <a href="#" data-toggle="expand" class="btn card-expand"><i class="ion-android-expand"></i></a>
                                
                              </div>
                           </div>
                           <div class="card-body collapse show" id="collapse3">
                              <div class="row">
                                 <div class="mg-20 form-inline wd-100p">
                                    <div class="col-sm-6">
                                        <div class="form-group" style="display:none">
                                         
                                          <select id="foo-filter-status" class="form-control">
                                             <option value="">Show all</option>
                                            
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-sm-6">
                                       <div class="form-group ft-right">
                                          <input id="foo-search" type="text" placeholder="Search" class="form-control" autocomplete="off">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <table id="foo-filtering" class="table table-bordered table-hover toggle-circle" data-page-size="50">
                                 <thead>
                        <tr>
                          <th>Slno</th>
                          <th>
                            Barcode
                          </th>
                           <th>
                            Name
                          </th>
                          <th>
                            Author
                          </th>
                          <th>
                            Edition
                          </th>
                          <th>Publisher</th>
                          
                          <th></th>
                        </tr>
                      </thead>
                                 <tbody>
                                    <?php
                                    $a = 1;
                        
                        $sql=$connection->prepare("SELECT * FROM `books` order by id desc");
                        $sql->execute();
                        $result=$sql->get_result();
                        while($row=$result->fetch_array())
                             
                        {
                          ?>
                         
                        <tr>
                            <th><?=$a++;?></th>
                          
                          <td class="py-1">
                            <?=$row['barcode']?>
                          </td>  
                          <td>
                            <?=$row['subject']?>
                          </td>
                              <td>
                           <?=$row['author']?>
                          </td>
                          <td>
                           <?=$row['edition']?>
                          </td>
                            <td>
                           <?=$row['publisher']?>
                          </td>
                          
                         
                          <td>
                              <!-- <a href="book-details.php?id=<?=$row['id']?>"><i class="fa fa-eye"></i></a> -->
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
                           </div>
                        </div>
                     </div>
                     <!--/ Filtering FooTable End -->
                  </div>
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
