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

                        
                    //     $result_set = User::find_all_users();
                            
                    //         foreach ($result_set AS $result){

                    //         echo $result["username"]."<br/>";
                    // }
                        

                        $found_user = User::find_users_by_id(3);

                            echo $found_user['first_name'];


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