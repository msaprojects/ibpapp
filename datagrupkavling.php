<?php
     session_start();
     if (!$_SESSION['logged_in']) {
         header("Location: login.php");
         exit;
     }

function http_request($url){
    // persiapkan curl
    $ch = curl_init(); 

    // set url 
    curl_setopt($ch, CURLOPT_URL, $url);
    
    // set user agent    
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

    // return the transfer as a string 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    $output = curl_exec($ch); 
    if ($output===FALSE)
        echo curl_error($ch);
    else
    curl_close($ch);      

    return $output;
}

$profile = http_request("103.238.203.168:9999/page1/".$_SESSION['idcustomer']);
$de = json_decode($profile, true);
$de1 = json_decode($profile, true);
    
?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Data Grup Kavling</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="Tables are the backbone of almost all web applications.">
    <meta name="msapplication-tap-highlight" content="no">
    <!--
    =========================================================
    * ArchitectUI HTML Theme Dashboard - v1.0.0
    =========================================================
    * Product Page: https://dashboardpack.com
    * Copyright 2019 DashboardPack (https://dashboardpack.com)
    * Licensed under MIT (https://github.com/DashboardPack/architectui-html-theme-free/blob/master/LICENSE)
    =========================================================
    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
    -->
<link href="./main.css" rel="stylesheet">
<!-- <script src="https://cdn.zinggrid.com/zinggrid.min.js"></script> -->
</head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <div class="logo-src"></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>    <div class="app-header__content">
                <!-- <div class="app-header-left">
                    <div class="search-wrapper">
                        <div class="input-holder">
                            <input type="text" class="search-input" placeholder="Cari">
                            <button class="search-icon"><span></span></button>
                        </div>
                        <button class="close"></button>
                    </div>
                    </div> -->
                <div class="app-header-right">
                <div class="header-btn-lg pr-0">
                    <div class="widget-content p-0">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left">
                                <div class="btn-group">
                                    <a data-toggle="dropdown" class="p-0 btn">
                                        <img width="42" class="rounded-circle" src="./images/logo.gif">
                                        <!-- <i class="fa fa-angle-down ml-2 opacity-8"></i> -->
                                        <button class="ml-2 opacity-8" type="button" tabindex="0" class="dropdown-item" onclick="location.href='logout.php'">Logout</button>
                                    </a>
                                    <!-- <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                        <div tabindex="-1" class="dropdown-divider"></div>
                                        <button type="button" tabindex="0" class="dropdown-item" onclick="location.href='logout.php'">Logout</button>
                                    </div> -->
                                </div>
                            </div>
                            <div class="widget-cont ent-left  ml-3 header-user-info">
                                <div class="widget-heading">
                                    <?php
                                         echo "Halo ".$_SESSION['nama'];
                                        //echo $_SESSION['logged_in'];
                                    ?>
                                </div>
                                <div class="widget-subheading">
                                    <!-- <?php echo $_SESSION['sesi_jabatan']; ?> -->
                                </div>
                            </div>
                            <div class="widget-content-right header-user-info ml-3">
                                <button type="button" class="btn-shadow p-1 btn btn-primary btn-sm show-toastr-example">
                                    <i class="fa text-white fa-calendar pr-1 pl-1"></i>
                                </button>
                            </div>
                        </div>
                        </div>
                    </div>   
                </div>
            </div>
        </div>
        <div class="app-main">
            <div class="app-sidebar sidebar-shadow">
                <div class="app-header__logo">
                    <div class="logo-src"></div>
                    <div class="header__pane ml-auto">
                        <div>
                            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="app-header__mobile-menu">
                    <div>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="app-header__menu">
                    <span>
                        <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                        </button>
                    </span>
                </div>    
                <div class="scrollbar-sidebar">
                    <div class="app-sidebar__inner">
                        <ul class="vertical-nav-menu">
                            <!-- <li class="app-sidebar__heading">Dashboards</li>
                            <li>
                                <a href="dashboard.php">
                                    <i class="metismenu-icon pe-7s-rocket"></i>
                                    Dashboard
                                </a>
                            </li> -->
                            <li class="mm-active">
                                <a href="datagrupkavling.php">
                                    <i class="metismenu-icon pe-7s-user"></i>
                                    Data Kavling
                                </a>
                            </li>
                            <li>
                            <a href="datafinance.php">
                                    <i class="metismenu-icon pe-7s-display2"></i>
                                    Data Finance
                                </a>
                            </li>
                           <!--  <li>
                            <a href="<?php echo $menutransaksi;?>">
                                    <i class="metismenu-icon pe-7s-display2"></i>
                                    Document Manager
                                </a>
                            </li> -->
                        </ul>
                    </div>
                </div>
            </div>    
                <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
                                        </i>
                                    </div>
                                    <div>Data Property
                                        <div class="page-title-subheading">List Property
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>            
                        <div class="row">
                            <div class="col-lg-12">
                            <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
                            </ul>
                                <div class="main-card mb-3 card">
<!--                                    <div class="card-body"><h5 class="card-title">Data Property</h5>-->
                                        <table class="mb-0 table">
                                            <thead>
                                            <tr>
                                                <th class="text-center">Action</th>
<!--                                                <th class="text-center">No</th>-->
<!--                                                <th class="text-center">Nama</th>-->
                                                <th class="text-center">No. HGB</th>
                                                <th class="text-center">No. Surat Ukur</th>
                                                <th class="text-center">Tanggal Ukur</th>
                                                <th class="text-center">Luas (m2)</th>
                                            </tr>
                                            </thead>
                                            <tbody>    
                                            <?php
                                                $i=1;
                                                foreach ($de["data"] as $data => $d) :
                                            ?>
                                            <tr>
                                                <th class="text-center">
                                                    <form action="datakavling.php" method="post">
							<input type="hidden" name="no_hgb" value="<?php echo $d["no_hgb"]?>">
                                                        <button class="btn btn-danger" name="idgroup_kavling"  value="<?php echo $d["idgroup_kavling"]?>" type="submit">Detail</button>
                                                    </form>
                                                </th>
<!--                                                <th class="text-center" scope="row"><?php echo $i; $i++ ?></th>-->
<!--                                                <td class="text-center"><?php echo $d["nama"]?></td>-->
                                                <td class="text-center"><?php echo $d["no_hgb"] ?></td>
                                                <td class="text-center"><?php echo $d["no_surat_ukur"] ?></td>
                                                <td class="text-center"><?php echo $d["tgl_surat_ukur"] ?></td>
                                                <td class="text-center"><?php echo number_format($d["luas"],0,',','.') ?></td>
<!--                                                <th class="text-center">
                                                    <form action="datakavling.php" method="post">
                                                        <button class="btn btn-danger" name="idgroup_kavling"  value="<?php echo $d["idgroup_kavling"]?>" type="submit">Detail</button>
                                                    </form>
                                                </th>-->

                                            </tr>
                                            <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
<script type="text/javascript" src="./assets/scripts/main.js"></script></body>
</html>
