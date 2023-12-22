<div class="template-container">
	<a href="<?= URL_BASE ?>fornecedores/create" class="btn-cad d-inline-block btn-verde">
        <span class="material-symbols-sharp">
            add
        </span>
        Novo Fornecedor
    </a>
</div>
<div class="template-container">
	<?php 
		$this->verMsg();
		$this->verErro();
	?>
	<table id="dataTable">
		<thead>
			<th>#</th>
			<th>Nome</th>
			<th>Email</th>
			<th>Cadastro</th>
			<th>Chave Pix</th>
		</thead>
		<tbody>
			<?php 
				for ($key = 0; $key < count($fornecedores); $key++) {
					?>
						<tr>
							<td style="width: 60px;" id="dropup__fornecedores">
								<div class="d-flex flex-wrap justify-content-around">
									<div>
										<div class="dropup">
											<span class="material-symbols-sharp" style="font-size: 21pt;">
												list
											</span>
											<ul class="dropdown-menu">
												<li class="more-info">
													<p>Telefone: <?= $fornecedores[$key]->telefone ?></p>
													<p>Endereço: <?= $fornecedores[$key]->endereco ?></p>
												</li>
												<li>
													<a href="<?= URL_BASE ?>fornecedores/edit/<?= $fornecedores[$key]->id_fornecedores ?>" class="dropdown-item">
														<span class="material-symbols-sharp">
															edit
														</span>
														Editar Fornecedor
													</a>
												</li>
												<li>
													<a href="<?= URL_BASE ?>fornecedores/delete/<?= $fornecedores[$key]->id_fornecedores ?>" class="dropdown-item">
														<span class="material-symbols-sharp">
															delete_forever
														</span>
														Excluir Fornecedor
													</a>
												</li>
											</ul>
										</div>
									</div>
									<div>
										<p style="font-size: 15pt;"><?= $fornecedores[$key]->id_fornecedores ?></p>
									</div>
								</div>
							</td>
							<td>
								<p style="font-size: 14pt;"><?= $fornecedores[$key]->nome ?></p>
							</td>
							<td>
								<p style="font-size: 14pt;"><?= $fornecedores[$key]->email ?></p>
							</td>
							<td>
								<p style="font-size: 14pt;"><?= Date('Y-m-d', strtotime($fornecedores[$key]->data)) ?></p>
							</td>
							<td>
								<p style="font-size: 14pt;"><?= $fornecedores[$key]->chave_pix ?></p>
							</td>
						</tr>
					<?php
				}
			?>
		</tbody>
	</table>
</div>