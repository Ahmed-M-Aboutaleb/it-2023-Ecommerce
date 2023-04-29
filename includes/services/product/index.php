<?php

include_once $_SERVER['DOCUMENT_ROOT'] .'/includes/functions/validateInput.php'; // include validation file

/*

Name: findProducts()
Description: This function will find all products in the database
Parameters: $conn (object)
version: 1.0

*/

function findProducts($conn) {
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);
    if($result->num_rows <= 0) {
        return false;
    }
    return $result;
}

/*

Name: findOneProduct()
Description: This function will find one product in the database
Parameters: $conn (object), $id (int)
version: 1.0

*/

function findOneProduct($conn, $id) {
    if(!validateInput($id)) {
        header("Location: products.php");
        return false;
    }
    $id = validateInput($id);
    $sql = "SELECT * FROM products WHERE id = " . $id . " LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows <= 0) {
        header("Location: products.php");
        return false;
    } 
    $result = $result->fetch_assoc();
    return $result;
}

/*

Name: findThreeProducts()
Description: This function will find three products in the database
Parameters: $conn (object)
version: 1.0

*/

function findThreeProducts($conn) {
    $sql = "SELECT * FROM products ORDER BY id DESC LIMIT 3";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

/*

Name: findProductsByCategory()
Description: This function will find products by category in the database
Parameters: $conn (object), $category (string)
version: 1.0

*/

function findProductsByCategory($conn, $category) {
    if(!validateInput($category)) {
        header("Location: products.php");
        return false;
    }
    $category = validateInput($category);
    $sql = "SELECT * FROM products WHERE category = '{$category}'";
    $result = $conn->query($sql);
    if($result->num_rows <= 0) {
        return false;
    }
    return $result;
}

/*

Name: insertProduct()
Description: This function will insert a product in the database
Parameters: $conn (object), $name (string), $description (string), $price (string), $category (string), $seller (string), $rating (string)
version: 1.0

*/

function insertProduct($conn, $name, $description, $price, $category, $seller, $rating, $image, $date) {
    if(!validateInput($name) || !validateInput($description) || !validateInput($price) || !validateInput($category) || !validateInput($seller) || !validateInput($rating) || !validateInput($image) || !validateInput($date)) {
        return false;
    }
    $filteredName = validateInput($name);
    $filteredDescription = validateInput($description);
    $filteredPrice = validateInput($price);
    $filteredCategory = validateInput($category);
    $filteredSeller = validateInput($seller);
    $filteredRating = validateInput($rating);
    $filteredDate = validateInput($date);
    $image = validateInput($image);
    $sql = "INSERT INTO products (name, description, price, image, date, category, seller, rating) VALUES ('{$filteredName}', '{$filteredDescription}', '{$filteredPrice}', '{$image}', '{$filteredDate}', '{$filteredCategory}', '{$filteredSeller}', '{$filteredRating}')";
    $result = $conn->query($sql);
    if(!$result) {
        return false;
    }
    return true;
}


/*

Name: updateProduct()
Description: This function will update a product in the database
Parameters: $conn (object), $id (int), $name (string), $description (string), $price (string), $category (string), $seller (string), $date (string), $rating (string)
version: 1.0

*/

function updateProduct($conn, $id, $name, $description, $price, $category, $seller, $date, $rating, $image) {
        if(!validateInput($name) || !validateInput($description) || !validateInput($price) || !validateInput($category) || !validateInput($seller) || !validateInput($rating) || !validateInput($image) || !validateInput($date)) {
            return false;
        }
        $filteredName = validateInput($name);
        $filteredDescription = validateInput($description);
        $filteredPrice = validateInput($price);
        $filteredCategory = validateInput($category);
        $filteredSeller = validateInput($seller);
        $filteredRating = validateInput($rating);
        $filteredDate = validateInput($date);
        $image = validateInput($image);
        if($image == "") {
            $sql = "UPDATE products SET name = '{$filteredName}', description = '{$filteredDescription}', price = '{$filteredPrice}', category = '{$filteredCategory}', seller = '{$filteredSeller}', date = '{$filteredDate}', rating = '{$filteredRating}' WHERE id = {$id}";
        } else {
            $sql = "UPDATE products SET name = '{$filteredName}', description = '{$filteredDescription}', price = '{$filteredPrice}', image = '{$image}', category = '{$filteredCategory}', seller = '{$filteredSeller}', date = '{$filteredDate}', rating = '{$filteredRating}' WHERE id = {$id}";
        }
        $result = $conn->query($sql);
        if(!$result) {
            return false;
        }
        return true;
}

/*

Name: deleteProduct()
Description: This function will delete a product in the database
Parameters: $conn (object), $id (int)
version: 1.0

*/

function deleteProduct($conn, $id) {
    if(!validateInput($id)) {
        return false;
    }
    $id = validateInput($id);
    $sql = "DELETE FROM products WHERE id = {$id}";
    $result = $conn->query($sql);
    if(!$result) {
        return false;
    }
    return true;
}

/*

Name: search()
Description: This function will search for a product in the database
Parameters: $conn (object), $item (string)
version: 1.0

*/

function search($conn, $product) {
    if(!validateInput($product)) {
        return false;
    }
    $filteredProduct = validateInput($product);
    $sql = "SELECT * FROM products WHERE name LIKE '%". $filteredProduct ."%'";
    $result = $conn->query($sql);
    if($result->num_rows <= 0) {
        return false;
    }
    return $result;
}

/*

Name: getProductsCount()
Description: This function will count the number of products in the database
Parameters: $conn (object)
version: 1.0

*/

function getProductsCount($conn) {
    $sql = "SELECT COUNT(*) AS count FROM products";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows <= 0) {
        return false;
    }
    $result = $result->fetch_assoc();
    return $result['count'];
}

?>