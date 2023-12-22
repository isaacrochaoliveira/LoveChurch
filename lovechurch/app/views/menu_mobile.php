<div class="conteudo">
    <a href="" class="menu-m">menu mobile esquerdo</a><!-- aqui fico icone reponsavel pelo meno da esquerda-->
    <a href="" class="menu-grade">menu mobile direito</a><!--aqui fica o menu responsavel pelo meno do topo-->
    <!-- <a href="" class="logo"></a> -->
    <div class="d-flex flex-wrap justify-content-between">
        <div>
            <button onclick="clickMenu()" id="clickMenu" class="btn-toggle"><i class="fa-solid fa-xmark"></i></button>
            <button onclick="clickMenu()" id="disclickMenu" class="btn-toggle"><i class="fa-solid fa-bars"></i></button>
        </div>
        <div id="grade">
            <ul class="menu-topo">
                <div class="d-flex">
                    <div class="text-light">
                        <p class="fs-36pt font-cursive"><b>Isaac</b></p>
                        <p style="margin-top: -18px;" class="text-decoration-underline"><small>Teacher</small></p>
                    </div>
                    <li class="sub user dropleft">
                        <a href="" class="thumb">
                            <img src="<?php echo URL_BASE ?>assets/img/foto01.png">
                        </a>
                        <ul class="dropdown-menu ul-info">
                            <li class="li-info">
                                <a href="">
                                    Perfil
                                </a>
                            </li>
                            <li class="li-info">
                                <a href="">
                                    Configurações
                                </a>
                            </li>
                            <li class="">
                                <a href="">
                                    <button class="btn w-100 myButton">
                                        Sair
                                    </button>
                                </a>
                            </li>
                        </ul>
                        <!-- <ul>
                            <li>
                                <small>
                                    <a href="">
                                        Perfil
                                    </a>
                                </small>
                            </li>
                            <li>
                                <small>
                                    <a href="">
                                        Configurações
                                    </a>
                                </small>
                            </li>
                            <li>
                                <small>
                                    <a href="">
                                        SAIR
                                    </a>
                                </small>
                            </li>
                        </ul> -->
                    </li>
                </div>
            </ul>
        </div>

    </div>
</div>