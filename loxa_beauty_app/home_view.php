<?php include 'view/header.php'; ?>

<main>		
	<div class="home">
		<div class="row">
			<div class="col-sm-offset-1">
				<h1>Product Catalog App</h1>
				<div class="col-sm-5">
					<label>Please enter the Product SKU for the product that you want to add, update, or delete from the catalog list.</label>
				</div>
				<div class="col-sm-5" id="options">

					<!-- Add Product Form -->
					<form action="<?php echo $app_path . 'product'; ?>" class="input-group" method="get">
						<input type="hidden" name="action" value="add">
						<span class="input-group-btn">
							<button class="btn btn-info" type="submit">Add Product:</button>
						</span>
						<input type="text" class="form-control" name="sku" placeholder="Product SKU#" tabindex="1" autofocus="true" data-error="Please enter a six digit SKU number.">
						<div class="help-block with-errors"></div>
					</form><!-- input group end -->

					<!-- Update Product Form -->
					<form action="<?php echo $app_path . 'product'; ?>" class="input-group" method="get">
						<input type="hidden" name="action" value="update">
						<span class="input-group-btn">
							<button class="btn btn-warning" type="submit">Update Product Qty:</button>
						</span>
						<input type="text" class="form-control" name="sku" placeholder="Product SKU#" tabindex="2">
					</form><!-- input group end -->

					<!-- Delete Product Form -->
					<form action="<?php echo $app_path . 'product'; ?>" class="input-group" method="get">
						<input type="hidden" name="action" value="delete">
						<span class="input-group-btn">
							<button class="btn btn-danger" type="submit">Delete Product:</button>
						</span>
						<input type="text" pattern="[0-9]{6}" name="sku" class="form-control" id="delete_sku" placeholder="Product SKU#" tabindex="3">
					</form><!-- input group end -->

				</div>
			</div><!-- col offset end -->		
		</div><!-- row end -->
	</div><!-- page end -->
</main><!-- main -->

<?php include 'view/footer.php'; ?>