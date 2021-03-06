<table class="table">
  <thead>
    <tr>
      <th>Id</th>
      <th>Author</th>
      <th>Content</th>
      <th>Email</th>
      <th>Status</th>
      <th>In Response to</th>
      <th>Date</th>
      <th>Approve</th>
      <th>Unapprove</th>
      <th>Delete</th>
      <th>Edit</th>
    </tr>
  </thead>
  <tbody>

          <?php
          // FIND ALL COMMENTS QUERY
          $query = "SELECT * FROM comments";
          $select_comments = mysqli_query($connection, $query);
      
          while($row = mysqli_fetch_assoc($select_comments)){
      
            $comment_id = $row['comment_id'];
            $comment_author = $row['comment_author'];
            $comment_content = $row['comment_content'];
            $comment_email = $row['comment_email'];
            $comment_status = $row['comment_status'];
            $comment_post_id = $row['comment_post_id'];
            $comment_date = $row['comment_date'];
          
            $comment_content = substr($comment_content, 0, 30);
      
            echo "<tr>";
            echo "<td>{$comment_id}</td>";
            echo "<td>{$comment_author}</td>";
            echo "<td>{$comment_content}</td>";
            echo "<td>{$comment_email}</td>";
            echo "<td>{$comment_status}</td>";
      
              $query = "SELECT * FROM posts WHERE post_id = '{$comment_post_id}' ";
              $select_post_id = mysqli_query($connection, $query);
              
              while($row = mysqli_fetch_assoc($select_post_id)){
                
                  $post_id = $row['post_id'];
                  $post_title = $row['post_title'];
              } 
      
            echo "<td><a href='../post.php?p_id=$post_id'>{$post_title}</a></td>";
            echo "<td>{$comment_date}</td>";
            echo "<td><a style='font-size:20px' href='comments.php?approve=$comment_id'><i class='fa fa-thumbs-o-up' aria-hidden='true' ></i></a>";
            echo "<td><a style='font-size:20px' href='comments.php?unapprove=$comment_id'><i class='fa fa-thumbs-o-down' aria-hidden='true' ></i></a>";
            echo "<td><a style='font-size:20px' href='comments.php?delete=$comment_id'><i class='fa fa-trash-o' ></i></a>";
            echo "<td><a style='font-size:20px'href='comments.php?source=update_post&p_id={$comment_id}'><i class='fa fa-pencil' ></i></a>";
            echo "</tr>";
        }
          ?>

          <?php 

          if(isset($_GET['unapprove'])){
            $comment_id = $_GET['unapprove'];
            $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = '{$comment_id}' ";

            $unapprove_query = mysqli_query($connection, $query);

            confirmQuery($unapprove_query);

            header("Location: comments.php");

          }
          if(isset($_GET['approve'])){
            $comment_id = $_GET['approve'];
            $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = '{$comment_id}' ";

            $approve_query = mysqli_query($connection, $query);

            confirmQuery($approve_query);

            header("Location: comments.php");

          }

          // DELETE CATEGORIES QUERY
          delete_comments();
          ?>

      </tbody>
</table>