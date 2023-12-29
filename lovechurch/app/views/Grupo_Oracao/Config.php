<?php
	$this->verMsg();
	$this->verErro();
?>
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
							<?= Date('g:m:i', strtotime($grupo[0]->hora_grupo)) . 'AM'?>
						</p>
					</div>
				</div>
			</div>
			<div class="col-md-6 px-5">
				<!-- <div class="text-center">
					<img src="<?= URL_BASE . $path ?>" width="270" id="target">
				</div> -->
				<div class="py-1">
					<a href="<?= URL_BASE . $path ?>" download="groupsbanner" class="btn btn-dark w-100 py-3 size-14pt">Download Gruop's Banner</a>
				</div>
				<div class="py-1">
					<form action="<?= URL_BASE ?>praysg/upbanner/<?= $grupo[0]->id_praygroup ?>" method="post" enctype="multipart/form-data">
						<button type="button" class="btn btn-dark py-3 w-100 size-14pt" onclick="$('#banner').click()">Gruop's Banner</button>
						<input type="file" name="banner" id="banner" class="d-none" onchange="$('#submit_upbanner').click()">
						<button type="submit" id="submit_upbanner" class="d-none"></button>
					</form>
				</div>
				<div class="py-1">
					<form action="<?= URL_BASE ?>praysg/upphoto/<?= $grupo[0]->id_praygroup ?>" method="post" enctype="multipart/form-data">
						<button type="button" class="btn btn-dark py-3 w-100 size-14pt" onclick="$('#profile').click()">Group's Profile Photo</button>
						<input type="file" name="profile" id="profile" class="d-none" onchange="$('#submit_upphoto').click()">
						<button type="submit" id="submit_upphoto" class="d-none"></button>
					</form>
				</div>
				<div class="py-1">
					<a href="<?= URL_BASE ?>praysg/rules/<?= $grupo[0]->id_praygroup ?>" class="btn btn-dark py-3 w-100 size-14pt">Group's Rules</a>
				</div>
				<div class="py-1">
					<a href="<?= URL_BASE ?>praysg/edit/<?= $grupo[0]->id_praygroup ?>" class="btn btn-dark py-3 w-100 size-14pt">Group's Datas</a>
				</div>
			</div>
		</div>
	</div>
</section>
