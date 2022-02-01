<div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-icon card-header-warning">
                    <h4 class="card-title ">Rede Binária</h4>
                    <div class="card-icon">
                      <i class="fa fa-align-left fa-2x"></i>
                    </div>
                  </div>
                      <div class="panel-body">
					  
                          <a style="float: right;margin-right: 15px;" class="btn btn-success" href="<?php echo base_url('rede');?>"><i class="fa fa-arrow-left"></i> Voltar a minha rede</a>
                          
                          <?php
                          if($nivel_acima !== false){
                          ?>
                          <a class="btn btn-success pull-right" href="<?php echo base_url();?>rede<?php echo (InformacoesUsuario('id') != $nivel_acima) ? '?network_id='.$nivel_acima : '';?>"><i class="fa fa-arrow-up"></i> Voltar um nível acima</a>
                          
                          <div class="clearfix"></div>
                          <br />
                          <?php
                          }
                          ?>

                            <center><div class="table-responsive">
                              <?php
                              if(!empty($matriz) && !is_null($matriz)){
                              ?>
                              <ul id="org" style="display:none">
                                  <center><?php echo $matriz; ?></center>    
                              </ul>
                              <div id="chart" class="orgChart"></div>
                              <?php
                              }else{
                                echo '<div class="alert alert-danger text-center">Desculpe, mas essa rede não está disponível para você.</div>';
                              }
                              ?>
                           </center>
                      </div>
                 
              </div>

          </div>

        </div>

<!--main content end-->