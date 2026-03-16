<?php
if(isset($_GET["opt"]) && $_GET["opt"]=="add"){
    if(count($_POST)>0){
        $history = new DentalHistoryData();
        $history->person_id = $_POST["person_id"];
        $history->dient_id = $_POST["dient_id"];
        $history->face_id = $_POST["face_id"];
        $history->treatment_id = $_POST["treatment_id"];
        $history->add();
        echo "success";
    }
}
else if(isset($_GET["opt"]) && $_GET["opt"]=="del"){
    $history = DentalHistoryData::getById($_GET["id"]);
    $person_id = $history->person_id;
    $history->del();
    Core::alert("Registro eliminado!");
    Core::redir("./?view=persons&opt=odontograma&id=".$person_id);
}
?>
