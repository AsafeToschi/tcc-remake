<div id="menu-sidebar">
    <div class="side-nav">
        <nav>
            <div class="navbar sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="<?php if ($pagina == "caixa"){echo "pag-atual";} ?>" >
                            <a href="index.php"><i class="fas fa-money-check-alt icon"></i> Caixa</a>
                        </li>
                        <li class="<?php if ($pagina == "relatorios"){echo "pag-atual";} ?>">
                            <a href="javascript:void(0)"><i class="fas fa-chart-area icon"></i> Relatórios<i class="fas fa-angle-down"></i></a>
                            <ul class="nav nav-second-level">
                                <li class="<?php if ($sub_pagina == "despesas"){ echo "active";}?>">
                                    <a href="javascript:void(0)">Despesas<i class="fas fa-angle-down"></i></a>
                                    <ul class="nav nav-third-level">
                                        <li class="<?php if ($pagina_atual == "despesa_categoria"){echo "pag-atual";} ?>">
                                            <a href="despesas-categoria.php">Por Categoria</a>
                                        </li>
                                        <li class="<?php if ($pagina_atual == "despesa_dia"){echo "pag-atual";} ?>">
                                            <a href="despesas-dia.php">Por Dia</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                                <li class="<?php if ($sub_pagina == "recebimentos"){ echo "active";}?>">
                                    <a href="javascript:void(0)">Recebimentos<i class="fas fa-angle-down"></i></a>
                                    <ul class="nav nav-third-level">
                                        <li class="<?php if ($pagina_atual == "recebimento_categoria"){echo "pag-atual";} ?>">
                                            <a href="recebimentos-categoria.php">Por Categoria</a>
                                        </li>
                                        <li class="<?php if ($pagina_atual == "recebimento_dia"){echo "pag-atual";} ?>">
                                            <a href="recebimentos-dia.php">Por Dia</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                                <li class="<?php if ($sub_pagina == "fluxo_de_caixa"){ echo "pag-atual";}?>">
                                    <a href="fluxo-caixa.php">Fluxo de Caixa</i></a>
                                </li>

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
        </nav>
    </div>
</div>

