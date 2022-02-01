<div class="col-md-12">
  <div class="card-body">
      
    <?php if($this->session->userdata('message_curso')): ?>
    <div class="alert alert-danger text-center">
        <?php echo $this->session->userdata('message_curso'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php $this->session->unset_userdata('message_curso'); endif; ?>

<?php if($cursos !== false): ?>
    <div class="row row-cards">
    <?php foreach($cursos as $curso): ?>
      <div class="col-sm-12 col-md-12 col-lg-4">
        <div class="card ">
          <div class="card-body" style="border: none; border-radius: 10px;">	
            <div class="row">
              <div class="col" style="text-align: center;">
                <div class="h4">
                    <h2><?php echo $curso->nome;?></h2>
                    <font color="black">
                    R$: <?php echo number_format($curso->valor, 2, ",", ".");?>
                    </font>
                </div>
                  <p><?php echo mb_substr($curso->texto, 0, 100) ?>...</p>
                <a href="#" data-toggle="modal" data-target="#compra_<?php echo $curso->id;?>" class="btn btn-success">Comprar</a>
              </div>
            </div>
          </div>
        </div>
      </div>
        <div class="modal fade" id="compra_<?php echo $curso->id;?>" tabindex="-1" role="dialog" aria-labelledby="compraLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title text-dark" id="compraLabel"><?php echo $curso->nome;?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body text-dark text-center">
                  <form method="POST" action="<?php echo base_url('cursos/comprar/'.$curso->id);?>">
                      <h5 class="text-dark" id="compraLabel">Forma de pagamento</h5>
                            <div class="form-group bmd-form-group">
                              <div class="form-check">
                                  <label class="form-check-label">
                                      <input class="form-check-input" type="radio" name="tipo_saque" id="tipo_saque" value="1" checked="">
                                    <b>Saldo (R$ 
                                      <b id="rendimento"><?php echo number_format(InformacoesUsuario('saldo'), 2, ",", ".");?></b>)
                                    </b>
                                    <span class="circle">
                                      <span class="check">
                                      </span>
                                    </span>
                                  </label>
                              </div>
                            </div>
              </div>
              <div class="modal-footer">
                <a class="btn btn-danger text-white" data-dismiss="modal">Cancelar</a>
                <input type="submit" class="btn btn-success" value="Comprar curso">
              </form>
              </div>
               
            </div>
          </div>
    </div>
        
      <?php endforeach; ?>
    </div>
<?php else: ?>
    
<div class="alert alert-danger text-center">Nenhum curso disponível</div>

<?php endif; ?>

  </div>
</div>
