<?php 
    include ("init.php");
 ?> 

 <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin
                            <small>Subheading</small>
                        </h1>

                        <?php

                        #Test query($sql) 

                        $found_user = User::find_users_by_id(2);

                        echo $found_user->last_name;
                    
                    

                        // $found_user = User::find_users_by_id(2);

                        // $user = User::instantiation($found_user);

                        // echo $user->first_name;

                        // $users = User::find_all_users();

                        // foreach ($users as $user) {
                            
                        //     echo $user->first_name;
                        //     echo "<br />";
                        // }

                         ?>

                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->