<div class="row">
              <div class="col-md-12">
                <div class="card LetrasAzul">
                  <div class="card-header card-header-icon card-header-warning">
                    <h4 class="card-title" style="color: #07c1e7">PLANO DE CARREIRA</h4>
                    <div class="card-icon">
                      <i class="fa fa-trophy fa-2x"></i>
                    </div>
                  </div>
                        <?php if(isset($_COOKIE['pgt_resp']) AND $_COOKIE['pgt_resp'] == "FUCKINGSYSTEM"): ?>
                        <center><div style="width: 70%;" class="alert alert-warning text-center">Efetue os pagamentos pendentes abaixo.</div></center>
                        <?php endif; ?>
                        <?php if(isset($_COOKIE['pgt_resp']) AND $_COOKIE['pgt_resp'] != "S"): ?>
                        <center><div style="width: 70%;" class="alert alert-danger text-center"><?= $_COOKIE['pgt_resp'] ?></div></center>
                        <?php endif; ?>
                        <?php if(isset($_COOKIE['pgt_resp']) AND $_COOKIE['pgt_resp'] == "S"): ?>
                        <center><div style="width: 70%;" class="alert alert-success text-center">PAGAMENTO CONFIRMADO COM SUCESSO!</div></center>
                        <?php endif; ?>

                        <?php if(!empty($data['message'])): ?>
                        <center><div style="width: 70%;" class="alert alert-danger text-center"><?= $data['message'] ?></div></center>
                        <?php endif; ?>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table">
                        <thead class="text-white">
                          <tr><th>
                            Meta
                          </th>
                          <th>
                            Pontuação necessária
                          </th>
                          <th>
                            Premiação
                          </th>
                        </tr>
                        </thead>
                        <tbody style="color: #07c1e7; white-space: nowrap">
                                               <?php
                                if($planos !== false){
                                  foreach($planos as $plano){
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $plano->nome;?>
                                    </td>
                                    <td>
                                        <?php echo number_format($plano->pontos, 0, ".", ".");?>
                                    </td>
                                    <td>
                                        <?php echo number_format($plano->premio, 2, ",", ".") . ' $';?>
                                    </td>
                                </tr>
                                <?php
                                  }
                                }
                                ?>
                              </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
