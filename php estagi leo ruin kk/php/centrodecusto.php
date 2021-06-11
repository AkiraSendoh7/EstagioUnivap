<!doctype html>
<?php
include_once("banco.php");
?>
<html lang="pt-br">

<head>
    <title>Centro de custo</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="/Estagio/css/style.css" hreflang="pt-br" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />

</head>

<body class="MainColor">
    <form method="POST" action="recebe_centrodecusto.php">
        <section class="sec">
            <div class="lin">
                <a href="departamento.php" class="linter">Departamento</a>
            </div>

            <div class="wrapper">
                <div class="title"> Centro de Custo </div>

                <div class="toggle"></div>

                <div class="form">
                    <div class="inputfield">
                        <label for="codigo_campi">Campi: </label>
                        <div class="custom_select">
                            <input placeholder="Selecione o campi" id="campi" 
                                name="codigo_campi" list="codigo_campi">
                            <?php
                            $query = $con->query("SELECT DISTINCT fk_id_codigoCampi FROM centrocustos");
                            ?>
                            <datalist id="codigo_campi" name="codigo_campi">
                                <?php while ($reg = $query->fetch_array()) { ?>
                                    <option value="<?php echo $reg["fk_id_codigoCampi"] ?>">
                                        <?php echo $reg["fk_id_codigoCampi"] ?>
                                    </option>
                                <?php } ?>
                            </datalist>
                        </div>
                    </div>

                    <div class="inputfield">
                        <label for="codigocentro">Centro de custo: </label>
                        <div class="custom_select">
                            <!-- <input placeholder="Selecione o centro de custo" id="centrodecusto" 
                                name="codigocentro" list="codigocentro"> -->
                            <?php
                            $con = mysqli_connect($servername, $username, $password, $database);
                            $query = $con->query("SELECT DISTINCT codigocentrocusto FROM centrocustos");
                            ?>
                            <select id="codigocentro" name="codigocentro">
                                <?php while ($reg = $query->fetch_array()) { ?>
                                    <option value="<?php echo $reg["codigocentrocusto"] ?>">
                                        <?php echo $reg["codigocentrocusto"] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="inputfield form-group">
                        <label for="">Descrição: </label>
                        <textarea placeholder="Digite a descrição do departamento" class="textarea form-control" name="desc" id="desc" rows="3"></textarea>
                    </div>

                    <div class="inputfield">
                        <label for="phone">Telefone: </label>
                        <input type="tel" id="tel" name="tel" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" class="input" placeholder="Número de telefone">
                    </div>

                    <div class="inputfield">
                        <button type="submit" class="btn btn-primary">Gravar</button>
                        <button type="button" class="btns btn-primary">Sair</button>
                    </div>
                </div>

            </div>
        </section>
    </form>
    <script src="/Estagio/js/DarkLightMode.js"></script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>


</body>

</html>