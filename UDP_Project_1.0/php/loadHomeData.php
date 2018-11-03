<?php

require 'database.php';

$func = filter_input(INPUT_POST, 'data');

if ($func === "getAllBooks") {
    getAllBooks();
} elseif ($func === "getAllTags") {
    getAllTags();
} elseif ($func === "getBook") {
    $bookId = filter_input(INPUT_POST, 'bookId');
    getBook($bookId);
} elseif ($func === "getSellers") {
    $bookId = filter_input(INPUT_POST, 'bookId');
    getSellers($bookId);
}

function getAllBooks() {
    global $db;
    $query = "SELECT * FROM book;";
    $statement = $db->prepare($query);
    $statement->execute();

    foreach ($statement as $row) {

        echo '<div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="images/' . $row['image'] . '" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="book.php?id=' . ($row['book_id']) . '">' . $row['title'] . '</a>
                  </h4>
                  <p class="card-text">' . $row['description'] . '</p>
                </div>
                <div class="card-footer">
                <h6>By ' . $row['author'] . '</h6>
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

function getBook($bookId) {
    global $db;
    $query = "SELECT * FROM book WHERE book_id = :bookId;";
    $statement = $db->prepare($query);
    $statement->bindValue(":bookId", $bookId);
    $statement->execute();

    foreach ($statement as $row) {

        echo '<div class="col-md-4">
                    <img src="images/' . $row['image'] . '" alt="" class="w-100"/>

                </div>
                <div class="col-md-8 px-3">
                    <div class="card-block px-3">
                        <h4 class="card-title">' . $row['title'] . '</h4>
                        <hr>
                        <h6 class="card-title">Description</h6>
                        <p class="card-text">' . $row['description'] . '</p>
                        <h6 class="card-title">Author</h6>
                        <p class="card-text">' . $row['author'] . '</p>
                        <h6 class="card-title">ISBN</h6>
                        <p class="card-text">' . $row['ISBN'] . '</p>

                        
                    </div>
                </div>';
    }
}

function getSellers($bookId) {
    global $db;
    $query = "SELECT a.username, a.rating, a.profile_image, b.book_id, ub.book_condition FROM account a, book b, uploaded_books ub WHERE a.account_id = ub.account_id AND b.book_id = ub.book_id AND b.book_id = :bookId;";
    $statement = $db->prepare($query);
    $statement->bindValue(":bookId", $bookId);
    $statement->execute();

    foreach ($statement as $row) {

        echo ' <div class="card">
        <div class="card-body">
            <div class="row">
            <div class="col-md-2">
                    <img src="images/' . $row['profile_image'] . '" class="img rounded-circle img-fluid" />
                </div>
                <div class="col-md-10">
                    <p>
                        <a class="float-left" href=""><strong>' . $row['username'] . '</strong></a>
                    
                    <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                    <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                    <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                    <span class="float-right"><i class="text-warning fa fa-star"></i></span>

                    </p>
                    <div class="clearfix"></div>
                    <p><strong>Condition:</strong>'.$row['book_condition'].'</p>
                    <p><strong>Price:</strong>£0.00</p>
                    <p><strong>Rating:</strong>'.$row['rating'].'</p>
                    <p>
                        <a class="float-right btn text-white btn-primary"> <i class="fa fa-heart"></i>Borrow</a>
                    </p>
                </div>
                </div>

        </div>
    </div>';
    }
}
