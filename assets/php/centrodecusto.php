<!DOCTYPE html>
<?php
include("conexao/banco.php");
?>
<html lang="pt-br">

<head>
    <title>Centro de custo</title>

    <!--==================== UNICONS ====================-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!--========== BOX ICONS ==========-->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap links -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!--==================== CSS ====================-->
    <link rel="stylesheet" href="/assets/css/card_style.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/menu_card.css">

    <!--==================== JS ====================-->
    <!-- <script src="/assets/js/main.js"></script> -->
    <script src="/assets/js/darklightmode.js"></script>
    <script src="/assets/js/vanilla-masker.js"></script>

    <!-- Font Awesome CSS Links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />

</head>

<body>
    <?php
        include("header.php");
    ?>
    
    <form method="POST" action="config_centro.php">
        <section class="sec">
            <div class="lin">
                <!-- <a href="/Estagio/assets/php/main/departamento.php" class="linter">Departamento</a> -->
            </div>

            <div class="wrapper">
                <div class="title"> Centro de Custo </div>

                <div class="toggle"></div>

                <div class="form">
                    <div class="inputfield form-group">
                        <label class="form-label" for="codigocampi">Campi: * </label>
                        <div class="custom_select">
                            <?php
                            $query = ("SELECT * FROM departamentos");
                            $result = $con->query($query);
                            ?>
                            <select onchange="retornaCodigo(this.value)" name="codigocampi" id="codigocampi" class="form-control" required>
                                <option value="">Selecione o código do campi: </option>
                                <?php
                                if ($result->num_rows > 0) {
                                    while ($reg = $result->fetch_assoc()) {
                                        echo '<option value="' . $reg["codigocampi"] . '">' . $reg["codigocampi"] . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="inputfield">
                        <label class="form-label" for="centrocusto">Centro de custo: *</label>
                        <div class="custom_select">
                            <!-- <select minlength="6" maxlength="6" id="centrocusto" class="form-control" name="centrocusto" required>
                                <option class="form-control">Selecione os centro de custos: </option>
                            </select> -->
                            <input list="centrocusto" placeholder="Selecione o centro de custo" name="centrocusto" id="centrocusto">
                            <datalist id="centrocusto" name="codigocentro">
                                <option value="">
                            </datalist>
                        </div>
                    </div>

                    <script type="text/javascript">
                        function retornaCodigo(id) {
                            $('#centrocusto').html('');
                            $.ajax({
                                type: 'post',
                                url: 'ajax.php',
                                data: {
                                    codigocampi: id
                                },
                                success: function(data) {
                                    $('#centrocusto').html(data);
                                }
                            })
                        }
                    </script>

                    <div class="inputfield">
                        <label class="form-label" for="desc">Descrição: *</label>
                        <textarea placeholder="Digite a descrição do departamento" maxlength="200" minlength="10" class="textarea form-control" name="desc" id="desc" rows="3" required></textarea>
                    </div>

                    <div class="inputfield">
                        <label class="form-label" for="tel">Telefone: </label>
                        <input type="tel" id="tel" attrname="telephone1" data-mask="(00) 0000-0000" 
                        data-mask-reverse="true" name="tel" pattern="\(\d{2}\)\s*\d{5}-\d{4}" 
                        class="phone" placeholder="Número de telefone - (opcional)" maxlength="15">
                    </div>

                    <script>
                        // Listen the input element masking it to format with pattern.
                        function inputHandler(masks, max, event) {
                            var c = event.target;
                            var v = c.value.replace(/\D/g, '');
                            var m = c.value.length > max ? 1 : 0;
                            VMasker(c).unMask();
                            VMasker(c).maskPattern(masks[m]);
                            c.value = VMasker.toPattern(v, masks[m]);
                        }

                        var telMask = ['(99) 9999-99999', '(99) 99999-9999'];
                        var tel = document.querySelector('input[attrname=telephone1]');
                        VMasker(tel).maskPattern(telMask[0]);
                        tel.addEventListener('input', inputHandler.bind(undefined, telMask, 14), false);
                    </script>

                    <div class="inputfield">
                        <button formmethod="POST" type="submit" class="btn btn-primary">Gravar</button>
                    </div>
                </div>
            </div>
        </section>
    </form>
</body>

</html>