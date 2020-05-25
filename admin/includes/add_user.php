
<?php  


if(isset($_POST['create_user'])) {

  global $connection;
  
    $username = $_POST['username'];
    $user_password = $_POST['user_password'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];

    $user_image = $_FILES['user_image']['name'];
    $user_image_temp = $_FILES['user_image']['tmp_name'];

    $user_role = $_POST['user_role'];
    $user_date = date('d-m-y');
    $randSalt = 'NADA';
    

    move_uploaded_file($user_image_temp, "../user_images/$user_image");

    $query = "INSERT INTO users(username, user_password, user_firstname, user_lastname, user_email, user_image, user_role, user_date, randSalt) VALUES ('{$username}', '{$user_password}', '{$user_firstname}', '{$user_lastname}', '{$user_email}', '{$user_image}', '{$user_role}', now(), '{$randSalt}' )";

    $create_user_query = mysqli_query($connection, $query);

    confirmQuery($create_user_query);

    header('Location: users.php'); 

  }

?>

<form action="" method="post" enctype="multipart/form-data">

  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" name="username">
  </div>
  
  <div class="form-group">
    <label for="user_password">Password</label>
    <input type="password" class="form-control" name="user_password">
    
  </div>

  <div class="form-group">
    <label for="user_firstname">Firstname</label>
    <input type="text" class="form-control" name="user_firstname">
  </div>

  <div class="form-group">
    <label for="user_lastname">Lastname</label>
    <input type="text" class="form-control" name="user_lastname">
  </div>

  <div class="form-group">
    <label for="user_email">User Email</label>
    <input type="text" class="form-control" name="user_email">
  </div>

  <div class="form-group">
    <label for="user_image">User Image</label>
    <input type="file" class="form-control" name="user_image">
  </div>

  <div class="form-group">
    <label for="post_tags">Role</label>
    <input type="text" class="form-control" name="user_role">
  </div>



  <div class="form-group">
    <input type="submit" class="btn btn-primary" name="create_user" value="Create User">
  </div>

</form>