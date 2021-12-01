<!DOCTYPE html>
<?php
include_once("conexao/banco.php");
?>
<html lang="pt-br">

<head>
    <title>Áreas</title>

    <!--==================== UNICONS ====================-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!--========== BOX ICONS ==========-->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <!-- Required meta tags -->
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!--==================== CSS ====================-->
    <link rel="stylesheet" href="../css/card_style.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/menu_card.css">

    <!--==================== JS ====================-->
    <script src="../js/menu_card.js" defer></script>
    <script src="../js/darklightmode.js" defer></script>
    <script src="../js/vanilla-masker.js"></script>

    <!-- Font Awesome CSS Links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />

</head>

<body>
    <?php include("header.php"); ?>


    <div class="toggle" name="toggle"></div>

    <div class="tabs">
        <div class="tab-header">
            <div id="clickInserir" class="active" onclick="openTab('inserir'), cleanElements(1)"> Inserir </div>
            <div id="clickAlterar" onclick="openTab('alterar'), cleanElements(2)"> Alterar </div>
            <div onclick="openTab('visualizar'), showTable()"> Visualizar </div>
            <div id="clickExcluir" onclick="openTab('excluir'), cleanElements(3)"> Excluir </div>
        </div>
        <div class="tab-indicator"></div>
        <div class="tab-body" style="overflow:auto;overflow-x:scroll;overflow-y:scroll;">
            <div style="position: relative" class="tabcontent active" id="inserir">
                <div class="active">
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript">
                        $('#formInserir').submit(function(e) {


                            var idArea = $("#area_inserir input[name=numeroarea_inserir]");
                            var depto_area = $("#depto_inserir input[name=departamento_inserir]");
                            var descricao = $("#descricao_inserir textarea[name=descricao_inserir]");
                            var nomeResp = $("#nomeResp_inserir input[name=nomeResp_inserir]");
                            var idResp = $("#idResp_inserir input[name=idResp_inserir]");
                            var nomeSup = $("#nomeSup_inserir input[name=nomeSup_inserir]");
                            var idSup = $("#idSup_inserir input[name=idSup_inserir]");
                            var url = $("#formInserir").attr("action");

                            e.preventDefault();
                            $.ajax({
                                type: 'post',
                                url: url,
                                data: {
                                    idArea_inserir: idArea,
                                    departamento_area: depto_area,
                                    descricao_inserir: descricao,
                                    nomeResp_inserir: nomeResp,
                                    idResp_inserir: idResp,
                                    nomeSup_inserir: nomeSup,
                                    idSup_inserir: idSup
                                },
                                success: function(data) {
                                    openTab('inserir');
                                }
                            });
                        });
                    </script>
                    <form id="formInserir" method="POST" action="config_area.php">
                        <section class="sec" name="section">

                            <div class="wrapper">

                                <div class="title"> Áreas </div>

                                <div class="form">
                                    <div id="area_inserir" class="inputfield">
                                        <label for="codigocampi">Área: </label>
                                        <input placeholder="Digite o codigo da área" onchange="area=this.value, get_items(), get_deptos(this.value)" name="numeroarea_inserir" list="codigoarea" autocomplete="off" tabindex="1" required>
                                        <datalist id="codigoarea" name="codigo_area">
                                            <?php
                                            $query = $con->query("SELECT distinct codigo_areaOS FROM areaOS");
                                            while ($reg = $query->fetch_array()) {
                                                echo '<option value="' . $reg["codigo_areaOS"] . '">' . $reg["codigo_areaOS"] . '</option>';
                                            }
                                            ?>
                                        </datalist>
                                    </div>

                                    <div id="depto_inserir" class="inputfield">
                                        <label for="codigodep">Departamento: </label>
                                        <input placeholder="Selecione o departamento" onchange="depto = this.value, get_items()" name="departamento_inserir" list="codigodep" autocomplete="off" tabindex="2" required>
                                        <datalist id="codigodep" name="codigo_departamento">
                                            <option value="">
                                        </datalist>
                                    </div>

                                    <div id="descricao_inserir" class="inputfield form-group">
                                        <label for="">Descrição: </label>
                                        <textarea maxlength="30" placeholder="Digite a descrição do campi" class="textarea form-control" name="descricao_inserir" rows="3" tabindex="3" required></textarea>
                                    </div>

                                    <div id="nomeResp_inserir" class="inputfield">
                                        <label>Nome responsável: </label>
                                        <input autocomplete="off" type="text" placeholder="Digite o nome do responsável" name="nomeResp_inserir" tabindex="4" required>
                                    </div>

                                    <div id="idResp_inserir" class="inputfield">
                                        <label>Id Responsável: </label>
                                        <input autocomplete="off" minlength="4" maxlength="4" type="text" placeholder="Digite o ID do responsável" name="idResp_inserir" tabindex="5" required>
                                    </div>

                                    <div id="nomeSup_inserir" class="inputfield">
                                        <label>Nome Supervisor: </label>
                                        <input autocomplete="off" type="text" placeholder="Digite o nome do supervisor" name="nomeSup_inserir" tabindex="6" required>
                                    </div>

                                    <div id="idSup_inserir" class="inputfield">
                                        <label>Id Supervisor: </label>
                                        <input autocomplete="off" minlength="4" maxlength="4" type="text" placeholder="Digite o ID do supervisor" name="idSup_inserir" tabindex="7" required>
                                    </div>

                                    <div id="blockbtn" class="inputfield">
                                        <button type="submit" class="btn btn-primary" tabindex="8">Gravar</button>
                                    </div>

                                </div>
                            </div>
                        </section>
                    </form>
                </div>
            </div>


            <div class="tabcontent" style="display: none" id="alterar">
                <div class="active">
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript">
                        $('#formAlterar').submit(function(e) {


                            var idArea = $("#area_alterar input[name=numeroarea_alterar]");
                            var depto_area = $("#depto_alterar input[name=departamento_alterar]");
                            var nomeResp = $("#nomeResp_alterar input[name=nomeResp_alterar]");
                            var idResp = $("#idResp_alterar input[name=idResp_alterar]");
                            var nomeSup = $("#nomeSup_alterar input[name=nomeSup_alterar]");
                            var idSup = $("#idSup_alterar input[name=idSup_alterar]");
                            var url = $("#formAlterar").attr("action");

                            e.preventDefault();
                            $.ajax({
                                type: 'post',
                                url: url,
                                data: {
                                    idArea_alterar: idArea,
                                    departamento_area: depto_area,
                                    nomeResp_alterar: nomeResp,
                                    idResp_alterar: idResp,
                                    nomeSup_alterar: nomeSup,
                                    idSup_alterar: idSup
                                },
                                success: function(data) {
                                    openTab('alterar');
                                }
                            });
                        });
                    </script>
                    <form id="formAlterar" method="POST" action="config_area.php">
                        <section class="sec" name="section">

                            <div class="wrapper">

                                <div class="title"> Áreas </div>

                                <div class="form">
                                    <div id="area_alterar" class="inputfield">
                                        <label for="codigocampi">Área: </label>
                                        <input placeholder="Digite o codigo da área" onchange="area=this.value, get_deptos(this.value); if(verify_Area(area) == 0){ alert('Insira uma área existente para alterar') };" name="numeroarea_alterar" list="codigoarea" autocomplete="off" tabindex="1" required>
                                        <datalist id="codigoarea" name="codigo_area">
                                            <?php
                                            $query = $con->query("SELECT distinct codigo_areaOS FROM areaOS");
                                            while ($reg = $query->fetch_array()) {
                                                echo '<option value="' . $reg["codigo_areaOS"] . '">' . $reg["codigo_areaOS"] . '</option>';
                                            }
                                            ?>
                                        </datalist>
                                    </div>

                                    <div id="depto_alterar" class="inputfield">
                                        <label for="codigodep_alterar">Departamento: </label>
                                        <input placeholder="Selecione o departamento" onchange="depto = this.value, get_items()" name="departamento_alterar" list="codigodep_alterar" autocomplete="off" tabindex="2" required>
                                        <datalist id="codigodep_alterar" name="codigo_departamento">
                                            <option value="">
                                        </datalist>
                                    </div>

                                    <div id="descricao_alterar" class="inputfield form-group">
                                        <label for="">Descrição: </label>
                                        <textarea maxlength="30" placeholder="Digite a descrição do campi" class="textarea form-control" name="descricao_alterar" rows="3" tabindex="3" required></textarea>
                                    </div>

                                    <div id="nomeResp_alterar" class="inputfield">
                                        <label>Nome responsável: </label>
                                        <input autocomplete="off" type="text" placeholder="Digite o nome do responsável" name="nomeResp_alterar" tabindex="4" required>
                                    </div>

                                    <div id="idResp_alterar" class="inputfield">
                                        <label>Id Responsável: </label>
                                        <input autocomplete="off" minlength="4" maxlength="4" type="text" placeholder="Digite o ID do responsável" name="idResp_alterar" tabindex="5" required>
                                    </div>

                                    <div id="nomeSup_alterar" class="inputfield">
                                        <label>Nome Supervisor: </label>
                                        <input autocomplete="off" type="text" placeholder="Digite o nome do supervisor" name="nomeSup_alterar" tabindex="6" required>
                                    </div>

                                    <div id="idSup_alterar" class="inputfield">
                                        <label>Id Supervisor: </label>
                                        <input autocomplete="off" minlength="4" maxlength="4" type="text" placeholder="Digite o ID do supervisor" name="idSup_alterar" tabindex="7" required>
                                    </div>

                                    <div id="blockbtn" class="inputfield">
                                        <button type="submit" class="btn btn-primary" tabindex="8">Alterar</button>
                                    </div>

                                </div>
                            </div>
                        </section>
                    </form>
                </div>
            </div>

            <div class="tabcontent" id="visualizar">

            </div>

            <div class="tabcontent" style="display: none" id="excluir">
                <div class="active">
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript">
                        $('#formExcluir').submit(function(e) {


                            var idArea = $("#area_excluir input[name=numeroarea_excluir]");
                            var depto_area = $("#depto_excluir input[name=departamento_excluir]");

                            var url = $("#formExcluir").attr("action");

                            e.preventDefault();
                            $.ajax({
                                type: 'post',
                                url: url,
                                data: {
                                    idArea_excluir: idArea,
                                    departamento_area: depto_area,
                                },
                                success: function(data) {
                                    openTab('excluir');
                                }
                            });
                        });
                    </script>
                    <form id="formExcluir" method="POST" action="config_area.php">
                        <section class="sec" name="section">

                            <div class="wrapper">

                                <div class="title"> Áreas </div>

                                <div class="form">
                                    <div id="area_excluir" class="inputfield">
                                        <label for="codigocampi">Área: </label>
                                        <input placeholder="Digite o codigo da área" onchange="area=this.value, get_deptos(this.value); if(verify_Area(area) == 0){ alert('Insira uma área existente para excluir') };" name="numeroarea_excluir" list="codigoarea" autocomplete="off" tabindex="1" required>
                                        <datalist id="codigoarea" name="codigo_area">
                                            <?php
                                            $query = $con->query("SELECT distinct codigo_areaOS FROM areaOS");
                                            while ($reg = $query->fetch_array()) {
                                                echo '<option value="' . $reg["codigo_areaOS"] . '">' . $reg["codigo_areaOS"] . '</option>';
                                            }
                                            ?>
                                        </datalist>
                                    </div>

                                    <div id="depto_excluir" class="inputfield">
                                        <label for="codigodep_excluir">Departamento: </label>
                                        <input placeholder="Selecione o departamento" onchange="depto = this.value, get_items()" name="departamento_excluir" list="codigodep_excluir" autocomplete="off" tabindex="2" required>
                                        <datalist id="codigodep_excluir" name="codigo_departamento">
                                            <option value="">
                                        </datalist>
                                    </div>

                                    <div id="descricao_excluir" class="inputfield form-group">
                                        <label for="">Descrição: </label>
                                        <textarea maxlength="30" placeholder="Digite a descrição do campi" class="textarea form-control" name="descricao_excluir" rows="3" tabindex="3" required></textarea>
                                    </div>

                                    <div id="nomeResp_excluir" class="inputfield">
                                        <label>Nome responsável: </label>
                                        <input autocomplete="off" type="text" placeholder="Digite o nome do responsável" name="nomeResp_excluir" tabindex="4" required>
                                    </div>

                                    <div id="idResp_excluir" class="inputfield">
                                        <label>Id Responsável: </label>
                                        <input autocomplete="off" minlength="4" maxlength="4" type="text" placeholder="Digite o ID do responsável" name="idResp_excluir" tabindex="5" required>
                                    </div>

                                    <div id="nomeSup_excluir" class="inputfield">
                                        <label>Nome Supervisor: </label>
                                        <input autocomplete="off" type="text" placeholder="Digite o nome do supervisor" name="nomeSup_excluir" tabindex="6" required>
                                    </div>

                                    <div id="idSup_excluir" class="inputfield">
                                        <label>Id Supervisor: </label>
                                        <input autocomplete="off" minlength="4" maxlength="4" type="text" placeholder="Digite o ID do supervisor" name="idSup_excluir" tabindex="7" required>
                                    </div>

                                    <div id="blockbtn" class="inputfield">
                                        <button type="submit" class="btn btn-primary" tabindex="8">Excluir</button>
                                    </div>

                                </div>
                            </div>
                        </section>
                    </form>
                </div>
            </div>

        </div>



    </div>
    </div>

    <script type="text/javascript">
        var dr = 0;
        var cod = 0;
        var alt_control = 0;

        var area = 0;
        var depto = 0;

        const div = document.getElementById("visualizar");

        function showTable() {
            const fetch = 1;

            div.style.position = "relative";
            $.ajax({
                type: 'post',
                url: 'area_tbl.php',
                data: {
                    val: fetch
                },
                success: function(data) {
                    $(div).html(data);
                }
            })
        }

        function cleanElements(value) {

            // Limpa Inserir
            $("#descricao_inserir textarea[name=descricao_inserir]").attr("disabled", false);
            $("#nomeResp_inserir input[name=nomeResp_inserir]").attr("disabled", false);
            $("#idResp_inserir input[name=idResp_inserir]").attr("disabled", false);
            $("#nomeSup_inserir input[name=nomeSup_inserir]").attr("disabled", false);
            $("#idSup_inserir input[name=idSup_inserir]").attr("disabled", false);
            $("#area_inserir input[name=numeroarea_inserir]").val('');
            $("#depto_inserir input[name=departamento_inserir]").val('');
            $("#descricao_inserir textarea[name=descricao_inserir]").val('');
            $("#nomeResp_inserir input[name=nomeResp_inserir]").val('');
            $("#idResp_inserir input[name=idResp_inserir]").val('');
            $("#nomeSup_inserir input[name=nomeSup_inserir]").val('');
            $("#idSup_inserir input[name=idSup_inserir]").val('');

            // Limpar Excluir
            $("#descricao_excluir textarea[name=descricao_excluir]").attr("disabled", false);
            $("#nomeResp_excluir input[name=nomeResp_excluir]").attr("disabled", false);
            $("#idResp_excluir input[name=idResp_excluir]").attr("disabled", false);
            $("#nomeSup_excluir input[name=nomeSup_excluir]").attr("disabled", false);
            $("#idSup_excluir input[name=idSup_excluir]").attr("disabled", false);
            $("#area_excluir input[name=numeroarea_excluir]").val('');
            $("#depto_excluir input[name=departamento_excluir]").val('');
            $("#descricao_excluir textarea[name=descricao_excluir]").val('');
            $("#nomeResp_excluir input[name=nomeResp_excluir]").val('');
            $("#idResp_excluir input[name=idResp_excluir]").val('');
            $("#nomeSup_excluir input[name=nomeSup_excluir]").val('');
            $("#idSup_excluir input[name=idSup_excluir]").val('');

            // Limpa o alterar
            $("#descricao_alterar textarea[name=descricao_alterar]").attr("disabled", false);
            $("#nomeResp_alterar input[name=nomeResp_alterar]").attr("disabled", false);
            $("#idResp_alterar input[name=idResp_alterar]").attr("disabled", false);
            $("#nomeSup_alterar input[name=nomeSup_alterar]").attr("disabled", false);
            $("#idSup_alterar input[name=idSup_alterar]").attr("disabled", false);
            $("#area_alterar input[name=numeroarea_alterar]").val('');
            $("#depto_alterar input[name=departamento_alterar]").val('');
            $("#descricao_alterar textarea[name=descricao_alterar]").val('');
            $("#nomeResp_alterar input[name=nomeResp_alterar]").val('');
            $("#idResp_alterar input[name=idResp_alterar]").val('');
            $("#nomeSup_alterar input[name=nomeSup_alterar]").val('');
            $("#idSup_alterar input[name=idSup_alterar]").val('');

            dr = 0;

            if (value == 1) {
                $("#area_inserir input[name=numeroarea_inserir]").focus();
            } else if (value == 2) {
                $("#campi_alterar input[name=codigocampi_alterar]").focus();
            } else {
                $("#area_excluir input[name=numeroarea_excluir]").focus();
            }

            document.getElementById("blockbtn").style.display = "block";
        }

        // Verifica se a área já esta cadastrada
        function verify_Area(area) {
            var x = 0;
            $.ajax({
                type: 'post',
                url: 'fetchArea.php',
                async: false,
                data: {
                    verify: area
                },
                success: function(data) {
                    x = data;
                }
            })
            return x;
        }

        // Verifica se o departamento já esta cadastrado
        function verify_deptos(dept, ar) {
            var x = 0;
            $.ajax({
                type: 'post',
                url: 'fetchArea.php',
                async: false,
                data: {
                    verify_dept: dept,
                    ar: ar
                },
                success: function(data) {
                    x = data;
                }
            })
            return x;
        }

        function get_deptos(sel_area) {
            $.ajax({
                type: 'post',
                url: 'fetchArea.php',
                data: {
                    area: sel_area
                },
                success: function(data) {
                    if (document.getElementById("alterar").style.getPropertyValue("display") !== "block") {
                        if (document.getElementById("excluir").style.getPropertyValue("display") == "block") {
                            $("#depto_excluir input[name=departamento_excluir]").val('');
                            $("#descricao_excluir textarea[name=descricao_excluir]").attr("disabled", false);
                            $("#nomeResp_excluir input[name=nomeResp_excluir]").attr("disabled", false);
                            $("#idResp_excluir input[name=idResp_excluir]").attr("disabled", false);
                            $("#nomeSup_excluir input[name=nomeSup_excluir]").attr("disabled", false);
                            $("#idSup_excluir input[name=idSup_excluir]").attr("disabled", false);
                            $("#descricao_excluir textarea[name=descricao_excluir]").val('');
                            $("#nomeResp_excluir input[name=nomeResp_excluir]").val('');
                            $("#idResp_excluir input[name=idResp_excluir]").val('');
                            $("#nomeSup_excluir input[name=nomeSup_excluir]").val('');
                            $("#idSup_excluir input[name=idSup_excluir]").val('');
                            document.getElementById("blockbtn").style.display = "block";
                            $("#depto_excluir datalist[name=codigo_departamento]").html('');
                            $("#depto_excluir datalist[name=codigo_departamento]").html(data);
                        } else {
                            $("#depto_inserir input[name=departamento_inserir]").val('');
                            $("#descricao_inserir textarea[name=descricao_inserir]").attr("disabled", false);
                            $("#nomeResp_inserir input[name=nomeResp_inserir]").attr("disabled", false);
                            $("#idResp_inserir input[name=idResp_inserir]").attr("disabled", false);
                            $("#nomeSup_inserir input[name=nomeSup_inserir]").attr("disabled", false);
                            $("#idSup_inserir input[name=idSup_inserir]").attr("disabled", false);
                            $("#descricao_inserir textarea[name=descricao_inserir]").val('');
                            $("#nomeResp_inserir input[name=nomeResp_inserir]").val('');
                            $("#idResp_inserir input[name=idResp_inserir]").val('');
                            $("#nomeSup_inserir input[name=nomeSup_inserir]").val('');
                            $("#idSup_inserir input[name=idSup_inserir]").val('');
                            document.getElementById("blockbtn").style.display = "block";
                            $("#depto_inserir datalist[name=codigo_departamento]").html('');
                            $("#depto_inserir datalist[name=codigo_departamento]").html(data);
                        }

                    } else {
                        //alterar
                        $("#depto_alterar input[name=departamento_alterar]").val('');
                        $("#descricao_alterar textarea[name=descricao_alterar]").attr("disabled", false);
                        $("#nomeResp_alterar input[name=nomeResp_alterar]").attr("disabled", false);
                        $("#idResp_alterar input[name=idResp_alterar]").attr("disabled", false);
                        $("#nomeSup_alterar input[name=nomeSup_alterar]").attr("disabled", false);
                        $("#idSup_alterar input[name=idSup_alterar]").attr("disabled", false);
                        $("#descricao_alterar textarea[name=descricao_alterar]").val('');
                        $("#nomeResp_alterar input[name=nomeResp_alterar]").val('');
                        $("#idResp_alterar input[name=idResp_alterar]").val('');
                        $("#nomeSup_alterar input[name=nomeSup_alterar]").val('');
                        $("#idSup_alterar input[name=idSup_alterar]").val('');
                        document.getElementById("blockbtn").style.display = "block";
                        $("#depto_alterar datalist[name=codigo_departamento]").html('');
                        $("#depto_alterar datalist[name=codigo_departamento]").html(data);
                    }

                }
            })
        }

        function get_items() {
            if (verify_Area(area) == 1 && verify_deptos(depto, area) == 1) {
                if (document.getElementById("alterar").style.getPropertyValue("display") !== "block") {
                    if (document.getElementById("excluir").style.getPropertyValue("display") == "block") {
                        $.ajax({
                            type: 'post',
                            url: 'fetchArea.php',
                            async: false,
                            data: {
                                verifyy: area,
                                depto: depto
                            },
                            success: function(data) {
                                $("#descricao_excluir textarea[name=descricao_excluir]").val('');
                                $("#descricao_excluir textarea[name=descricao_excluir]").val(data);
                                $.ajax({
                                    type: 'post',
                                    url: 'fetchArea.php',
                                    async: false,
                                    data: {
                                        search_nomeResp: area,
                                        depto: depto
                                    },
                                    success: function(data) {
                                        $("#nomeResp_excluir input[name=nomeResp_excluir]").val('');
                                        $("#nomeResp_excluir input[name=nomeResp_excluir]").val(data);
                                        $.ajax({
                                            type: 'post',
                                            url: 'fetchArea.php',
                                            async: false,
                                            data: {
                                                search_idResp: area,
                                                depto: depto
                                            },
                                            success: function(data) {
                                                $("#idResp_excluir input[name=idResp_excluir]").val('');
                                                $("#idResp_excluir input[name=idResp_excluir]").val(data);
                                                $.ajax({
                                                    type: 'post',
                                                    url: 'fetchArea.php',
                                                    async: false,
                                                    data: {
                                                        search_nomeSup: area,
                                                        depto: depto
                                                    },
                                                    success: function(data) {
                                                        $("#nomeSup_excluir input[name=nomeSup_excluir]").val('');
                                                        $("#nomeSup_excluir input[name=nomeSup_excluir]").val(data);
                                                        $.ajax({
                                                            type: 'post',
                                                            url: 'fetchArea.php',
                                                            async: false,
                                                            data: {
                                                                search_idSup: area,
                                                                depto: depto
                                                            },
                                                            success: function(data) {
                                                                $("#idSup_excluir input[name=idSup_excluir]").val('');
                                                                $("#idSup_excluir input[name=idSup_excluir]").val(data);
                                                            }
                                                        })
                                                    }
                                                })
                                            }
                                        })
                                    }
                                })
                            }
                        });
                        $("#descricao_excluir textarea[name=descricao_excluir]").attr("disabled", true);
                        $("#nomeResp_excluir input[name=nomeResp_excluir]").attr("disabled", true);
                        $("#idResp_excluir input[name=idResp_excluir]").attr("disabled", true);
                        $("#nomeSup_excluir input[name=nomeSup_excluir]").attr("disabled", true);
                        $("#idSup_excluir input[name=idSup_excluir]").attr("disabled", true);
                    } else {

                        $.ajax({
                            type: 'post',
                            url: 'fetchArea.php',
                            async: false,
                            data: {
                                verifyy: area,
                                depto: depto
                            },
                            success: function(data) {
                                $("#descricao_inserir textarea[name=descricao_inserir]").val('');
                                $("#descricao_inserir textarea[name=descricao_inserir]").val(data);
                                $.ajax({
                                    type: 'post',
                                    url: 'fetchArea.php',
                                    async: false,
                                    data: {
                                        search_nomeResp: area,
                                        depto: depto
                                    },
                                    success: function(data) {
                                        $("#nomeResp_inserir input[name=nomeResp_inserir]").val('');
                                        $("#nomeResp_inserir input[name=nomeResp_inserir]").val(data);
                                        $.ajax({
                                            type: 'post',
                                            url: 'fetchArea.php',
                                            async: false,
                                            data: {
                                                search_idResp: area,
                                                depto: depto
                                            },
                                            success: function(data) {
                                                $("#idResp_inserir input[name=idResp_inserir]").val('');
                                                $("#idResp_inserir input[name=idResp_inserir]").val(data);
                                                $.ajax({
                                                    type: 'post',
                                                    url: 'fetchArea.php',
                                                    async: false,
                                                    data: {
                                                        search_nomeSup: area,
                                                        depto: depto
                                                    },
                                                    success: function(data) {
                                                        $("#nomeSup_inserir input[name=nomeSup_inserir]").val('');
                                                        $("#nomeSup_inserir input[name=nomeSup_inserir]").val(data);
                                                        $.ajax({
                                                            type: 'post',
                                                            url: 'fetchArea.php',
                                                            async: false,
                                                            data: {
                                                                search_idSup: area,
                                                                depto: depto
                                                            },
                                                            success: function(data) {
                                                                $("#idSup_inserir input[name=idSup_inserir]").val('');
                                                                $("#idSup_inserir input[name=idSup_inserir]").val(data);
                                                            }
                                                        })
                                                    }
                                                })
                                            }
                                        })
                                    }
                                })
                            }
                        });
                        $("#descricao_inserir textarea[name=descricao_inserir]").attr("disabled", true);
                        $("#nomeResp_inserir input[name=nomeResp_inserir]").attr("disabled", true);
                        $("#idResp_inserir input[name=idResp_inserir]").attr("disabled", true);
                        $("#nomeSup_inserir input[name=nomeSup_inserir]").attr("disabled", true);
                        $("#idSup_inserir input[name=idSup_inserir]").attr("disabled", true);
                        document.getElementById("blockbtn").style.display = "none";
                    }

                } else {
                    $.ajax({
                        type: 'post',
                        url: 'fetchArea.php',
                        async: false,
                        data: {
                            verifyy: area,
                            depto: depto
                        },
                        success: function(data) {
                            $("#descricao_alterar textarea[name=descricao_alterar]").val('');
                            $("#descricao_alterar textarea[name=descricao_alterar]").val(data);
                            $.ajax({
                                type: 'post',
                                url: 'fetchArea.php',
                                async: false,
                                data: {
                                    search_nomeResp: area,
                                    depto: depto
                                },
                                success: function(data) {
                                    $("#nomeResp_alterar input[name=nomeResp_alterar]").val('');
                                    $("#nomeResp_alterar input[name=nomeResp_alterar]").val(data);
                                    $.ajax({
                                        type: 'post',
                                        url: 'fetchArea.php',
                                        async: false,
                                        data: {
                                            search_idResp: area,
                                            depto: depto
                                        },
                                        success: function(data) {
                                            $("#idResp_alterar input[name=idResp_alterar]").val('');
                                            $("#idResp_alterar input[name=idResp_alterar]").val(data);
                                            $.ajax({
                                                type: 'post',
                                                url: 'fetchArea.php',
                                                async: false,
                                                data: {
                                                    search_nomeSup: area,
                                                    depto: depto
                                                },
                                                success: function(data) {
                                                    $("#nomeSup_alterar input[name=nomeSup_alterar]").val('');
                                                    $("#nomeSup_alterar input[name=nomeSup_alterar]").val(data);
                                                    $.ajax({
                                                        type: 'post',
                                                        url: 'fetchArea.php',
                                                        async: false,
                                                        data: {
                                                            search_idSup: area,
                                                            depto: depto
                                                        },
                                                        success: function(data) {
                                                            $("#idSup_alterar input[name=idSup_alterar]").val('');
                                                            $("#idSup_alterar input[name=idSup_alterar]").val(data);
                                                        }
                                                    })
                                                }
                                            })
                                        }
                                    })
                                }
                            })
                        }
                    });
                    $("#descricao_alterar textarea[name=descricao_alterar]").attr("disabled", true);
                    $("#nomeResp_alterar input[name=nomeResp_alterar]").attr("disabled", false);
                    $("#idResp_alterar input[name=idResp_alterar]").attr("disabled", false);
                    $("#nomeSup_alterar input[name=nomeSup_alterar]").attr("disabled", false);
                    $("#idSup_alterar input[name=idSup_alterar]").attr("disabled", false);
                    document.getElementById("blockbtn").style.display = "block";
                }

            } else {
                if (document.getElementById("alterar").style.getPropertyValue("display") == "block") {
                    alert("Insira um departamento cadastrado para alterar!");
                    $("#descricao_alterar textarea[name=descricao_alterar]").attr("disabled", true);
                    $("#nomeResp_alterar input[name=nomeResp_alterar]").attr("disabled", true);
                    $("#idResp_alterar input[name=idResp_alterar]").attr("disabled", true);
                    $("#nomeSup_alterar input[name=nomeSup_alterar]").attr("disabled", true);
                    $("#idSup_alterar input[name=idSup_alterar]").attr("disabled", true);
                    $("#area_alterar input[name=numeroarea_alterar]").val('');
                    $("#descricao_alterar textarea[name=descricao_alterar]").val('');
                    $("#depto_alterar input[name=departamento_alterar]").val('');
                    $("#nomeResp_alterar input[name=nomeResp_alterar]").val('');
                    $("#idResp_alterar input[name=idResp_alterar]").val('');
                    $("#nomeSup_alterar input[name=nomeSup_alterar]").val('');
                    $("#idSup_alterar input[name=idSup_alterar]").val('');
                } else if (document.getElementById("excluir").style.getPropertyValue("display") == "block") {
                    alert("Insira um departamento cadastrado para excluir!");
                    $("#descricao_excluir textarea[name=descricao_excluir]").attr("disabled", true);
                    $("#nomeResp_excluir input[name=nomeResp_excluir]").attr("disabled", true);
                    $("#idResp_excluir input[name=idResp_excluir]").attr("disabled", true);
                    $("#nomeSup_excluir input[name=nomeSup_excluir]").attr("disabled", true);
                    $("#idSup_excluir input[name=idSup_excluir]").attr("disabled", true);
                    $("#area_excluir input[name=numeroarea_excluir]").val('');
                    $("#descricao_excluir textarea[name=descricao_excluir]").val('');
                    $("#depto_excluir input[name=departamento_excluir]").val('');
                    $("#nomeResp_excluir input[name=nomeResp_excluir]").val('');
                    $("#idResp_excluir input[name=idResp_excluir]").val('');
                    $("#nomeSup_excluir input[name=nomeSup_excluir]").val('');
                    $("#idSup_excluir input[name=idSup_excluir]").val('');

                } else {
                    $("#descricao_inserir textarea[name=descricao_inserir]").attr("disabled", false);
                    $("#abrev_inserir input[name=abrev_inserir]").attr("disabled", false);
                    $("#nomeResp_inserir input[name=nomeResp_inserir]").attr("disabled", false);
                    $("#idResp_inserir input[name=idResp_inserir]").attr("disabled", false);
                    $("#nomeSup_inserir input[name=nomeSup_inserir]").attr("disabled", false);
                    $("#idSup_inserir input[name=idSup_inserir]").attr("disabled", false);
                    $("#descricao_inserir textarea[name=descricao_inserir]").val('');
                    $("#abrev_inserir input[name=abrev_inserir]").val('');
                    $("#nomeResp_inserir input[name=nomeResp_inserir]").val('');
                    $("#idResp_inserir input[name=idResp_inserir]").val('');
                    $("#nomeSup_inserir input[name=nomeSup_inserir]").val('');
                    $("#idSup_inserir input[name=idSup_inserir]").val('');
                    document.getElementById("blockbtn").style.display = "block";
                }


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

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


</body>

</html>