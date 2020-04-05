<?php include "includes/admin_header.php" ?>




    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to the Admin Page
                            <small>Author</small>
                        </h1>

                        <div class="col-xs-6">


                          <?php 

                            if(isset($_POST['submit'])) {
                              $cat_title = $_POST['cat_title'];
                            
                              if($cat_title == "" || empty($cat_title)) {                            
                                echo "<span style='color:red;'>This field is required</span>";
                              } else {

                                $query = "INSERT INTO categories(cat_title) VALUES ('{$cat_title}') ";
                                $create_categories_query = mysqli_query($connection, $query);
                                header('Location: categories.php');

                                if(!$create_categories_query) {
                                  die('QUERY FAILED!' . mysqli_error($connection));
                                }
                              }
                            }  
                          ?>


                          <form action="" method="POST">
                            <div class="form-group">
                              <label for="cat-title">Category</label>
                              <input class="form-control" type="text" name="cat_title" id="">
                            </div>
                            <div class="form-group">
                              <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>
                          </form><!--Add Category Form-->

                        
                          <?php include "includes/update_categories.php" ?>


                        </div> <!--Update Category Form-->
                        
                        <div class="col-xs-6">
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                <th>Id</th>
                                <th>Category Title</th>
                                <th>Delete</th>
                                <th>Update</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php

                                  $query = "SELECT * FROM categories";
                                  $select_categories = mysqli_query($connection, $query);

                                  while($row = mysqli_fetch_assoc($select_categories)){

                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];

                                    echo "<tr>";
                                    echo "<td>{$cat_id}</td>";
                                    echo "<td>{$cat_title}</td>";
                                    echo "<td><a style='font-size:20px'href='categories.php?delete={$cat_id}'><i class='fa fa-trash-o' ></i></a>";
                                    echo "<td><a style='font-size:20px'href='categories.php?edit={$cat_id}'><i class='fa fa-pencil' ></i></a>";
                                    echo "</tr>";
                                  }

                                ?>

                          <?php 

                            if(isset($_GET['delete'])){

                              $the_cat_id = $_GET['delete'];

                              $query = "DELETE FROM categories WHERE cat_id = '{$the_cat_id}' ";

                              $delete_query = mysqli_query($connection, $query);

                              header('Location: categories.php');



                            }
  
                
                          ?>



                            </tbody>
                          </table>
                        </div>




                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

        <?php include "includes/admin_footer.php" ?>