 <!--================================-->
      <!-- Page Container Start -->
      <!--================================-->
			<div class="page-container">
         <!--================================-->
         <!-- Page Sidebar Start -->
         <!--================================-->
         <div class="page-sidebar">
            <div class="logo">
               <a class="logo-img" href="index.html">
               <img class="desktop-logo" src="../img/logo.png" alt="">
               <img class="small-logo" src="../img/logo.png" alt=""> AIU
               </a>
               <i class="ion-ios-close-empty" id="sidebar-toggle-button-close"></i>
            </div>

<div class="page-sidebar-inner">
   <div class="page-sidebar-menu">
      <ul class="accordion-menu">
         <li>
            <a href="add_book.php"><i data-feather="mail"></i>
            <span>Add Book</span></a>

         </li>

          <li>
            <a href="book_list.php"><i data-feather="mail"></i>
            <span>Book List</span></a>

         </li>
         <li>
            <a href="add_student.php"><i data-feather="mail"></i> Add Student</a>
         </li>

          <li>
         <a href="student_list.php"><i data-feather="mail"></i>
         <span>Student List</span></a>

         </li>
         
   
         


      </ul>
   </div>
</div>


         </div>
         <!--/ Page Sidebar End -->
         <!--================================-->
         <!-- Page Content Start -->
         <!--================================-->
         <div class="page-content">
            <!--================================-->
            <!-- Page Header Start -->
            <!--================================-->
            <div class="page-header">

               <!--================================-->
               <!-- Page Header  Start -->
               <!--================================-->
               <nav class="navbar navbar-expand-lg">
                  <ul class="list-inline list-unstyled mg-r-20">
                     <!-- Mobile Toggle and Logo -->
                     <li class="list-inline-item align-text-top"><a class="hidden-md hidden-lg" href="#" id="sidebar-toggle-button"><i class="ion-navicon tx-20"></i></a></li>
                     <!-- PC Toggle and Logo -->
                     <li class="list-inline-item align-text-top"><a class="hidden-xs hidden-sm" href="#" id="collapsed-sidebar-toggle-button"><i class="ion-navicon tx-20"></i></a></li>
                  </ul>

                  <div class="collapse navbar-collapse">
                     <ul class="navbar-nav mr-auto">
                        <!-- Features -->
                        <li class="dropdown mega-dropdown mg-t-5">

                        </li>
                        <!-- Technology -->
                        <li class="dropdown mega-dropdown mg-t-5">


                        </li>
                        <!-- Ecommerce -->
                        <li class="dropdown mega-dropdown mg-t-5">

                        </li>
                     </ul>
                  </div>

                  <div class="header-right pull-right">
                     <ul class="list-inline justify-content-end">
                        <!--    <li class="list-inline-item dropdown hidden-xs">-->
                        <!--   <a class="notification-icon" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                        <!--   <i class="icon-bell tx-16"></i>-->
                        <!--   <span class="notification-count wave in"></span>-->
                        <!--   </a>-->
                        <!--   <div class="dropdown-menu dropdown-menu-right shadow-2">-->
                              <!-- Top Notifications Area -->
                        <!--      <div class="top-notifications-area">-->
                                 <!-- Heading -->
                        <!--         <div class="notifications-heading">-->
                        <!--            <div class="heading-title">-->
                        <!--               <h6>Notifications</h6>-->
                        <!--            </div>-->
                        <!--            <span>5+ New Notifications</span>-->
                        <!--         </div>-->

                        <!--         <div class="notifications-footer">-->
                        <!--            <a href="">View all Notifications</a>-->
                        <!--         </div>-->
                        <!--      </div>-->
                        <!--   </div>-->
                        <!--</li>-->
                        <!--/ Notifications Dropdown End -->
                        <!--================================-->
                        <!-- Messages Dropdown Start -->
                        <!--================================-->
                        <!--<li class="list-inline-item dropdown hidden-xs">-->
                        <!--   <a class="message-icon" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                        <!--   <i class="icon-envelope tx-16"></i>-->
                        <!--   <span class="messages-count wave in"></span>-->
                        <!--   </a>-->
                        <!--   <div class="dropdown-menu dropdown-menu-right shadow-2">-->
                        <!--      <div class="top-message-area">-->
                        <!--         <div class="top-message-heading">-->
                        <!--            <div class="heading-title">-->
                        <!--               <h6>Messages</h6>-->
                        <!--            </div>-->
                        <!--            <span>5+ New Messages</span>-->
                        <!--         </div>-->

                        <!--         <div class="top-message-footer">-->
                        <!--            <a href="">View all Messages</a>-->
                        <!--         </div>-->
                        <!--      </div>-->
                        <!--   </div>-->
                        <!--</li>-->
                        <!--/ Messages Dropdown End -->
                        <!--================================-->
                        <!-- Profile Dropdown Start -->
                        <!--================================-->
                        <li class="list-inline-item dropdown">
                           <a  href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               <?php


                               ?>


                           <span class="select-profile">Hi,  <?=$_SESSION['library']?>!</span>
                           <img src="../img/logo.png" class="img-fluid wd-35 ht-35 rounded-circle" alt="">
                           </a>
                           <div class="dropdown-menu dropdown-menu-right dropdown-profile shadow-2">
                              <div class="user-profile-area">

                                 <a href="change-password.php" class="dropdown-item"><i class="icon-user" aria-hidden="true"></i> Change Password</a>
                                 <a href="logout.php" class="dropdown-item"><i class="icon-power" aria-hidden="true"></i> Sign-out</a>
                              </div>
                           </div>
                        </li>
                        <!-- Profile Dropdown End -->
                        <!--================================-->
                        <!-- Setting Sidebar Start -->
                        <!--================================-->

                        <!--/ Setting Sidebar End -->
                     </ul>
                  </div>
                  <!--/ Header Right End -->
               </nav>
            </div>
            <!--/ Page Header End -->
            <!--================================-->
