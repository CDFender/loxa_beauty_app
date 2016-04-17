<?php
require_once('../util/main.php');
require_once('../model/products_db.php');

$action = filter_input(INPUT_GET, 'action');
$sku = filter_input(INPUT_GET, 'sku');

$pattern = '/[0-9]{6}/';

if (!preg_match($pattern, $sku)) {
	redirect('..');
}

$sku_exists = verify_status($sku);

// Determine if valid SKU or user is creating new product, otherwise
// redirect back to home page
if (($sku_exists) && ($action == "update" || $action == "delete")) {
	// Valid
} else if (!$sku_exists && $action == "add") {
	// Valid
} else if ($action == "save_product" || $action == "update_quantity" || $action == "delete_product") {
	// Valid
}else {
	// Invalid -- Return to Home Page
	redirect('..');
}

switch ($action) {
	case 'add':		
		include('./add_product.php');
		break;	
	case 'save_product':
		$name = filter_input(INPUT_GET, 'name');
		$manufacturer = filter_input(INPUT_GET, 'manufacturer');
		$config_size = filter_input(INPUT_GET, 'config_size');
		$special_from_date = filter_input(INPUT_GET, 'special_from_date');
		$special_to_date = filter_input(INPUT_GET, 'special_to_date');
		$thumbnail_url = filter_input(INPUT_GET, 'thumbnail_url');
		$small_image_url = filter_input(INPUT_GET, 'small_image_url');
		$relative_url_key = filter_input(INPUT_GET, 'relative_url_key');
		$is_enabled = filter_input(INPUT_GET, 'is_enabled');
		$is_in_stock = filter_input(INPUT_GET, 'is_in_stock');
		$is_low_in_stock = filter_input(INPUT_GET, 'is_low_in_stock');
		$product_type = filter_input(INPUT_GET, 'product_type');
		$special_price = filter_input(INPUT_GET, 'special_price');
		$price = filter_input(INPUT_GET, 'price');
		$quantity = filter_input(INPUT_GET, 'quantity');

		$product = [
			'status_code' => 1,
			'name' => $name,
			'manufacturer' => $manufacturer,
			'config_size' => $config_size,
			'special_from_date' => $special_from_date,
			'special_to_date' => $special_to_date,
			'thumbnail_url' => $thumbnail_url,
			'small_image_url' => $small_image_url,
			'relative_url_key' => $relative_url_key,
			'is_enabled' => $is_enabled,
			'is_in_stock' => $is_in_stock,
			'is_low_in_stock' => $is_low_in_stock,
			'product_type' => $product_type,
			'special_price'=> $special_price,
			'price' => $price,
			'sku' => $sku,
			'quantity' => $quantity
		];

		$success = save_new_product($sku, $product);

		include('./success_page.php');
		break;
	case 'update':
		$result = load_xml_file($sku);
		$name = $result->product->name;
		$thumbnail_url = $result->product->thumbnail_url;
		$quantity = $result->product->quantity;
		
		include('./update_product.php');
		break;	
	case 'update_quantity':
		$quantity = filter_input(INPUT_GET, 'quantity');

		$success = update_product_quantity($sku, $quantity);

		include('./success_page.php');
		break;
	case 'delete':
		$result = load_xml_file($sku);
		$name = $result->product->name;
		$thumbnail_url = $result->product->thumbnail_url;
		
		include('./delete_product.php');
		break;	
	case 'delete_product':
		$success = delete_product($sku);

		include('./success_page.php');
		break;
	default:
		$error = 'Unknown action: ' . $action;
		include('errors/error.php');
		break;
}
?>