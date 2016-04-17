<?php

function verify_status($sku) {
	$result = load_xml_file($sku);
	
	// if no product exists, return false
	if ($result === false) {
		return false;
	}

	$status_code = (int)$result->status_code;

	if ($status_code === 1) {
		return true;
	}

	return false;
}

function load_xml_file($sku) {
	$file = '../data/' . $sku . '.xml';
	//$context = stream_context_create(array('http' => array('header' => 'Accept: application/xml')));
	//$url = 'http://www.loxabeauty.com/webservices/product/info?sku=' . $sku;
	//$file = file_get_contents($url, false, $context);

	if (file_exists($file)) {
		return simplexml_load_file($file);
	} else {
		return false;
	}
}

function save_new_product($sku, $product) {
	$file = '../data/' . $sku . '.xml';
	$name = $product['name'];
	$manufacturer = $product['manufacturer'];
	$config_size = $product['config_size'];
	$special_from_date = $product['special_from_date'];
	$special_to_date = $product['special_to_date'];
	$thumbnail_url = $product['thumbnail_url'];
	$small_image_url = $product['small_image_url'];
	$relative_url_key = $product['relative_url_key'];
	$is_enabled = $product['is_enabled'];
	$is_in_stock = $product['is_in_stock'];
	$is_low_in_stock = $product['is_low_in_stock'];
	$product_type = $product['product_type'];
	$special_price = $product['special_price'];
	$price = $product['price'];
	$quantity = $product['quantity'];

	$xml = simplexml_load_string('<result></result>');
	$result = $xml->addChild('status_code', $product['status_code']);

	$product = $xml->addChild('product');
	$product->addChild('name', xml_amp($name));
	$product->addChild('manufacturer', xml_amp($manufacturer));
	$product->addChild('config_size', $config_size);
	$product->addChild('special_from_date', $special_from_date);
	$product->addChild('special_to_date', $special_to_date);
	$product->addChild('thumbnail_url', $thumbnail_url);
	$product->addChild('small_image_url', $small_image_url);
	$product->addChild('relative_url_key', $relative_url_key);
	$product->addChild('is_enabled', $is_enabled);
	$product->addChild('is_in_stock', $is_in_stock);
	$product->addChild('is_low_in_stock', $is_low_in_stock);
	$product->addChild('product_type', $product_type);
	$product->addChild('special_price', $special_price);
	$product->addChild('price', $price);
	$product->addChild('sku', $sku);
	$product->addChild('quantity', $quantity);

	$doc = new DOMDocument('1.0', 'utf-8');
	$doc->formatOutput = true;
	$node = dom_import_simplexml($xml);
	$node = $doc->importNode($node, true);
	$doc->appendChild($node);
	$doc->save($file);

	if (file_exists($file)) {
		return 'File saved successfully';
	} else {
		return 'Error: file did not save';
	}
}

function xml_amp($string) {
	return htmlspecialchars($string, ENT_XML1, 'UTF-8', false);
}

function update_product_quantity($sku, $quantity) {
	$result = load_xml_file($sku);

	if ($result !== false) {
		$result->product->quantity = $quantity;
		$result->asXML('../data/' . $sku . '.xml');
		return 'Product updated successfully';
	} else {
		return 'There was an error!';
	}
}

function delete_product($sku) {
	$file = '../data/' . $sku . '.xml';

	$success = unlink($file);

	if ($success) {
		return 'File was deleted successfully';	
	} else {
		return 'There was an error and no changes were made to the file';	
	}
}
?>