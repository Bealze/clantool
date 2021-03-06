<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="text/javascript">

	$('#tank_freeze').dataTable( {
		"bJQueryUI": true,
                "iDisplayLength": 20,
                "bPaginate": true,
                "bLengthChange": false,
                "bFilter": false,
                "bSort": true,
                "aaSorting": [[ 0, "desc" ]],
                "aoColumns": [{ "sWidth": "100px" },{ "sWidth": "200px" },{ "sWidth": "200px" }]
	} );
    </script>
</head>    
</html>
<?php

include_once("functions.php");
$result = QueryMySQL("SELECT * FROM tool_config");

echo '<table id= "tank_freeze">';
echo '<thead>';
echo '<tr><th colspan = 41 >Tank lock parameters</th></tr>';
echo '<tr>' . '<th>' . 'Vehicle Tier' . '<th>' . 'Vehicle Class' . '</th>' . '</th>' . '<th>' . 'Lock Time (in hours)' . '</th>';
echo '</thead>';
echo '<tbody>';

$Classes = array('heavyTank' => 'Heavy Tank', 'mediumTank' => 'Medium Tank', 'lightTank' => 'Light Tank', 'AT-SPG' => 'Tank Destoyer', 'SPG' => 'Artillery');

while ($row = mysql_fetch_array($result)) {

    $Proper_Class = $Classes[$row['vehicle_class']];
    echo '<tr>' . '<td>' . $row['vehicle_tier'] . '<td>' . $Proper_Class . '</td>' . '</td>' . '<td>' . $row['lock_time']/3600 . '</td>' . '</tr>';
}
echo '</tbody>';
echo '</table>';

mysql_close($con);
?>
