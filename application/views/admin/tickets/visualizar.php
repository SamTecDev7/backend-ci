<div class="row">

    <div class="col-md-10">

        <ul class="timeline timeline-simple">
            <?php if($tickets !== false){ foreach($tickets as $ticket){ ?>
            <li class="timeline-inverted">

                <?php if ($ticket->respondido_por == 1): ?>
                <div class="timeline-badge success">
                    <i class="fa fa-user"></i>
                </div>
                <?php else: ?>
                <div class="timeline-badge danger">
                    <i class="fa fa-envelope-open"></i>
                </div>
                <?php endif; ?>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <span class="badge badge-pill badge-<?php echo ($ticket->respondido_por == 1) ? 'success' : 'danger'; ?>"><?php echo ($ticket->respondido_por == 1) ? InformacoesUsuario('nome', $ticket->id_usuario) : 'Suporte'; ?></span>
                    </div>
                    <div class="timeline-body">
                        <p>
                            <?php echo $ticket->mensagem;?>
                        </p>
                    </div>
                    <h6>
                      <i class="ti-time"></i> <?php echo date('d/m/Y H:i:s', strtotime($ticket->data));?>
                    </h6>
                </div>
            </li>
            <?php } } ?>

            <?php if($ticket->status != 3){ ?>

            <li class="timeline-inverted">
                <div class="timeline-badge danger">
                    <i class="fa fa-envelope-open"></i>
                </div>
                <div class="timeline-panel">
                    <div class="timeline-body">
                        <form action="" method="post" class="form-horizontal form-variance">
                            <textarea name="resposta" placeholder="Digite sua resposta aqui" class="form-control" cols="30" rows="5" required></textarea>
                            <span class="input-group-btn">
                                                <input type="submit" class="btn btn-success text-uppercase" name="submit" value="Responder">
                                            </span>
                        </form>
                    </div>
            </li>
            <?php } else {
              echo '<div class="alert alert-danger text-center">Não é possível interagir nesse ticket pois ele foi fechado.</div>';
            } ?>

        </ul>
        </div>
    </div>