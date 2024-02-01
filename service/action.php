<?php
require_once 'handler.php';
$handler = new handler;

// navbar
$nav = $handler->table("vaccine");
foreach ($nav as $nav_header) {
    $nav_header_title = $nav_header['title'];
    $nav_header_link = $nav_header['link'];
}
// carousel
$carousel = $handler->table("images_carousel_homepage");

// disease
$disease = $handler->table("disease"); 
// disease_case
$disease_case = $handler->table("disease_case"); 
// clinic
$clinic = $handler->table("clinic");
// hospital
$hospital = $handler->table("hospital");
// medicine_warning
$medicine_warning = $handler->table("medicine_warning");
// carousel hospital
$carousel_hospital = $handler->table("hospital_all");
// article_case
$article_case = $handler->table("article_case");
// medicine_warning
$medicine_warning = $handler->table("medicine_warning");
// review
$review = $handler->table("review");
// review_case
$review_case = $handler->table("review_case");
//promotion
$promotion = $handler->table("promotion");
//promotion_case
$promotion_case = $handler->table("promotion_case");
if (isset($_POST['readone'])) {
    if ($_POST['readone'] == null) {
        echo "something went wrong with tag";
    } else {
        echo $_POST['readone'];
    }
}

