    <?php 
    
    if(isset($_POST['submit'])){
        $search = $_POST['search'];
    };    

    $query = "SELECT * FROM posts WHERE post_title LIKE '%$search%'";

    $search_query = mysqli_query($connection, $query);

    $row = mysqli_fetch_assoc($search_query);
    
    if(!$search_query){
        die('QUERY FAILED' . mysqli_error($connection));
    }
    
    $count = mysqli_num_rows($search_query);
    if($count === 0) {
      echo "NO RESULTS";
    }
    else{

        echo $row['post_title'];
    }


?>

