<?php 

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

?>
<div class="col-12">
    <h4 class="text-center" style="color: #07c1e7"><?php echo $ticket->assunto ?></h4>
<?php if($this->session->userdata('message_ticket')){ echo $this->session->userdata('message_ticket'); $this->session->unset_userdata('message_ticket'); } if(isset($message)){ echo $message; } ?>

    <?php if($mensagens !== false):
        foreach($mensagens as $mensagem): ?>
    <div class="card px-1 LetrasAzul">
                        <div class="card-header email-detail-head ml-75">
                            <div class="user-details d-flex justify-content-between align-items-center flex-wrap">
                                <div class="avatar mr-75">
                                    <img src="<?php echo base_url(); ?>assets/cliente/images/<?php echo ($mensagem->respondido_por == 1) ? 'user.png' : 'suporte.png'; ?>" alt="avtar img holder" width="61" height="61">
                                </div>
                                <div class="mail-items">
                                    <h4 class="list-group-item-heading mb-0" style="color: #07c1e7"><?php echo ($mensagem->respondido_por == 1) ? InformacoesUsuario('nome') : ConfiguracoesSistema('nome_site'); ?></h4>
                                    <div class="email-info-dropup dropdown">
                                        <span class="font-small-3 text-white">
                                          <?php echo ($mensagem->respondido_por == 1) ? InformacoesUsuario('email') : ConfiguracoesSistema('email_remetente'); ?>
                                        </span>
                                      </div>
                                </div>
                            </div>
                            <div class="mail-meta-item">
                                <div class="mail-date"></div>
                            </div>
                        </div>
                        <div class="card-body mail-message-wrapper pt-2 mb-0">
                            <div class="mail-message text-white">
                                <p><?php echo $mensagem->mensagem;?></p>
                            </div>
                        </div>
    </div>
    <?php endforeach; endif; ?>
    
    <?php if($ticket->status != 3): ?>

    <div class="card px-1 LetrasAzul">
                        <div class="card-header email-detail-head ml-75">
                            <div class="user-details d-flex justify-content-between align-items-center flex-wrap">
                                <div class="avatar mr-75">
                                    <img src="<?php echo base_url(); ?>assets/cliente/images/user.png" alt="avtar img holder" width="61" height="61">
                                </div>
                                <div class="mail-items">
                                    <h4 class="list-group-item-heading mb-0" style="color: #07c1e7"><?php echo InformacoesUsuario('nome'); ?></h4>
                                    <div class="email-info-dropup dropdown">
                                        <span class="font-small-3 text-white">
                                          <?php echo InformacoesUsuario('email'); ?>
                                        </span>
                                      </div>
                                </div>
                            </div>
                            <div class="mail-meta-item">
                                <div class="mail-date"></div>
                            </div>
                        </div>
                        <div class="card-body mail-message-wrapper pt-2 mb-0">
                            <div class="mail-message">
                                <form action="" method="post">
                                    <textarea name="resposta" placeholder="Digite sua resposta aqui" class="form-control mb-1" cols="30" rows="5" required></textarea>
                                        <input type="submit" class="btn text-uppercase" style="background: #07c1e7; color: #fff" name="submit" value="Responder">
                                </form>
                            </div>
                        </div>
    </div>
    <?php else: ?>
        <div class="alert alert-danger text-center">Não é possível interagir nesse ticket pois ele foi fechado.</div>
    <?php endif; ?>
</div>