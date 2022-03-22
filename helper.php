<?php

use App\Models\Category;

function categories(){
    $category =Category::all();
    return  $category;
}

