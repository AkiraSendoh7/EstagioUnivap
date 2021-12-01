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

    <i class='bx bx-moon change-theme' id="theme-button"></i>
    <script>
        window.onload = function() {
            get_centros();
        };
    </script>
    <!-- Theme change button  -->
    <div class="tabs">
        <div class="tab-header">
            <div id="clickInserir" class="active" onclick="openTab('inserir'), cleanElements(1)"> Inserir </div>
            <div id="clickAlterar" onclick="openTab('alterar'), cleanElements(2)"> Alterar </div>
            <div onclick="openTab('visualizar'), showTable()"> Visualizar </div>
            <div id="clickExcluir" onclick="openTab('excluir'), cleanElements(3)"> Excluir </div>
        </div>
        <div class="tab-indicator"></div>
        <div class="tab-body" style="height:100%;overflow:auto;overflow-x:hidden;overflow-y:scroll;">
            <div id="inserir" style="position: relative; display: block" class="tabcontent active">
                <div class="active">

                    <form id="formInserir" method="POST" action="config_centro.php">
                        <section class="sec" name="section">

                            <div class="wrapper">
                                <div class="title"> Centro de Custo </div>

                                <div class="form">

                                    <div class="inputfield">
                                        <label class="form-label" for="centrocusto">Centro de custo: *</label>
                                        <div id="centrocustos_inserir" class="custom_select">
                                            <input list="centrocusto_ins" onfocus="dr=0" onfocus="get_centros()" minlength="6" maxlength="6" onchange="setCentrocusto(this.value),cleanElements(1)" autocomplete="off" placeholder="Selecione o centro de custo" name="centrocustos_inserir">
                                            <datalist id="centrocusto_ins" name="centrocustos">
                                                <option value="">
                                            </datalist>
                                        </div>
                                    </div>

                                    <div id="desc_inserir" class="inputfield">
                                        <label class="form-label" for="desc">Descrição: *</label>
                                        <textarea placeholder="Digite a descrição do departamento" onfocus="" maxlength="200" minlength="10" class="textarea form-control" name="desc_inserir" rows="3" required></textarea>
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

                                    <div class="inputfield form-group">
                                        <label class="form-label" for="codigocampi">Campi: * </label>
                                        <div id="codigocampi_inserir" class="custom_select">
                                            <select id="sel_departamentos" onfocus="dr=0" name="codigocampi_inserir" class="form-control" required>
                                                <option value="">Selecione o código do campi: </option>
                                            </select>

                                        </div>
                                    </div>

                                    <div id="btn_adc" class="inputfield">
                                        <button onclick="adc_centro()" class="btn btn-primary" type="button">Adicionar</button>
                                    </div>

                                    <div id="blockbtn" class="inputfield" style="display:none">
                                        <button formmethod="POST" type="button" onclick="inserir_centros()" class="btn btn-primary">Gravar</button>
                                    </div>
                                </div>
                            </div>

                        </section>
                    </form>
                </div>
                <div id="tbl_dados_inserir" style="display:none;height:100%;overflow:auto;overflow-x:hidden;overflow-y:scroll;">
                    <p class="form-label" style="position:center"> </p>
                    <table id="table" style="text-align:center" class="table">
                        <tr>
                            <td>Código Centro de Custo</th>
                            <td>Descrição Centro de Custo</th>
                            <td>Telefone (Opcional)</th>
                            <td>Campi</th>
                        <tr>
                    </table>
                    <p class="form-label" style="position:center"> Clique em "Gravar" para salvar os dados!</p>
                </div>
            </div>

            <div class="tabcontent" style="display: none" id="alterar">
                <div class="active">

                    <form id="formAlterar" method="POST" action="config_centro.php">
                        <section class="sec" name="section">

                            <div class="wrapper">
                                <div class="title"> Centro de Custo </div>

                                <div class="form">

                                    <div class="inputfield">
                                        <label class="form-label" for="centrocusto">Centro de custo: *</label>
                                        <div id="centrocustos_alterar" class="custom_select">
                                            <input list="centrocusto_alt" onfocus="dr=0" onfocus="get_centros()" minlength="6" maxlength="6" onchange="setCentrocusto(this.value),cleanElements(2)" autocomplete="off" placeholder="Selecione o centro de custo" name="centrocustos_alterar">
                                            <datalist id="centrocusto_alt" name="centrocustos">
                                                <option value="">
                                            </datalist>
                                        </div>
                                    </div>

                                    <div id="desc_alterar" class="inputfield">
                                        <label class="form-label" for="desc">Descrição: *</label>
                                        <textarea placeholder="Digite a descrição do departamento" onfocus="" maxlength="200" minlength="10" class="textarea form-control" name="desc_alterar" rows="3" required></textarea>
                                    </div>

                                    <div id="tel_alterar" class="inputfield">
                                        <label class="form-label" for="tel">Telefone: </label>
                                        <input type="tel" autocomplete="off" attrname="telephone2" data-mask="(00) 0000-0000" data-mask-reverse="true" name="tel_alterar" pattern="\(\d{2}\)\s*\d{5}-\d{4}" class="phone" placeholder="Número de telefone - (opcional)" maxlength="15">
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
                                        var tel = document.querySelector('input[attrname=telephone2]');
                                        VMasker(tel).maskPattern(telMask[0]);
                                        tel.addEventListener('input', inputHandler.bind(undefined, telMask, 14), false);
                                    </script>

                                    <div id="blockbtn" class="inputfield" style="display:block">
                                        <button formmethod="POST" type="button" onclick="alterar_centros()" class="btn btn-primary">Alterar</button>
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

                    <form id="formExcluir" method="POST" action="config_centro.php">
                        <section class="sec" name="section">

                            <div class="wrapper">
                                <div class="title"> Centro de Custo </div>

                                <div class="form">

                                    <div class="inputfield">
                                        <label class="form-label" for="centrocusto">Centro de custo: *</label>
                                        <div id="centrocustos_excluir" class="custom_select">
                                            <input list="centrocusto_exc" onfocus="dr=0" onfocus="get_centros()" minlength="6" maxlength="6" onchange="setCentrocusto(this.value),cleanElements(4)" autocomplete="off" placeholder="Selecione o centro de custo" name="centrocustos_excluir">
                                            <datalist id="centrocusto_exc" name="centrocustos">
                                                <option value="">
                                            </datalist>
                                        </div>
                                    </div>

                                    <div id="desc_excluir" class="inputfield">
                                        <label class="form-label" for="desc">Descrição: *</label>
                                        <textarea placeholder="Digite a descrição do departamento" onfocus="" maxlength="200" minlength="10" class="textarea form-control" name="desc_excluir" rows="3" required></textarea>
                                    </div>

                                    <div id="tel_excluir" class="inputfield">
                                        <label class="form-label" for="tel">Telefone: </label>
                                        <input type="tel" autocomplete="off" attrname="telephone3" data-mask="(00) 0000-0000" data-mask-reverse="true" name="tel_excluir" pattern="\(\d{2}\)\s*\d{5}-\d{4}" class="phone" placeholder="Número de telefone - (opcional)" maxlength="15">
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
                                        var tel = document.querySelector('input[attrname=telephone3]');
                                        VMasker(tel).maskPattern(telMask[0]);
                                        tel.addEventListener('input', inputHandler.bind(undefined, telMask, 14), false);
                                    </script>

                                    <div id="btn_exc" class="inputfield">
                                        <button onclick="excluir_centro()" class="btn btn-primary" type="button">Excluir</button>
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
        var cod = 0;
        var alt_control = 0;
        const div = document.getElementById("visualizar");

        function get_centros() {
            $.ajax({
                type: 'post',
                url: 'fetchCentroCusto.php',
                data: {
                    buscarCentros: cod
                },
                success: function(data) {
                    if (document.getElementById("inserir").style.display == "block") {
                        $("#centrocustos_inserir datalist[name=centrocustos]").html(data);
                    } else if (document.getElementById("alterar").style.display == "block") {
                        $("#centrocustos_alterar datalist[name=centrocustos]").html(data);
                    }else if(document.getElementById("excluir").style.display == "block") {
                        $("#centrocustos_excluir datalist[name=centrocustos]").html(data);
                    }
                }
            })
        }



        function setCentrocusto(n_centro) {
            if (document.getElementById("inserir").style.display == "block") {
                if (n_centro != "") {
                    $.ajax({
                        type: 'post',
                        url: 'fetchCentroCusto.php',
                        data: {
                            centro: n_centro
                        },
                        success: function(data) {
                            document.getElementById("sel_departamentos").innerHTML = data;
                        }
                    })
                } else {
                    document.getElementById("table").innerHTML = "<tr><td>Código Centro de Custo</th><td>Descrição Centro de Custo</th><td>Telefone (Opcional)</th><td>Campi</th><tr>";
                }

                $.ajax({
                    type: 'post',
                    url: 'fetchCentroCusto.php',
                    data: {
                        buscarDescricao: n_centro
                    },
                    success: function(data) {
                        if (data == "") {
                            $.ajax({
                                type: 'post',
                                url: 'fetchCentroCusto.php',
                                data: {
                                    centro: n_centro
                                },
                                success: function(data) {
                                    document.getElementById("sel_departamentos").innerHTML = data;
                                }
                            })

                            $("#desc_inserir textarea[name=desc_inserir]").attr("readonly", false);
                            $("#tel_inserir input[name=tel_inserir]").attr("readonly", false);
                        } else {
                            $("#desc_inserir textarea[name=desc_inserir]").val(data);
                            $.ajax({
                                type: 'post',
                                url: 'fetchCentroCusto.php',
                                data: {
                                    buscarTel: n_centro
                                },
                                success: function(data) {
                                    $("#tel_inserir input[name=tel_inserir]").val(data);
                                }
                            })

                            $("#desc_inserir textarea[name=desc_inserir]").attr("readonly", true);
                            $("#tel_inserir input[name=tel_inserir]").attr("readonly", true);
                        }

                    }
                })
            } else if (document.getElementById("alterar").style.display == "block") {
                $.ajax({
                    type: 'post',
                    url: 'fetchCentroCusto.php',
                    data: {
                        buscarDescricao: n_centro
                    },
                    success: function(data) {
                        if (data == "") {
                            $("#desc_alterar textarea[name=desc_alterar]").attr("readonly", true);
                            $("#tel_alterar input[name=tel_alterar]").attr("readonly", true);
                        } else {
                            $("#desc_alterar textarea[name=desc_alterar]").val(data);
                            $.ajax({
                                type: 'post',
                                url: 'fetchCentroCusto.php',
                                data: {
                                    buscarTel: n_centro
                                },
                                success: function(data) {
                                    $("#tel_alterar input[name=tel_alterar]").val(data);
                                }
                            })

                            $("#desc_alterar textarea[name=desc_alterar]").attr("readonly", false);
                            $("#tel_alterar input[name=tel_alterar]").attr("readonly", false);
                        }

                    }
                })
            }else if(document.getElementById("excluir").style.display == "block"){
                $.ajax({
                    type: 'post',
                    url: 'fetchCentroCusto.php',
                    data: {
                        buscarDescricao: n_centro
                    },
                    success: function(data) {
                        if (data == "") {
                            $("#desc_excluir textarea[name=desc_excluir]").attr("readonly", true);
                            $("#tel_excluir input[name=tel_excluir]").attr("readonly", true);
                        } else {
                            $("#desc_excluir textarea[name=desc_excluir]").val(data);
                            $.ajax({
                                type: 'post',
                                url: 'fetchCentroCusto.php',
                                data: {
                                    buscarTel: n_centro
                                },
                                success: function(data) {
                                    $("#tel_excluir input[name=tel_excluir]").val(data);
                                }
                            })

                            $("#desc_excluir textarea[name=desc_excluir]").attr("readonly", true);
                            $("#tel_excluir input[name=tel_excluir]").attr("readonly", true);
                        }

                    }
                })
            }

        }

        function inserir_centros() {
            var tabela = document.getElementById("table");
            var c = 2;
            var i = 0;
            var tamanhoTbl = document.getElementById("table").rows.length;
            const centro = $("#centrocustos_inserir input[name=centrocustos_inserir]").val();
            const desc = $("#desc_inserir textarea[name=desc_inserir]").val();
            const tel = $("#tel_inserir input[name=tel_inserir]").val();
            tamanhoTbl = ((tamanhoTbl / 2) - 1);
            console.log(tamanhoTbl);
            var dep;

            for (i = 0; i <= tamanhoTbl; i++) {
                dep = $('#table label[name=inserir' + i + ']').text();
                $.ajax({
                    type: 'post',
                    url: 'config_centro.php',
                    data: {
                        n_centro: centro,
                        descricao: desc,
                        telefone: tel,
                        var_dep: dep
                    },
                    success: function(data) {
                        console.log("Dado inserido com sucesso!")
                    }
                })
            }

            $("#centrocustos_inserir input[name=centrocustos_inserir]").val('');
            cleanElements(1);

        }

        function excluir_centro() {
            var centro = $("#centrocustos_excluir input[name=centrocustos_excluir]").val();
            $.ajax({
                type: 'post',
                url: 'fetchCentroCusto.php',
                data:{
                    ver_os: centro
                },
                success: function(data){
                    if(data == 1){
                        alert("Há tem uma ordem de serviço vinculada a este centro de custo, não será possivel excluí-lo");
                    }else{
                        $.ajax({
                            type: 'post',
                            url: 'config_centro.php',
                            data:{
                                exc_centro: centro
                            },
                            success: function(data){
                                alert("Centro excluido com sucesso!");
                                $("#centrocustos_excluir input[name=centrocustos_excluir]").val('');
                                cleanElements(4);
                            }
                        })
                    }
                }
            })
        }

        function alterar_centros() {

            const centro = $("#centrocustos_alterar input[name=centrocustos_alterar]").val();
            const desc = $("#desc_alterar textarea[name=desc_alterar]").val();
            const tel = $("#tel_alterar input[name=tel_alterar]").val();
            $.ajax({
                type: 'post',
                url: 'config_centro.php',
                data: {
                    n_centro_alt: centro,
                    descricao_alt: desc,
                    telefone_alt: tel
                },
                success: function(data) {
                    console.log("Dados alterados com sucesso!")
                }
            })
            $("#centrocustos_alterar input[name=centrocustos_alterar]").val('');
            cleanElements(2);

        }

        //Garante que não será inserido na tabela, no momento de inserir dados, campis iguais
        function verificarDadoTabela(campi, tamanhoTbl){
            var cont = 0;
            var val = 0;
            while(cont<=tamanhoTbl){
                if(campi == $('#table label[name=inserir' + cont  + ']').text()){
                    val = 1;
                }
                cont++;
            }
            return val;
        }

        function adc_centro() {
            var tamanhoTbl = document.getElementById("table").rows.length;
            tamanhoTbl = ((tamanhoTbl / 2) - 1);

            if(verificarDadoTabela($("#codigocampi_inserir select[name=codigocampi_inserir]").val(), tamanhoTbl) == 1){
                alert("Este campi já foi inserido na tabela!");
            }else{
                $.ajax({
                    type: 'post',
                    url: 'fetchCentroCusto.php',
                    data: {
                        centrocustos_inserir: $("#centrocustos_inserir input[name=centrocustos_inserir]").val(),
                        desc_inserir: $("#desc_inserir textarea[name=desc_inserir]").val(),
                        tel_inserir: $("#tel_inserir input[name=tel_inserir]").val(),
                        codigocampi_inserir: $("#codigocampi_inserir select[name=codigocampi_inserir]").val(),
                        cont: tamanhoTbl
                    },
                    success: function(data) {

                        document.getElementById("table").style.display = "block";
                        document.getElementById("blockbtn").style.display = "block";
                        document.getElementById("tbl_dados_inserir").style.display = "block";
                        $("#desc_inserir textarea[name=desc_inserir]").attr("readonly", true);
                        $("#tel_inserir input[name=tel_inserir]").attr("readonly", true);
                        document.getElementById("table").innerHTML = document.getElementById("table").innerHTML + data;
                    }
                })
            }
        }

        function showTable() {
            const fetch = 1;

            div.style.position = "relative";
            $.ajax({
                type: 'post',
                url: 'showTableCentro.php',
                data: {
                    val: fetch
                },
                success: function(data) {
                    $(div).html(data);
                }
            })
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
            get_centros();
        }

        function cleanElements(value) {
            $("#codigocampi_inserir select[name=codigocampi_inserir]").val('');
            $("#desc_inserir textarea[name=desc_inserir]").attr("disabled", false);
            $("#desc_inserir textarea[name=desc_inserir]").val('');
            $("#tel_inserir input[name=tel_inserir]").attr("disabled", false);
            $("#desc_inserir textarea[name=desc_inserir]").attr("readonly", false);
            $("#tel_inserir input[name=tel_inserir]").attr("readonly", false);
            $("#tel_inserir input[name=tel_inserir]").val('');
            document.getElementById("tbl_dados_inserir").style.display = "none";
            document.getElementById("table").innerHTML = "<tr><td>Código Centro de Custo</th><td>Descrição Centro de Custo</th><td>Telefone (Opcional)</th><td>Campi</th><tr>";

            $("#desc_alterar textarea[name=desc_alterar]").attr("disabled", false);
            $("#desc_alterar textarea[name=desc_alterar]").val('');
            $("#tel_alterar input[name=tel_alterar]").attr("disabled", false);
            $("#tel_alterar input[name=tel_alterar]").val('');

            $("#desc_excluir textarea[name=desc_excluir]").attr("disabled", false);
            $("#desc_excluir textarea[name=desc_excluir]").val('');
            $("#tel_excluir input[name=tel_excluir]").attr("disabled", false);
            $("#tel_excluir input[name=tel_excluir]").val('');

            if (value == 1) {

                document.getElementById("blockbtn").style.display = "none";
                $("#centrocustos_inserir input[name=codigocampi_inserir]").focus();
            } else if (value == 2) {

                document.getElementById("blockbtn").style.display = "block";
                $("#centrocustos_alterar input[name=codigocampi_alterar]").focus();
            } else {

                document.getElementById("blockbtn").style.display = "block";
                $("#centrocustos_excluir input[name=centrocustos_excluir]").focus();
            }
            dr = 0;
        }
    </script>
</body>

</html>