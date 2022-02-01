<?php
/*///////////////////////////////////////////////////////////////////////
// FBXWEB - HOST & DEVELOPMENT                                         //
// Sistema de Integração (URPAY) - Desenvolvido por Fábio Britto       //
// WORKANA - Profile: https://www.workana.com/freelancer/fbxweb        //
// email: fabio237@hotmail.com / (11) 97157-0571                       //
// https://www.fbxweb.com.br                                           //
// cnpj: 14.194.140/0001-52                                            //
// última atualização: 12/06/2019 - 08:50:39                           //
*////////////////////////////////////////////////////////////////////////
?>
<style>
.blocked {
  display: none;
}

.view {
  display: block;
}
</style>
<!--main content start-->
<font color="red"
<div id="content" class="ui-content">
    <div class="ui-content-body">
        <div class="ui-container">
            <!--page title and breadcrumb start -->
            <div class="row">
                <div class="col-md-8">
                    <h1 class="page-title"><font color="green">Configurações URPAY</font>
                        <small><font color="green">Gerenciamento do Gateway</font></small>
                    </h1>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb pull-right">
                        <li>Home</li>
                        <li>Configurações</li>
                        <li><a href="<?php echo base_url('admin/configuracoes/urpay');?>" class="active">Configurações URPAY</a></li>
                    </ul>
                </div>
            </div>
            <!--page title and breadcrumb end -->
            <!-- page start-->
            <div class="row">
                <div class="col-sm-12">
                    <section id="form-edit" class="panel <?php echo $setup['classform'] ?>">
                        <div class="panel-body">
                        <div>
                        <?php $att = array(
                            'id' => 'form',
                            'class' => 'form-horizontal form-variance'
                          ); ?>
                          <?php echo form_open('admin/configuracoes/urpay-salvar', $att); ?>
                          <div style="display: none" name="alerta_erro" id="alerta_erro" class="form-group">
                            <label class="col-sm-3 control-label">&nbsp;</label>
                                <div class="alert alert-block alert-danger fade in col-sm-8">
                                    <button data-dismiss="alert" class="close" type="button">
                                        ×
                                    </button>
                                    <h4 ><i class="fa fa-times-circle"></i> Opps! Ocorreu um erro...</h4>
                                    <h5><div name="resposta_erro" id="resposta_erro"></div></h5>
                                </div>
                            </div>
                            <div style="display: none" name="aguarde" id="aguarde" class="form-group">
                            <label class="col-sm-3 control-label">&nbsp;</label>
                                <div class="alert alert-block alert-info fade in col-sm-8">
                                    <i class="fas fa-sync fa-spin"></i> AGUARDE! Estamos salvando seus dados...
                                </div>
                            </div>
                            <div style="display: none" name="alerta" id="alerta" class="form-group">
                            <label class="col-sm-3 control-label">&nbsp;</label>
                                <div class="alert alert-block alert-success fade in col-sm-8">
                                    <button data-dismiss="alert" class="close" type="button">
                                        ×
                                    </button>
                                    <h4 ><i class="fa fa-info-circle"></i> Yahooooo!</h4>
                                    <h5><div name="resposta" id="resposta"></div></h5>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                          <div class="form-group">
                              <label class="col-sm-3 control-label">Habilitar Módulo</label>
                              <div class="col-sm-6">
                              <input type="hidden" name="urpay_setup_id"  id="urpay_setup_id" value="<?php echo $setup['urpay_setup_id'] ?>" />
                              <select class="form-control" name="urpay_hab_api" id="urpay_hab_api" onChange="showDivLink(this.value);">
                                <option value="">Selecione uma opção</option>
                                <option value="1">HABILITAR</option>
                                <option value="2">DESABILITAR</option>
                                </select>
                               <small></small>
                              </div>
                          </div>
                          <br>
                          <script>
                          var selectHab = '<?php echo $setup['urpay_hab_api'] ?>';
                          </script>
                          <div class="blocked" id="1">
                          <div class="form-group">
                              <label class="col-sm-3 control-label">Nome de Usuário URPAY (Admin)</label>
                              <div class="col-sm-6">
                                    <input type="text" name="urpay_user" class="form-control" value="<?php echo $setup['urpay_user'] ?>">
                                    <small>Informe o nome do usuário que possui o TOKEN para gerenciar a conta principal URPAY</small>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-3 control-label">TOKEN API (Comum)</label>
                              <div class="col-sm-6">
                                    <input type="text" name="urpay_token_api_comum" class="form-control" value="<?php echo $setup['urpay_token_api_comum'] ?>">
                                    <small>Informe seu TOKEN API URPAY, caso não tenha <a href="https://conta.urpay.com.br/comercial/gerenciar-token" target="_blank" style="text-decoration: underline">clique aqui</a></small>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-3 control-label">TOKEN API (Transfer)</label>
                              <div class="col-sm-6">
                                    <input type="text" name="urpay_token_api_trans" class="form-control" value="<?php echo $setup['urpay_token_api_trans'] ?>">
                                    <small>Informe seu TOKEN API URPAY, caso não tenha <a href="https://conta.urpay.com.br/comercial/gerenciar-token" target="_blank" style="text-decoration: underline">clique aqui</a></small>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-3 control-label">Desconto por Saque(%)</label>
                              <div class="col-sm-6">
                                    <input type="text" name="urpay_valor_desconto" id="urpay_valor_desconto" class="form-control" value="<?php echo $setup['urpay_valor_desconto'] ?>">
                                    <small>Defina um valor para o desconto que será aplicado por cada saque, somente números</small>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-3 control-label">Valor mínimo por Saque (R$)</label>
                              <div class="col-sm-6">
                                    <input type="text" name="urpay_valor_mimimo" id="urpay_valor_mimimo"  class="form-control" value="<?php echo $setup['urpay_valor_mimimo'] ?>">
                                    <small>Defina um valor mínimo para o saque, somente números</small>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-3 control-label">HABILITE AS FUNÇÕES:</label>
                                <div class="col-sm-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="boleto_urpay" id="boleto_urpay" disabled>
                                    <label class="form-check-label" for="boleto-gerar">
                                    </label>
                                    </div>
                                    <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="transfer_urpay" id="transfer_urpay" checked>
                                        <label class="form-check-label" for="transfer-urpay">
                                           
                                        </label>
                                    </div>
                                    <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="transfer_urpay_bank" id="transfer_urpay_bank" disabled>
                                        <label class="form-check-label" for="transfer-urpay-bank">
                                            
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="blocked" id='2'>
                        <div class="form-group">
                                <div class="col-sm-12" style="text-align: center;">
                                <label class="col-sm-3 control-label">&nbsp;</label>
                                    <label class="alert alert-warning col-sm-6">
                                        <i class="fas fa-exclamation-triangle"></i> ATENÇÃO! AS CONFIGURAÇÕES URPAY SERÃO DESATIVADAS<br>
                                        <small>O sistema não irá processar nenhuma requisição URPAY API, para desabilitar SALVE</small>
                                    </label>
                                </div>
                            </div>
                        </div>
                          <div class="form-group">
                              <label class="col-sm-3 control-label">&nbsp;</label>
                              <div class="col-sm-6">
                                    <input type="submit" id="submit" class="btn btn-success" value="SALVAR URPAY">
                              </div>
                          </div>
                        </form>
                        </div>
                        </div>
                    </section>
                    <?php if($setup["urpay_hab_api"] == '1'){ ?>
                    <section id="session-hab" class="panel">
                        <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Configurações salvas em:</label>
                            <div class="col-sm-6">
                                <?php echo $setup['urpay_setup_created'] ?>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <?php if($setup['urpay_setup_updated'] != NULL): ?>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Última Atualização em:</label>
                                <div class="col-sm-6">
                                    <?php echo $setup['urpay_setup_updated'] ?>
                                </div>
                            </div>
                        <?php endif; ?>
                            <div class="form-group">
                                <div class="col-sm-12" style="text-align: center;">
                                    <label class="alert alert-info col-sm-12">
                                        <h4><i class="fas fa-check-circle"></i> CONFIGURAÇÕES URPAY SALVAS CORRETAMENTE</h4>
                                        <small>Clique no botão abaixo de deseja editar ou visualizar as informações salvas</small>
                                    </label>
                                    <input type="submit" id="edit" class="btn btn-success" value="EDITAR URPAY" style="text-align: center;">
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php } ?>
                    <?php if($setup["urpay_hab_api"] == '2'){ ?>
                    <section  id="session-desabilitado" class="panel">
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-sm-12" style="text-align: center;">
                                    <label class="alert alert-danger col-sm-12">
                                        <h4><i class="fas fa-times-circle"></i> CONFIGURAÇÕES URPAY DESABILITADAS</h4>
                                        <small>Clique no botão abaixo de deseja habilitar e configurar URPAY API</small>
                                    </label>
                                    <input type="submit" id="hab" class="btn btn-danger" value="HABILITAR URPAY" style="text-align: center;">
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php } ?>
                </div>
            </div>

        </div>

    </div>
</div>
<!--main content end-->
