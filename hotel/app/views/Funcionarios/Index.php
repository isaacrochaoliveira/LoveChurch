<div class="template-container">
    <a href="<?= URL_BASE ?>funcionarios/create" class="btn-cad d-inline-block btn-verde">
        <span class="material-symbols-sharp">
            add
        </span>
        Novo Funcionário
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
			<th>Telefone</th>
			<th>CPF</th>
			<th>Cargo</th>
			<th>Email</th>
		</thead>
		<tbody>
			<?php 
				for ($key = 0; $key < count($funcionarios); $key++) {
					?>
						<tr>
							<th width="80px">
								<div class="d-flex flex-wrap justify-content-around">
									<div>
										<div class="dropup" id="dropup__funcionarios">
											<span class="material-symbols-sharp" style="font-size: 19pt;">
												list
											</span>
											<ul class="dropdown-menu">
												<li class="more-info">
													<p>Obs: <?= $funcionarios[$key]->obs ?></p>
													<p>Endereço: <?= $funcionarios[$key]->endereco ?></p>
													<p>Cadastro: <?= Date('d/m/y', strtotime($funcionarios[$key]->data)) ?></p>
													<p>Pagamento: <?= $funcionarios[$key]->chave_pix ?></p>
												</li>
												<li>
													<a href="<?= URL_BASE ?>funcionarios/edit/<?= $funcionarios[$key]->id_funcionario ?>" class="dropdown-item">
														<span class="material-symbols-sharp">
															edit
														</span>	
														Editar Funcionário													
													</a>
												</li>
												<li>
													<a href="<?= URL_BASE ?>funcionarios/delete/<?= $funcionarios[$key]->id_funcionario ?>" class="dropdown-item">
														<span class="material-symbols-sharp">
															delete_forever
														</span>
														Excluir Funcionário
													</a>
												</li>
											</ul>
										</div>
									</div>
									<div>
										<p style="font-size: 15pt"><?= $funcionarios[$key]->id_funcionario ?></p>
									</div>
								</div>
							</th>
							<td>
								<p style="font-size: 12pt;"><?= $funcionarios[$key]->nome ?></p>
							</td>
							<td>
								<p style="font-size: 12pt;"><?= $funcionarios[$key]->telefone ?></p>
							</td>
							<td>
								<p style="font-size: 12pt;"><?= $funcionarios[$key]->cpf ?></p>
							</td>
							<td>
								<p style="font-size: 12pt;"><?= $funcionarios[$key]->cargo ?></p>
							</td>
							<td>
								<p style="font-size: 12pt;"><?= $funcionarios[$key]->email ?></p>
							</td>
						</tr>
					<?php
				}
			?>
		</tbody>
	</table>
</div>