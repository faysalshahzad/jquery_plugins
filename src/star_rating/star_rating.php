<?php
    
    require_once 'settings.php';
    
    $id = $_GET['id'];
    $whatToDo = $_GET['do'];
    
    try {
        $connection = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser, $dbpass);
        $connection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    } catch (PDOException $e) {
        echo 'ERROR: '. $e->getMessage();
    }


    if($whatToDo = 'update')
    {
        update($id);
    }
    else {
        show($id);
    }
    
       
    function update($connection) {
    
        $statement = $connection -> prepare('SELECT rating_count, avg_rating FROM product_rating WHERE id= :id');
        $statement -> bindParam(':id', $id);
        $statement -> execute();
        
        $result = $statement -> fetch(); // only one rows will be returned if multiple rows then use fetchAll()
        
        echo $result["rating_count"]." ". $result["avg_rating"];    
        
    }
    
    function show($connection) {
        $statement = $connection -> prepare('SELECT rating_count, avg_rating FROM product_rating WHERE id= :id');
        $statement -> bindParam(':id', $id);
        $statement -> execute();
        
        $result = $statement -> fetch(); // only one rows will be returned if multiple rows then use fetchAll()
        
        echo $result["rating_count"]." ". $result["avg_rating"];
    }
    
//     
    // $query = "SELECT rating_count, avg_rating FROM  product_rating WHERE id='$id'";
    // $result = mysql_query();
    
    $conn = null;	   
   
?>