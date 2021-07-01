<!DOCTYPE html>
<?php
include_once("/Users/muril/Documents/Estagio/Estagio/assets/php/conexao/banco.php");
?>
<html lang="pt-br">

<head>
    <title>Departamento</title>

    <!--==================== UNICONS ====================-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!--========== BOX ICONS ==========-->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <!-- Required meta tags -->
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!--==================== CSS ====================-->
    <link rel="stylesheet" href="/Estagio/assets/css/card_style.css">
    <link rel="stylesheet" href="/Estagio/assets/css/style.css">
    <link rel="stylesheet" href="/Estagio/assets/css/menu_card.css">

    <!--==================== JS ====================-->
    <script src="/estagio/assets/js/main.js"></script>
    <script src="/estagio/assets/js/darklightmode.js"></script>

    <!-- Font Awesome CSS Links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />

</head>

<body>
    <?php
        include("/Users/muril/Documents/Estagio/Estagio/assets/php/header.php");
    ?>
    <form method="POST" action="/Estagio/assets/php/config_departamento.php">
        <section class="sec">
            <div class="lin">
                <!-- <a href="centrodecusto.php" class="linter">Centro de custo</a> -->
            </div>

            <div class="wrapper">

                <div class="title"> Departamento </div>

                <div class="toggle"></div>

                <div class="form">
                    <div class="inputfield">
                        <label for="codigocampi">Campi: </label>
                        <input placeholder="Selecione o campi" id="campi" name="codigocampi" 
                            list="codigocampi" autocomplete="off" tabindex="1" required>
                        <?php
                        $query = $con->query("SELECT codigocampi FROM departamentos");
                        ?>
                        <datalist id="codigocampi" name="codigocampi">
                            <?php while ($reg = $query->fetch_array()) { ?>
                                <option value="<?php echo $reg["codigocampi"] ?>">
                                    <?php echo $reg["codigocampi"] ?>
                                </option>
                            <?php } ?>
                        </datalist>
                    </div>

                    <div class="inputfield form-group">
                        <label for="">Descrição: </label>
                        <textarea maxlength="30" placeholder="Digite a descrição do campi"
                            class="textarea form-control" name="descricao" id="descricao" rows="3" 
                            tabindex="2" required></textarea>
                    </div>

                    <div class="inputfield">
                        <label>Abreviatura: </label>
                        <input autocomplete="off" minlength="1" maxlength="2" type="text" 
                            placeholder="Digite a abreviatura do campi" id="abrev" name="abrev" 
                            tabindex="3" required>
                    </div>

                    <div class="inputfield">
                        <button type="submit" class="btn btn-primary" tabindex="4">Gravar</button>
                        <button type="button" class="btns btn-primary" tabindex="5">Sair</button>
                    </div>
                </div>
            </div>
        </section>
    </form>
    <script src="/Estagio/assets/js/DarkLightMode.js"></script>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>


</body>

</html>