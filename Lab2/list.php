<table border="1">
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Address</th>
        <th>Country</th>
        <th>Gender</th>
        <th>Skills</th>
        <th>User Name</th>
        <th>Password</th>
        <th>Department</th>

    </tr>

<?php

$formData=[];
foreach ($_POST as $key => $value) {
    if (is_array($value)) {
        $formData[$key] = implode(':', $value);
    } else {
        $formData[$key] = $value;
    }
}


 $file=fopen("data.txt",'a');
 $data = implode(",", $formData);
 fwrite($file,"\n".$data);

 fclose($file);

    $data=fopen("data.txt",'r');
    while(!feof($data))
    {
        $row=fgets($data);
        echo "<tr>";
            $dat=explode(",",$row);
            foreach ($dat as $key => $value) {

                    echo "<td>$value</td>";
            }
        echo "</tr>";
    }
    fclose($data);

    ?>
</table>