<?php include '../config.php';

$date_start = isset($_GET['date_start']) ? $_GET['date_start'] : date("d-m-Y", strtotime(date("d-m-Y") . " -7 days"));
$date_end = isset($_GET['date_end']) ? $_GET['date_end'] : date("d-m-Y");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--    <link rel="stylesheet" href="../css/PaginaIstoric.css">-->
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
            <a class="header_button">
                <span class="header_icon"> <i class="fas fa-check-square"></i>  </span>
                <span class="header_text">Programari</span>
            </a>
            <ul class="header_button__login">
                <li>
                    <a class="header_button" href="/ProiectWeb/adminctWeb/admin/programari.php">
                        <span class="header_icon"> <i class="fas fa-list"></i> </span>
                        <span class="header_text">List</span>
                    </a>
                </li>
                <li>
                    <a class="header_button" href="/ProiectWeb/adminctWeb/admin/raport.php">
                        <span class="header_icon"><i class="fas fa-file"></i></i> </span>
                        <span class="header_text">Raport</span>
                    </a>
                </li>

            </ul>
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
<div>
    <div class="card">
        <div class="card-body">
           <form id="filter-form">
                <div class="row1">
                    <div class="form-group-date">
                        <label for="date_start">Date Start</label>
                        <input type="date" class="form-control-date" name="date_start" value="<?php echo date("Y-m-d",strtotime($date_start)) ?>">

                        <label for="date_start">Date End</label>
                        <input type="date" class="form-control-date" name="date_end" value="<?php echo date("Y-m-d",strtotime($date_end)) ?>">


                        <button class="btn"><i class="fa fa-filter"></i> Filter</button>

                        <button class="btn" type="button" id="printBTN"><i class="fa fa-print"></i> Print</button>
                    </div>
                </div>
           </form>
            <hr>
            <div id="printable">
                <div>
                    <h3><b>Raport Programari</b></h3>
                    <p>Din data de  <?php echo $date_start ?> pana  <?php echo $date_end ?></p>
                    <hr>
                </div>
                <table class="table table-raport">
                        <tr>
                            <th>#</th>
                            <th>Data creare</th>
                            <th>Nume Client</th>
                            <th>Marca Vehiculului</th>
                            <th>Modelul Vehiculului</th>
                            <th>Nr. Inregistrare</th>
                            <th>Descriere</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    $qry = $conn->query("SELECT * FROM programari  order by id asc");
                    while($row= $qry->fetch_assoc()):
                    $desc = $row['descriere'];
                    ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td><?php echo $row['data_creare']?></td>
                                <td><?php echo $row['nume_client'] ?></td>
                                <td><?php echo $row['marca'] ?></td>
                                <td><?php echo $row['model'] ?></td>
                                <td><?php echo $row['nr_inregistrare'] ?></td>
                                <td><?php echo $row['descriere'] ?></td>
                                <td>
                                    <?php if($row['status'] == 1): ?>
                                        <span class="status accept">Acceptata</span>
                                    <?php elseif($row['status'] == 2): ?>
                                        <span class="status on-progress">In Progres</span>
                                    <?php elseif($row['status'] == 3): ?>
                                        <span class="status completed">Finalizata</span>
                                    <?php elseif($row['status'] == 4): ?>
                                        <span class="status rejected">Respinsa</span>
                                    <?php elseif($row['status'] == 0): ?>
                                        <span class="status waiting">In Asteptare</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php if($qry->num_rows <= 0): ?>
                        <tr>
                            <td  colspan="6">Nu exista date...</td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
