<!DOCTYPE html>
<html lang="pt" >
  <head>
    <meta charset="UTF-8">
    <title>DELIVERY</title>
    <meta charset="utf-8">
    

    <meta name="author" content="Adtile">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    
    <link rel="stylesheet" href="../../style.css">
  </head>
  <body>
    <div class="login-page">
      <div class="form">
        <div align="center"><img src="../../insta.png"  height="150" width="150"></div>
        <br>

        <form method="post" class="login-form" action='../../services/authenticate.php'> 
          <input type="text" placeholder="Seu email" name="email"/>
          <input type="password" placeholder="senha" name="senha"/>
          <button>ENTRAR</button>
          <p class="message">Não tenho conta <a href="./cadastro.php">Clica aqui</a></p>
        </form>
      </div>
    </div>
  </body>
</html>