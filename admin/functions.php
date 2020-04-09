<?php

function confirmQuery($query) {
  global $connection;
  if(!$query) {
    die('QUERY FAILED!' . mysqli_error($connection));
  }
}

function insert_categories() {

  global $connection;

  if(isset($_POST['submit'])) {
    $cat_title = $_POST['cat_title'];

    if($cat_title == "" || empty($cat_title)) {                            
      echo "<span style='color:red;'>This field is required</span>";
    } else {

      $query = "INSERT INTO categories(cat_title) VALUES ('{$cat_title}') ";
      $create_categories_query = mysqli_query($connection, $query);
      header('Location: categories.php');

      confirmQuery($create_categories_query);
    }
  } 
}

// FIND ALL CATEGORIES QUERY
function find_all_categories(){
  
  global $connection;
  
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
}

// DELETE CATEGORIES QUERY
function delete_categories(){
  
  global $connection;
  
  if(isset($_GET['delete'])){
    $the_cat_id = $_GET['delete'];
    $query = "DELETE FROM categories WHERE cat_id = '{$the_cat_id}' ";
    
    $delete_query = mysqli_query($connection, $query);
    
    header('Location: categories.php');
    
  }
}

// FIND ALL POSTS QUERY
function find_all_posts(){

    global $connection;
    
    $query = "SELECT * FROM posts";
    $select_posts = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_posts)){

      $post_id = $row['post_id'];
      $post_title = $row['post_title'];
      $post_author = $row['post_author'];
      $post_category_id = $row['post_category_id'];
      $post_status = $row['post_status'];
      $post_image = $row['post_image'];
      $post_tags = $row['post_tags'];
      $post_content = $row['post_content'];
      /* $post_comments = $row['post_comments']; */
      $post_date = $row['post_date'];
    
      $post_content = substr($post_content, 0, 30);

      echo "<tr>";
      echo "<td>{$post_id}</td>";
      echo "<td>{$post_author}</td>";
      echo "<td>{$post_title}</td>";
      echo "<td>{$post_category_id}</td>";
      echo "<td>{$post_status}</td>";
      echo "<td><img width='100px' class='img-responsive' src='../images/{$post_image}' alt='image'></td>";
      echo "<td>{$post_tags}</td>";
      echo "<td>{$post_content}...</td>";
      /* echo "<td>{$post_comments}</td>"; */
      echo "<td>{$post_date}</td>";
      echo "<td><a style='font-size:20px' href='posts.php?delete={$post_id}'><i class='fa fa-trash-o' ></i></a>";
      echo "<td><a style='font-size:20px'href='posts.php?source=update_post&p_id={$post_id}'><i class='fa fa-pencil' ></i></a>";
      echo "</tr>";
  }
}

// DELETE POSTS QUERY
function delete_posts(){

  global $connection;

  if(isset($_GET['delete'])){
    $post_id = $_GET['delete'];
    $query = "DELETE FROM posts WHERE post_id = '{$post_id}' ";

    $delete_query = mysqli_query($connection, $query);

    confirmQuery($delete_query);

    header('Location: posts.php');

  }
}



?>