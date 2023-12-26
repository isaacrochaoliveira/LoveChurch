<section id="rules_section">
	<div class="container">
		<form action="<?= URL_BASE ?>/praysg/rule/<?= $grupo[0] ?>" method="post" class="">
			<div class="d-flex flex-wrap justify-content-between">
				<div class="">
					<h3 class="size-40pt">15 Rules you got. Use it with Wise</h3>
				</div>
				<div class="">
					<button type="submit" class="btn btn-dark py-3 px-5">Saved Rules</button>
				</div>
			</div>
			<div class="bg-dark p-5 row">
				<?php
					for ($key = 0; $key < 18; $key++) {
						?>
						<div class="col-md-4 mb-3">
							<textarea name="r<?= $key ?>" rows="3" cols="80" class="form-control"></textarea>
						</div>
						<?php
					}
				?>
			</div>
		</form>
	</div>
</section>
