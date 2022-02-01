<div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-icon card-header-success">
                    <div class="card-icon">
                      <i class="fa fa-tree fa-2x"></i>
                    </div>
                    <h4 class="card-title ">Adicionar Plano</h4>
                  </div>
    <div class="card-body ">
       <?php if(isset($message)) echo $message;?>
      <form action="" method="post" class="form-horizontal form-variance">
          
        <div class="row">
          <label class="col-sm-2 col-form-label">Nome do Plano
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                  <input type="text" name="nome" class="form-control" required>
            </div>
          </div>
        </div>
          
          
        <div class="row">
          <label class="col-sm-2 col-form-label">Valor
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                                    <input type="text" placeholder="Use apenas numeros. Exemplo: coloque 100 para o valor de cem reais ou 1000 para o valor de mil reais." name="valor" class="form-control" required>

            </div>
          </div>
        </div>
          
          
        <div class="row">
          <label class="col-sm-2 col-form-label">Porcentagem paga por dia
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                                    <input type="text" placeholder="Caso queira pagar 10% ao dia coloque apenas 10, caso precice fragmentar a porcentagem, use ponto para separar." name="porcentagem_dia" class="form-control" required>
            </div>
          </div>
        </div>
        <div class="row">
          <label class="col-sm-2 col-form-label">Campo não editável
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                                    <input type="text" name="quantidade_dias" value="200" readonly="" class="form-control" required>
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
                            <input class="form-check-input" type="radio" name="paga_final_semana"  value="1">
                            Sim
                            <span class="circle">
                              <span class="check"></span>
                            </span>
                          </label>
                          <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="paga_final_semana" value="0" checked>
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
          <label class="col-sm-2 col-form-label"> Teto maximo do plano
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                                    <input type="text" placeholder="Use apenas numeros. Exemplo: coloque 100 para o teto de cem reais ou 1000 para o teto de mil reais." name="teto" class="form-control" required>
            </div>
          </div>
        </div>
        <div class="row">
          <label class="col-sm-2 col-form-label">Pontos para plano de carreira
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                                    <input type="text" name="pontos" class="form-control" required>
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
                            <input class="form-check-input" type="radio" name="rede"  value="1" checked>
                            Sim
                            <span class="circle">
                              <span class="check"></span>
                            </span>
                          </label>
                          <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="rede" value="0">
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
          <label class="col-sm-2 col-form-label">Campo não editável
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                                    <input type="text" value="1" name="ganhos_diarios" readonly="" class="form-control" required>
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
                            <input class="form-check-input" type="radio" name="recomendado"  value="1">
                            Sim
                            <span class="circle">
                              <span class="check"></span>
                            </span>
                          </label>
                          <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="recomendado" value="0" checked>
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
              <input type="submit" class="btn btn-success" name="submit" value="Cadastrar Plano">
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</form>
</div>
