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
         $query = "SELECT * FROM variables ORDER BY  ID DESC";
                            $result = mysqli_query($connection,$query);
                            confirmQ($result);?>
                            <?php while($row = mysqli_fetch_assoc($result)):;{?>
                              <tr>
                            <td><?php echo $row['ID'] ?></td>
                            <td><?php echo $row['Name'] ?></td>
                            <td><?php echo $row['Type'] ?></td>
                            <td><?php echo $row['Width'] ?></td>
                            <td><?php echo $row['Decimals'] ?></td>
                            <td><?php echo $row['Label'] ?></td>
                            <td><?php echo $row['Values'] ?></td>
                            <td><?php echo $row['Missing'] ?></td>
                            <td><?php echo $row['Columns'] ?></td>
                            <td><?php echo $row['Align'] ?></td>
                            <td><?php echo $row['Measure'] ?></td>
                            <td><?php echo $row['Role'] ?></td>
                            <td><?php echo $row['Tags'] ?></td>
                            <td><?php echo $row['Abbreviation'] ?></td>
                            <td><input type="checkbox" name="chk[]" value="<?php echo $row["id"] ?>"></td>
</tr>




<?php }endwhile;?>

}
