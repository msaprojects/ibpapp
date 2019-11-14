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

$profile = http_request("103.238.203.168:9999/page3/".$_POST['idkavling']);
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
    <title>Data Kegiatan Kavling</title>
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
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
        <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap-responsive.min.css"/>
    <link rel="stylesheet" type="text/css" href="lib/jquery.dataTables/css/DT_bootstrap.css"/>
    <link rel="stylesheet" href="css/datatables.responsive.css"/>
    <style>
        .title {
            font-size: larger;
            font-weight: bold;
        }

        .table th.centered-cell, .table td.centered-cell {
            text-align: center;
        }
    </style>
<!--<script src="https://cdn.zinggrid.com/zinggrid.min.js"></script> -->
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
                            <li class="app-sidebar__heading">Dashboards</li>
                            <!-- <li>
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
                                    <div>Data Kegiatan
                                        <div class="page-title-subheading">List Kegiatan di Kavling <?php echo $_POST['no_kavling']; ?>
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
                                    <div class="card-body"><h5 class="card-title">Data Kegiatan</h5>
<div class="span12">
                                        <table id="example" class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th class="centered-cell" data-class="expand">No</th>
                                                <th class="centered-cell">Tanggal</th>
                                                <th class="centered-cell">Kavling</th>
                                                <th class="centered-cell">Tanam</th>
                                                <th class="centered-cell" data-hide="phone">Pupuk</th>
                                                <th class="centered-cell" data-hide="phone">Semprot</th>
                                                <th class="centered-cell" data-hide="phone,tablet">Pruning</th>
                                                <th class="centered-cell" data-hide="phone,tablet">Babad</th>
                                                <th class="centered-cell" data-hide="phone,tablet">Round</th>
                                            </tr>
                                            </thead>
                                            <tbody>    
                                            <?php
                                                $i=1;
                                                foreach ($de["data"] as $data => $d) :
                                            ?>
                                            <tr>
                                                <td class="centered-cell" scope="row" class="centered-cell"><?php echo $i; $i++ ?></td>
                                                <td class="centered-cell"><?php echo $d["Tgl"]?></td>
                                                <td class="centered-cell"><?php echo $d["no_kavling"] ?></td>
                                                <td class="centered-cell"><?php echo $d["Tanam"] ?></td>
                                                <td class="centered-cell"><?php echo $d["Pupuk"] ?></td>
                                                <td class="centered-cell"><?php echo $d["Semprot"] ?></td>
                                                <td class="centered-cell"><?php echo $d["Pruning"] ?></td>
                                                <td class="centered-cell"><?php echo $d["Babad"] ?></td>
                                                <td class="centered-cell"><?php echo $d["Round"] ?></td>
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
    </div>
<script type="text/javascript" src="./assets/scripts/main.js"></script>
<script type="text/javascript" src="lib/lodash/lodash.min.js"></script>
<script type="text/javascript" src="lib/jquery/jquery.min.js"></script>
<script type="text/javascript" src="lib/jquery.dataTables/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="lib/jquery.dataTables/js/DT_bootstrap.js"></script>
<script type="text/javascript" src="js/datatables.responsive.js"></script>
<script type="text/javascript" src="js/dom-bootstrap.js"></script>
</body>
</html>
