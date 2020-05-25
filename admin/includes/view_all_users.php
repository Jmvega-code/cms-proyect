<table class="table">
  <thead>
    <tr>
      <th>Id</th>
      <th>Username</th>
      <th>Password</th>
      <th>Firstname</th>
      <th>Lastname</th>
      <th>Email</th>
      <th>Image</th>
      <th>Role</th>
      <th>Date</th>
      <th>Delete</th>
      <th>Edit</th>
    </tr>
  </thead>
  <tbody>

          <?php
          // FIND ALL COMMENTS QUERY
          $query = "SELECT * FROM users";
          $select_users = mysqli_query($connection, $query);
      
          while($row = mysqli_fetch_assoc($select_users)){
      
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_password = $row['user_password'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
            $user_role = $row['user_role'];
            $user_date = $row['user_date'];

      
            echo "<tr>";
            echo "<td>{$user_id}</td>";
            echo "<td>{$username}</td>";
            echo "<td>{$user_password}</td>";
            echo "<td>{$user_firstname}</td>";
            echo "<td>{$user_lastname}</td>";
            echo "<td>{$user_email}</td>";
      
/*               $query = "SELECT * FROM posts WHERE post_id = '{$comment_post_id}' ";
              $select_post_id = mysqli_query($connection, $query);
              
              while($row = mysqli_fetch_assoc($select_post_id)){
                
                  $post_id = $row['post_id'];
                  $post_title = $row['post_title'];
              }  */
      
            echo "<td>{$user_image}</td>";
            echo "<td>{$user_role}</td>";
            echo "<td>{$user_date}</td>";

            echo "<td><a style='font-size:20px' href='users.php?delete=$user_id'><i class='fa fa-trash-o' ></i></a>";
            echo "<td><a style='font-size:20px'href='users.php?source=update_post&p_id={$user_id}'><i class='fa fa-pencil' ></i></a>";
            echo "</tr>";
        }
          ?>

          <?php 

          // DELETE CATEGORIES QUERY
          delete_users();
          ?>

      </tbody>
</table>