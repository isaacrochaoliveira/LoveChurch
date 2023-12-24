<?php 
	$this->verMsg();
	$this->verErro();
 ?>
<section id="prays__groups">
	<div class="d-flex flex-wrap justify-content-center whole_square_groups mx-2">
		<div class="col-md-4 card" style="width: 26rem;">
				<img src="<?= URL_IMAGEM ?>img/praysgroups/foto-indisponivel.jpg" class="card-img-top" alt="Foto Indisponível">
			<div class="card-body">
				<h5 class="card-title font-roboto">Let's Create Yours</h5>
				<p class="card-text">It's time to create you own pray group. It's very simple. Click on button below and watching</p>
				<a href="<?= URL_BASE ?>praysg/create" class="btn btn-primary w-100 py-3">Create Group</a>
				</div>
		</div>
		<?php 
			for ($key = 0; $key < count($grupos); $key++) {
				?>
					<div class="col-md-4 card mx-2" style="width: 26rem;">
							<img src="<?= URL_IMAGEM ?>img/praysgroups/foto-indisponivel.jpg" class="card-img-top" alt="Foto Indisponível">
						<div class="card-body">
		    				<h5 class="card-title font-roboto"><?= $grupos[$key]->nome_grupo ?></h5>
		    				<p class="card-text"><?= $grupos[$key]->descricao_grupo ?></p>
		    				<?php 
		    					if ($grupos[$key]->id_usuario = $_SESSION['id']) {
									?>
										<a href="<?= URL_BASE ?>praysg/config/<?= $grupos[$key]->id_praygroup ?>">
				    						<button class="btn btn-success w-100 py-3">Configurar Grupo</button>
										</a>
		    						<?php
		    					}
		    				?>
		  				</div>
					</div>
				<?php
			}
		?>
	</div>
</section>