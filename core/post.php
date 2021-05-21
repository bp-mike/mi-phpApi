<?php

class Post{
    //____ database connection and table name
    private $conn;
    private $table = 'posts';

    //____ object properties
    public $id;
    public $category_id;
    public $category_name;
    public $title;
    public $body;
    public $author;
    public $create_at;

    //_____ constructor with db connection
    public function __construct($db){
        $this->conn = $db;
    }

    // _____ getting posts from the db
    public function read(){
        // __ read query
        $query = 'SELECT
            c.name as category_name,
            p.id,
            p.category,
            p.title,
            p.body,
            p.author,
            p.create_at
            FROM
            '.$this->table.'p
            LEFT JOIN
                categories c ON p.category_id = c.id
                ORDER BY p.create_at DESK';
        
        // __ prepare statement
        $stmt = $this->conn -> prepare($query);

        // __execute query
        $stmt->execute();

        return $stmt;
    }


}

?>