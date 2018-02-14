

<html>

<head>
    <title>DeMolayCrud</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <meta charset="UTF-8"/>
</head>
<body onload="montaPais()">
<?php
include 'conexao.php';
include 'db.php';


//codigo atualiza demolay
if(isset($_GET['updt'])){

    if(isset($_POST['dem_cid']) || isset($_POST['dem_nome']) || isset($_POST['dem_email']) || isset($_POST['dem_estado']) || isset($_POST['dem_cidade']) || isset($_POST['dem_capitulo'])) {
        $cid = trim($_POST['dem_cid']);
        $nome = trim($_POST['dem_nome']);
        $email = trim($_POST['dem_email']);
        $estado = trim($_POST['dem_estado']);
        $cidade = trim($_POST['dem_cidade']);
        $capitulo = trim($_POST['dem_capitulo']);
        $idUpdate = $_POST['dem_id'];
        //cadastra
        if ($cid == "" || $nome == "" || $email == "" || $estado == "" || $cidade == "" || $capitulo == "") {
            echo "<center><font color='red'><h2>ERRO</h2></font></center>";
        } else {
            $dblay = new BD($pdo);
            $dblay->update_demolay($idUpdate,$cid,$nome,$email,$estado,$cidade,$capitulo);
        }
    }
}






//Codigo para apagar demolay
$apaga = isset($_GET['apagar']);
if($apaga){
    $idApaga = $_GET['apagar'];
    try {
        $dblay = new BD($pdo);
        $dblay->apaga_demolay($idApaga);
    }catch(PDOException $erro){

    }
}


//Codigo de Cadastro [com filtro]
$db = isset($_GET['cad']);
if($db == 1){
    if(isset($_POST['dem_cid']) || isset($_POST['dem_nome']) || isset($_POST['dem_email']) || isset($_POST['dem_estado']) || isset($_POST['dem_cidade']) || isset($_POST['dem_capitulo'])) {
        $cid = trim($_POST['dem_cid']);
        $nome = trim($_POST['dem_nome']);
        $email = trim($_POST['dem_email']);
        $estado = trim($_POST['dem_estado']);
        $cidade = trim($_POST['dem_cidade']);
        $capitulo = trim($_POST['dem_capitulo']);
        //cadastra
        if ($cid == "" || $nome == "" || $email == "" || $estado == "" || $cidade == "" || $capitulo == "") {
            echo "<center><font color='red'><h2>ERRO</h2></font></center>";
        } else {
            $dblay = new BD($pdo);
            $dbbs = $dblay->insere_demolay($cid, $nome, $email, $estado, $cidade, $capitulo);
        }
    }else{

    }
}

//Codigo de layout [Carrega o template e muda o template]
$layout = isset($_GET['layout']);
if($layout == 1){
    $layoutt = $_GET['layout'];
    if($layoutt == "cadastro") {
        echo "
<nav class='navbar navbar-toggleable-md navbar-light bg-faded'>
    <button class='navbar-toggler navbar-toggler-right' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
        <span class='navbar-toggler-icon'></span>
    </button>
    <a class='navbar-brand' href='#'>DeMolayCRUD</a>
    <div class='collapse navbar-collapse' id='navbarSupportedContent'>
        <ul class='navbar-nav mr-auto'>
            <li class='nav-item'>
                <a class='nav-link' href='index.php'>Home</a>
            </li>
            <li class='nav-item active'>
                <a class='nav-link' href='index.php?layout=cadastro'>Cadastrar</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link disabled' href='#'>Editando</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link disabled' href='#'>Apagando</a>
            </li>


        </ul>
        <form action='index.php?busca' method='POST' class='form-inline my-2 my-lg-0'>
            <input name='busca' class='form-control mr-sm-2' type='text' placeholder='Procurar Registro...'>
            <button class='btn btn-outline-success my-2 my-sm-0' type='submit'>Buscar</button>
        </form> 
    </div>
</nav>
<div class='container'>
   <br>
   <br>
<div class='alert alert-info' role='alert'>
  <center><h1>Cadastro de DeMolays</h1></center>
</div>
   <br>
   <br>
  <form action='index.php?cad' method='POST' name='formCadastroDemolay'>
  
  <div class='form-group row'>
  <label class='col-2 col-form-label'>CID</label>
  <div class='col-10'>
    <input class='form-control' name='dem_cid' type='number' required>
  </div>
</div>
<div class='form-group row'>
  <label class='col-2 col-form-label'>Nome</label>
  <div class='col-10'>
    <input name='dem_nome' class='form-control' type='text' placeholder='Nome' required>
  </div>
</div>
<div class='form-group row'>
  <label  class='col-2 col-form-label'>Email</label>
  <div class='col-10'>
    <input name='dem_email' class='form-control' type='text' placeholder='E-Mail' required>
  </div>
</div>
<div class='form-group row'>
  <label  class='col-2 col-form-label'>Estado</label>
  <div class='col-10'>
<select name='dem_estado'>
	<option value='AC'>Acre</option>
	<option value='AL'>Alagoas</option>
	<option value='AP'>Amapá</option>
	<option value='AM'>Amazonas</option>
	<option value='BA'>Bahia</option>
	<option value='CE'>Ceará</option>
	<option value='DF'>Distrito Federal</option>
	<option value='ES'>Espírito Santo</option>
	<option value='GO'>Goiás</option>
	<option value='MA'>Maranhão</option>
	<option value='MT'>Mato Grosso</option>
	<option value='MS'>Mato Grosso do Sul</option>
	<option value='MG'>Minas Gerais</option>
	<option value='PA'>Pará</option>
	<option value='PB'>Paraíba</option>
	<option value='PR'>Paraná</option>
	<option value='PE'>Pernambuco</option>
	<option value='PI'>Piauí</option>
	<option value='RJ'>Rio de Janeiro</option>
	<option value='RN'>Rio Grande do Norte</option>
	<option value='RS'>Rio Grande do Sul</option>
	<option value='RO'>Rondônia</option>
	<option value='RR'>Roraima</option>
	<option value='SC'>Santa Catarina</option>
	<option value='SP'>São Paulo</option>
	<option value='SE'>Sergipe</option>
	<option value='TO'>Tocantins</option>
</select>
  </div>
</div>
<div class='form-group row'>
  <label for='example-email-input' class='col-2 col-form-label'>Cidade</label>
  <div class='col-10'>
     <input name='dem_cidade' class='form-control' type='text' placeholder='Cidade Atual' required>
  </div>
</div>
<div class='form-group row'>
  <label for='example-email-input' class='col-2 col-form-label'>Capítulo</label>
  <div class='col-10'>
    <input name='dem_capitulo' class='form-control' type='text' placeholder='Capítulo Atual' required>
  </div>
</div>
<br>
 <center><button class='btn btn-outline-success' type='submit'>Cadastrar</button></center> 

</form>
</div>
    ";
    }else if($layoutt == "editar"){
        if(isset($_GET['id'])){
            $idEdita = $_GET['id'];
            $dblay = new BD($pdo);
            $infoDemolay = $dblay->get_demolay($idEdita);
            echo "
<nav class='navbar navbar-toggleable-md navbar-light bg-faded'>
    <button class='navbar-toggler navbar-toggler-right' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
        <span class='navbar-toggler-icon'></span>
    </button>
    <a class='navbar-brand' href='#'>DeMolayCRUD</a>

    <div class='collapse navbar-collapse' id='navbarSupportedContent'>
        <ul class='navbar-nav mr-auto'>
            <li class='nav-item '>
                <a class='nav-link' href='index.php?layout=index'>Home</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='index.php?layout=cadastro'>Cadastrar</a>
            </li>
            <li class='nav-item' >
                <a class='nav-link disabled' href='#'>Exibindo</a>
            </li>
            <li class='nav-item active'>
                <a class='nav-link ' href='#'>Editando</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link disabled' href='#'>Apagando</a>
            </li>



        </ul>
        <form action='index.php?busca' method='POST' class='form-inline my-2 my-lg-0'>
            <input name='busca' class='form-control mr-sm-2' type='text' placeholder='Procurar Registro...'>
            <button class='btn btn-outline-success my-2 my-sm-0' type='submit'>Buscar</button>
        </form> 
    </div>
</nav>
<div class='container'>
<br>
<br>
<!-- container-->
<center><a href='index.php' class='btn btn-success' role='button'><- Voltar</a></center>
   <br>
   <br>
<div class='alert alert-info' role='alert'>
  <center><h1>Atualizar DeMolay</h1></center>
</div>
   <br>
   <br>";
            foreach($infoDemolay as $info){
                echo"  <form action='index.php?updt' method='POST' name='formCadastroDemolay'>
  <div class='form-group row'>
  <label class='col-2 col-form-label'>CID</label>
  <input name='dem_id' type='number' value='",$info['dem_id'],"' hidden>
  <div class='col-10'>
    <input class='form-control' value='",$info['dem_cid'],"' name='dem_cid' type='number' required>
  </div>
</div>
<div class='form-group row'>
  <label class='col-2 col-form-label'>Nome</label>
  <div class='col-10'>
    <input name='dem_nome' value='",$info['dem_nome'],"' class='form-control' type='text' placeholder='Nome' required>
  </div>
</div>
<div class='form-group row'>
  <label  class='col-2 col-form-label'>Email</label>
  <div class='col-10'>
    <input name='dem_email' value='",$info['dem_email'],"' class='form-control' type='text' placeholder='E-Mail' required>
  </div>
</div>
<div class='form-group row'>
  <label  class='col-2 col-form-label'>Estado</label>
  <div class='col-10'>
<select value='",$info['dem_estado'],"' name='dem_estado'>
	<option value='AC'>Acre</option>
	<option value='AL'>Alagoas</option>
	<option value='AP'>Amapá</option>
	<option value='AM'>Amazonas</option>
	<option value='BA'>Bahia</option>
	<option value='CE'>Ceará</option>
	<option value='DF'>Distrito Federal</option>
	<option value='ES'>Espírito Santo</option>
	<option value='GO'>Goiás</option>
	<option value='MA'>Maranhão</option>
	<option value='MT'>Mato Grosso</option>
	<option value='MS'>Mato Grosso do Sul</option>
	<option value='MG'>Minas Gerais</option>
	<option value='PA'>Pará</option>
	<option value='PB'>Paraíba</option>
	<option value='PR'>Paraná</option>
	<option value='PE'>Pernambuco</option>
	<option value='PI'>Piauí</option>
	<option value='RJ'>Rio de Janeiro</option>
	<option value='RN'>Rio Grande do Norte</option>
	<option value='RS'>Rio Grande do Sul</option>
	<option value='RO'>Rondônia</option>
	<option value='RR'>Roraima</option>
	<option value='SC'>Santa Catarina</option>
	<option value='SP'>São Paulo</option>
	<option value='SE'>Sergipe</option>
	<option value='TO'>Tocantins</option>
</select>
  </div>
</div>
<div class='form-group row'>
  <label for='example-email-input'  class='col-2 col-form-label'>Cidade</label>
  <div class='col-10'>
     <input name='dem_cidade' value='",$info['dem_cidade'],"' class='form-control' type='text' placeholder='Cidade Atual' required>
  </div>
</div>
<div class='form-group row'>
  <label for='example-email-input' class='col-2 col-form-label'>Capítulo</label>
  <div class='col-10'>
    <input name='dem_capitulo' value='",$info['dem_capitulo'],"' class='form-control' type='text' placeholder='Capítulo Atual' required>
  </div>
</div>
<br>
 <center><button class='btn btn-outline-success' type='submit'>Atualizar</button></center> 

</form>";
            }



        }else{
            header("location:index.php");
        }


    }else if($layoutt == "mostra"){
        if(isset($_GET['id'])){
            $idMostra = $_GET['id'];
            $dblay = new BD($pdo);
            $demolayMostras = $dblay->get_demolay($idMostra);
            echo "
<nav class='navbar navbar-toggleable-md navbar-light bg-faded'>
    <button class='navbar-toggler navbar-toggler-right' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
        <span class='navbar-toggler-icon'></span>
    </button>
    <a class='navbar-brand' href='#'>DeMolayCRUD</a>

    <div class='collapse navbar-collapse' id='navbarSupportedContent'>
        <ul class='navbar-nav mr-auto'>
            <li class='nav-item '>
                <a class='nav-link' href='index.php?layout=index'>Home</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='index.php?layout=cadastro'>Cadastrar</a>
            </li>
            <li class='nav-item active' >
                <a class='nav-link ' href='#'>Exibindo</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link disabled' href='#'>Editando</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link disabled' href='#'>Apagando</a>
            </li>



        </ul>

    </div>
</nav>
<div class='container'>
<br>
<br>
<!-- container-->
<center><a href='index.php' class='btn btn-success' role='button'><- Voltar</a></center>
<br>
<br>
<center>
  <div class='alert alert-info' role='alert'>";
            foreach($demolayMostras as $demolayMostra) {
                echo"
                <strong > CID</strong > ",$demolayMostra['dem_cid'],"<br>
                <strong>Nome:</strong > ",$demolayMostra['dem_nome'],"<br>
                <stron>Email:</stron > ",$demolayMostra['dem_email'],"<br>
                <strong>Estado:</strong > ",$demolayMostra['dem_estado'],"<br>
                <strong>Cidade:</strong > ",$demolayMostra['dem_cidade'],"<br>
                <strong>Capítulo:</strong > ",$demolayMostra['dem_capitulo'],"<br>
<br>
<a href='index.php?layout=editar&id=", $demolayMostra['dem_id'],"' class='btn btn-warning' role='button'>Editar</a> <a href='index.php?apagar=", $demolayMostra['dem_id'],"' class='btn btn-danger' role='button' >Apagar</a>
                ";
                }
            echo"
</div>
</center>
</div>
";

        }else{
            header("location:index.php");
        }



    }else{
        header("location:index.php");
    }
}else{

    $demolay = new BD($pdo);
    $demolays = $demolay->get_demolays();
    echo "

<nav class='navbar navbar-toggleable-md navbar-light bg-faded'>
    <button class='navbar-toggler navbar-toggler-right' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
        <span class='navbar-toggler-icon'></span>
    </button>
    <a class='navbar-brand' href='#'>DeMolayCRUD</a>

    <div class='collapse navbar-collapse' id='navbarSupportedContent'>
        <ul class='navbar-nav mr-auto'>
            <li class='nav-item active'>
                <a class='nav-link' href='index.php?layout=index'>Home</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='index.php?layout=cadastro'>Cadastrar</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link disabled' href='#'>Exibindo</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link disabled' href='#'>Editando</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link disabled' href='#'>Apagando</a>
            </li>



        </ul>

    </div>
</nav>
<div class='container'>
<br>
<br>
<!-- container-->
<center><a href='index.php?layout=cadastro' class='btn btn-success' role='button'>+ Criar DeMolay</a></center>
<br>
<br>
<table class='table'>
  <thead class='thead-inverse'>
    <tr>
      <th>CID</th>
      <th>Nome</th>
      <th>E-mail</th>
      <th>Estado</th>
      <th>Cidade</th>
      <th>Capítulo</th>
      <th><b><center></center><font color='red'>Opções</b></font></center></th>
    </tr>
  </thead>
  <tbody>";
      foreach($demolays as $ddemolay){
          echo "<tr>
      <td>", $ddemolay['dem_cid'] ,"</td>
      <td>", $ddemolay['dem_nome'],"</td>
      <td>", $ddemolay['dem_email'],"</td>
      <td>", $ddemolay['dem_estado'],"</td>
      <td>", $ddemolay['dem_cidade'],"</td>
      <td>", $ddemolay['dem_capitulo'],"</td>
      <td><a href='index.php?layout=mostra&id=",$ddemolay['dem_id'],"' class='btn btn-info' role='button'>Info</a> <a href='index.php?layout=editar&id=", $ddemolay['dem_id'],"' class='btn btn-warning' role='button'>Editar</a> <a href='index.php?apagar=", $ddemolay['dem_id'],"' class='btn btn-danger' role='button' >Apagar</a></td>
    </tr>";
      }


   echo "
     </tbody>
</table>
</div>
<!-- fim container -->
   ";
}



?>











<footer>
    <hr>
    <br>
    <center><h6><font color='#a9a9a9'>Developed by Guilherme</font></h6></center>
<!-- imports bootstrap -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</footer>
</body>
</html>