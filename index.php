
<?php
const GENERATE_START_DATA = "get_start_data";
const GENERATE_NEW_ENTRY = "get_new_entry";

if (isset($_GET["action"])){
    include("DataGenerator.php");

    if ($_GET["action"] == GENERATE_START_DATA) {
        echo json_encode(DataGenerator::generateStartData());
    }
    else if ($_GET["action"] == GENERATE_NEW_ENTRY) {
        echo json_encode(DataGenerator::generateCoordinate());
    }
    else {
        $error["Error"] = "Requested action is not available!";
        echo json_encode($error);
    }
}else{
    include("templates/index.html");
}
