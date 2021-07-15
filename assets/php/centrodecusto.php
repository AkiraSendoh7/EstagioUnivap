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
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap links -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!--==================== CSS ====================-->
    <link rel="stylesheet" href="/Estagio/assets/css/card_style.css">
    <link rel="stylesheet" href="/Estagio/assets/css/style.css">
    <link rel="stylesheet" href="/Estagio/assets/css/menu_card.css">

    <!--==================== JS ====================-->
    <script src="/Estagio/assets/js/menu_card.js" defer></script>
    <script src="/Estagio/assets/js/darklightmode.js" defer></script>
    <script src="/Estagio/assets/js/vanilla-masker.js"></script>

    <!-- Font Awesome CSS Links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />

</head>

<body>
    <?php include("header.php"); ?>

    <i class='bx bx-moon change-theme' id="theme-button"></i>

    <!-- Theme change button  -->
    <div class="tabs">
        <div class="tab-header">
            <div class="active" onclick="openTab('inserir'), cleanElements(1)"> Inserir </div>
            <div onclick="openTab('alterar'), cleanElements(2)"> Alterar </div>
            <div onclick="openTab('visualizar'), showTable()"> Visualizar </div>
            <div onclick="openTab('excluir'), cleanElements(3)"> Excluir </div>
        </div>
        <div class="tab-indicator"></div>
        <div class="tab-body">
            <div id="inserir" style="position: relative; display: block" class="tabcontent active">
                <div class="active">
                    <form method="POST" action="config_centro.php">
                        <section class="sec" name="section">

                            <div class="wrapper">
                                <div class="title"> Centro de Custo </div>

                                <div class="form">
                                    <div class="inputfield form-group">
                                        <label class="form-label" for="codigocampi">Campi: * </label>
                                        <div id="codigocampi_inserir" class="custom_select">
                                            <?php
                                            $query = ("SELECT * FROM departamentos");
                                            $result = $con->query($query);
                                            ?>
                                            <select onchange="retornaCodigo(this.value)" onfocus="dr=0" name="codigocampi_inserir" class="form-control" required>
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
                                        <div id="centrocustos_inserir" class="custom_select">
                                            <input list="centrocusto_ins" onfocus="dr=0" onchange="verify(this.value)" autocomplete="off" placeholder="Selecione o centro de custo" name="centrocustos_inserir">
                                            <datalist id="centrocusto_ins" name="centrocustos">
                                                <option value="">
                                            </datalist>
                                        </div>
                                    </div>

                                    <div id="desc_inserir" class="inputfield">
                                        <label class="form-label" for="desc">Descrição: *</label>
                                        <textarea placeholder="Digite a descrição do departamento" onfocus="fetchTel(this.value)" maxlength="200" minlength="10" class="textarea form-control" name="desc_inserir" rows="3" required></textarea>
                                    </div>

                                    <div id="tel_inserir" class="inputfield">
                                        <label class="form-label" for="tel">Telefone: </label>
                                        <input type="tel" autocomplete="off" attrname="telephone1" data-mask="(00) 0000-0000" data-mask-reverse="true" name="tel_inserir" pattern="\(\d{2}\)\s*\d{5}-\d{4}" class="phone" placeholder="Número de telefone - (opcional)" maxlength="15">
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

                                    <div id="blockbtn" class="inputfield">
                                        <button formmethod="POST" type="submit" class="btn btn-primary">Gravar</button>
                                    </div>
                                </div>
                            </div>

                        </section>
                    </form>
                </div>

            </div>

            <div class="tabcontent" style="display: none" id="alterar">
                <div class="active">
                    <form method="POST" action="config_centro.php">
                        <section class="sec" name="section">

                            <div class="wrapper">
                                <div class="title"> Centro de Custo </div>

                                <div class="form">
                                    <div class="inputfield form-group">
                                        <label class="form-label" for="codigocampi">Campi: * </label>
                                        <div id="codigocampi_alterar" class="custom_select">
                                            <?php
                                            $query = ("SELECT * FROM departamentos");
                                            $result = $con->query($query);
                                            ?>
                                            <select onchange="retornaCodigo(this.value)" onfocus="dr=0" name="codigocampi_alterar" class="form-control" required>
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
                                        <div id="centrocustos_alterar" class="custom_select">
                                            <input list="centrocusto_alt" onfocus="dr=0" onchange="verify(this.value)" autocomplete="off" placeholder="Selecione o centro de custo" name="centrocustos_alterar">
                                            <datalist id="centrocusto_alt" name="centrocustos">
                                                <option value="">
                                            </datalist>
                                        </div>
                                    </div>

                                    <div id="desc_alterar" class="inputfield">
                                        <label class="form-label" for="desc">Descrição: *</label>
                                        <textarea placeholder="Digite a descrição do departamento" onfocus="fetchTel(this.value)" maxlength="200" minlength="10" class="textarea form-control" name="desc_alterar" rows="3" required></textarea>
                                    </div>

                                    <div id="tel_alterar" class="inputfield">
                                        <label class="form-label" for="tel">Telefone: </label>
                                        <input type="tel" autocomplete="off" attrname="telephone1" data-mask="(00) 0000-0000" data-mask-reverse="true" name="tel_alterar" pattern="\(\d{2}\)\s*\d{5}-\d{4}" class="phone" placeholder="Número de telefone - (opcional)" maxlength="15">
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
                                        <button formmethod="POST" type="submit" class="btn btn-primary">Gravar alteração</button>
                                    </div>
                                </div>
                            </div>

                        </section>
                    </form>
                </div>
            </div>

            <div id="visualizar" style="height:100%;overflow:auto;overflow-x:hidden;overflow-y:scroll;" class="tabcontent">
            </div>

            <div class="tabcontent" style="display: none" id="excluir">
                <div class="active">
                    <form method="POST" action="config_centro.php">
                        <section class="sec" name="section">

                            <div class="wrapper">
                                <div class="title"> Centro de Custo </div>

                                <div class="form">
                                    <div class="inputfield form-group">
                                        <label class="form-label" for="codigocampi">Campi: * </label>
                                        <div id="codigocampi_excluir" class="custom_select">
                                            <?php
                                            $query = ("SELECT * FROM departamentos");
                                            $result = $con->query($query);
                                            ?>
                                            <select onchange="retornaCodigo(this.value)" onfocus="dr=0" name="codigocampi_excluir" class="form-control" required>
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
                                        <div id="centrocustos_excluir" class="custom_select">
                                            <input list="centrocusto_del" onfocus="dr=0" onchange="verify(this.value)" autocomplete="off" placeholder="Selecione o centro de custo" name="centrocustos_excluir">
                                            <datalist id="centrocusto_del" name="centrocustos">
                                                <option value="">
                                            </datalist>
                                        </div>
                                    </div>

                                    <div id="desc_excluir" class="inputfield">
                                        <label class="form-label" for="desc">Descrição: *</label>
                                        <textarea placeholder="Digite a descrição do departamento" onfocus="fetchTel(this.value)" maxlength="200" minlength="10" class="textarea form-control" name="desc_excluir" rows="3" required></textarea>
                                    </div>

                                    <div id="tel_excluir" class="inputfield">
                                        <label class="form-label" for="tel">Telefone: </label>
                                        <input type="tel"  autocomplete="off" attrname="telephone1" data-mask="(00) 0000-0000" data-mask-reverse="true" name="tel_excluir" pattern="\(\d{2}\)\s*\d{5}-\d{4}" class="phone" placeholder="Número de telefone - (opcional)" maxlength="15">
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
                                        <button formmethod="POST" type="submit" class="btn btn-primary">Excluir</button>
                                    </div>
                                </div>
                            </div>

                        </section>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var dr = 0;
        var cod = 0;
        const div = document.getElementById("visualizar");

        function retornaCodigo(id) {
            $.ajax({
                type: 'post',
                url: 'ajax.php',
                data: {
                    codigocampi: id
                },
                success: function(data) {
                    if (document.getElementById("inserir").style.getPropertyValue("display") == "block") {
                        $("#centrocustos_inserir datalist[name=centrocustos]").html('');
                        $("#centrocustos_inserir input[name=centrocustos_inserir]").val('');
                        $("#centrocustos_inserir datalist[name=centrocustos]").html(data);
                        $("#desc_inserir textarea[name=desc_inserir]").val('');
                        $("#tel_inserir input[name=tel_inserir]").val('');
                    } else if (document.getElementById("alterar").style.getPropertyValue("display") == "block") {
                        $("#centrocustos_alterar datalist[name=centrocustos]").html('');
                        $("#centrocustos_alterar input[name=centrocustos_alterar]").val('');
                        $("#centrocustos_alterar datalist[name=centrocustos]").html(data);
                        $("#desc_alterar textarea[name=desc_alterar]").val('');
                        $("#tel_alterar input[name=tel_alterar]").val('');
                    } else {
                        $("#centrocustos_excluir datalist[name=centrocustos]").html('');
                        $("#centrocustos_excluir input[name=centrocustos_excluir]").val('');
                        $("#centrocustos_excluir datalist[name=centrocustos]").html(data);
                        $("#desc_excluir textarea[name=desc_excluir]").val('');
                        $("#tel_excluir input[name=tel_excluir]").val('');
                    }

                }
            })
        }

        function showTable() {
            const fetch = 1;

            div.style.position = "relative";
            $.ajax({
                type: 'post',
                url: 'centroC_tbl.php',
                data: {
                    val: fetch
                },
                success: function(data) {
                    $(div).html(data);
                }
            })
        }

        function cleanElements(value) {
            $("#codigocampi_inserir select[name=codigocampi_inserir]").val('');
            $("#centrocustos_inserir input[name=centrocustos_inserir]").val('');
            $("#desc_inserir textarea[name=desc_inserir]").attr("disabled", false);
            $("#desc_inserir textarea[name=desc_inserir]").val('');
            $("#tel_inserir input[name=tel_inserir]").attr("disabled", false);
            $("#tel_inserir input[name=tel_inserir]").val('');
            
            $("#codigocampi_alterar select[name=codigocampi_alterar]").val('');
            $("#centrocustos_alterar input[name=centrocustos_alterar]").val('');
            $("#desc_alterar textarea[name=desc_alterar]").attr("disabled", false);
            $("#desc_alterar textarea[name=desc_alterar]").val('');
            $("#tel_alterar input[name=tel_alterar]").attr("disabled", false);
            $("#tel_alterar input[name=tel_alterar]").val('');
            
            $("#codigocampi_excluir select[name=codigocampi_excluir]").val('');
            $("#centrocustos_excluir input[name=centrocustos_excluir]").val('');
            $("#desc_excluir textarea[name=desc_excluir]").attr("disabled", false);
            $("#desc_excluir textarea[name=desc_excluir]").val('');
            $("#tel_excluir input[name=tel_excluir]").attr("disabled", false);
            $("#tel_excluir input[name=tel_excluir]").val('');

            if (value == 1) {
                $("#centrocustos_inserir input[name=codigocampi_inserir]").focus();
            } else if (value == 2) {
                $("#centrocustos_alterar input[name=codigocampi_alterar]").focus();
            } else {
                $("#centrocustos_excluir input[name=centrocustos_excluir]").focus();
            }
            // corrigir
            // $(codigocampi).focus();
            document.getElementById("blockbtn").style.display = "block";
            dr = 0;
        }

        function verify(ct) {
            cod = ct;

            $.ajax({
                type: 'post',
                url: 'fetchCentroC.php',
                data: {
                    centrocusto: ct
                },
                success: function(data) {
                    if (document.getElementById("inserir").style.getPropertyValue("display") == "block") {
                        $("#desc_inserir input[name=desc_inserir]").val('');
                        $("#desc_inserir textarea[name=desc_inserir]").val(data);
                        $("#desc_inserir textarea[name=desc_inserir]").focus();
                    } else if (document.getElementById("alterar").style.getPropertyValue("display") == "block") {
                        $("#desc_alterar input[name=desc_alterar]").val('');
                        $("#desc_alterar textarea[name=desc_alterar]").val(data);
                        $("#desc_alterar textarea[name=desc_alterar]").focus();
                    } else {
                        $("#desc_excluir input[name=desc_excluir]").val('');
                        $("#desc_excluir textarea[name=desc_excluir]").val(data);
                        $("#desc_excluir textarea[name=desc_excluir]").focus();
                    }
                }
            })
        }

        //Verificar se o centro de custos está dentro do campi
        function verify_ct1() {
            var x = 0;
            if (document.getElementById("inserir").style.getPropertyValue("display") == "block") {
                var cp = $("#codigocampi_inserir select[name=codigocampi_inserir]").val();
                var cr = $("#centrocustos_inserir input[name=centrocustos_inserir]").val();
            } else if (document.getElementById("alterar").style.getPropertyValue("display") == "block") {
                var cp = $("#codigocampi_alterar select[name=codigocampi_alterar]").val();
                var cr = $("#centrocustos_alterar input[name=centrocustos_alterar]").val();
            } else {
                var cp = $("#codigocampi_excluir select[name=codigocampi_excluir]").val();
                var cr = $("#centrocustos_excluir input[name=centrocustos_excluir]").val();
            }
            $.ajax({
                type: 'post',
                url: 'fetchCentroC.php',
                async: false,
                data: {
                    fetchInCampi: cp,
                    centro: cr
                },
                success: function(data) {
                    x = data;
                }
            })
            return x;
        }

        //Verificar se o centro de custos existe
        function verify_ct(ct) {
            var x = 0;
            $.ajax({
                type: 'post',
                url: 'fetchCentroC.php',
                async: false,
                data: {
                    verify: ct
                },
                success: function(data) {
                    x = data;
                }
            })
            return x;
        }

        function fetchTel(dc) {
            const camp = dc;
            <?php
            $query = $con->query("SELECT codigocentrocusto FROM centrocustos");
            $num = $query->num_rows;
            ?>
            var tab;
            if (document.getElementById("inserir").style.getPropertyValue("display") == "block") {
                var tab = $("#centrocustos_inserir input[name=centrocustos_inserir]").val();
            } else if (document.getElementById("alterar").style.getPropertyValue("display") == "block") {
                var tab = $("#centrocustos_alterar input[name=centrocustos_alterar]").val();
            } else {
                var tab = $("#centrocustos_excluir input[name=centrocustos_excluir]").val();
            }
            if (tab != 0 || tab != "") {
                console.log(verify_ct(cod));
                console.log("|");
                console.log(verify_ct1());
                if ((verify_ct(cod) == 1) && (document.getElementById("inserir").style.getPropertyValue("display") == "none")) {
                    if (document.getElementById("alterar").style.getPropertyValue("display") !== "block") {
                        if (verify_ct1() == 0) {
                            if (dr == 0) {
                                cleanElements();
                                alert("Erro: favor inserir um valor existente para excluir!");
                                dr = 1;
                            }
                        } else {
                            $.ajax({
                                type: 'post',
                                url: 'fetchCentroC.php',
                                data: {
                                    desc: dc
                                },
                                success: function(data) {
                                    $("#tel_excluir input[name=tel_excluir]").val(data);
                                    $("#tel_excluir input[name=tel_excluir]").attr("disabled", true);
                                    $("#desc_excluir textarea[name=desc_excluir]").attr("disabled", true);
                                    $("#codigocampi_excluir select[name=codigocampi_excluir]").focus();
                                }
                            })
                        }
                    } else {
                        if (verify_ct1() == 0) {
                            if (dr == 0) {
                                cleanElements();
                                alert("Erro: favor inserir um valor existente para alteração!");
                                dr = 1;
                            }
                        } else {
                            $.ajax({
                                type: 'post',
                                url: 'fetchCentroC.php',
                                data: {
                                    desc: dc
                                },
                                success: function(data) {
                                    $("#tel_alterar input[name=tel_alterar]").val(data);
                                    $("#desc_alterar textarea[name=desc_alterar]").attr("disabled", false);
                                    document.getElementById("blockbtn").style.display = "none";
                                    $("#tel_alterar input[name=tel_alterar]").attr("disabled", false);
                                }
                            })
                        }

                    }
                }else if(document.getElementById("inserir").style.getPropertyValue("display") == "block"){
                    if (verify_ct(cod) == 0) {
                        $.ajax({
                            type: 'post',
                            url: 'fetchCentroC.php',
                            data: {
                                desc: dc
                            },
                            success: function(data) {
                                
                                $("#tel_inserir input[name=tel_inserir]").val(data);
                                $("#desc_inserir textarea[name=desc_inserir]").attr("disabled", false);
                                document.getElementById("blockbtn").style.display = "block";
                                $("#tel_inserir input[name=tel_inserir]").attr("disabled", false);

                            }
                        })
                    } else {
                        $.ajax({
                            type: 'post',
                            url: 'fetchCentroC.php',
                            data: {
                                desc: dc
                            },
                            success: function(data) {
                                $("#tel_inserir input[name=tel_inserir]").val(data);
                                $("#desc_inserir textarea[name=desc_inserir]").attr("disabled", true);
                                document.getElementById("blockbtn").style.display = "none";
                                $("#tel_inserir input[name=tel_inserir]").attr("disabled", true);
                            }
                        })
                    }

                   
                }else{
                    if (dr == 0) {
                        cleanElements();
                        alert("Valor não existente dentro deste campi, verifique novamente o valor digitado!");
                        dr = 1;
                    }
                    
                }
            }else{            
                $("#codigocampi_inserir select[name=codigocampi_inserir]").val('');
                $("#centrocustos_inserir input[name=centrocustos_inserir]").val('');
                $("#desc_inserir textarea[name=desc_inserir]").attr("disabled", false);
                $("#desc_inserir textarea[name=desc_inserir]").val('');
                $("#tel_inserir input[name=tel_inserir]").attr("disabled", false);
                $("#tel_inserir input[name=tel_inserir]").val('');
                
                $("#codigocampi_alterar select[name=codigocampi_alterar]").val('');
                $("#centrocustos_alterar input[name=centrocustos_alterar]").val('');
                $("#desc_alterar textarea[name=desc_alterar]").attr("disabled", false);
                $("#desc_alterar textarea[name=desc_alterar]").val('');
                $("#tel_alterar input[name=tel_alterar]").attr("disabled", false);
                $("#tel_alterar input[name=tel_alterar]").val('');
                
                $("#codigocampi_excluir select[name=codigocampi_excluir]").val('');
                $("#centrocustos_excluir input[name=centrocustos_excluir]").val('');
                $("#desc_excluir textarea[name=desc_excluir]").attr("disabled", false);
                $("#desc_excluir textarea[name=desc_excluir]").val('');
                $("#tel_excluir input[name=tel_excluir]").attr("disabled", false);
                $("#tel_excluir input[name=tel_excluir]").val('');

                if (document.getElementById("inserir").style.getPropertyValue("display") == "block") {
                    $("#centrocustos_inserir input[name=codigocampi_inserir]").focus();
                } else if (document.getElementById("alterar").style.getPropertyValue("display") == "block") {
                    $("#centrocustos_alterar input[name=codigocampi_alterar]").focus();
                } else {
                    $("#centrocustos_excluir input[name=centrocustos_excluir]").focus();
                }
                dr = 0;
                document.getElementById("blockbtn").style.display = "block";
            }

        }

        function openTab(tab) {
            var i;

            var tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
                tabcontent[i].className = tabcontent[i].className.replace(" active", "");
            }
            document.getElementById(tab).style.display = "block";
            document.getElementById(tab).style.position = "relative";
            document.getElementById(tab).className += " active";
        }
    </script>
</body>

</html>