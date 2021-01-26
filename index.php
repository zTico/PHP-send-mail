<html>
	<head>
		<meta charset="utf-8" />
    	<title>Sist enviar e-mail</title>
		<link rel="stylesheet" type="text/css" href="estilo.css">
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	</head>

	<body>
		<div id="meio">	
			<div class="py-3 text-center">
				<img class="d-block mx-auto mb-2" src="logoultimate.png" alt="" width="140" height="125">
				<h2>Enviar e-mail</h2>
				<p class="lead">Sistema de envio de e-mail</p>
			</div>

			 <?php if( isset($_GET['erro']) ){?>
				<div class="alert alert-danger" role="alert">
					Preencha todos os campos
				</div>
			<?php } ?>
			
      		<div class="row">
      			<div class="col-md-12">
					<div class="card-body font-weight-bold">
						<form method="POST" action= "processa_envio.php">
							<div class="form-group">
								<label for="para">Para</label>
								<input type="email" class="form-control" name="para" placeholder="cerice@anoreg.com">
							</div>

							<div class="form-group">
								<label for="assunto">Assunto</label>
								<input type="text" class="form-control" name="assunto" placeholder="Assundo do e-mail">
							</div>
							
							<div class="form-group">
								<label >Selecione o arquivo</label>
								<input type="file" class="form-control-file" name="arquivo">
							</div>

							<div class="form-group">
								<label for="mensagem">Mensagem</label>
								<textarea class="form-control" name="mensagem"></textarea>
							</div>

							<button type="submit" class="btn btn-primary btn-lg">Enviar Mensagem</button>
						</form>
					</div>
				</div>	
      		</div>
		 </div>
	</body>
</html>
