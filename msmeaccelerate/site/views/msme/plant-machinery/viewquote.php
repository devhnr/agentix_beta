<?php
include("connect.php");
$q="select * from customer";
$res=mysql_query($conkey,$q);
$row=mysql_num_rows($res);
		echo "<table border=1>
			<tr>
				<th>id</th>
				<th>name</th>
				<th>pincode</th>
                <th>email</th>
				<th>phone</th>
				<
            </tr>";
            while($arr=mysql_fetch_array($res))
            echo "<tr>
            	<td>$arr[0]</td>
            	<td>$arr[1]</td>
            	<td>$arr[2]</td>
            	<td>$arr[3]</td>
            	<td>$arr[4]</td>
            	
    
            </tr>";
            ?>