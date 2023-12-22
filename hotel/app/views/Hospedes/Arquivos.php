<div class="template-container">
    <a href="<?= URL_BASE ?>hospedes">
    	<button type="button" class="btn-goback">
    		<span class="material-symbols-sharp" style="font-size:22pt">
    			arrow_left_alt
    		</span>
    		Voltar
    	</button>
	</a>
	<p class="mt-3" style="font-size: 14pt;">
		<a href="<?= URL_BASE ?>hospedes/files/<?= $arquivos[0]->id_hospede ?>">
			Cadastrar Mais Documentos
		</a>
	</p>
</div>
<div class="template-container">
	<?php 
	$this->verMsg();
	$this->verErro();
	?>
	<div class="row">
		<?php 
			for ($key = 0; $key < count($arquivos); $key++) {
				?>
					<div class="col-md-3 my-2">
						<div class="dropdown hover">
							<span class="material-symbols-sharp">
								keyboard_arrow_down
							</span>
							<ul class="dropdown-menu">
								<li>
									<a href="<?= URL_BASE ?>hospedes/deletefile/<?= $arquivos[$key]->id_arquivo_hos ?>" class="dropdown-item">
										<span class="material-symbols-sharp">
                                            delete_forever
                                        </span>
                                        Excluir Documento
									</a>
								</li>
							</ul>
						</div>
						<a class="linktofilehos" href="<?= URL_IMAGEM ?>documents/hospedes/<?= $arquivos[$key]->arquivo_hos ?>" target="_blank">
							<div id="square__hospedefile">
								<img src="<?= URL_IMAGEM ?>img/<?= $imgs[$key] ?>" alt="Arquivo do Hóspede" width="120">
								<hr>
								<div>
									<p class="date_fileup_hos"><?= Date('d/m/y', strtotime($arquivos[$key]->data_cad_hos)) ?></p>
									<h4 class="file_nickname_hos"><?= $arquivos[$key]->nome_arquivo_hos ?></h4>
									<p class="file_name_hos"><?= $arquivos[$key]->arquivo_hos ?></p>
								</div>
							</div>
						</a>
					</div>
				<?php
			}
		?>
	</div>
</div>