<?php
include ("konekt.php");
extract($_POST); 
if(isset($_POST["name"]) && isset($_POST['insertOp'])){

try {
    $sql = "INSERT INTO name_tbl (id, name, age , phone) values (NULL, '$name', '$age' , '$phone')";
    $conn->exec($sql);
} 
catch (Exception $e) {
    echo "error:". $e->getMessage() ."";
      }
}

if(isset($_POST['readOp'])){

    try {
        $sql = "SELECT * FROM name_tbl ORDER BY id desc LIMIT 100";
        $count=1; 
     ?>   
        <table id="myTable" class="display justify-content-start" style="width:100%; ">
        <thead>
            <tr >
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody >
        <?php 
       foreach ($conn->query($sql) as $row) {
        $row_id = $row["id"]; 
        $row_name = $row["name"];
        echo "<tr>";
        echo "<td>". ($count++) ."</td>" . "<td>". $row["name"]."</td>" . "<td>". $row["age"]."</td>" . "<td>". $row["phone"]."</td>"; 
        
        echo "<td>

        <button class='btn btn-primary btn-sm' id='editBtn' onclick='editIt($row_id);' >
         <i class='fa-solid fa-pen-to-square'></i> 
         </button>

        <button class='btn btn-danger btn-sm' id='dltBtn' onclick='deleteIt($row_id , \"$row_name\" );' >
         <i class='fa-solid fa-trash'></i>
          </button>
                 </td>";

        echo "</tr>";

       }
    }
    catch (Exception $e) {
        echo "error:". $e->getMessage() ."";
          }
    
?>
    </tbody>
       <tfoot>
           <tr>
               <th>ID</th>
               <th>Name</th>
               <th>Age</th>
               <th>Phone</th>
               <th>Action</th>
             
           </tr>
       </tfoot>
   </table>
      <?php
    } 

if(isset($_POST["deleteOp"]) && isset($_POST["deleteId"]) ){
    
    if(is_numeric($_POST["deleteId"])){
    try {
       $stmt =  $conn-> prepare(" DELETE FROM name_tbl WHERE id=?"); 
       $stmt->execute([$deleteId]); 
       $stmt = null; 
    } catch (Exception $e) { 
    echo "error:". $e->getMessage() ."";
    }
   }
}

if(isset($_POST["editOp"]) && isset($_POST["editId"])) {
    try {   
        $response = array(); 
       $stmt = $conn->prepare("SELECT * FROM name_tbl WHERE id=?");
       $stmt->execute([$editId]);
       $result = $stmt->fetchAll();
       if($result) {
            foreach($result as $row) {
                $response = $row ; 
            }
       }
       else {
        $response ['status'] = 200;
        $response['message'] = "data not found" ;  
       }
       $stmt = null;
       echo json_encode($response);

    }
    catch (Exception $e) {  
            echo $e-> getMessage(); 
    }
}

if( isset($_POST["updated_id"]) && isset($_POST["updated_name"])
&& isset($_POST["updated_age"]) && isset($_POST["updated_phone"])
) {
       try {
                $stmt = $conn->prepare("UPDATE name_tbl SET name=?,age=?,phone=? WHERE id=?"); 
                $stmt ->execute([$updated_name , $updated_age , $updated_phone, $updated_id]);
                $stmt = null;
       }
       catch (Exception $e) { 
        echo "Something went wrong in updating the record"; 
       }

}
