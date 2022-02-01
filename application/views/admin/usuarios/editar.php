<style>
ul li {
    margin: 0 auto;
}
</style>

<div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-icon card-header-primary">
                    <div class="card-icon">
                      <i class="fa fa-user fa-2x"></i>
                    </div>
                    <h4 class="card-title ">Editar Usuário</h4>
                  </div>
                  <div class="card-body">
                    <div class="table">
                    <section class="panel">
                    <div class="panel-body">

                        <form action="" method="post" class="form-horizontal form-variance">
                          
                        
                        <ul  class="nav nav-pills">
                              <li class="active">
                                <a href="#info" data-toggle="tab">Informações do usuário</a>
                              </li>
                              <li>
                                  <a href="#acesso" data-toggle="tab">Acesso</a>
                              </li>
                              <li>
                                  <a href="#mfinanceiro" data-toggle="tab">Financeiro</a>
                              </li>
                            </ul>
                            <hr>
                   <input type="submit" name="submit" class="btn btn-success pull-right" value="Atualizar dados do usuário">
                   <br>
                            <?php if(isset($message)) echo '<br><div style="width: 43%; margin: auto;">'.$message.'</div>'; ?>


                        <div class="tab-content">
                        <div class="tab-pane active" id="info">
                                  <h3 class="text-center">Informações cadastrais</h3>

          
        <div class="row">
          <label class="col-sm-2 col-form-label">Nome
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                   <input class="form-control u-rounded" name="nome" value="<?php echo $usuario['usuario']->nome;?>" type="text" required>
            </div>
          </div>
        </div>
        <div class="row">
          <label class="col-sm-2 col-form-label">Email
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                                            <input class="form-control u-rounded" name="email" value="<?php echo $usuario['usuario']->email;?>" type="email" required>
            </div>
          </div>
        </div>
          
        <div class="row">
          <label class="col-sm-2 col-form-label">CPF
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                                            <input class="form-control u-rounded" name="cpf" id="cpf" value="<?php echo $usuario['usuario']->cpf;?>" type="text" required>
            </div>
          </div>
        </div>
          
          
          
        <div class="row">
          <label class="col-sm-2 col-form-label">Celular
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                 <input class="form-control u-rounded" name="celular" id="celular" value="<?php echo $usuario['usuario']->celular;?>" type="text">
            </div>
          </div>
        </div>
                
                       
                                  
    
</div>
                        
<div class="row tab-pane" id="acesso">

                        <div class="tab-content">
                        <div class="tab-pane active">
                                  <h3 class="text-center">Informações de acesso</h3>

          
        <div class="row">
          <label class="col-sm-2 col-form-label">Login
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                                            <input class="form-control u-rounded" name="login" value="<?php echo $usuario['usuario']->login;?>" type="text" required>
            </div>
          </div>
        </div>
        <div class="row">
          <label class="col-sm-2 col-form-label">Senha
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                                            <input class="form-control u-rounded" name="senha" type="password" value="" autocomplete="off">
            </div>
          </div>
        </div>
          
        
        <div class="row">
          <label class="col-sm-2 col-form-label" style="padding:10px;">Bloqueado
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                <div class="form-check">
                          <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="block"  value="1" <?php echo ($usuario['usuario']->block == 1) ? 'checked' : '';?>>
                            Sim
                            <span class="circle">
                              <span class="check"></span>
                            </span>
                          </label>
                          <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="block" value="0" <?php echo ($usuario['usuario']->block == 0) ? 'checked' : '';?>>
                            Não
                            <span class="circle">
                              <span class="check"></span>
                            </span>
                          </label>
                
                </div>
                </div>
          </div>
        </div> 
 </div>

                        </div>
                    </div>
                            
                            
                            
<div class="row tab-pane" id="mfinanceiro">

                        <div class="tab-content">
                        <div class="tab-pane active">
                                  <h3 class="text-center">Financeiro</h3>

          
        <div class="row">
          <label class="col-sm-2 col-form-label">Saldo
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                                            <input class="form-control u-rounded" name="saldo" value="<?php echo $usuario['usuario']->saldo;?>" type="text" required>
            </div>
          </div>
        </div>
        
 </div>
</div>
</div>
                            
<div class="row tab-pane" id="binario">

                        <div class="tab-content">
                        <div class="tab-pane active">
                                  <h3 class="text-center">Binário</h3>

          
        <div class="row">
          <label class="col-sm-2 col-form-label">Saldo Indicações
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                <input class="form-control u-rounded" name="quantidade_binario" value="<?php echo $usuario['usuario']->quantidade_binario;?>" type="text" required>
                <span class="help-text">porcentagem do binário sem <b>%</b></span>
            </div>
          </div>
        </div>
        
 </div>
</div>
</div>
                            
                            
                            
                            
                            
                        </section>
                    </div>
                  </div>
                </div>
              </div>
            </div>