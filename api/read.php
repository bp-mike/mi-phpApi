<?php
//required headers
header('Access-control-Allow-Origin: *');
header('Content-Type:application/json; charset=UTF-8');


// __ initialising the api
include_once('../core/initialize.php');

// __ instanciate post
$post = new Post($db);

// __ query post
$result = $post->read();

// __ get row count
$num = $result->rowCount();

// __ check if num is > 0
if($num > 0){
    $post_arr = array();
    $post_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $post_item = array(
            'id' => $id,
            'title' => $title,
            'body' => html_entity_decode($body),
            'author' => $author,
            'categroy_id' => $category_id,
            'category_name' => $category_name
        );
        array_push($post_arr['data'], $post_item);
    }
    // __ convert to json and output
    echo json_decode($post_arr);
}else{
    echo json_decode(array('message' => 'no posts found'));
}

?>