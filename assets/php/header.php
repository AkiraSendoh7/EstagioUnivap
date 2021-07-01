<div class="sidebar">
    <div class="logo_content">
        <div class="logo">
            <img src="/assets/img/icone-u.png" width="20%">
            <div class="logo_name" style="text-indent: 50%">UNIVAP</div>
        </div>
        <i class='bx bx-menu' id="btn" title="Menu"></i>
    </div>
    <ul class="nav_list">
        <li>
            <i class='bx bx-search'></i>
            <input type="text" placeholder="Pesquise...">
            <span class="tooltip">Pesquise</span>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-grid-alt'></i>
                <span class="links_name">Painel</span>
            </a>
            <span class="tooltip">Painel</span>
        </li>
        <li>
            <a href="index.php">
                <i class="bx bx-home"></i>
                <span class="links_name">Home</span>
            </a>
            <span class="tooltip">Home</span>
        </li>
        <li>
            <a href="centrodecusto.php">
                <i class='bx bx-spreadsheet bx-sm'></i>
                <span class="links_name">Centro de Custos</span>
            </a>
            <span class="tooltip">Centro de Custos</span>
        </li>
        <li>
            <a href="departamento.php"">
                    <i class='bx bx-buildings bx-sm'></i>
                    <span class=" links_name">Departamentos</span>
            </a>
            <span class="tooltip">Departamentos</span>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-cog'></i>
                <span class="links_name">Configurações</span>
            </a>
            <span class="tooltip">Configurações</span>
        </li>
    </ul>
    <div class="profile_content">
        <div class="profile">
            <div class="profile_details">
                <div class="name_job">
                    <div class="name">Nome do usuário</div>
                    <div class="job">Indefinido</div>
                </div>
            </div>
            <i class='bx bx-log-out' id="log_out"></i>
        </div>
    </div>
</div>

<script>
    let btn = document.querySelector("#btn");
    let sidebar = document.querySelector(".sidebar");
    let searchBtn = document.querySelector(".bx-search");

    btn.onclick = function() {
        sidebar.classList.toggle("active");
        if (btn.classList.contains("bx-menu")) {
            btn.classList.replace("bx-menu", "bx-menu-alt-right");
        } else {
            btn.classList.replace("bx-menu-alt-right", "bx-menu");
        }
    }
    searchBtn.onclick = function() {
        sidebar.classList.toggle("active");
    }
</script>