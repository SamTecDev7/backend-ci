<div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-icon card-header-success">
                    <div class="card-icon">
                      <i class="fa fa-tree fa-2x"></i>
                    </div>
                    <h4 class="card-title ">Editar Plano</h4>
                  </div>
    <div class="card-body ">
       <?php if(isset($message)) echo $message;?>
      <form action="" method="post" class="form-horizontal form-variance">
          
        <div class="row">
          <label class="col-sm-2 col-form-label">Nome do Plano
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                                    <input type="text" name="nome" class="form-control" value="<?php echo $plano->nome;?>" required>
            </div>
          </div>
        </div>
          
          
        <div class="row">
          <label class="col-sm-2 col-form-label">Valor
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                                    <input type="text" name="valor" class="form-control" value="<?php echo $plano->valor;?>" required>

            </div>
          </div>
        </div>
          
        <div class="row">
          <label class="col-sm-2 col-form-label">Campo não editável
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                                    <input type="text" value="200" readonly="" name="quantidade_dias" class="form-control" value="<?php echo $plano->quantidade_dias; ?>" required>
            </div>
          </div>
        </div>
        <div class="row">
          <label class="col-sm-2 col-form-label">Porcentagem paga por dia
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                                    <input type="text" name="porcentagem_dia" class="form-control" value="<?php echo $plano->porcentagem_dia; ?>" required>
            </div>
          </div>
        </div>
          
        
        <div class="row">
          <label class="col-sm-2 col-form-label" style="padding:10px;">Pagar final de semana?
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                <div class="form-check">
                          <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="paga_final_semana"  value="1" <?php echo ($plano->paga_final_semana == 1) ? 'checked' : '';?>>
                            Sim
                            <span class="circle">
                              <span class="check"></span>
                            </span>
                          </label>
                          <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="paga_final_semana" value="0" <?php echo ($plano->paga_final_semana == 0) ? 'checked' : '';?>>
                            Não
                            <span class="circle">
                              <span class="check"></span>
                            </span>
                          </label>
                
                </div>
                </div>
          </div>
        </div>
          
          
        <div class="row">
          <label class="col-sm-2 col-form-label">Teto maximo
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                                    <input type="text" name="teto" class="form-control" value="<?php echo $plano->teto;?>" required>
            </div>
          </div>
        </div>
        <div class="row">
          <label class="col-sm-2 col-form-label">Pontos para plano de carreira
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                                    <input type="text" name="pontos" class="form-control" value="<?php echo $plano->plano_carreira;?>" required>
            </div>
          </div>
        </div>

          
          
        <div class="row">
          <label class="col-sm-2 col-form-label" style="padding:10px;">Rede de Afiliados
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                <div class="form-check">
                          <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="rede"  value="1" <?php echo ($plano->rede_afiliados == 1) ? 'checked' : '';?>>
                            Sim
                            <span class="circle">
                              <span class="check"></span>
                            </span>
                          </label>
                          <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="rede" value="0" <?php echo ($plano->rede_afiliados == 0) ? 'checked' : '';?>>
                            Não
                            <span class="circle">
                              <span class="check"></span>
                            </span>
                          </label>
                
                </div>
                </div>
          </div>
        </div>
          
          
          
        <div class="row">
          <label class="col-sm-2 col-form-label">Ganhos Diários
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                                    <input type="text" value="1" readonly="" name="ganhos_diarios" class="form-control" value="<?php echo $plano->ganhos_diarios;?>" required>
            </div>
          </div>
        </div>
          
          
        <div class="row">
          <label class="col-sm-2 col-form-label" style="padding:10px;">Plano Recomendado?
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                <div class="form-check">
                          <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="recomendado"  value="1" <?php echo ($plano->recomendado == 1) ? 'checked' : '';?>>
                            Sim
                            <span class="circle">
                              <span class="check"></span>
                            </span>
                          </label>
                          <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="recomendado" value="0" <?php echo ($plano->recomendado == 0) ? 'checked' : '';?>>
                            Não
                            <span class="circle">
                              <span class="check"></span>
                            </span>
                          </label>
                
                </div>
                </div>
          </div>
        </div>
          
        <div class="row">
          <label class="col-sm-2 col-form-label">&nbsp;
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
              <input type="submit" class="btn btn-success" name="submit" value="Editar Plano">
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</form>
</div>
