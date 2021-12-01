<!DOCTYPE html>
<?php
include_once("conexao/banco.php");
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
        <div class="tab-body">
            <div style="position: relative" class="tabcontent active" id="inserir">
                <div class="active">
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript">
                        $('#formInserir').submit(function(e){
                            
                            
                            var idCampi = $("#campi_inserir input[name=codigocampi_inserir]");
                            var descricao = $("#descricao_inserir textarea[name=descricao_inserir]");
                            var abreviatura = $("#abrev_inserir input[name=abrev_inserir]");
                            var url = $("#formInserir").attr("action");
                            
                            e.preventDefault();
                            $.ajax({
                                type:'post',
                                url:url,
                                data: {
                                    idCampi_inserir: idCampi,
                                    descricao_inserir: descricao,
                                    abreviatura_inserir: abreviatura
                                },
                                success: function(data){
                                    $("#campi_inserir input[name=codigocampi_inserir]").val('');
                                    $("#descricao_inserir textarea[name=descricao_inserir]").val('');
                                    $("#abrev_inserir input[name=abrev_inserir]").val('');
                                    console.log("a");
                                    alert("Dado inserido com sucesso!");
                                    openTab('inserir');
                                }
                            });
                        });
                    </script>
                    <form id="formInserir" method="POST" action="config_departamento.php">
                        <section class="sec" name="section">
                            <div class="lin">
                                <!-- <a href="centrodecusto.php" class="linter">Centro de custo</a> -->
                            </div>

                            <div class="wrapper">

                                <div class="title"> Departamento </div>

                                <div class="form">
                                    <div id="campi_inserir" class="inputfield">
                                        <label for="codigocampi">Campi: </label>
                                        <input placeholder="Selecione o campi" onchange="verify(this.value)" name="codigocampi_inserir" list="codigocampi" autocomplete="off" tabindex="1" required>
                                        <?php
                                        $query = $con->query("SELECT codigocampi FROM departamentos");
                                        ?>
                                        <datalist id="codigocampi" name="codigocampi">
                                            <?php
                                            while ($reg = $query->fetch_array()) {
                                                echo '<option value="' . $reg["codigocampi"] . '">' . $reg["codigocampi"] . '</option>';
                                            }
                                            ?>
                                        </datalist>
                                    </div>

                                    <div id="descricao_inserir" class="inputfield form-group">
                                        <label for="">Descrição: </label>
                                        <textarea maxlength="30" onfocus="getAbrev(this.value)" placeholder="Digite a descrição do campi" class="textarea form-control" name="descricao_inserir" rows="3" tabindex="2" required></textarea>
                                    </div>

                                    <div id="abrev_inserir" class="inputfield">
                                        <label>Abreviatura: </label>
                                        <input autocomplete="off" minlength="1" maxlength="2" type="text" placeholder="Digite a abreviatura do campi" name="abrev_inserir" tabindex="3" required>
                                    </div>

                                    <div id="blockbtn" class="inputfield">
                                        <button type="submit" class="btn btn-primary" tabindex="4">Gravar</button>
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
                        $('#formAlterar').submit(function(e){
    
                            var idCampi = $("#campi_inserir input[name=codigocampi_alterar]");
                            var descricao = $("#descricao_inserir textarea[name=descricao_alterar]");
                            var abreviatura = $("#abrev_inserir input[name=abrev_alterar]");
                            var url = $("#formAlterar").attr("action");
                            
                            e.preventDefault();
                            $.ajax({
                                type:'post',
                                url:url,
                                data: {
                                    idCampi_alterar: idCampi,
                                    descricao_alterar: descricao,
                                    abreviatura_alterar: abreviatura
                                },
                                done: function(data){
                                    $("#campi_alterar input[name=codigocampi_alterar]").val('');
                                    $("#descricao_alterar textarea[name=descricao_alterar]").val('');
                                    $("#abrev_alterar input[name=abrev_alterar]").val('');
                                    alert("Dado alterado com sucesso!");
                                    openTab('alterar');
                                }
                            });
                        });
                    </script>
                    <form id="formAlterar" method="POST" action="config_departamento.php">
                        <section class="sec" name="section">
                            <div class="lin">
                                <!-- <a href="centrodecusto.php" class="linter">Centro de custo</a> -->
                            </div>

                            <div class="wrapper">

                                <div class="title"> Departamento </div>

                                <div class="form">
                                    <div id="campi_alterar" class="inputfield">
                                        <label for="codigocampi">Campi: </label>
                                        <input placeholder="Selecione o campi" onfocus=" dr= 0; " onchange="verify(this.value)" name="codigocampi_alterar" list="codigocampi" autocomplete="off" tabindex="1" required>
                                        <?php
                                        $query = $con->query("SELECT codigocampi FROM departamentos");
                                        ?>
                                        <datalist id="codigocampi" name="codigocampi">
                                            <?php
                                            while ($reg = $query->fetch_array()) {
                                                echo '<option value="' . $reg["codigocampi"] . '">' . $reg["codigocampi"] . '</option>';
                                            }
                                            ?>
                                        </datalist>
                                    </div>

                                    <div id="descricao_alterar" class="inputfield form-group">
                                        <label for="">Descrição: </label>
                                        <textarea maxlength="30" onfocus="getAbrev(this.value)" placeholder="Digite a descrição do campi" class="textarea form-control" name="descricao_alterar" rows="3" tabindex="2" required></textarea>
                                    </div>

                                    <div id="abrev_alterar" class="inputfield">
                                        <label>Abreviatura: </label>
                                        <input autocomplete="off" minlength="1" maxlength="2" type="text" placeholder="Digite a abreviatura do campi" name="abrev_alterar" tabindex="3" required>
                                    </div>

                                    <div id="blockbtn" class="inputfield">
                                        <button type="submit" class="btn btn-primary" tabindex="4">Gravar alteração</button>
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
                        $('#formExcluir').submit(function(e){
                            
                            
                            var idCampi = $("#campi_excluir input[name=codigocampi_excluir]");
                            var url = $("#formExcluir").attr("action");
                            
                            e.preventDefault();
                            $.ajax({
                                type:'post',
                                url:url,
                                data: {
                                    idCampi_inserir: idCampi,
                                },
                                done: function(data){
                                    $("#campi_excluir input[name=codigocampi_excluir]").val('');
                                    $("#descricao_excluir textarea[name=descricao_excluir]").val('');
                                    $("#abrev_excluir input[name=abrev_excluir]").val('');
                                    console.log("a");
                                    alert("Dado excluido com sucesso!");
                                    openTab('excluir');
                                }
                            });
                        });
                    </script>
                    <form id="formExcluir" method="POST" action="config_departamento.php">
                        <section class="sec" name="section">
                            <div class="lin">
                                <!-- <a href="centrodecusto.php" class="linter">Centro de custo</a> -->
                            </div>

                            <div class="wrapper">

                                <div class="title"> Departamento </div>

                                <div class="form">
                                    <div id="campi_excluir" class="inputfield">
                                        <label for="codigocampi">Campi: </label>
                                        <input placeholder="Selecione o campi" onfocus="dr= 0;" onchange="verify(this.value)" name="codigocampi_excluir" list="codigocampi" autocomplete="off" tabindex="1" required>
                                        <?php
                                        $query = $con->query("SELECT codigocampi FROM departamentos");
                                        ?>
                                        <datalist id="codigocampi" name="codigocampi">
                                            <?php
                                            while ($reg = $query->fetch_array()) {
                                                echo '<option value="' . $reg["codigocampi"] . '">' . $reg["codigocampi"] . '</option>';
                                            }
                                            ?>
                                        </datalist>
                                    </div>

                                    <div id="descricao_excluir" class="inputfield form-group">
                                        <label for="">Descrição: </label>
                                        <textarea maxlength="30" onfocus="getAbrev(this.value)" placeholder="Digite a descrição do campi" class="textarea form-control" name="descricao_excluir" rows="3" tabindex="2" required></textarea>
                                    </div>

                                    <div id="abrev_excluir" class="inputfield">
                                        <label>Abreviatura: </label>
                                        <input autocomplete="off" minlength="1" maxlength="2" type="text" placeholder="Digite a abreviatura do campi" name="abrev_excluir" tabindex="3" required>
                                    </div>

                                    <div id="blockbtn" class="inputfield">
                                        <button type="submit" class="btn btn-primary" tabindex="4">Excluir item</button>
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
        var alt_control = 0;
        const div = document.getElementById("visualizar");

        function showTable() {
            const fetch = 1;

            div.style.position = "relative";
            $.ajax({
                type: 'post',
                url: 'dep_tbl.php',
                data: {
                    val: fetch
                },
                success: function(data) {
                    $(div).html(data);
                }
            })
        }

        function cleanElements(value) {

            // Exclui o próprio
            $("#campi_inserir input[name=codigocampi_inserir]").val('');
            $("#abrev_inserir input[name=abrev_inserir]").val('');
            $("#abrev_inserir input[name=abrev_inserir]").attr("disabled", false);
            $("#descricao_inserir textarea[name=descricao_inserir]").val('');
            $("#descricao_inserir textarea[name=descricao_inserir]").attr("disabled", false);

            // Limpar Excluir
            $("#campi_excluir input[name=codigocampi_excluir]").val('');
            $("#abrev_excluir input[name=abrev_excluir]").val('');
            $("#abrev_excluir input[name=abrev_excluir]").attr("disabled", false);
            $("#descricao_excluir textarea[name=descricao_excluir]").val('');
            $("#descricao_excluir textarea[name=descricao_excluir]").attr("disabled", false);

            // Limpa o alterar
            $("#campi_alterar input[name=codigocampi_alterar]").val('');
            $("#abrev_alterar input[name=abrev_alterar]").val('');
            $("#abrev_alterar input[name=abrev_alterar]").attr("disabled", false);
            $("#descricao_alterar textarea[name=descricao_alterar]").val('');
            $("#descricao_alterar textarea[name=descricao_alterar]").attr("disabled", false);

            dr = 0;

            if (value == 1) {
                $("#campi_inserir input[name=codigocampi_inserir]").focus();
            } else if (value == 2) {
                $("#campi_alterar input[name=codigocampi_alterar]").focus();
            } else {
                $("#campi_excluir input[name=codigocampi_excluir]").focus();
            }

            document.getElementById("blockbtn").style.display = "block";
        }

        function verify(idc) {
            alt_control = 0;
            if (document.getElementById("alterar").style.getPropertyValue("display") !== "block") {
                if (document.getElementById("excluir").style.getPropertyValue("display") == "block") {
                    cod = $("#campi_excluir input[name=codigocampi_excluir]").val();
                    $.ajax({
                        type: 'post',
                        url: 'fetchDep.php',
                        data: {
                            id: idc
                        },
                        success: function(data) {
                            $("#descricao_excluir textarea[name=descricao_excluir]").val('');
                            $("#descricao_excluir textarea[name=descricao_excluir]").val(data);
                            $("#descricao_excluir textarea[name=descricao_excluir]").focus();
                        }
                    })
                } else {
                    cod = $("#campi_inserir input[name=codigocampi_inserir]").val();
                    $.ajax({
                        type: 'post',
                        url: 'fetchDep.php',
                        data: {
                            id: idc
                        },
                        success: function(data) {
                            $("#descricao_inserir textarea[name=descricao_inserir]").val('');
                            $("#descricao_inserir textarea[name=descricao_inserir]").val(data);
                            $("#descricao_inserir textarea[name=descricao_inserir]").focus();
                        }
                    })
                }
            } else {
                cod = $("#campi_alterar input[name=codigocampi_alterar]").val();
                $.ajax({
                    type: 'post',
                    url: 'fetchDep.php',
                    data: {
                        id: idc
                    },
                    success: function(data) {
                        $("#descricao_alterar textarea[name=descricao_alterar]").val('');
                        $("#descricao_alterar textarea[name=descricao_alterar]").val(data);
                        $("#descricao_alterar textarea[name=descricao_alterar]").focus();
                    }
                })
            }

        }

        function verify_Dep(dep){
            var x = 0;
            $.ajax({
                type: 'post',
                url: 'fetchDep.php',
                async: false,
                data: {
                    verify: dep
                },
                success: function(data) {
                    x = data;
                }
            })
            return x;
        }

        function verify_CentroVinculado(dep){
            var x = 0;
            $.ajax({
                type: 'post',
                url: 'fetchDep.php',
                async: false,
                data: {
                    verify_centro: dep
                },
                success: function(data) {
                    x = data;
                }
            })
            return x;
        }

        function getAbrev(dc) {
            var camp = dc;
            <?php
            $query = $con->query("SELECT codigocampi FROM departamentos");
            $num = $query->num_rows;
            ?>

            if (document.getElementById("alterar").style.getPropertyValue("display") !== "block") {
                if (document.getElementById("excluir").style.getPropertyValue("display") == "block") {

                    if (verify_Dep(cod) == 0) {
                        if (dr == 0) {
                            cleanElements();
                            alert("Erro: favor inserir um valor existente para excluir!");
                            dr = 1;
                        }

                    }else if(verify_CentroVinculado(cod) == 1){
                        if (dr == 0) {
                            alert("Há um ou mais centro de custos vinculado(s) a este campi, não será possivel realizar a exclusão do mesmo.");
                            dr = 1;
                        }
                        
                    }
                    $.ajax({
                        type: 'post',
                        url: 'fetchDep.php',
                        data: {
                            desc: dc
                        },
                        success: function(data) {
                            $("#abrev_excluir input[name=abrev_excluir]").val(data);
                            $("#abrev_excluir input[name=abrev_excluir]").attr("disabled", true);
                            $("#descricao_excluir textarea[name=descricao_excluir]").attr("disabled", true);
                        }
                    })
                } else {

                    if (verify_Dep(cod) == 0) {
                        $.ajax({
                            type: 'post',
                            url: 'fetchDep.php',
                            data: {
                                desc: dc
                            },
                            success: function(data) {
                                $("#abrev_inserir input[name=abrev_inserir]").val(data);

                                $("#abrev_inserir input[name=abrev_inserir]").attr("disabled", false);
                                $("#descricao_inserir textarea[name=descricao_inserir]").attr("disabled", false);

                                document.getElementById("blockbtn").style.display = "block";
                            }
                        })
                    } else {
                        $.ajax({
                            type: 'post',
                            url: 'fetchDep.php',
                            data: {
                                desc: dc
                            },
                            success: function(data) {
                                $("#abrev_inserir input[name=abrev_inserir]").val(data);
                                $("#abrev_inserir input[name=abrev_inserir]").attr("disabled", true);
                                document.getElementById("blockbtn").style.display = "none";
                                $("#descricao_inserir textarea[name=descricao_inserir]").attr("disabled", true);
                            }
                        })
                    }
                }

            } else {
                if (verify_Dep(cod) == 0) {
                    if (dr == 0) {
                        cleanElements();
                        alert("Erro: favor inserir um valor existente para alteração!");
                        dr = 1;
                    }

                }
                if(alt_control == 0){
                    $.ajax({
                        type: 'post',
                        url: 'fetchDep.php',
                        data: {
                            desc: dc
                        },
                        success: function(data) {
                            $("#abrev_alterar input[name=abrev_alterar]").val(data);

                            $("#abrev_alterar input[name=abrev_alterar]").attr("disabled", false);
                            $("#descricao_alterar textarea[name=descricao_alterar]").attr("disabled", false);
                        }
                    })
                    alt_control = 1;
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