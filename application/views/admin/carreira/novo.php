<div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-icon card-header-success">
                    <div class="card-icon">
                      <i class="fa fa-tree fa-2x"></i>
                    </div>
                    <h4 class="card-title ">Adicionar Plano de Carreira</h4>
                  </div>
                  <div class="card-body">
      <?php if(isset($message)) echo $message;?>
      <form action="" method="post" class="form-horizontal form-variance" enctype="multipart/form-data">
        <div class="row">
          <label class="col-sm-2 col-form-label">Nome
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                                    <input type="text" name="nome" class="form-control" required>
            </div>
          </div>
        </div>
        <div class="row">
          <label class="col-sm-2 col-form-label">Pontos
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                                    <input type="text" name="pontos" class="form-control" required>

            </div>
          </div>
        </div>
        <div class="row">
          <label class="col-sm-2 col-form-label">Prêmio
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                                    <textarea name="premio" class="form-control" cols="30" rows="5"></textarea>

            </div>
          </div>
        </div>
        
        <div class="row">
          <label class="col-sm-2 col-form-label">&nbsp;
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
              <input type="submit" class="btn btn-success" name="submit" value="Cadastrar Plano de Carreira">
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</form>
</div>
