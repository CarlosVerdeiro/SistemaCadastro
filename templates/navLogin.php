<section class="row">

<form class="row" method="post" action="menu.php" id="Formulario">
  <div class="mb-3 col">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
    <span class="invalid-feedback msg-email"></span>
  </div>
  <div class="mb-3 col">
    <label for="exampleInputPassword1" class="form-label">Senha</label>
    <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
    <span class="invalid-feedback msg-senha"></span>
  </div>
  <input type="hidden" name="id" value="<?php 
  function atribuiID($iden){
    if ($iden) {
      echo $iden;
    }else{
      echo null;
    }
  } 
  ?>">
  <button type="submit" class="btn btn-primary" id="submit">Log In</button>
<div class="mb-3 row"><a href="\usuario\cadastroUsuario.php">Fazer cadastro AQUI</a></div>
</form>
</section>