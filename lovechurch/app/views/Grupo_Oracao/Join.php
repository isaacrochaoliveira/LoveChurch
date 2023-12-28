<style media="screen">
	.bg-banner-full-width {
		background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("../../assets/img/lovechurch/<?= $usuario[0] ?>/grupo_negao.jpg") no-repeat;
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
		<div class="container d-flex flex-wrap">
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
		<div class="container border-tab__windows">
			<div id="div__join" class="d-block">
				<div class="row py-5">
					<div class="col-md-3">
						<img src="<?= URL_BASE ?>assets/img/lovechurch/<?= $usuario[0] ?>/<?= $grupos[0]->foto_grupo ?>" alt="" width="350">
					</div>
					<div class="col-md-6">
						<h3 class="font-roboto size-30pt"><?= $grupos[0]->nome_grupo ?></h3>
						<hr>
						<p><?= $grupos[0]->descricao_grupo ?></p>
						<p class="size-15pt font-italic"><?= $grupos[0]->participando_grupo ?> People Who Participanting</p>
					</div>
					<div class="col-md-3 my-auto">
						<a href="#" class="btn btn-light border py-3 my-2 w-100">Sing-in</a>
						<a href="#" class="btn btn-light border py-3 my-2 w-100">Report Group</a>
						<a href="#" class="btn btn-light border py-3 my-2 w-100">Block Group</a>
					</div>
				</div>
			</div>
			<div class="d-none" id="div__informations">
				Olá
			</div>
			<div class="d-none" id="div__rules">
				Mundo!
			</div>
		</div>
	</div>
</section>