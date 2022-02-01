<div class="col-md-12">
    <div class="card LetrasAzul">
        <div class="card-header card-header card-header-text">
            <div class="card-text">
                <h4 class="card-title" style="color: #07c1e7">CONFIGURAÇÕES
                </h4>
            </div>
        </div>
        <div class="card-body ">
            <?php if (isset($message)) echo $message; ?>
            <form action="" method="post" class="form-horizontal form-variance">
                <div class="row">
                    <label class="col-sm-2 col-form-label">Nome
                    </label>
                    <div class="col-sm-10">
                        <div class="form-group bmd-form-group">
                            <input style="background: #fff;" class="form-control"  readonly="true" name="nome" type="text" value="<?php echo InformacoesUsuario('nome'); ?>" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Email
                    </label>
                    <div class="col-sm-10">
                        <div class="form-group bmd-form-group">
                            <input style="background: #fff;" class="form-control u-rounded" readonly="true" name="email" type="email" value="<?php echo InformacoesUsuario('email'); ?>" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">CPF
                    </label>
                    <div class="col-sm-10">
                        <div class="form-group bmd-form-group">
                            <input style="background: #fff;" class="form-control u-rounded" readonly="true" id="cpf" name="cpf" type="text" value="<?php echo InformacoesUsuario('cpf'); ?>" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label"><b>CHAVE PIX</b>
                    </label>
                    <div class="col-sm-10">
                        <div class="form-group bmd-form-group">
                            <input class="form-control u-rounded" name="conta_saque" type="text" value="<?php echo InformacoesUsuario('conta_saque'); ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label"><b>CARTEIRA BTC</b>
                    </label>
                    <div class="col-sm-10">
                        <div class="form-group bmd-form-group">
                            <input class="form-control u-rounded" name="conta_saque_btc" type="text" value="<?php echo InformacoesUsuario('conta_saque_btc'); ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label"><b>USUARIO BANKON</b>
                    </label>
                    <div class="col-sm-10">
                        <div class="form-group bmd-form-group">
                            <input class="form-control u-rounded" name="conta_saque_bankon" type="text" value="<?php echo InformacoesUsuario('conta_saque_bankon'); ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Celular
                    </label>
                    <div class="col-sm-10">
                        <div class="form-group bmd-form-group">
                            <input style="background: #fff;" class="form-control u-rounded" readonly="true" id="celular" name="celular" type="text" value="<?php echo InformacoesUsuario('celular'); ?>" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Cep
                    </label>
                    <div class="col-sm-10">
                        <div class="form-group bmd-form-group">
                            <input class="form-control u-rounded" name="cep" type="text" value="<?php echo InformacoesUsuario('cep'); ?>" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Endereço
                    </label>
                    <div class="col-sm-10">
                        <div class="form-group bmd-form-group">
                            <input class="form-control u-rounded" name="endereco" type="text" value="<?php echo InformacoesUsuario('endereco'); ?>" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Complemento
                    </label>
                    <div class="col-sm-10">
                        <div class="form-group bmd-form-group">
                            <input class="form-control u-rounded" name="complemento" type="text" value="<?php echo InformacoesUsuario('complemento'); ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Bairro
                    </label>
                    <div class="col-sm-10">
                        <div class="form-group bmd-form-group">
                            <input class="form-control u-rounded" name="bairro" type="text" value="<?php echo InformacoesUsuario('bairro'); ?>" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Cidade
                    </label>
                    <div class="col-sm-10">
                        <div class="form-group bmd-form-group">
                            <input class="form-control u-rounded" name="cidade" type="text" value="<?php echo InformacoesUsuario('cidade'); ?>" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-2 col-form-label">Nova senha
                    </label>
                    <div class="col-sm-10">
                        <div class="form-group bmd-form-group">
                            <input class="form-control u-rounded" name="nova_senha" type="password" autocomplete="off">

                        </div>
                    </div>
                </div>

                <div class="row">
                    <label class="col-sm-2 col-form-label">&nbsp;
                    </label>
                    <div class="col-sm-10">
                        <div class="form-group bmd-form-group">
                            <input type="submit" class="btn" style="background: #07c1e7; color: white" name="submit" value="Alterar meus dados">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</form>
