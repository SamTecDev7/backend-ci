<div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-icon card-header-rose">
                    <div class="card-icon">
                      <i class="fa fa-ioxhost fa-2x"></i>
                    </div>
                    <h4 class="card-title ">Adicionar Nível</h4>
                  </div>
                  <div class="card-body">
      <?php if(isset($message)) echo $message;?>
      <form action="" method="post" class="form-horizontal form-variance" enctype="multipart/form-data">
        <div class="row">
          <label class="col-sm-2 col-form-label">Posição do Nível
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                                    <input type="text" name="nivel" class="form-control" required>
            </div>
          </div>
        </div>
        <div class="row">
          <label class="col-sm-2 col-form-label">Porcentagem
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                                    <input type="text" name="porcentagem" class="form-control" required>

            </div>
          </div>
        </div>

        
        <div class="row">
          <label class="col-sm-2 col-form-label">&nbsp;
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
              <input type="submit" class="btn btn-success" name="submit" value="Cadastrar Plano">
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</form>
</div>
