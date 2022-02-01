<div class="col-md-12">
              <div class="card LetrasAzul">
                <div class="card-header card-header-success card-header-text">
                  <div class="card-text">
                    <h4 class="card-title" style="color: #07c1e7">NOVO TICKET</h4>
                  </div>
                </div>
                <div class="card-body ">
                    <?php if(isset($message)) echo $message;?>
                    <form action="" method="post">
                    <div class="row">
                      <label class="col-sm-2 col-form-label text-white">Assunto</label>
                      <div class="col-sm-10">
                        <div class="form-group bmd-form-group">
                            <select name="assunto" class="selectpicker" data-style="select-with-transition" title="Assunto" data-size="7" required>
                                  <option value="Financeiro">Financeiro</option>
                                  <option value="Suporte Técnico">Suporte Técnico</option>
                                  <option value="Cadastro">Cadastro</option>
                                  <option value="Dúvidas">Dúvidas</option>
                                  <option value="Outros Assuntos">Outros</option>
                                </select>                        
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-2 col-form-label text-white">Mensagem</label>
                      <div class="col-sm-10">
                        <div class="form-group bmd-form-group">
                                <textarea name="mensagem" class="form-control" cols="30" rows="5" required></textarea>
                        </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <label class="col-sm-2 col-form-label">&nbsp;</label>
                      <div class="col-sm-10">
                        <div class="form-group bmd-form-group">
                              <input type="submit" class="btn" style="background: #07c1e7; color: white" name="submit" value="Abrir Ticket">
                        </div>
                      </div>
                    </div>
                        </form>
                    </div>
                      </div>
                    </div>
                   
                  </form>
