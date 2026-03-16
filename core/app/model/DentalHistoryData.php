<?php
class DentalHistoryData {
	public static $tablename = "dental_history";

	public $id, $person_id, $dient_id, $face_id, $treatment_id, $created_at;

	public function __construct(){
		$this->person_id = "";
		$this->dient_id = "";
		$this->face_id = "";
		$this->treatment_id = "";
		$this->created_at = "";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (person_id,dient_id,face_id,treatment_id) ";
		$sql .= "value (\"$this->person_id\",\"$this->dient_id\",\"$this->face_id\",\"$this->treatment_id\")";
		Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}

	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

	public function update(){
		$sql = "update ".self::$tablename." set person_id=\"$this->person_id\",dient_id=\"$this->dient_id\",face_id=\"$this->face_id\",treatment_id=\"$this->treatment_id\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new DentalHistoryData());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new DentalHistoryData());
	}
	
	public static function getAllByPersonId($id){
		$sql = "select * from ".self::$tablename." where person_id=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new DentalHistoryData());
	}

    public static function getAllByDientId($id){
		$sql = "select * from ".self::$tablename." where dient_id=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new DentalHistoryData());
	}
}
?>
