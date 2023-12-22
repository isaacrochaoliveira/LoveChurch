<div class="template-container">
    <a href="<?= URL_BASE ?>hospedes">
    	<button type="button" class="btn-goback">
    		<span class="material-symbols-sharp" style="font-size:22pt">
    			arrow_left_alt
    		</span>
    		Voltar
    	</button>
	</a>
</div>
<div class="template-container">
	<h5>Foram encontrada(s) <?= count($reservas) ?> reserva(s) deste hóspede programada(s)</h5>
	<hr>
	<div class="row">
		<?php 
			for ($key = 0; $key < count($reservas); $key++) {
				?>
				<div class="col-md-3">
					<div id="square__reservashospede">
						<span class="material-symbols-sharp">
							meeting_room
						</span>
						<div>
							<p class="date_check_in_hospede"><?= Date('d/m/y', strtotime($reservas[$key]->check_in)) ?> - <?= Date('d/m/y', strtotime($reservas[$key]->check_out)) ?></p>
							<p class="nome_hospede_reservas"><?= $reservas[$key]->nome ?></p>
							<p class="valor_reserva_hospede">Valor: <?= numfmt_format_currency($padrao, $reservas[$key]->valor, 'BRL') ?> </p>
						</div>
					</div>
				</div>
				<?php
			}
		?>
	</div>
</div>