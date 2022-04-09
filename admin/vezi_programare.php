<?php
require_once('../config.php');
$qry = $conn->query("SELECT * FROM programari where id = ".$_GET['id']);
$list =array();
foreach($row = $qry->fetch_array() as $value){
    $list= $row;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/PaginaIstoric.css">
    <link rel="stylesheet" href="../css/programari.css">
    <script src="https://kit.fontawesome.com/9ab9988c3d.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" type="image/jpg" href="../../images/favicon.png" />
    <title>CyMaT</title>
</head>

<body>
<header>
    <ul>
        <li>
            <a class="logo" href="./PaginaGeneralaPatientV2.html">
                <span class="header_icon_logo"> <i class="fas fa-motorcycle"></i> </span>
                <img class="logo" src="../../images/favicon.png" alt="CyMaT">
            </a>
        </li>

        <li>
            <a class="header_button" href="./PaginaSchedulePatientV2.html">
                <span class="header_icon"> <i class="fas fa-calendar-plus"></i> </span>
                <span class="header_text">Program</span>
            </a>
        </li>

        <li>
            <a class="header_button">
                <span class="header_icon"> <i class="fas fa-plus"></i> </span>
                <span class="header_text">Adauga</span>
            </a>
            <ul class="header_button__login">
                <li>
                    <a class="header_button" href="./PaginaResetPassPatient.html">
                        <span class="header_icon"> <i class="fas fa-comments"></i> </span>
                        <span class="header_text">Raspuns</span>
                    </a>
                </li>
                <li>
                    <a class="header_button" href="./index_patient.html">
                        <span class="header_icon"> <i class="fas fa-screwdriver"></i> </span>
                        <span class="header_text">Reparatie</span>
                    </a>
                </li>

            </ul>
        </li>

        <li>
            <a class="header_button"  href="/ProiectWeb/adminctWeb/admin/programari.php">
                <span class="header_icon"> <i class="fas fa-check-square"></i> </span>
                <span class="header_text">Programari</span>
            </a>
        </li>

        <li>
            <a class="header_button">
                <span class="header_icon"> <i class="fas fa-cubes"></i> </span>
                <span class="header_text">Administrare</span>
            </a>
            <ul class="header_button__login">
                <li>
                    <a class="header_button" href="./PaginaResetPassPatient.html">
                        <span class="header_icon"> <i class="fas fa-cubes"></i> </span>
                        <span class="header_text">Stoc</span>
                    </a>
                </li>
                <li>
                    <a class="header_button" href="./index_patient.html">
                        <span class="header_icon"> <i class="fas fa-dolly"></i> </span>
                        <span class="header_text">Comanda</span>
                    </a>
                </li>
                <li>
                    <a class="header_button" href="./index_patient.html">
                        <span class="header_icon"> <i class="fas fa-download"></i> </span>
                        <span class="header_text">Date</span>
                    </a>
                </li>

            </ul>

        </li>
        <li>
            <a class="header_button">
                <span class="header_icon"> &#128100; </span>
                <span class="header_text">User</span>
            </a>
            <ul class="header_button__login">
                <li>
                    <a class="header_button" href="./PaginaResetPassPatient.html">
                        <span class="header_icon"> <i class="fas fa-key"></i> </span>
                        <span class="header_text">Reset password</span>
                    </a>
                </li>
                <li>
                    <a class="header_button" href="./index_patient.html">
                        <span class="header_icon"> <i class="fas fa-sign-out-alt"></i> </span>
                        <span class="header_text">Log out</span>
                    </a>
                </li>
            </ul>

        </li>

    </ul>
</header>
<main>
    <div>
        <div class="row">
            <div class="col col-principaly">
                <div class="sub-col">
                    <div class="content-header">
                        <h1>Vizualizare Programare</h1>
                    </div>
                    <div class="col">
                        <div class="row">

                            <div class="col1">
                                <dl>
                                    <dt><b>Nume Proprietar</b></dt>
                                    <dd><?php echo $list['nume_client'] ?></dd>
                                    <dt><b>Nr. Contact</b></dt>
                                    <dd><?php echo  $list['nr_contact'] ?></dd>
                                    <dt><b>Email</b></dt>
                                    <dd><?php echo $list['email'] ?></dd>
                                    <dt><b>Marca Vehiculului</b></dt>
                                    <dd><?php echo $list['marca'] ?></dd>
                                    <dl>
                                        <dt><b>Status</b></dt>
                                        <dd>
                                            <?php if($list['status'] == 1): ?>
                                                <span class="status accept">Acceptata</span>
                                            <?php elseif($list['status'] == 2): ?>
                                                <span class="status on-progress">In Progres</span>
                                            <?php elseif($list['status'] == 3): ?>
                                                <span class="status completed">Finalizata</span>
                                            <?php elseif($list['status'] == 4): ?>
                                                <span class="status rejected">Respinsa</span>
                                            <?php elseif($list['status'] == 0): ?>
                                                <span class="status waiting">In Asteptare</span>
                                            <?php endif; ?>
                                        </dd>
                                    </dl>
                                </dl>
                            </div>
                            <div class="col2">
                                <dt><b>Nr. Inregistrare</b></dt>
                                <dd><?php echo $list['nr_inregistrare'] ?></dd>
                                <dt><b>Modelul Vehiculului</b></dt>
                                <dd><?php echo $list['model'] ?></dd>
                                <dl>
                                    <dt><b>Data creare</b></dt>
                                    <dd><?php echo date("F d, Y",strtotime($list['data_creare'])) ?></dd>
                                </dl>
                                <dl>
                                    <dt><b>Descriere</b></dt>
                                    <dd><?php echo $list['descriere'] ?></dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<footer>
    <p>Cycling Maintenance Web Tool</p>
</footer>

</body>
</html>

