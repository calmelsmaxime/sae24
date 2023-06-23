
<?php

require '../connexion_bd.php';

	
//Query to find last id
$sql4 = 'SELECT id FROM resultat
		ORDER BY id DESC
		LIMIT 1';
$result4 = mysqli_query($conn, $sql4);
$row4 = mysqli_fetch_assoc($result4);
$id_last = $row4['id'];


//Query to find last value
$sql2 = "SELECT * FROM resultat
		WHERE id = '$id_last'";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($result2);

$m = 0;
while ($row2) {
    $m++;
    $dern_position[$m] = $row2['case_value'];
	$row2 = mysqli_fetch_assoc($result2);
}


//Query to find the 4th measure
$sql = "SELECT DISTINCT id, `case_value` FROM resultat
		ORDER BY id DESC
		LIMIT 1 OFFSET 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$val2 = $row['case_value'];


//Query to find the 3rd measure
$sql4 = "SELECT DISTINCT id, `case_value` FROM resultat
		ORDER BY id DESC
		LIMIT 1 OFFSET 2";
$result4 = mysqli_query($conn, $sql4);
$row4 = mysqli_fetch_assoc($result4);
$val3 = $row4['case_value'];


//Query to find the 4th measure
$sql5 = "SELECT DISTINCT id, `case_value` FROM resultat
		ORDER BY id DESC
		LIMIT 1 OFFSET 3";
$result5 = mysqli_query($conn, $sql5);
$row5 = mysqli_fetch_assoc($result5);
$val4 = $row5['case_value'];


//Query to find the 5th last value
$sql3 = "SELECT DISTINCT id, `case_value` FROM resultat
		ORDER BY id DESC
		LIMIT 1 OFFSET 4";
$result3 = mysqli_query($conn, $sql3);
$row3 = mysqli_fetch_assoc($result3);
$val5 = $row3['case_value'];



//Loop to make the graph

for ($i = 15; $i >= 0 ;$i--) {

    for ($j = 0; $j <= 15; $j++) {
        $position = "$j.$i";
        

        //Check if this is the last value
        $isLastPosition = false;
        for ($p = 1; $p <= $m; $p++) {
            if ($dern_position[$p] === $position) {
                $isLastPosition = true;
                break;
            }
        }
        
        // Check if it is the 5th last value
        $isFifthLastPosition = ($val5 === $position);
        
        //Check if it is the 4th value
		$is4val = ($val4 === $position);
		
		//Check if it is the 3rd value
		$is3val = ($val3 === $position);
		
		//Check if it is the 2nd value
		$is2val = ($val2 === $position);
		
        
        //Generate corresponding div based on position
        if ($isLastPosition) {
            echo '<div class="bloc_green"></div>';
        } elseif ($isFifthLastPosition) {
            echo '<div class="bloc_red"></div>';
        } elseif ($is3val) {
            echo '<div class="bloc_jaune"></div>';	
        }elseif ($is4val) {
            echo '<div class="bloc_orange"></div>';	
        }elseif ($is2val) {
            echo '<div class="bloc_bleu"></div>';	
        }
		else {
            echo '<div class="bloc"></div>';
        }
    }

}


//Disconnecting from the database
mysqli_close($conn);

?>


