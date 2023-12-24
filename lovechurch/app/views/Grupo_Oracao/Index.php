<?php 
	if ($this->verMsg()) {
		echo "<script>alertDefault()</script>";
	}
?>
<section id="prays__groups">
	<div class="row whole_square_groups mt-4">
		<div class="col-md-4 card" style="width: 26rem;">
				<img src="<?= URL_IMAGEM ?>img/home/praysgroups/foto-indisponivel.jpg" class="card-img-top" alt="Foto Indisponível">
			<div class="card-body">
				<h5 class="card-title font-roboto">Let's Create Yours</h5>
				<p class="card-text">It's time to create you own pray group. It's very simple. Click on button below and watching</p>
				<a href="<?= URL_BASE ?>praysg/create" class="btn btn-primary w-100 py-3">Create Group</a>
				</div>
		</div>
		<?php 
			for ($key = 0; $key < count($grupos); $key++) {
				?>
					<div class="col-md-4 card" style="width: 26rem;">
							<img src="<?= URL_IMAGEM ?>img/home/praysgroups/foto-indisponivel.jpg" class="card-img-top" alt="Foto Indisponível">
						<div class="card-body">
		    				<h5 class="card-title font-roboto">Let's Create Yours</h5>
		    				<p class="card-text">It's time to create you own pray group. It's very simple. Click on button below and watching</p>
		    				<button class="btn btn-primary w-100 py-3" onclick="alertDefault()">Create Group</button>
		  				</div>
					</div>
				<?php
			}
		?>
	</div>
</section>