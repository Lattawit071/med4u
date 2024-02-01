<?php
require_once '../config/db_conn.inc.php';


class read_data extends dashboardConfig
{

    private $table, $id, $qry;

    private function set_table($table)
    {
        $this->table = $table;
        return $this->table;
    }
    private function set_id($id)
    {
        $this->id = $id;
        return $this->id;
    }

    private function get_table()
    {
        return $this->table;
    }

    private function get_id()
    {
        return $this->id;
    }

    // get specific data
    public function get_data($table, $id)
    {
        $response = $this->qry_one($table, $id);

        return $response;
    }
    private function qry_one($table, $id)
    {
        $this->set_table($table);
        $this->set_id($id);

        $__GET__TABLE = $this->get_table();
        $__GET__ID = $this->get_id();

        $sql = "SELECT * FROM $__GET__TABLE WHERE id_tag = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $__GET__ID]);
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($row) {
            return $row;
        } else {
            return "something wrong" . $__GET__TABLE;
        }
    }

    // all cure data
    public function get_cure_data($table, $id)
    {
        $response = $this->qry_cure($table, $id);

        return $response;
    }
    private function qry_cure($table, $id)
    {
        $this->set_table($table);
        $this->set_id($id);

        $__GET__TABLE = $this->get_table();
        $__GET__ID = $this->get_ID();
        $sql = "SELECT * FROM $__GET__TABLE WHERE id_tag = :ID";
        $stmt = $this->conn->prepare($sql);

        $stmt->execute(['ID' => $__GET__ID]);
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($row) {
            return $row;
        } else {
            return "Something wrong";
        }
    }

    // cure data one
    public function get_cure_data_one($table, $id)
    {
        $response = $this->qry_cure_one($table, $id);

        return $response;
    }
    private function qry_cure_one($table, $id)
    {
        $this->set_table($table);
        $this->set_id($id);
        $__GET__TABLE = $this->get_table();
        $__GET__ID = $this->get_id();

        $sql = "SELECT * FROM $__GET__TABLE WHERE id_case_tag = :ID";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['ID' => $__GET__ID]);

        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($row) {
            return $row;
        } else {
            return "Something wrong";
        }
    }

    // get one case data 
    public function get_case_data_one($table, $id)
    {
        $response = $this->qry_case_one($table, $id);

        return $response;
    }
    private function qry_case_one($table, $id)
    {
        $this->set_table($table);
        $this->set_id($id);

        $__GET__TABLE = $this->get_table();
        $__GET__ID = $this->get_id();

        $sql = "SELECT * FROM $__GET__TABLE WHERE id = :ID";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['ID' => $__GET__ID]);

        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($row) {
            return $row;
        } else {
            return "Something wrong";
        }
    }

    // get drug data
    public function read_all_drug_case($table)
    {
        $this->set_table($table);

        $__GET__TABLE = $this->get_table();
        $response = $this->get_drug_header($__GET__TABLE);
        return $response;
    }
    private function get_drug_header($table)
    {
        // for drug case
        if ($table == 'drugs_case') {
            $sql = "SELECT * FROM drugs_case";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        }
    }

    // get list drug of case
    public function get_list($table, $id)
    {
        if ($table == null || $id == null) {
            return false;
        } else if ($table == 'drug') {
            $response = $this->read_list_drug($table, $id);
            return $response;
        }
    }
    private function read_list_drug($table, $id)
    {
        $this->set_id($id);
        $this->set_table($table);

        $__GET__ID = $this->get_id();
        $__GET__TABLE = $this->get_table();

        $sql = "SELECT * FROM $__GET__TABLE WHERE id_drug = $__GET__ID";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $row;
    }

    // promotion 
    // searching for promotion
    public function search_promotion($qry, $selection)
    {
        $response = $this->search_promotion_qry($qry, $selection);

        if ($response == false) {
            return false;
        } else {
            return $response;
        }
    }

    private function search_promotion_qry($qry, $selection)
    {
        if ($selection == null) {
            return false;
        } else {
            $sql = "SELECT `se`.* FROM $selection AS `se` WHERE se.name LIKE :qry";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['qry' => '%' . $qry . '%']);
            $result = $stmt->fetchAll();

            if ($result) {
                return $result;
            } else {
                return false;
            }
        }
    }
    // fetch promotion after searching
    public function find_promotion($id, $type)
    {
        $val = $this->find_promotion_query($id, $type);
        return $val;
    }

    private function find_promotion_query($id, $type)
    {
        if ($id == null || $type == null) {
            return $id;
        } else {
            $sql = "SELECT * FROM promotion WHERE type=:type AND fid=:id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                'type' => $type,
                'id' => $id,
            ]);
            $row = $stmt->fetchAll();
            return $row;
        }
    }

    public function read_all($table)
    {
        $this->set_table($table);
        $__GET__TABLE = $this->get_table();

        $response = $this->read_all_query($__GET__TABLE);
        if ($response == false) {
            return false;
        } else {
            return $response;
        }
    }
    private function read_all_query($table)
    {
        $sql = "SELECT * FROM $table";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchAll();
        if ($row) {
            return $row;
        } else {
            return false;
        }
    }
}

$qry = new read_data;
if (isset($_POST['readone'])) {

    if ($_POST['readone'] == null) {

        echo "Request failed";
    } else if ($_POST['readone'] == 'readdata_case') {
        $table = $_POST['table'];
        $id = $_POST['id'];

        $response = $qry->get_case_data_one($table, $id);
        header('Content-type: application/json');
        echo json_encode($response);
    } else if ($_POST['readone'] == 'readdata_drug') {
        $table = $_POST['table'];
        $id = $_POST['id'];

        $response = $qry->get_case_data_one($table, $id);


        header('Content-type: application/json');
        echo json_encode($response);
    } else {

        $table = $_POST['table'];
        $id = $_POST['id'];


        $response = $qry->get_data($table, $id);
        header('Content-type: application/json');
        echo json_encode($response);
    }
}

if (isset($_POST['read_cure'])) {

    if ($_POST['read_cure'] == null) {

        echo "Request failed";
    } else if ($_POST['read_cure'] == 'readcure_detailed') {
        $table = $_POST['tb'];
        $id = $_POST['id'];
        $response = $qry->get_cure_data_one($table, $id);
        header('Content-type: application/json');
        echo json_encode($response);
    } else {

        $table = $_POST['tb'];
        $id = $_POST['id'];


        $response = $qry->get_cure_data($table, $id);
        header('Content-type: application/json');
        echo json_encode($response);
    }
}

if (isset($_POST['request'])) {

    if ($_POST['request'] == "read_data_drug") {

        $table = $_POST['tb'];
        $response = $qry->read_all_drug_case($table);
        header('Content-type: application/json');
        echo json_encode($response);
    } else if ($_POST['request'] == 'read_data_drug_list') {

        $table = $_POST['tb'];
        $id = $_POST['id'];
        $response = $qry->get_list($table, $id);
        header('Content-type: application/json');
        echo json_encode($response);
    }
}

// fetch all promotion
$pattern = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
if (isset($_POST['fetch_all'])) {
    if ($_POST['fetch_all'] == null) {
        echo "<p class='fs-4 fw-3 text-black'>Sorry no requests</p>";
    } else if (is_numeric($_POST['fetch_all'])) {
        echo "<p class='fs-4 fw-3 text-black'>Sorry error parameter of request</p>";
    } else if (preg_match($pattern, $_POST['fetch_all'])) {
        echo "<p class='fs-4 fw-3 text-black'>Sorry error parameter of request 'special char'</p>";
    } else {
        $response = $qry->read_all($_POST['fetch_all']);
        foreach ($response as $row) {
            echo '<div class="col-2 card card-promotion m-3">';
            echo '<a class="text-decoration-none" href="' . $row['link'] . '" target="_blank">';
            echo '<span><img src="uploads/' . $row['tag'] . '.png"></span>';
            echo '<img src="uploads/156658083.jpg" class="card-img-top" width="100%" alt="...">';
            echo '<div class="card-body" style="background-color: #004880; color:aliceblue;">';
            echo '<h5 class="card-title">' . $row['name'] . '</h5>';
            echo '<p class="card-text"></p>';
            echo '</div>';
            echo '</a>';
            echo '</div>';
        }
    }
}

// searching promotion
if (isset($_POST['request'])) {
    if ($_POST['request'] == 'search') {
        $query = $_POST['query'];
        $selection = $_POST['selection'];
        $response = $qry->search_promotion($query, $selection);
        if ($response == false) {
            echo "ไม่พบข้อมูลที่ท่านต้องการค้นหา";
        } else {
            echo '<div class="card" style="width: 31rem; top: -44px;">';
            echo '<ul class="list-group list-group-flush">';
            foreach ($response as $row) {
                echo '<li id="'. $row['id'] .'" class="item-search list-group-item list-group-item-action" style="cursor: pointer;">' . $row['name'] . '</li>';
            }
            echo '</ul>';
            echo '</div>';
        }
    }
}
// fetching promotion after select
if (isset($_POST['fetch_pro'])) {
    if ($_POST['fetch_pro'] == 'fetch_pro') {
        $id = $_POST['id'];
        $type = $_POST['type'];
        $val = $qry->find_promotion($id, $type);
        if ($val == false) {
            echo "ไม่พบข้อมูลที่ท่านต้องการค้นหา";
        } else {
            foreach ($val as $row) {
                echo '<div class="col-2 card card-promotion m-3">';
                echo '<a class="text-decoration-none" href="' . $row['link'] . '" target="_blank">';
                echo '<span></span>';
                echo '<img src="uploads/156658083.jpg" class="card-img-top" width="100%" alt="...">';
                echo '<div class="card-body" style="background-color: #004880; color:aliceblue;">';
                echo '<h5 class="card-title">' . $row['name'] . '</h5>';
                echo '<p class="card-text"></p>';
                echo '</div>';
                echo '</a>';
                echo '</div>';
            }
        }
    }
}
