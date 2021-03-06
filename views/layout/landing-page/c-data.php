<section class="seccion fullview pb-5" data-section-name="data" id="data-seccion">
    <div class="container d-flex ">
        <div class="row section justify-content-center w-100">
            <div class="col-12">
                <h1 class="text-center" id="data_title"><i class="fad fa-chart-bar icono-celeste"></i> Data</h1>
                <hr class="faded" >
                <br>
                <div class="container text-center mb-5">
                    <?= utils::getTextoByTipoContenido('Data') ?>
                </div>
                <br>
            </div>
            <div class="col-sm-12 align-self-top">
                <div class="container">
                    <div class="row">

                        <div class="col-sm-4 circle-link">
                            <a href="<?= base_url ?>web/apptest ">
                                <div class="circulo-data">
                                    <h3 class="texto-circulo-data pb-3">
                                        <i class="fad fa-rocket-launch fa-2x"></i>
                                        Portafolio</h3>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-4 circle-link">
                            <a href="#"data-toggle="modal" data-target="#modal-subsidios">
                                <div class="circulo-data">
                                    <h3 class="texto-circulo-data pb-3">
                                        <i class="fad fa-hands-helping fa-2x"></i>
                                        Subsidios</h3>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-4 circle-link">
                            <a href="<?= base_url ?>web/data">
                                <div class="circulo-data">
                                    <h3 class="texto-circulo-data pb-3">
                                        <i class="fad fa-microscope fa-2x"></i><br>
                                        Ley I+D</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
