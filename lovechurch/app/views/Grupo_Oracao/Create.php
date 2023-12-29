<section id="create_group_pray">
	<div class="container">
		<form action="<?= URL_BASE ?>praysg/salvar" method="post">
			<div class="d-flex flex-wrap justify-content-center">
				<div class="col-md-4">
					<div class="form-floating">
						<input type="text" name="nome" id="nome" class="form-control" placeholder="Nome">
						<label for="nome">Name of Group</label>
					</div>
				</div>
				<div class="col-md-4 mx-2">
					<div class="form-floating">
						<input type="text" name="descricao" id="descricao" class="form-control" placeholder="descrição">
						<label for="descricao">Description's Group</label>
					</div>
				</div>
			</div>
			<div class="row mt-3">
				<div class="col-md-6">
					<div class="form-floating">
						<textarea cols="80" rows="10" name="versiculo_base" id="versiculo_base" class="form-control" placeholder="Versículo"></textarea>
						<label for="versiculo_base">Versículo Base</label>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-floating">
						<input type="text" name="whatsapplink_grupo" id="whatsapplink_grupo" class="form-control" placeholder="Link de Acesso">
						<label for="whatsapplink_grupo">Link de Acesso para novos Integrantes (WhatsApp)</label>
					</div>
				</div>
			</div>
			<div class="d-flex flex-wrap justify-content-center my-5">
				<div class="col-md-6">
					<button type="submit" class="btn btn-dark py-3 w-100">
						Create Group
					</button>
				</div>
			</div>
		</form>
	</div>
</section>
