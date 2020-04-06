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

          <table class="table">
            <thead>
              <tr>
                <th>Id</th>
                <th>Author</th>
                <th>Title</th>
                <th>Category</th>
                <th>Image</th>
                <th>Tags</th>
                <th>Comments</th>
                <th>Date</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>

                    <?php
                    // FIND ALL POSTS QUERY
                    find_all_posts();
                    ?>

                    <?php 
                    // DELETE CATEGORIES QUERY
                    delete_posts();
                    ?>

                </tbody>
          </table>


        </div>
      </div>
    </div><!-- /.row -->   
  </div><!-- /.container-fluid -->
</div><!-- /#page-wrapper -->
<?php include "includes/admin_footer.php" ?>