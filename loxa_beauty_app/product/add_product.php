<?php include '../view/header.php'; ?>

<main>
	<div class="page">
		<div class="row">
			<div class="col-sm-offset-1">
				<h1>Add Product Page</h1>
			</div>
			<div class="col-sm-offset-1">
				<form action="." method="get" class="form-horizontal">
					<input type="hidden" name="action" value="save_product">
					<input type="hidden" name="sku" value="<?php echo $sku; ?>">

					<!-- Product SKU Identifier -->
					<div class="form-group">
						<label for="name" class="col-sm-3 control-label">Product SKU:</label>
						<div class="col-sm-6">
							<input class="form-control" type="text" name="sku" value="<?php echo $sku; ?>" disabled="true">
						</div>
					</div>

					<!-- Name Input -->
					<div class="form-group">
						<label for="name" class="col-sm-3 control-label">Name:</label>
						<div class="col-sm-6">
							<input class="form-control" type="text" name="name" autofocus="true" maxlength="50" tabindex="1">
						</div>
					</div>

					<!-- Manufacturer Input -->
					<div class="form-group">
						<label for="manufacturer" class="col-sm-3 control-label">Manufacturer:</label>
						<div class="col-sm-6">
							<input class="form-control" type="text" name="manufacturer" tabindex="2">
						</div>
					</div>

					<!-- Config Size Input -->
					<div class="form-group">
						<label for="config_size" class="col-sm-3 control-label">Config Size:</label>
						<div class="col-sm-6">
							<input class="form-control" type="text" name="config_size" value="1 Each" tabindex="3">
						</div>
					</div>

					<!-- Special From Date Input -->
					<div class="form-group">
						<label for="special_from_date" class="col-sm-3 control-label">Special-From-Date:</label>
						<div class="col-sm-6">
							<input class="form-control" type="text" name="special_from_date" disabled="true" tabindex="4">
						</div>
					</div>

					<!-- Special To Date Input -->
					<div class="form-group">
						<label for="special_to_date" class="col-sm-3 control-label">Special-To-Date:</label>
						<div class="col-sm-6">
							<input class="form-control" type="text" name="special_to_date" disabled="true" tabindex="5">
						</div>
					</div>

					<!-- Thumbnail URL Input -->
					<div class="form-group">
						<label for="thumbnail_url" class="col-sm-3 control-label">Thumbnail URL:</label>
						<div class="col-sm-6">
							<input class="form-control" type="text" name="thumbnail_url" tabindex="6">
						</div>
					</div>

					<!-- Small Image URL Input -->
					<div class="form-group">
						<label for="small_image_url" class="col-sm-3 control-label">Small Image URL:</label>
						<div class="col-sm-6">
							<input class="form-control" type="text" name="small_image_url" tabindex="7">
						</div>
					</div>

					<!-- Relative URL Key Input -->
					<div class="form-group">
						<label for="relative_url_key" class="col-sm-3 control-label">Relative URL Key:</label>
						<div class="col-sm-6">
							<input class="form-control" type="text" name="relative_url_key" tabindex="8">
						</div>
					</div>

					<!-- Enabled Checkbox -->
					<div class="form-group">
						<label for="is_enabled" class="col-sm-3 control-label">Is Enabled?</label>
						<div class="col-sm-1">
							<input class="form-control" type="checkbox" name="is_enabled" checked="true" tabindex="9">
						</div>
					</div>

					<!-- In Stock Checkbox -->
					<div class="form-group">
						<label for="is_in_stock" class="col-sm-3 control-label">Is In Stock?</label>
						<div class="col-sm-1">
							<input class="form-control" type="checkbox" name="is_in_stock" checked="true" tabindex="10">
						</div>
					</div>

					<!-- Low In Stock Checkbox -->
					<div class="form-group">
						<label for="is_low_in_stock" class="col-sm-3 control-label">Is Low In Stock?</label>
						<div class="col-sm-1">
							<input class="form-control" type="checkbox" name="is_low_in_stock" tabindex="11">
						</div>
					</div>

					<!-- Product Type Input -->
					<div class="form-group">
						<label for="product_type" class="col-sm-3 control-label">Product Type:</label>
						<div class="col-sm-6">
							<input class="form-control" type="text" name="product_type" value="simple" tabindex="12">
						</div>
					</div>

					<!-- Special Price Input -->
					<div class="form-group">
						<label for="special_price" class="col-sm-3 control-label">Special Price:</label>
						<div class="col-sm-6">
							<input class="form-control" type="text" name="special_price" tabindex="13">
						</div>
					</div>

					<!-- Price Input -->
					<div class="form-group">
						<label for="price" class="col-sm-3 control-label">Price</label>
						<div class="col-sm-6">
							<input class="form-control" type="text" name="price" tabindex="14">
						</div>
					</div>

					<!-- Quantity Input -->
					<div class="form-group">
						<label for="quantity" class="col-sm-3 control-label">Quantity</label>
						<div class="col-sm-6">
							<input class="form-control" type="number" min="0" max="10000" maxlength="5" name="quantity" tabindex="15">
						</div>
					</div>

					<!-- Save and Cancel Buttons-->
					<div class="form-group buttons">
						<div class="col-sm-offset-3 col-sm-3">
							<input type="submit" value="Save" class="btn btn-lg btn-primary btn-block" tabindex="16">
						</div>
						<div class="col-sm-3">
							<a href=".." class="btn btn-lg btn-danger btn-block" tabindex="17">Cancel</a>
						</div>
					</div>
				</form>
			</div><!-- col offset end -->
		</div><!-- row end -->
	</div>
</main>

<?php include '../view/footer.php'; ?>