<div class="col-md-12">
    <div class="card ">
        <div class="card-header card-header card-header-text">
            <div class="card-text">
                <h4 class="card-title">Comprar cotas
                </h4>
            </div>
        </div>
        <div class="card-body ">
            <?php if (isset($message)) echo $message; ?>
            <form action="" method="post" class="form-horizontal form-variance">
                <div class="row">
                    <label class="col-sm-2 col-form-label">Quantidade de cotas
                    </label>
                    <div class="col-sm-10">
                        <div class="form-group bmd-form-group">
                            <select class="form-control" name="quantidade" required>
                                <?php
                                $valorInicial = ConfiguracoesSistema('valor_cota');
                                $total = 0;
                                for ($i = 1; $i <= 200; $i++) {
                                    $total += $valorInicial;
                                    echo '<option value="' . $i . '">' . $i . ' ' . (($valorInicial == $total) ? 'Cota' : 'Cotas') . ' por R$ ' . number_format($total, 2, ",", ".") . '</option>';
                                }
                                ?>

                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <label class="col-sm-2 col-form-label">&nbsp;
                    </label>
                    <div class="col-sm-10">
                        <div class="form-group bmd-form-group">
                            <button type="submit" class="btn btn-success" name="submit" value="Comprar">Comprar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</form>
