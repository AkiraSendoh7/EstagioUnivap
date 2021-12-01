<!DOCTYPE html>
<?php
include("conexao/banco.php");
?>
<html lang="pt-br">

<head>
    <title>Ordem de Serviço</title>

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

    <div class="toggle" name="toggle"></div>

    <div class="tabs">
        <div class="tab-header" style="width: calc(100%*4);">
            <div id="clickInserir" class="active" onclick="openTab('inserir')"> Inserir </div>
        </div>
        <div class="tab-indicator" style="width: calc(100% /1);"></div>
        <div style="overflow: auto" class="tab-body">
            <div style="position: relative;" class="tabcontent active" id="inserir">
                <div class="active">
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript">
                        $('#formOS').submit(function(e) {
                            
                            e.preventDefault();
                            $.ajax({
                                type: 'post',
                                async: 'false',
                                url: 'config_ordem.php',
                                data: $('#formOS').serialize(),
                                success: function(data) {
                                    console.log("vorto");
                                }
                            })
                        });
                    </script>
                    <form id="formOS" method="POST" action="config_ordem.php">
                        <section class="sec" name="section">
                            <div class="wrapper">
                                <div class="title"> Ordem de Serviço </div>

                                <div class="form">

                                    <div class="inputfield form-group">
                                        <label class="form-label" for="codigocampi">Campi: * </label>
                                        <div id="codigocampi_inserir" class="custom_select">
                                            <?php
                                            $query = ("SELECT * FROM departamentos");
                                            $result = $con->query($query);
                                            ?>
                                            <select onchange="abrev_CodigoCampi(this.value)" id="codigocampi" name="codigocampi_inserir" class="form-control" required>
                                                <option value="">Selecione o código do campi: </option>
                                                <?php
                                                if ($result->num_rows > 0) {
                                                    while ($reg = $result->fetch_assoc()) {
                                                        echo '<option value="' . $reg["codigocampi"] . '">' . $reg["codigocampi"] . ' - ' . $reg["descricaocampi"] . '</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="inputfield">
                                        <label class="form-label" for="centrocusto">Abreviatura Campi: *</label>
                                        <div id="abreviatura_inserir" class="custom_select">
                                            <input list="abrev_ins" onchange="abrev_CodigoCampi(this.value)" autocomplete="off" placeholder="Selecione a abreviatura" id="abreviatura_inserir" name="abreviatura_inserir">
                                            <datalist id="abrev_ins" name="abreviaturas">
                                                <option value="">
                                            </datalist>
                                        </div>
                                        <script type="text/javascript">
                                            var verify_abrevs = $("#abreviatura_inserir input[name=abreviatura_inserir]").val();
                                            $.ajax({
                                                type: 'post',
                                                url: 'fetchOrdem.php',
                                                data: {
                                                    abrevs: verify_abrevs
                                                },
                                                success: function(data) {
                                                    $("#abreviatura_inserir datalist[name=abreviaturas]").html('');
                                                    $("#abreviatura_inserir datalist[name=abreviaturas]").html(data);
                                                }
                                            })
                                        </script>
                                    </div>

                                    <div class="inputfield">
                                        <label class="form-label" for="centrocusto">Centro de custo: *</label>
                                        <div id="centrocustos_inserir" class="custom_select">
                                            <input list="centrocusto_ins" minlength="6" maxlength="6" autocomplete="off" onchange="getNumeroOS()" placeholder="Selecione o centro de custo" id="centrocustos" name="centrocustos_inserir">
                                            <datalist id="centrocusto_ins" name="centrocustos">
                                                <option value="">
                                            </datalist>

                                        </div>
                                    </div>

                                    <div id="numeroOSInserir" class="inputfield">
                                        <label class="form-label"> Numero da OS: * </label>
                                        <input type="text" autocomplete="off" id="numeroOS_inserir" name="numeroOS_inserir" value="" readonly="readonly" placeholder="Número da Ordem de Serviço">
                                    </div>

                                    <div id="ano_inserir" class="inputfield">
                                        <label class="form-label" for="tel">Ano da requisição: </label>
                                        <input type="text" type="date" id="ano" class="inputfield" autocomplete="off" name="ano" readonly="readonly">
                                    </div>

                                    <div id="data_inserir" class="inputfield">
                                        <label class="form-label" for="tel">Dia da requisição: </label>
                                        <input type="text" id="date" class="inputfield" name="data" readonly="readonly">
                                    </div>

                                    <div id="hora_inserir" class="inputfield">
                                        <label class="form-label" for="tel">Hora da requisição: </label>
                                        <input type="text" id="time" class="inputfield" name="time_inserir" readonly="readonly">
                                    </div>

                                    <script type="text/javascript">
                                        var timeDisplay = document.getElementById("time");
                                        var dateDisplay = document.getElementById("date");
                                        var yearDisplay = document.getElementById("ano")
                                        var options = {
                                            day: '2-digit',
                                            month: '2-digit'
                                        };

                                        function refreshTime() {
                                            var timeString = new Date().toLocaleTimeString("PT-BR", {
                                                hour: 'numeric',
                                                minute: 'numeric'
                                            });
                                            var dateString = new Date().toLocaleDateString("PT-BR", options);
                                            var yearString = new Date().toLocaleDateString("PT-BR", {
                                                year: 'numeric'
                                            });

                                            timeDisplay.value = timeString;
                                            dateDisplay.value = dateString.toString("dd/mm");
                                            yearDisplay.value = yearString.toString("yyyy");
                                        }

                                        setInterval(refreshTime, 1000);
                                    </script>

                                    <div id="nomerequisitante_inserir" class="inputfield">
                                        <label for="nomerequisitante" class="form-label"> Nome do requisitante </label>
                                        <input type="text" name="nomerequisitante" id="nomereq" autocomplete="off" placeholder="Digite o seu nome" required>
                                    </div>

                                    <div id="tel_inserir" class="inputfield">
                                        <label class="form-label" for="tel">Telefone: *</label>
                                        <input type="tel" id="telefone" autocomplete="off" attrname="telephone1" data-mask="(00) 0000-0000" data-mask-reverse="true" name="tel_inserir" pattern="\(\d{2}\)\s*\d{5}-\d{4}" class="phone" placeholder="Número de telefone" maxlength="15" required>
                                    </div>

                                    <div id="email_inserir" class="inputfield">
                                        <label class="form-label" for="email">Email: *</label>
                                        <input id="EmailOS" type="email" autocomplete="off" onfocus="dr0" attrname="emailOS" class="form-control" name="email" placeholder="Digite o seu email" required></input>
                                    </div>

                                    <div class="inputfield form-group">
                                        <label class="form-label" for="codigoarea">Área: * </label>
                                        <div id="area_inserir" class="custom_select">
                                            <select name="codigoarea_inserir" id="area_OS" class="form-control" onchange='getNome_respsup(this.value , $("#codigocampi_inserir select[name=codigocampi_inserir]").val())' required>
                                                <option value="">Selecione a área de serviço: </option>

                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="inputfield form-group">
                                        <div class="inputfield form-group" id="respSup_inserir"  style="display: none">
                                            
                                        </div>
                                    </div>

                                    <div class="inputfield" id="local_inserir">
                                        <label for="localServico">Local de Serviço: </label>
                                        <input class="localservico" type="text" name="localServico" autocomplete="off" id="localServ" placeholder="Digite o local do servico" required>
                                    </div>

                                    <div class="inputfield" id="bloco">
                                        <label for="bloco">Bloco: </label>
                                        <input type="text" name="bloco" autocomplete="off" id="bloco" minlength="1" maxlength="4" placeholder="Digite o bloco" required>
                                    </div>

                                    <div id="desc_inserir" class="inputfield">
                                        <label class="form-label" for="desc">Descrição: *</label>
                                        <textarea id="descricao" placeholder="Digite a descrição do departamento" maxlength="200" minlength="10" autocomplete="off" class="textarea form-control" name="desc_inserir" rows="3" required></textarea>
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

                                    <script>
                                        function ValidateEmail(mail) {
                                            if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test('#EmailOS')) {
                                                return (true)
                                            } else {
                                                alert("Você digitou um email inválido.")
                                                return (false)
                                            }
                                        }

                                        // var div = $('#tabs');
                                        // div.prop("scrollTop", div.prop("scrollHeight"));
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


            <div class="tabcontent" style="display: none" id="consulta">
                <div class="active">
                    <table id="tbl_consulta" class="table">
                        <thead>
                            <tr>
                                <th width="30%">Número da OS</th>
                                <th align-content="center" width="50%">Nome Requisitante</th>
                                <th width="30%">Estado</th>
                                <th width="5%">Edit</th>
                                <th width="5%">Delete</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

        <script type="text/javascript">

            function getNome_respsup(area, dep){
                if(area != ""){
                    document.getElementById("respSup_inserir").style.display = "block";
                    $.ajax({
                        type:'post',
                        url:'fetchOrdem.php',
                        data:{
                            fetchNomebyArea: area,
                            fetchNomebyDep: dep
                        },
                        success: function(data){
                            document.getElementById("respSup_inserir").innerHTML = data;
                        
                        }
                    })
                }else{
                    document.getElementById("respSup_inserir").innerHTML = "";
                    document.getElementById("respSup_inserir").style.display = "none";
                }
                
            }


            function abrev_CodigoCampi(abrev_codcampi) {
                var element_codigo = 0;
                var element_abrev = "";
                var campii;
                if (abrev_codcampi != "") {
                    if (isNaN(abrev_codcampi)) {
                        element_abrev = abrev_codcampi;
                        $.ajax({
                            type: 'post',
                            url: 'fetchOrdem.php',
                            data: {
                                element_abrev: element_abrev
                            },
                            success: function(data) {
                                $("#codigocampi_inserir select[name=codigocampi_inserir]").val('');
                                $("#centrocustos_inserir input[name=centrocustos_inserir]").val('');
                                $("#centrocustos_inserir datalist[name=centrocustos]").html('');
                                $("#codigocampi_inserir select[name=codigocampi_inserir]").val(data);
                                campii = data;
                                element_codigo = $("#codigocampi_inserir select[name=codigocampi_inserir]").val();
                                $.ajax({
                                    type: 'post',
                                    url: 'fetchOrdem.php',
                                    data: {
                                        codigosCentroDeCusto: element_codigo
                                    },
                                    success: function(data) {
                                        $("#centrocustos_inserir datalist[name=centrocustos]").html('');
                                        $("#centrocustos_inserir datalist[name=centrocustos]").html(data);
                                        $.ajax({
                                            type: 'post',
                                            url: 'fetchOrdem.php',
                                            async: 'false',
                                            data: {
                                                campi_areaOS: campii
                                            },
                                            success: function(data) {
                                                $("#area_inserir select[name=codigoarea_inserir]").val('');
                                                $("#area_inserir select[name=codigoarea_inserir]").html(data);
                                            }
                                        })
                                    }
                                })
                            }
                        })
                    } else {
                        element_codigo = abrev_codcampi;
                        campii = element_codigo;
                        $.ajax({
                            type: 'post',
                            url: 'fetchOrdem.php',
                            data: {
                                element_codigo: element_codigo
                            },
                            success: function(data) {
                                $("#abreviatura_inserir input[name=abreviatura_inserir]").val('');
                                $("#centrocustos_inserir input[name=centrocustos_inserir]").val('');
                                $("#centrocustos_inserir datalist[name=centrocustos]").html('');
                                $("#abreviatura_inserir input[name=abreviatura_inserir]").val(data);

                                $.ajax({
                                    type: 'post',
                                    url: 'fetchOrdem.php',
                                    data: {
                                        codigosCentroDeCusto: element_codigo
                                    },
                                    success: function(data) {
                                        $("#centrocustos_inserir datalist[name=centrocustos]").html('');
                                        $("#centrocustos_inserir datalist[name=centrocustos]").html(data);
                                        $.ajax({
                                            type: 'post',
                                            url: 'fetchOrdem.php',
                                            async: 'false',
                                            data: {
                                                campi_areaOS: campii
                                            },
                                            success: function(data) {
                                                $("#area_inserir select[name=codigoarea_inserir]").val('');
                                                $("#area_inserir select[name=codigoarea_inserir]").html(data);
                                            }
                                        })
                                    }
                                })
                            }
                        })
                    }

                } else {
                    $("#abreviatura_inserir input[name=abreviatura_inserir]").val('');
                    $("#codigocampi_inserir select[name=codigocampi_inserir]").val('');
                    $("#centrocustos_inserir input[name=centrocustos_inserir]").val('');
                    $("#centrocustos_inserir datalist[name=centrocustos]").html('');
                }

            }

            function pad5(number) {
                return (number.padStart(5, '0'));
            }

            function getNumeroOS() {
                var ano = $('#ano_inserir input[name=ano]').val();
                var campi = $('#codigocampi_inserir select[name=codigocampi_inserir]').val();
                console.log(ano, campi)

                $.ajax({
                    type: 'post',
                    url: 'fetchOrdem.php',
                    data: {
                        ano_OS: ano,
                        campi_OS: campi,
                    },
                    success: function(data) {
                        console.log(data)
                        $('#numeroOSInserir input[name=numeroOS_inserir]').val(pad5(data));
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
            }
        </script>

</body>

</html>