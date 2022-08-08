<?php

namespace application\models;

use application\core\Model;

class Csv extends Model {

	public function getData() {
		$result = $this->db->row('SELECT id, name, age, email, phone, gender FROM users');
		return $result;
	}

    public function saveData($column) {

	    $result = $this->db->query("INSERT INTO users (name, age, email, phone, gender) VALUES ('$column[1]','$column[2]','$column[3]','$column[4]','$column[5]')");

        return $result;
    }

    public function deleteData() {
        $result = $this->db->query("DELETE FROM users");
        return $result;
    }

}