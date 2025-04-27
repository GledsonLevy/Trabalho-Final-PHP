<?php  

  if(!empty($_GET['msg'])) { 

      if($_GET['msg'] == 'camposVazios'){
        echo("
        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                 <strong>campos vazios!</strong> vazio.
                 <button type='button' class='btn-close'   data-bs-dismiss='alert' aria-label='Close'></button>
         </div>
      ");
      }
      else if($_GET['msg'] == 'loginOuSenhaIncorretos'){
          echo("
             <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                      <strong>Usuário ou senha!</strong> incorretos.
                      <button type='button' class='btn-close'   data-bs-dismiss='alert' aria-label='Close'></button>
              </div>
           ");
      }
      else if($_GET['msg'] == 'cadastradoComSucesso'){
        echo("
        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                 Cadastrado com sucesso!
                 <button type='button' class='btn-close'   data-bs-dismiss='alert' aria-label='Close'></button>
         </div>
      ");
      }     
                
  } 
