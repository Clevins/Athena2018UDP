<?php

require 'database.php';

$func = filter_input(INPUT_POST, 'data');

if ($func === "getAllBooks") {
    getAllBooks();
} elseif ($func === "getAllTags") {
    getAllTags();
}

function getAllBooks() {
    global $db;
    $query = "SELECT * FROM book;";
    $statement = $db->prepare($query);
    $statement->execute();

    foreach ($statement as $row) {

        echo '<div class="item  col-lg-6">
                    <div class="thumbnail card">
                        <div class="img-event">
                            <img class="group list-group-image img-fluid" style="width:400px; height:250;" src="images/' . $row['image'] . '" alt="" />
                        </div>
                        <div class="caption card-body">
                            <h4 class="group card-title inner list-group-item-heading">
                                ' . $row['title'] . '</h4>
                            <p class="group inner list-group-item-text">
                                ' . $row['description'] . '</p>
                            <div class="row">

                                <div class="col-xs-12 col-md-6">
                                    <a class="btn btn-primary" href="http://www.jquery2dotnet.com">View Sellers</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
    }
}

function getAllTags() {
    global $db;
    $query = "SELECT * FROM book;";
    $statement = $db->prepare($query);
    $statement->execute();

    foreach ($statement as $row) {

        echo '<label class="form-check">
                <input class="form-check-input" type="checkbox" value="">
                    <span class="form-check-label">
                        ' . $row['category'] . '
                    </span>
                </label>';
    }
}
