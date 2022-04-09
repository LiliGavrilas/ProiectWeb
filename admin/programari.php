<?php
require_once('../config.php');
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
<main>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista Programari</h3>
        </div>
        <div class="card-body">
            <table>
                <colgroup>
                    <col width="5%">
                    <col width="35%">
                    <col width="25%">
                    <col width="25%">
                    <col width="10%">
                </colgroup>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nume Client</th>
                        <th>Descriere problema</th>
                        <th>Data creare</th>
                        <th>Status</th>
                        <th>Action</th>
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
                            <th><?php echo $i++ ?></th>
                            <td>
                                <p><b><?php echo $row['nume_client'] ?></b></p>
                            </td>
                            <td>
                                <p class="description"><?php echo $desc?></p>
                            </td>
                            <td><b><?php echo date("M d, Y",strtotime($row['data_creare'])) ?></b></td>
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
                                <td align="center">
                                    <a title="View" href="vezi_programare.php?id=<?php echo $row['id'] ?>"<i class="fa fa-eye"></i></a>
                                    <a title="Edit" href="edit_programare.php?id=<?php echo $row['id'] ?>"<i class="fa fa-pencil"></i></a>
                                </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<footer>
    <p>Cycling Maintenance Web Tool</p>
</footer>

</body>
</html>
