<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon card-header-primary">
                <div class="card-icon">
                    <i class="fa fa-users fa-2x"></i>
                </div>
                <h4 class="card-title ">Usuários</h4>
            </div>
            <div class="card-body">

                <a class="btn btn-primary btn-sm mb-2" data-toggle="collapse" href="#buscar" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Mostrar filtro
                </a>

                <form class="collapse" id="buscar" action="" method="POST">

                    <div class="row">
                        <label class="col-sm-2 col-form-label">Nome
                        </label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input class="form-control"  name="buscar[nome]" type="text" value="<?php echo($this->input->post('buscar')['nome']) ? $this->input->post('buscar')['nome'] : ''; ?>">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Login
                        </label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input class="form-control"  name="buscar[login]" type="text" value="<?php echo($this->input->post('buscar')['login']) ? $this->input->post('buscar')['login'] : ''; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">Email
                        </label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input class="form-control"  name="buscar[email]" type="text" value="<?php echo($this->input->post('buscar')['email']) ? $this->input->post('buscar')['email'] : ''; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">CPF
                        </label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input class="form-control" id="cpf" name="buscar[cpf]" type="text" value="<?php echo($this->input->post('buscar')['cpf']) ? $this->input->post('buscar')['cpf'] : ''; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">&nbsp;
                        </label>
                        <div class="col-sm-10">
                            <div class="form-group bmd-form-group">
                                <input type="submit" class="btn btn-success" name="submit" value="Buscar">
                                <a href="<?php echo base_url('admin/usuarios'); ?>">Limpar filtro</a>
                            </div>
                        </div>
                    </div>

                </form>


                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <tr>
                                <th>
                                    Nome
                                </th>
                                <th>
                                    Login
                                </th>
                                <th>
                                    Saldo
                                </th>
                                <th>
                                    Bônus
                                </th>
                                <th>
                                    Plano de Carreira
                                </th>
                                <th>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($usuarios !== false) {
                                foreach ($usuarios as $usuario) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $usuario->nome; ?>
                                        </td>
                                        <td>
                                            <?php echo $usuario->login; ?>
                                        </td>
                                        <td>
                                            USD <?php echo number_format($usuario->saldo, 2, ".", ","); ?>
                                        </td>
                                        <td>
                                            USD <?php echo number_format($usuario->saldo_rede, 2, ".", ","); ?>
                                        </td>
                                        <td>
                                            <?php echo PlanoCarreira($usuario->plano_carreira, 'nome'); ?>
                                        </td>
                                        <td>
                                            <a class="btn btn-success btn-sm" href="<?php echo base_url('admin/usuarios/visualizar/' . $usuario->id); ?>"><i class="fa fa-eye"></i> Visualizar</a>
                                            <a class="btn btn-info btn-sm" href="<?php echo base_url('admin/usuarios/editar/' . $usuario->id); ?>"><i class="fa fa-pencil"></i> Editar</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    <?php echo $this->pagination->create_links(); ?>

                </div>
            </div>
        </div>
    </div>
</div>

