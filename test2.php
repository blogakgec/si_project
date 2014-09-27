<?php
    include 'includes/connection.php';
    $search = $_POST['search'];
    $query ="SELECT * FROM profile WHERE full_name LIKE '%{$search}%' ";
    $query_result= mysqli_query($con,$query);
    if(mysqli_num_rows($query_result) == 0)
    {
        echo "no matches found";
    }
    else
    {
        echo "results are-";
        
       while($query_row = mysqli_fetch_array($query_result,MYSQLI_ASSOC))
       {
           
        echo "<br>";
        echo "<br>";
         
        echo '<img height="100px" width="100px" src="data:image/jpeg;base64,'.base64_encode( $query_row['image'] ).'"/>';
           echo "<a href=\"theme2.php?id=".$query_row['user_id']." \">'{$query_row['full_name']}'</a>";
           echo "----";
           echo $query_row['city'];
           
           echo "<hr>";
       }
    }

?>
