<? php
    require_once 'database.php';

    function getusers(){
        $sql = "SELECT * FROM users";
        $result = $this->db->query($sql);
        return $result->result_array();
    }
    function getnumberofusers(){
        $sql = "SELECT * FROM users";
        $result = $this->db->query($sql);
        return $result->num_rows();
    }
    function getusername($id){
        $sql = "SELECT * FROM users WHERE id = $id";
        $result = $this->db->query($sql);
        return $result->row_array();
    }
    function getuserbyid($id){
        $sql = "SELECT * FROM users WHERE id = $id";
        $result = $this->db->query($sql);
        return $result->row_array();
    }
   

?>