<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Entre em Contato!</title>
  <link rel="stylesheet" href="estilos/style.css">
  <link rel="stylesheet" href="estilos/media-query.css" media="screen">
  <link rel="shortcut icon" href="imagens/favicon_io/favicon.ico" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous" defer></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <style>
    .icones {
      font-size: 41px;
      transform: translate(7px, 14px);
    }

    @media screen and (max-width: 600px) {
      .destaque {
        font-size: 1.4em;
      }
    }
  </style>
</head>

<body class="fundo">
  <header>
    <div class="container-fluid p-0 menu-cor">
      <nav class="navbar fixed-top p-0 navbar-expand-lg">
        <div class="container-fluid menu-cor menu-cor p-1">
          <a class="navbar-brand text-white p-1" href="index.html">
            <img src="imagens/favicon_io/favicon-32x32.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
            Início
          </a>
          <button class="navbar-toggler btn btn-outline-danger" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="bi bi-list text-white"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active text-white border text-center rounded m-1" aria-current="page" href="cardapio.html">Cardápio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active text-white border text-center rounded m-1" aria-current="page" href="contato.php">Contato</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active text-white border text-center rounded m-1" aria-current="page" href="localizacao.html">Localização</a>
              </li>
            </ul>

          </div>
        </div>
      </nav>
    </div>
  </header>

  <main>
    <img id="logo" src="imagens/logo_marca.png" class="mt-5 mb-2" alt="Logo Restaurante">

    <div id="contato" class="parallax"></div>

    <p class="destaque m-0">
      <i class="bi bi-envelope-at"></i> <a href="mailto:blrainhademinas@gmail.com">blrainhademinas@gmail.com</a> <br>
      <i class="bi bi-instagram"></i> <a target="_blank" href="https://www.instagram.com/biscoitossrainha_deminas/">biscoitossrainha_deminas</a> <br>
      <i class="bi bi-whatsapp"></i> <a target="_blank" href="https://wa.me/553598901594">+55 35 9.9890-1594</a> <br>
    </p>

    <?php
    // define variables and set to empty values
    $name = $email = $text = "";

    // valida os dados de entrada
    function test_input($data)
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $name = test_input($_POST["nome"]);
      $email = test_input($_POST["email"]);
      $text = test_input($_POST["texto"]);   


      // pega os dados do meu servidor servidor
      $servername = "localhost"; // ip da máquina onde o servidor está
      $username = "root";
      $password = "";
      $dbname = "rainhademinas";

      // Create connection utilizando um instância
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      // insere os valores na tabela
      $sql = "INSERT INTO dados (nome, email, texto)
        VALUES ('" . $name . "', '" . $email . "', '" . $text . "')";
      // executa o comando acima para salvar os valores na tabela
      if ($conn->query($sql) === TRUE) {
        $dados = "Dados registrados com sucesso";
      } else {
        $dados = "Error: " . $sql . "<br>" . $conn->error;
      }

      $conn->close();
    }

    
    ?>

    <form action="<?=htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post" autocomplete="on" onsubmit="alert('<?=$dados?>')" >

      <fieldset>
        <legend>Dados pessoais</legend>
        <div>
          <label for="inome"> <i class="bi bi-person-circle px35"></i> </label>
          <input type="name" name="nome" id="inome" required autocomplete="username" placeholder="    Nome completo" maxlength="130">
        </div>
        <div>
          <label for="iemail"> <i class="bi bi-envelope-at px35"></i> </label>
          <input type="email" name="email" id="iemail" required autocomplete="email" placeholder="    E-mail" maxlength="130">
        </div>
      </fieldset>

      <div>
        <textarea name="texto" id="itexto" cols="26" rows="9" placeholder="       Digite sua mensagem" required style="resize: none;" class="mt-2 mb-2" maxlength="1100"></textarea>
      </div>

      <div>
        <input type="submit" value="Enviar" class="largura">
        <input type="reset" value="Limpar" class="largura">
      </div>
    </form>
  </main>

  <footer class="pt-1">
    Designed by <a href="https://github.com/luizdevfelipe" target="_blank">luizdevfelipe</a>
  </footer>
  <script src="script.js"></script>
</body>

</html>