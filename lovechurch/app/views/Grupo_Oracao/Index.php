<?php
	$this->verMsg();
	$this->verErro();
 ?>
<section id="prays__groups">
	<div class="d-flex flex-wrap justify-content-center whole_square_groups mx-2">
		<div class="col-md-4 card" style="width: 26rem;">
				<img src="<?= URL_IMAGEM ?>img/foto-indisponivel.jpg" class="card-img-top" alt="Foto Indisponível">
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
						<?php
						if ($grupos[$key]->foto_grupo == 'foto-indisponivel.jpg') {
							?>
								<img src="<?= URL_IMAGEM ?>img/foto-indisponivel.jpg" class="card-img-top" alt="Foto Indisponível">
							<?php
						} else {
							?>
								<img src="<?= URL_IMAGEM ?>img/lovechurch/<?= $usuario[$key] . '/' . $grupos[$key]->foto_grupo ?>" class="card-img-top" alt="Foto Indisponível">
							<?php
						}
						?>
						<div class="card-body">
		    				<h5 class="card-title font-roboto"><?= $grupos[$key]->nome_grupo ?></h5>
		    				<p class="card-text"><?= $grupos[$key]->descricao_grupo ?></p>
							<p class="d-inline-flex gap-1">
								<button class="btn btn-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseG<?= $grupos[$key]->id_praygroup ?>" aria-expanded="false" aria-controls="collapseExample">
							    	View Rules
							  	</button>
								<a href="<?= URL_BASE ?>praysg/joinin/<?= $grupos[$key]->id_praygroup ?>" class="btn btn-dark">
							    	View Group
							  	</a>
							</p>
							<div class="collapse mb-3" id="collapseG<?= $grupos[$key]->id_praygroup ?>">
							  	<div class="card card-body">
									<?php
										for ($j = 0; $j < count($rules); $j++) {
											if ($rules[0]->id_praygroup == $grupos[$key]->id_praygroup) {
												?>
												<p class="card-text size-14pt"><?= $rules[$j]->rules_text ?></p>
												<?php
											}
										}

									?>
								</div>
						  	</div>
		    				<?php
		    					if ($grupos[$key]->id_usuario == $_SESSION['id']) {
									?>
										<a href="<?= URL_BASE ?>praysg/config/<?= $grupos[$key]->id_praygroup ?>">
				    						<button class="btn btn-success w-100 py-3">Configurar Grupo</button>
										</a>
		    						<?php
		    					} else {
									?>
										<a href="<?= URL_BASE ?>praysg/joinin/<?= $grupos[$key]->id_praygroup ?>">
											<button class="btn btn-dark w-100 py-3">Participate</button>
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
