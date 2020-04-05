<?php include "includes/admin_header.php" ?>
<?php include "functions.php" ?>
<?php ob_start(); ?>






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
            // INSERT CATEGORIES QUERY
            insert_categories(); 
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

            <?php 
            // UPDATE AND INCLUDE QUERY
            include "includes/update_categories.php" 
            ?>

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
                    // FIND ALL CATEGORIES QUERY
                    find_all_categories();
                    ?>

                    <?php 
                    // DELETE CATEGORIES QUERY
                    delete_categories();
                    ?>

                </tbody>
              </table>
            </div>
      </div>
    </div><!-- /.row -->   
  </div><!-- /.container-fluid -->
</div><!-- /#page-wrapper -->
<?php include "includes/admin_footer.php" ?>