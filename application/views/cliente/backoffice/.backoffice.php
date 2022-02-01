<div class="container">
<?php if (PlanoAtual('id')): ?>
        
<?php    
    $porcentagem = intval((PlanoAtual('lucro')/PlanoAtual('teto'))*100);

    if ($porcentagem <= 40) {
        $barra = "progress-bar-success";
    }elseif(($porcentagem > 40) &&  ($porcentagem <= 60)){
        $barra = "progress-bar-info";
    }elseif(($porcentagem > 60) &&  ($porcentagem <= 80)){
        $barra = "progress-bar-warning";
    }else{
        $barra = "progress-bar-danger";
    }
    
?>
<h3 class="card-title">Progresso de ganhos</h3>
<div class="progress" style="height: 22px; border-radius: 4px;">
  <div class="progress-bar <?php echo $barra ?>" role="progressbar" style="width: <?php echo $porcentagem ?>%" aria-valuenow="<?php echo $porcentagem; ?>" aria-valuemin="0" aria-valuemax="<?php echo intval(PlanoAtual('teto')) ?>"><?php echo $porcentagem; ?>%</div>
</div><hr>
<?php endif; ?>
<button class="btn btn-danger clipboard" data-clipboard-target="#linkIndicacao">Copiar Link</button><input type="text" class="form-control" readonly="true" id="linkIndicacao" value="<?php echo base_url('new-user/'.InformacoesUsuario('login'));?>" style="margin-bottom:0" />
<br>
<div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-money"></i>
                  </div>
                    <h4 class="card-category">SALDO ATUAL</h4>
                  <h3 class="card-title text-right">R$ <?php echo number_format(InformacoesUsuario('saldo'), 2, ",", ".");?>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                      Saldo atual de sua conta
                  </div>
                </div>
              </div>
            </div>
    

            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-trophy"></i>
                  </div>
                    <h4 class="card-category">PLANO DE CARREIRA
                    </h4>
                  <h3 class="card-title text-right"><?php echo (PlanoCarreira(InformacoesUsuario('plano_carreira'), 'nome')) ?: 'Sem plano'; ?>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                      Plano de carreira atual
                  </div>
                </div>
              </div>
            </div>
    
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-users"></i>
                  </div>
                    <h4 class="card-title "style="font-size: 12px;">SUA PONTUAÇÂO
                    </h4>
                  <h3 class="card-title text-right"><?php echo number_format($pontos['transferir']['esquerdo'] + $pontos['transferir']['direito'], 0, ".", ".");?>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                      Seu total de pontos
                  </div>
                </div>
              </div>
            </div>
   
    
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-hand-o-right"></i>
                  </div>
                    <h4 class="card-category" style="font-size: 12px;">INDICADOS PENDENTES
                    </h4>
                    <h3 class="card-title text-right"><?php echo $indicadospendentes;?> 
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                      Seus indicados pendentes
                  </div>
                </div>
              </div>
            </div>
    
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-thumbs-o-up"></i>
                  </div>
                    <h4 class="card-category">INDICADOS ATIVOS
                    </h4>
                  <h3 class="card-title text-right"><?php echo $indicadosativos;?> 
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                      Seus indicados ativos
                  </div>
                </div>
              </div>
            </div>
    

    
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-primary card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-bank"></i>
                  </div>
                    <h4 class="card-category">MEUS SAQUES
                    </h4>
                  <h3 class="card-title text-right">R$ <?php echo number_format($totalsaques, 2, ",", ".");?> 
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                      Saldo total de sua conta
                  </div>
                </div>
              </div>
            </div>
    
            <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-users"></i>
                  </div>
                    <h4 class="card-category">TOTAL DE CLIENTES
                    </h4>
                  <h3 class="card-title text-right"><?php echo $clientes ;?>  
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                      Clientes cadastrados em nossa plataforma
                  </div>
                </div>
              </div>
            </div>
    
            <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-dollar"></i>
                  </div>
                    <h4 class="card-category">TOTAL DE SAQUES
                    </h4>
                  <h3 class="card-title text-right">R$ <?php echo number_format($totalsaques, 2, ",", ".");?> 
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                      Valor total de saques realizados por clientes
                  </div>
                </div>
              </div>
            </div>
          </div>
                