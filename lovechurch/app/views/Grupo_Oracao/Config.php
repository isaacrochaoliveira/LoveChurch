<section id="config_group">
	<div class="container">
		<div class="d-flex flex-wrap">
			<div class="col-md-6">
				<h5 class="size-36pt"><?= $grupo[0]->nome_grupo ?></h5>
				<hr>
				<div class="d-flex flex-wrap justify-content-between">
					<div>
						<p class="size-15pt">
							Gruop's Name
						</p>
					</div>
					<div>
						<p class="size-15pt">
							<?= $grupo[0]->nome_grupo ?>
						</p>
					</div>
				</div>
				<div class="d-flex flex-wrap justify-content-between">
					<div>
						<p class="size-15pt">
							Gruop's Description
						</p>
					</div>
					<div>
						<p class="size-15pt">
							<?= $grupo[0]->descricao_grupo ?>
						</p>
					</div>
				</div>
				<div class="d-flex flex-wrap justify-content-between">
					<div>
						<p class="size-15pt">
							Creation's Date
						</p>
					</div>
					<div>
						<p class="size-15pt">
							<?= Date("d/m/Y", strtotime($grupo[0]->data_group)) ?>
						</p>
					</div>
				</div>
				<div class=>
					<div>
						
					</div>
				</div>
			</div>
			<div class="col-md-6">
				Olá
			</div>
		</div>
	</div>
</section>