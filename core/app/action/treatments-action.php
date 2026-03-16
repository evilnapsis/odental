<?php
if(isset($_GET["opt"]) && $_GET["opt"]=="add"){
if(count($_POST)>0){
	$cat = new TreatmentData();
	$cat->name = $_POST["name"];
	$cat->color = $_POST["color"];
	$cat->add();
	Core::alert("Tratamiento agregado!");
	Core::redir("./?view=treatments&opt=all");
}
}
else if(isset($_GET["opt"]) && $_GET["opt"]=="upd"){
if(count($_POST)>0){
	$cat = TreatmentData::getById($_POST["cat_id"]);
	$cat->name = $_POST["name"];
	$cat->color = $_POST["color"];
	$cat->update();
	Core::alert("Tratamiento actualizado!");
	Core::redir("./?view=treatments&opt=all");
}
}
else if(isset($_GET["opt"]) && $_GET["opt"]=="del"){
	$cat = TreatmentData::getById($_GET["id"]);
	$cat->del();
	Core::alert("Tratamiento eliminado!");
	Core::redir("./?view=treatments&opt=all");
}
?>
