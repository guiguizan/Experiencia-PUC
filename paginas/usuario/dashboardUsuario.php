<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/dashboard.css">
    <title>Dashboard</title>
    <script>

const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
let feedback = urlParams.get('feedback');

if(feedback == 'cartao_ok'){
  alert("Dados alterados com sucesso!");
}
</script>
</head>
<?php
    session_start();
    
    include "../../php/conexao.php";
  
?>
<body>
    <h1>Olá <?php echo $_SESSION['usuario']?></h1>
    <a href="cartao.php"><h3>Altearar dados de pagamento</h3></a>
    <br><br><h3>Filmes e séries</h3>
    <?php 
    
    $resultado = mysqli_query($con, "SELECT * FROM filmes");

	if(mysqli_num_rows($resultado) > 0) 
	{
		while($registro = mysqli_fetch_assoc($resultado)){

            echo "
            <button class='accordion'>".$registro['titulo'].' - '.$registro['genero'].' - '.$registro['ano'].' - '.$registro['duracao'].' - '.$registro['relevancia']."</button>
            <div class='panel'>
              <p>".$registro['sinopse']."</p>
              <p>".$registro['trailer']."</p>
            </div>
            ";
        }


	}

    
    ?>
    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            /* Toggle between adding and removing the "active" class,
            to highlight the button that controls the panel */
            this.classList.toggle("active");

            /* Toggle between hiding and showing the active panel */
            var panel = this.nextElementSibling;
            if (panel.style.display === "block") {
            panel.style.display = "none";
            } else {
            panel.style.display = "block";
            }
        });
}
        </script>
</body>
</html>