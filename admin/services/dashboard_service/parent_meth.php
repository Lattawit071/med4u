<?php
require_once '../../config/admin_conn_dashboard.php';
require_once 'save_log_event.php';

class upp extends dashboardConfig
{
    private $title, $link, $admin_id, $table;

    private function get_title()
    {
        return $this->title;
    }

    private function set_title($title)
    {
        $this->title = $title;
        return $this->title;
    }

    private function get_link()
    {
        return $this->link;
    }

    private function set_link($link)
    {
        $this->link = $link;
        return $this->link;
    }

    private function get_admin_id()
    {
        return $this->admin_id;
    }

    private function set_admin_id($admin_id)
    {
        $this->admin_id = $admin_id;
        return $this->admin_id;
    }


    protected function header_up($title, $link, $admin_id)
    {
        $title = $this->set_title($title);
        $title_GET = $this->get_title();

        $link = $this->set_link($link);
        $link_GET = $this->get_link();

        $admin_id = $this->set_title($admin_id);
        $admin_id_GET = $this->get_title();


        $sql = "UPDATE `vaccine` SET `title` = :title, `link` = :link WHERE `vaccine`.`id` = 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'title' => $title_GET,
            'link' => $link_GET
        ]);

        $log_event = [
            'admin_id' => $admin_id_GET,
            'event' => 'เปลี่ยนเนื้อหาของลิงก์'
        ];

        $res = $this->log_event($log_event);

        return $res;
    }

    private function log_event($log_event)
    {
        $db_admin = new save_log_event;
        $res = $db_admin->qry_admin_data($log_event);
        $res = $this->save_log_event($res);

        return $res;
    }

    private function save_log_event($res)
    {
        $sql_save = "INSERT INTO log_event(id_person, name, event)
                     VALUES(:ID_Admin, :Name_Admin, :EVENT)";
        $qry_insert = $this->conn->prepare($sql_save);
        $qry_insert->execute(
            [
                "ID_Admin" => $res['admin_id'],
                "Name_Admin" => $res['name'],
                "EVENT" => $res['event']
            ]
        );

        if (!$qry_insert) {

            return false;
        } else {

            return true;
        }
    }

    private function set_table($table)
    {
        $this->table = $table;
        return $this->table;
    }

    private function get_table()
    {
        return $this->table;
    }


    protected function save_img_carousel($img, $admin_id)
    {
        $allow = array('jpg', 'jpeg', 'png');
        $extension = explode('.', $img['name']);
        $file_act_ext = strtolower(end($extension));
        $file_new = rand() . "." . $file_act_ext;
        $file_path = '../../../uploads/' . $file_new;

        if (in_array($file_act_ext, $allow)) {
            if ($img['size'] > 0 && $img['error'] == 0) {
                if (move_uploaded_file($img['tmp_name'], $file_path)) {
                    $sql = "INSERT INTO images_carousel_homepage(img) VALUES (:img)";
                    $stmt = $this->conn->prepare($sql);
                    $stmt->execute([
                        'img' => $file_new
                    ]);
                    $log_event = [
                        'admin_id' => $admin_id,
                        'event' => 'เพิ่มรูปภาพสไลด์'
                    ];
                    $res = $this->log_event($log_event);

                    return $res;
                }
            }
        } else {
            $res = "Not Match";
            return $res;
        }
    }

    protected function save_img_icon_disease($img, $admin_id, $title)
    {
        $allow = array('jpg', 'jpeg', 'png');
        $extension = explode('.', $img['name']);
        $file_act_ext = strtolower(end($extension));
        $file_new = rand() . "." . $file_act_ext;
        $file_path = '../../../uploads/' . $file_new;

        if (in_array($file_act_ext, $allow)) {
            if ($img['size'] > 0 && $img['error'] == 0) {
                if (move_uploaded_file($img['tmp_name'], $file_path)) {
                    $sql = "INSERT INTO disease(title, img) VALUES (:disease, :img)";
                    $stmt = $this->conn->prepare($sql);
                    $stmt->execute([
                        'img' => $file_new,
                        'disease' => $title
                    ]);
                    $log_event = [
                        'admin_id' => $admin_id,
                        'event' => 'เพิ่มข้อมูลโรค' . $title
                    ];
                    $res = $this->log_event($log_event);

                    return $res;
                }
            }
        } else {
            $res = "Not Match";
            return $res;
        }
    }

    protected function delete_items_image($img_name, $table, $img_id, $admin_id)
    {

        $this->set_table($table);
        $__GET__TABLE = $this->get_table();


        $sql = "DELETE FROM $__GET__TABLE WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $img_id,
        ]);

        $log_event = [
            'admin_id' => $admin_id,
            'event' => 'ลบรูปภาพที่ table : ' . $__GET__TABLE
        ];
        unlink("../../../uploads/" . $img_name);

        $res = $this->log_event($log_event);

        return $res;
    }

    protected function update_img($title, $img, $img_id, $table)
    {

        $sql_qry_id = "SELECT * FROM $table WHERE id = :id";
        $stmt_qry = $this->conn->prepare($sql_qry_id);
        $stmt_qry->execute(["id" => $img_id]);
        $data = $stmt_qry->fetch(PDO::FETCH_ASSOC);

        $allow = array('jpg', 'jpeg', 'png');
        $extension = explode('.', $img['name']);
        $file_act_ext = strtolower(end($extension));
        $file_new = rand() . "." . $file_act_ext;
        $file_path = '../../../uploads/' . $file_new;

        if (in_array($file_act_ext, $allow)) {
            if ($img['size'] > 0 && $img['error'] == 0) {
                unlink("../../../uploads/" . $data['img']);
                if (move_uploaded_file($img['tmp_name'], $file_path)) {

                    $sql = "UPDATE $table SET title = :title, img = :img WHERE id = :img_id";
                    $stmt = $this->conn->prepare($sql);
                    $stmt->execute([
                        'img' => $file_new,
                        'title' => $title,
                        'img_id' => $data['id']
                    ]);

                    $log_event = [
                        'admin_id' => $_SESSION['admin_login'],
                        'event' => 'อัพเดตข้อมูลที่ table : ' . $table
                    ];

                    $res = $this->log_event($log_event);
                    return $res;
                }
            }
        }
    }
}
