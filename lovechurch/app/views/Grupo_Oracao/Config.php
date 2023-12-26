<section id="config_group">
	<div class="container">
		<div class="d-flex flex-wrap align-items-center">
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
							<?= Date("M, D Y - m/d/Y", strtotime($grupo[0]->data_group)) ?>
						</p>
					</div>
				</div>
				<div class="d-flex flex-wrap justify-content-between">
					<div>
						<p class="size-15pt">
							Time of Creation
						</p>
					</div>
					<div>
						<p class="size-15pt">
							<?= Date('G:m:i', strtotime($grupo[0]->hora_grupo)) . 'AM'?>
						</p>
					</div>
				</div>
				<div class="d-flex flex-wrap justify-content-between">
					<div>
						<p class="size-15pt">
							How many people in it
						</p>
					</div>
					<div>
						<p class="size-15pt">
							<?= $grupo[0]->participando_grupo ?>
						</p>
					</div>
				</div>
				<div class="d-flex flex-wrap justify-content-between">
					<div>
						<p class="size-15pt">
							How many people left
						</p>
					</div>
					<div>
						<p><?= $grupo[0]->saiu_grupo ?></p>
					</div>
				</div>
			</div>
			<div class="col-md-6 px-5">
				<div class="text-center">
					<img src="<?= URL_BASE ?>assets/img/praysgroups/<?= $grupo[0]->foto_grupo ?>" width="270" id="target">
				</div>
				<div class="py-1">
					<form action="<?=  ?>"></form>
					<button type="button" class="btn btn-dark py-3 w-100 size-14pt" onclick="$('#banner').click()">Group's Banner</button>
					<input type="file" name="banner" id="banner" class="d-none" onchange="BringPhoto()">
				</div>
				<div class="py-1">
					<a href="" class="btn btn-dark py-3 w-100 size-14pt">Group's Rules</a>
				</div>
				<div class="py-1">
					<a href="" class="btn btn-dark py-3 w-100 size-14pt">Group's Datas</a>
				</div>
			</div>
		</div>
	</div>
</section>