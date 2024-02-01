<?php
require_once 'parent_meth.php';
class AdminDashboard extends upp
{
    private $title, $link, $admin_id, $img_carousel, $table, $id_items;

    private function set_title(string $title)
    {
        $this->title = $title;
        return $this->title;
    }
    private function get_title()
    {
        return $this->title;
    }

    private function set_link(string $link)
    {
        $this->link = $link;
        return $this->link;
    }
    private function get_link()
    {
        return $this->link;
    }

    private function set_admin_id(int $admin_id)
    {
        $this->admin_id = $admin_id;
        return $this->admin_id;
    }
    private function get_admin_id()
    {
        return $this->admin_id;
    }

    private function set_carousel_img($img_carousel) {
        $this->img_carousel = $img_carousel;
        return $this->img_carousel;
    }

    private function get_carousel_img() {
        return $this->img_carousel;
    }

    private function set_table($table) {
        $this->table = $table;
        return $this->table;
    }

    private function get_table() {
        return $this->table;
    }
    
    private function set_id_items($id_items) {
        $this->id_items = $id_items;
        return $this->id_items;
    }

    private function get_id_items() {
        return $this->id_items;
    }

    function header($title, $link, $admin_id)
    {
        $title = $this->set_title($title);
        $link = $this->set_link($link);
        $admin_id = $this->set_admin_id($admin_id);

        $__GET__title = $this->get_title();
        $__GET__link = $this->get_link();
        $__GET__admin_id = $this->get_admin_id();

        $res = $this->header_up($__GET__title, $__GET__link, $__GET__admin_id);
        return $res;
    }

    function carousel($img, $admin_id)
    {
        $this->set_admin_id($admin_id);
        $this->set_carousel_img($img);
        $__GET__IMG = $this->get_carousel_img();
        $__GET__admin_id = $this->get_admin_id();
        $res = $this->save_img_carousel($__GET__IMG, $__GET__admin_id);

        return $res;
    }

    function img_icon_disease($img, $admin_id, $title) {

        $this->set_title($title);
        $this->set_admin_id($admin_id);
        $this->set_carousel_img($img);
        $__GET__TITLE = $this->get_title();
        $__GET__IMG = $this->get_carousel_img();
        $__GET__admin_id = $this->get_admin_id();
        $res = $this->save_img_icon_disease($__GET__IMG, $__GET__admin_id, $__GET__TITLE);

        return $res;
    }

    function delete_data($img_name, $table, $item_id, $admin_id) {

        $this->set_table($table);
        $this->set_id_items($item_id);
        $this->set_admin_id($admin_id);

        $__GET__admin_id = $this->get_admin_id();
        $__GET__TABLE = $this->get_table();
        $__GET__IMG__ID = $this->get_id_items();

        $res = $this->delete_items_image($img_name, $__GET__TABLE, $__GET__IMG__ID, $__GET__admin_id);

        return $res;
    }

    function update_data_img($img, $img_id, $text_title, $table) {
        $this->set_title($text_title);
        $this->set_id_items($img_id);
        $this->set_carousel_img($img);
        $this->set_table($table);

        $__GET__TITLE = $this->get_title();
        $__GET__IMG = $this->get_carousel_img();
        $__GET__item_id = $this->get_id_items();
        $__GET__table = $this->get_table();

        $res = $this->update_img($__GET__TITLE, $__GET__IMG, $__GET__item_id, $__GET__table);
        return $res;
    } 
}
