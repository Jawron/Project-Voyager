<?php


class Category extends Main_object {
    protected static $db_table = "category";
    protected static $db_table_fields = [
        'cat_name',
        'cat_desc'
    ];
    public $id;
    public $cat_name;
    public $cat_desc;







} // end of class