<table class="table">
  <thead>
    <tr>
      <th>Id</th>
      <th>Author</th>
      <th>Title</th>
      <th>Category</th>
      <th>Status</th>
      <th>Image</th>
      <th>Tags</th>
      <th>Comments</th>
      <th>Date</th>
      <th>Delete</th>
      <th>Edit</th>
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