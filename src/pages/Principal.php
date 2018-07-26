<!-- Page Header-->
<header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Principal</h2>
            </div>
          </header>      
      <section class="dashboard-counts no-padding-bottom">
                    <div class="container-fluid">
                        <div class="row bg-white has-shadow">
                            <!-- Item -->
                            <!-- <div class="col-xl-3 col-sm-6">
                                <div class="item d-flex align-items-center">
                                    <div class="icon bg-violet"><i class="icon-user"></i></div>
                                    <div class="title"><span>Nuevos<br>Productos</span>
                                        <div class="progress">
                                            <div role="progressbar" style="width: 10%; height: 4px;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>
                                        </div>
                                    </div>
                                    <div class="number"><strong>10</strong></div>
                                </div>
                            </div> -->
                            <!-- Item -->
                            <div class="col-xl-4 col-sm-6">
                                <div class="item d-flex align-items-center">
                                    <div class="icon bg-green"><i class="icon-padnote"></i></div>
                                    <div class="title"><span>Productos<br>Totales</span>
                                        <div class="progress">
                                            <?php
                                               
                                                mysqli_set_charset($conexion, "utf8");
                                            
                                                $tmp="";
                                                $total; 
                                                $consulta;
                                                $vencidos;
                                                $Vencidos2;
                                                $sql="SELECT COUNT(*) as CANTIDADT FROM `productos`";
                                                $res=mysqli_query($conexion,$sql);
                                                while ($row=mysqli_fetch_array($res, MYSQL_ASSOC)){                                     
                                                    $total=$row["CANTIDADT"];
                                                }
                                                $sql="SELECT COUNT(*) as CANTIDAD FROM `productos` WHERE FECHA_VENC BETWEEN curdate() and (curdate() + 7)";
                                                $res=mysqli_query($conexion,$sql);
                                                while ($row=mysqli_fetch_array($res, MYSQL_ASSOC)){                                     
                                                    $consulta=$row["CANTIDAD"];
                                                }
                                                $sql="SELECT COUNT(*) as CANTIDADV from productos where FECHA_VENC < curdate()";
                                                $res=mysqli_query($conexion,$sql);
                                                while ($row=mysqli_fetch_array($res, MYSQL_ASSOC)){                                     
                                                    $Vencidos2=$row["CANTIDADV"];
                                                }

                                                $resta = (($consulta * 100)/($total));
                                                $resta2 = (($Vencidos2 * 100)/($total));
                                                
                                                echo "<div role='progressbar' style='width: ".$total."%; height: 4px;' aria-valuenow='15' aria-valuemin='0' aria-valuemax='100' class='progress-bar bg-green'></div>"
                                            
                                            ?>    
                                        </div>
                                    </div>
                                    <?php           
                                        echo "<div class='number'><strong>". $total ."</strong></div>";
                                    ?>
                                </div>
                            </div>
                            <!-- Item -->
                            <div class="col-xl-4 col-sm-6">
                                <div class="item d-flex align-items-center">
                                    <div class="icon bg-orange"><i class="icon-bill"></i></div>
                                    <div class="title"><span>Productos<br>Por vencer</span>
                                        <div class="progress">
                                            <?php
                                                echo "<div role='progressbar' style='width: ".$resta."%; height: 4px;' aria-valuenow='15' aria-valuemin='0' aria-valuemax='100' class='progress-bar bg-orange'></div>"
                                            ?>
                                            
                                        </div>
                                    </div>
                                    <?php           
                                        echo "<div class='number'><strong>". $consulta ."</strong></div>";
                                    ?>
                                    
                                </div>
                            </div>
                            <!-- Item -->
                            <div class="col-xl-4 col-sm-6">
                                <div class="item d-flex align-items-center">
                                    <div class="icon bg-red"><i class="icon-check"></i></div>
                                    <div class="title"><span>Productos<br>Vencidos</span>
                                        <div class="progress">
                                            <?php
                                                echo "<div role='progressbar' style='width: ".$resta2."%; height: 4px;' aria-valuenow='15' aria-valuemin='0' aria-valuemax='100' class='progress-bar bg-red'></div>"
                                            ?>
                                        </div>
                                    </div>
                                    <?php           
                                        echo "<div class='number'><strong>". $Vencidos2 ."</strong></div>";
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

