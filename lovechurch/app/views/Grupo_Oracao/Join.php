<style media="screen">
	.bg-banner-full-width {
		background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("../../assets/img/lovechurch/<?= $usuario[0] ?>/<?= $grupos[0]->banner_grupo ?>") no-repeat;
		background-position: center;
		background-size: cover;
		background-attachment: fixed;
	}
</style>
<section id="join_in_pray--section">
	<div class="bg-banner-full-width">
		Olá
	</div>
	<div>
		<div class="d-flex flex-wrap">
			<div class="col-md-3">
				<button type="button" class="btn btn-dark w-100 py-3" id="btn-join" onclick="tab_join('div__informations', 'div__rules', 'div__join')">Join</button>
			</div>
			<div class="col-md-3">
				<button type="button" class="btn btn-light w-100 py-3" id="btn-informations" onclick="tab_information('div__informations', 'div__rules', 'div__join')">Informations</button>
			</div>
			<div class="col-md-3">
				<button type="button" class="btn btn-light w-100 py-3" id="btn-rules" onclick="tab_rules('div__informations', 'div__rules', 'div__join')">Rules</button>
			</div>
		</div>
		<div style="padding: 0px 120px" class="border-tab__windows">
			<div id="div__join" class="d-block">
				<div class="row py-5">
					<div class="col-md-3 my-auto">
						<img src="<?= URL_BASE ?>assets/img/lovechurch/<?= $usuario[0] ?>/<?= $grupos[0]->foto_grupo ?>" alt="" width="350">
					</div>
					<div class="col-md-6">
						<h3 class="font-roboto size-30pt"><?= $grupos[0]->nome_grupo ?></h3>
						<hr>
						<p><?= $grupos[0]->descricao_grupo ?></p>
					</div>
					<div class="col-md-3 my-auto">
						<a href="<?= $grupos[0]->whatsapplink_grupo ?>" target="_blank" class="btn btn-light border py-3 my-2 w-100">Sing-in</a>
						<a href="https://w.app/pkb5en" taget="_blank" class="btn btn-light border py-3 my-2 w-100" title="WhatsApp do Administrador">Report Group</a>
					</div>
				</div>
			</div>
			<div class="d-none" id="div__informations">
				<div class="row py-5">
					<div class="col-md-3 my-auto">
						<img src="<?= URL_BASE ?>assets/img/lovechurch/<?= $usuario[0] ?>/<?= $grupos[0]->foto_grupo ?>" alt="" width="350">
					</div>
					<div class="col-md-6">
						<?php
							$time = explode(':', $grupos[0]->hora_grupo);
							if (($time[0] >= '0') && ($time[0] <= 11)) {
								$timeZone = 'AM';
							} else {
								$timeZone = 'PM';
							}
						?>
						<h3 class="font-roboto size-30pt"><?= $grupos[0]->nome_grupo ?></h3>
						<h4 class="size-20pt"><?= $grupos[0]->nome ?></h4>
						<hr>
						<p><?= $grupos[0]->descricao_grupo ?></p>
						<p><?= $grupos[0]->versiculobase_group ?></p>
						<p class="size-15pt font-italic"><?= Date('m/d/Y', strtotime($grupos[0]->data_group)) ?></p>
						<p class="size-15pt font-italic"><?= Date('g:m:s', strtotime($grupos[0]->hora_grupo)) . $timeZone ?></p>
					</div>
					<div class="col-md-3 my-auto">
						<a href="https://w.app/pkb5en" target="_blank" class="btn btn-light border py-3 my-2 w-100">Report Group</a>
					</div>
				</div>
			</div>
			<div class="d-none" id="div__rules">
				<div class="row py-5">
					<div class="col-md-3 my-auto">
						<img src="<?= URL_BASE ?>assets/img/lovechurch/<?= $usuario[0] ?>/<?= $grupos[0]->foto_grupo ?>" alt="" width="350">
					</div>
					<div class="col-md-6">
						<?php
							for ($key = 0; $key < count($rules); $key++) {
								if ($rules[$key]->id_praygroup == $grupos[0]->id_praygroup) {
									?>
									<p class="size-14pt font-italic"><?= $rules[$key]->rules_text ?></p>
									<?php
								}
							}
						?>
					</div>
					<div class="col-md-3 my-auto">
						<a href="https://w.app/pkb5en" target="_blank" class="btn btn-light border py-3 my-2 w-100">Report Group</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
