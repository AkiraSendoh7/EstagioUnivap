<!DOCTYPE html>
<?php
include_once("banco.php");
?>
<html lang="pt-br">

<head>
    <title>Departamento</title>

    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />

    <link rel="stylesheet" href="/Estagio/css/style.css" hreflang="pt-br" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />

</head>

<body class="MainColor">
    <form method="POST" action="recebe_departamento.php">
        <section class="sec">
            <div class="lin"><a href="centrodecusto.php" class="linter">Centro de custo</a></div>

            <div class="wrapper">

                <div class="title">
                    Departamento
                </div>
                <div class="toggle"></div>
                <div class="form">
                    <div class="inputfield">
                        <label for="codigo_campi">Campi: </label>
                        <div class="custom_select">
                            <input placeholder="Selecione o campi" id="campi" name="codigo_campi" list="codigo_campi" required>
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
                    
                    <div class="inputfield form-group">
                        <label for="">Descrição: </label>
                        <textarea placeholder="Digite a descrição do CAMPI" class="textarea form-control" name="desc" id="desc" rows="3" required></textarea>
                    </div>

                    <div class="inputfield">
                        <label>Abreviatura: </label>
                        <input type="text" class="input" placeholder="Digite a abreviatura do CAMPI" id="abrev" name="abrev" required/>
                    </div>

                    <div class="inputfield">
                        <button type="submit" class="btn btn-primary">Gravar</button>
                        <button type="button" class="btns btn-primary">Sair</button>
                    </div>
                </div>
            </div>
        </section>
    </form>
    <script src="DarkLightmode.js"></script>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>


</body>

</html>