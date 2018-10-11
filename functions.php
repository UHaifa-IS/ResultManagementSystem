<?php

// confirm connection
function confirmQ($result){

    global $connection;
    if(!$result){
        die("No Q. ".mysqli_error($connection));
    }
}



// select all the existing variables
function sel_vars_table() {
        global $connection;
         $query = "SELECT * FROM  varfile ORDER BY  ID DESC";
                            $result = mysqli_query($connection,$query);
                            confirmQ($result);
                            while($row = mysqli_fetch_assoc($result)){
                            $ID = $row['Id'];
                            $Name = $row['Name'];
                            $filename=$row['FileName'];
                            $Tags = $row['Tags'];
                            $Abbreviation = $row['Abbreviation'];




                         echo   "     <tr>

                                    <td>{$ID}</td>
                                    <td>{$Name}</td>
                                    <td>{$filename}</td>
                                    <td>{$Tags}</td>
                                    <td>{$Abbreviation} </td>
                                    <td><a href='edit_var.php?Id={$ID}'>Edit</a></td>
                                    <td><a onClick=\"javascript: return confirm('Are you sure you want to delete');\" href='viewVars.php?delete={$ID}'>Delete</a></td>



                                </tr>";

                        }

}


// add new variable
function create_var(){
       if(isset($_POST['create_var'])){
           global $connection;

                            $Name = $_POST['Name'];
                            $Type = $_POST['Type'];
                            $Width = $_POST['Width'];
                            $Decimals = $_POST['Decimals'];
                            $Label = $_POST['Label'];
                            $Values = $_POST['Values'];
                            $Missing = $_POST['Missing'];
                            $Columns = $_POST['Columns'];
                            $Align = $_POST['Align'];
                            $Measure = $_POST['Measure'];
                            $Role = $_POST['Role'];
                            $Tags = $_POST['Tags'];
                            $Abbreviation = $_POST['Abbreviation'];


// validation
                                if (!empty($Name))
    {
        $name_query = "SELECT * FROM `varfile` WHERE `Name` = '$Name' OR `Tags` LIKE '%$Name%'";
                            $result = mysqli_query($connection,$name_query);
                            confirmQ($result);
                            $count= mysqli_num_rows($result);
                            //there is variable with similar name or tag
             if($count!=0)
             {
               header("Location: search.php?user=$Name");
               exit;
             }
    }

                $query = "INSERT INTO `varfile` (`ID`, `Type`, `Width`, `Decimals`, `Label`, `Values`, `Missing`, `Columns`, `Align`, `Measure`, `Role`, `Tags`, `Abbreviation`, `Name`) VALUES (NULL, '$Type', '$Width', '$Decimals', '$Label', '$Values ', '$Missing', '$Columns', '$Align', '$Measure', '$Role', '$Tags', '$Abbreviation', '$Name')";
                $result = mysqli_query($connection,$query);
                             confirmQ($result);

                  echo "<p class='bg-success'>Var Created. <a href='viewVars.php'>View Vars</a> or <a href='InsertForm.php'>Create Var</a></p>"; // notify that the post updated
//                header("Location: posts.php");
            }
}


function delete_var($delete){


                global $connection;



            $query = "DELETE FROM varfile WHERE ID = $delete ";
            $result = mysqli_query($connection,$query);
           confirmQ($result);
                header("Location: viewVars.php");// get to the page without the passed parameters

}

function update_var($ID){
      if(isset($_POST['update_var'])){
          global $connection;

                            $Name = $_POST['Name'];
                            $Tags = $_POST['Tags'];
                            $Abbreviation = $_POST['Abbreviation'];

                            // TODO - IMPORTANT!
//-------------------------------------------------------------------------------------------
//                   I deactivated the validation on the update, because
// we allow update on the name
// which means that with each attempt to update
//                           will trigger the validation
//                      which is always going to find a name similar to the one we just modified, even if we only updated the other column

    //                         // validation
    //                             if (!empty($Name))
    // {
    //     $name_query = "SELECT * FROM `variables` WHERE `Name` = '$Name' OR `Tags` LIKE '%$Name%'";
    //                         $result = mysqli_query($connection,$name_query);
    //                         confirmQ($result);
    //                         $count= mysqli_num_rows($result);
    //                         //there is variable with similar name or tag
    //          if($count!=0)
    //          {
    //            header("Location: search.php?user=$Name");
    //            exit;
    //          }
    // }

//-------------------------------------------------------------------------------------------


                $query = "UPDATE varfile SET  Tags= '".$Tags."' , Abbreviation = '".$Abbreviation."' WHERE Id= '".$ID."' ";

                if ($connection->query($query) === TRUE) {
                  echo '<script language="javascript">';
                  echo 'alert("you have update the student status")';
                  echo '</script>';
                  header("Location:viewVars.php");

                }

            }
}

?>
