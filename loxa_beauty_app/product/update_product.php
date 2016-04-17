<?php include '../view/header.php'; ?>

<main>
	<div class="page">
		<div class="row">
			<div class="col-sm-offset-1 col-sm-8">
				<h2><?php echo htmlspecialchars($name); ?></h2>
					<div class="col-sm-3">
						<img src="<?php echo $thumbnail_url; ?>" alt="Product Image">
					</div><!-- image col end -->
					<div class="col-sm-offset-4 col-sm-5">
						<form action="." method="get" class="form-horizontal">
							<input type="hidden" name="action" value="update_quantity">
							<input type="hidden" name="sku" value="<?php echo $sku; ?>">

							<!-- Product SKU Identifier -->
							<div class="form-group">
								<label for="name" class="col-sm-5 control-label">Product SKU:</label>
								<div class="col-sm-6">
									<input class="form-control" type="text" name="sku" value="<?php echo $sku; ?>" disabled="true">
								</div>
							</div>

							<!-- Quantity Input -->
							<div class="form-group">
								<label for="quantity" class="col-sm-5 control-label">Quantity:</label>
								<div class="col-sm-6">
									<input class="form-control" type="number" min="0" max="10000" name="quantity" value="<?php echo htmlspecialchars($quantity); ?>" autofocus="true" maxlength="5" tabindex="1">
								</div>
							</div>

							<!-- Update and Cancel Buttons -->
							<div class="form-group buttons">
								<div class="col-sm-6">
									<input type="submit" value="Update" class="btn btn-lg btn-primary btn-block" tabindex="2">
								</div>
								<div class="col-sm-6">
									<a href=".." class="btn btn-lg btn-danger btn-block" tabindex="3">Cancel</a>
								</div>
							</div>
						</form>							
					</div><!-- content col end -->
			</div><!-- col end -->
		</div><!-- row end -->
	</div><!-- page end -->
</main>

<?php include '../view/footer.php'; ?>