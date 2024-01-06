<section id="section__begin">
	<div class="container">
		<div class="d-flex flex-wrap" class="section__begin_home">
			<div class="col-md-6" id="letspray__background">
				<h2>A Pray Wished</h2>
				<hr>
				<p class="size-15pt">Let's think about God did to us, What he do to us and What he'll do to us. Anyone in the whole world gonna make for you, what God did to you</p>
				<p class="size-15pt">Let's get stated with one little pray of thankful and grateful</p>
			</div>
			<div class="col-md-6" id="column__letspray">
				<h3 class="font-roboto size-36pt">Create you first pray</h3>
				<a href="" class="btn_letspray">
					Click in here
				</a>
			</div>
		</div>
	</div>
</section>
<section id="section__datas">
	<div class="container">
		<div class="row">
			<div class="col-md-4 square__datas">
				<i class="fa-solid fa-person-praying"></i>
				<h5 class="size-30pt">Preachers</h5>
				<hr>
				<p class="size-15pt">We have more than 25 preachers helping us to connect you with God</p>
			</div>
			<div class="col-md-4 square__datas">
				<i class="fa-solid fa-person-praying"></i>
				<h5 class="size-30pt">Christians</h5>
				<hr>
				<p class="size-15pt">You can make new christians friends here. Not be alone, please!</p>
			</div>
			<div class="col-md-4 square__datas">
				<i class="fa-solid fa-person-praying"></i>
				<h5 class="size-30pt">Psychologists</h5>
				<hr>
				<p class="size-15pt">It's not wrong see a Psychologist. We wanna you be strong and confident</p>
			</div>
		</div>
	</div>
</section>
<section id="prays__groups">
	<div class="container">
		<h2>Pray's Groups. Did you know that?</h2>
		<h3 class="size-20pt font-roboto">We created a full community to you pray to each other and helped yours selfs.<br>Let`s call it "Pray`s Groups"</h3>
		<hr>
		<div class="row whole_square_groups mt-4">
			<div class="col-md-4 card" style="width: 26rem;">
  				<img src="<?= URL_IMAGEM ?>img/foto-indisponivel.jpg" class="card-img-top" alt="Foto Indisponível">
				<div class="card-body">
    				<h5 class="card-title font-roboto">Let's Create Yours</h5>
    				<p class="card-text">It's time to create you own pray group. It's very simple. Click on button below and watching</p>
    				<a href="<?= URL_BASE ?>praysg/create" class="btn btn-primary w-100 py-3">Create Group</a>
  				</div>
			</div>
			<?php
				for ($key = 0; $key < count($prays_groups); $key++) {
					?>
						<div class="col-md-4 card" style="width: 26rem;">
  							<img src="<?= URL_IMAGEM ?>img/lovechurch/<?= $emails[$key] ?>/<?= $prays_groups[$key]->foto_grupo ?>" class="card-img-top" alt="Foto Indisponível">
							<div class="card-body">
			    				<h5 class="card-title font-roboto">Let's Create Yours</h5>
			    				<p class="card-text">It's time to create you own pray group. It's very simple. Click on button below and watching</p>
								<?php
									if ($_SESSION['id'] == $prays_groups[$key]->id_usuario) {
										?>
											<a href="#" class="btn btn-dark w-100 py-3">Group's Settings</a>
										<?php
									} else {
										?>
											<a href="#" class="btn btn-success w-100 py-3">Participate</a>
										<?php
									}
								?>
			  				</div>
						</div>
					<?php
				}
			?>
		</div>
	</div>
</section>
<section id="social_media">
	<div class="container">
		<div class="">
			<h2>Follow us on our Social Media</h2>
		</div>
		<hr>
		<div class="d-flex flex-wrap">
			<div class="col-md-4 square__media">
				I
			</div>
			<div class="col-md-4 square__media">
				F
			</div>
			<div class="col-md-4 square__media">
				W
			</div>
		</div>
	</div>
</section>
