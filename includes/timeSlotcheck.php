<?php

include_once("DbConn.php");

if (isset($_POST['date'])) {
    $date = $_POST['date'];

    $query = "select sl1,sl2,sl3,sl4,sl5,sl6,sl7 from testdrivedates where date =?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $query);
    mysqli_stmt_bind_param($stmt, "s", $date);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    echo '<label for="timetoolbar">Select Time Slot :</label>';
    echo '<div id="timetoolbar" class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">';
    if (mysqli_num_rows($result) <= 0) {


        echo '<div class="btn-group" style="margin-left:5px;margin-right:5px;margin-top:10px" role="group">';
        echo '<button type="radio" name="timeSlot" onclick="submitEnable()" value="sl1" class="btn btn-outline-info btn-sm">9.00am - 9.30am</button>';
        echo '</div>';

        echo '<div class="btn-group" style="margin-left:5px;margin-right:5px;margin-top:10px" role="group">';
        echo '<button type="radio" name="timeSlot" onclick="submitEnable()" value="sl2" class="btn btn-outline-info btn-sm">9.40am - 10.10am</button>';
        echo '</div>';

        echo '<div class="btn-group" style="margin-left:5px;margin-right:5px;margin-top:10px" role="group">';
        echo '<button type="radio" name="timeSlot" onclick="submitEnable()" value="sl3" class="btn btn-outline-info btn-sm">10.20am - 10.50am</button>';
        echo '</div>';

        echo '<div class="btn-group" style="margin-left:5px;margin-right:5px;margin-top:10px" role="group">';
        echo '<button type="radio" name="timeSlot" onclick="submitEnable()" value="sl4" class="btn btn-outline-info btn-sm">1.00pm - 1.30pm</button>';
        echo '</div>';

        echo '<div class="btn-group" style="margin-left:5px;margin-right:5px;margin-top:10px" role="group">';
        echo '<button type="radio" name="timeSlot" onclick="submitEnable()" value="sl5" class="btn btn-outline-info btn-sm">1.40pm - 2.10pm</button>';
        echo '</div>';

        echo '<div class="btn-group" style="margin-left:5px;margin-right:5px;margin-top:10px" role="group">';
        echo '<button type="radio"  name="timeSlot" onclick="submitEnable()" value="sl6" class="btn btn-outline-info btn-sm">2.20pm - 2.50pm</button>';
        echo '</div>';

        echo '<div class="btn-group" style="margin-left:5px;margin-right:5px;margin-top:10px" role="group">';
        echo '<button type="radio" name="timeSlot" onclick="submitEnable()" value="sl7" class="btn btn-outline-info btn-sm">3.00pm - 3.30pm</button>';
        echo '</div>';
    } else {
        while ($row = mysqli_fetch_row($result)) {
            $flag = 0;
            if ($row[0] == 0) {
                echo '<div class="btn-group" style="margin-left:5px;margin-right:5px;margin-top:10px" role="group">';
                echo '<button type="radio" name="timeSlot" onclick="submitEnable()" value="sl1" class="btn btn-outline-info btn-sm">9.00am - 9.30am</button>';
                echo '</div>';
                $flag = 1;
            }
            if ($row[1] == 0) {
                echo '<div class="btn-group" style="margin-left:5px;margin-right:5px;margin-top:10px" role="group">';
                echo '<button type="radio" name="timeSlot" onclick="submitEnable()" value="sl2" class="btn btn-outline-info btn-sm">9.40am - 10.10am</button>';
                echo '</div>';
                $flag = 1;
            }
            if ($row[2] == 0) {
                echo '<div class="btn-group" style="margin-left:5px;margin-right:5px;margin-top:10px" role="group">';
                echo '<button type="radio" name="timeSlot" onclick="submitEnable()" value="sl3" class="btn btn-outline-info btn-sm">10.20am - 10.50am</button>';
                echo '</div>';
                $flag = 1;
            }
            if ($row[3] == 0) {
                echo '<div class="btn-group" style="margin-left:5px;margin-right:5px;margin-top:10px" role="group">';
                echo '<button type="radio" name="timeSlot" onclick="submitEnable()" value="sl4" class="btn btn-outline-info btn-sm">1.00pm - 1.30pm</button>';
                echo '</div>';
                $flag = 1;
            }
            if ($row[4] == 0) {
                echo '<div class="btn-group" style="margin-left:5px;margin-right:5px;margin-top:10px" role="group">';
                echo '<button type="radio" name="timeSlot" onclick="submitEnable()" value="sl5" class="btn btn-outline-info btn-sm">1.40pm - 2.10pm</button>';
                echo '</div>';
                $flag = 1;
            }
            if ($row[5] == 0) {
                echo '<div class="btn-group" style="margin-left:5px;margin-right:5px;margin-top:10px" role="group">';
                echo '<button type="radio" name="timeSlot" onclick="submitEnable()" value="sl6" class="btn btn-outline-info btn-sm">2.20pm - 2.50pm</button>';
                echo '</div>';
                $flag = 1;
            }
            if ($row[6] == 0) {
                echo '<div class="btn-group" style="margin-left:5px;margin-right:5px;margin-top:10px" role="group">';
                echo '<button type="radio" name="timeSlot" onclick="submitEnable()" value="sl7" class="btn btn-outline-info btn-sm">3.00pm - 3.30pm</button>';
                echo '</div>';
                $flag = 1;
            }

            if ($flag == 0) {
                echo "<h5> No Time Slot Available for this day check another day</h5>";
            }
        }
        echo '</div>';
    }
}
