<div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-icon card-header-success">
                    <div class="card-icon">
                      <i class="fa fa-camera fa-2x"></i>
                    </div>
                    <h4 class="card-title ">Editar Curso</h4>
                  </div>
    <div class="card-body ">
       <?php if(isset($message)) echo $message;?>
      <form action="" method="post" class="form-horizontal form-variance">
          
        <div class="row">
          <label class="col-sm-2 col-form-label">Nome do Curso
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                <input type="text" name="nome" class="form-control" value="<?php echo $curso->nome;?>" required>
            </div>
          </div>
        </div>
          
          
        <div class="row">
          <label class="col-sm-2 col-form-label">Valor
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                <input type="text" name="valor" class="form-control" value="<?php echo $curso->valor;?>" required>
            </div>
          </div>
        </div>
          
        <div class="row">
          <label class="col-sm-2 col-form-label">Descrição
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                <textarea name="texto" class="form-control" required=""><?php echo $curso->texto;?></textarea>
            </div>
          </div>
        </div>
          
        <div class="row">
          <label class="col-sm-2 col-form-label">Código do vídeo (Vimeo)
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
                <input type="text" name="link" class="form-control" value="<?php echo $curso->link;?>" required>
            </div>
          </div>
        </div>
          
        <div class="row">
          <label class="col-sm-2 col-form-label">&nbsp;
          </label>
          <div class="col-sm-10">
            <div class="form-group bmd-form-group">
              <input type="submit" class="btn btn-success" name="submit" value="Editar Curso">
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</form>
</div>
