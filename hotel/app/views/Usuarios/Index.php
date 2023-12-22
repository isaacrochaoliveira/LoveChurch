<div class="template-container">
	<a href="<?= URL_BASE ?>usuario/create" class="btn-cad d-inline-block btn-verde">
        <span class="material-symbols-sharp">
            add
        </span>
        Novo Usuário
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
			<th>Email</th>
			<th>Nível</th>
			<th>Foto</th>
		</thead>
		<tbody>
			<?php 
				for ($key = 0; $key < count($usuarios); $key++) {
					if ($usuarios[$key]->ativo == 'Sim') {
						$method = 'desactive';
						$Word = 'Desativar Usuário';
					} else {
						$method = 'active';
						$Word = 'Ativar Usuário';
					}
					?>	
					<tr>
						<td width="60px">
							<div class="d-flex flex-wrap justify-content-between">
								<div>
									<div class="dropup" id="dropup__usuarios">
										<span class="material-symbols-sharp" style="font-size: 22pt;">
											list
										</span>
										<ul class="dropdown-menu">
											<li class="more-info">
												<p>Senha: <?= $usuarios[$key]->senha ?></p>
												<p>Cadastro: <?= Date('d/m/y', strtotime($usuarios[$key]->data)) ?></p>
												<p>E-amil: <?= $usuarios[$key]->email ?></p>
											</li>
											<li>
												<a href="<?= URL_BASE ?>usuarios/edit/<?= $usuarios[$key]->id_usuario ?>" class="dropdown-item">
													<span class="material-symbols-sharp">
														edit
													</span>
													Editar Usuário
												</a>
											</li>
											<li>
												<a href="<?= URL_BASE ?>usuarios/delete/<?= $usuarios[$key]->id_usuario ?>" class="dropdown-item">
													<span class="material-symbols-sharp">
														delete_forever
													</span>
													Excluir Usuário
												</a>
											</li>
											<li>
												<a class="dropdown-item" href="<?= URL_BASE ?>usuarios/<?= $method . "/" . $usuarios[$key]->id_usuario ?>">
													<span class="material-symbols-sharp">
														notifications_unread
													</span>
													<?= $Word ?>
												</a>
											</li>
											<li>
												<a href="<?= URL_BASE ?>usuarios/access/<?= $usuarios[$key]->id_usuario ?>" class="dropdown-item">
													<span class="material-symbols-sharp">
														key
													</span>
													Acessos para o Usuário
												</a>
											</li>
											<li>
												<a href="<?= URL_BASE ?>usuarios/photo/<?= $usuarios[$key]->id_usuario ?>" class="dropdown-item">
													<span class="material-symbols-sharp">
														add_a_photo
													</span>
													Adicionar Foto para o Usuário
												</a>
											</li>
										</ul>
									</div>
								</div>
								<div>
									<p style="font-size: 14pt;"><?= $usuarios[$key]->id_usuario ?></p>
								</div>
							</div>
						</td>
						<td>
							<p style="font-size: 14pt;"><?= $usuarios[$key]->nome ?></p>
						</td>
						<td>
							<p style="font-size: 14pt;"><?= $usuarios[$key]->telefone ?></p>
						</td>
						<td>
							<p style="font-size: 14pt"><?= $usuarios[$key]->email ?></p>
						</td>
						<td>
							<p style="font-size: 14pt;"><?= $usuarios[$key]->nivel ?></p>
						</td>
						<td>
							<p><img src="<?= URL_IMAGEM ?>img/perfil/<?= $usuarios[$key]->foto ?>" width="40"></p>
						</td>
					</tr>
					<?php
				}
			?>
		</tbody>
	</table>
</div>