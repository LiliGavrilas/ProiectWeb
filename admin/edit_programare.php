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
        <div class="row">
            <div class="col col-principaly_edit">
                <div class="sub-col">
                    <div class="content-header">
                        <h1>Editare Programare</h1>
                    </div>

                    <div class="col">
                        <form action="">
                            <input type="hidden" name="id" value="<?php echo isset($list['id']) ? $list['id'] : '' ?>">
                            <div class="row">
                                <div class="col1">
                                    <div class="form-group">
                                        <label for="nume" ><b>Proprietar</b></label>
                                        <input type="text" class="form-control" name="nume" id="nume" value="<?php echo isset($list['nume_client']) ? $list['nume_client'] : '-' ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="nr_contact">Nr. Contact</label>
                                        <input type="text" class="form-control" name="nr_contact" id="nr_contact" value="<?php echo isset($list['nr_contact']) ? $list['nr_contact'] : '-' ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" name="email" id="email" value="<?php echo isset($list['email']) ? $list['email'] : '-' ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="marca">Marca</label>
                                        <input type="text" class="form-control" name="marca" id="marca" value="<?php echo isset($list['marca']) ? $list['marca'] : '-' ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" id="status">
                                            <option value="0" <?php echo isset($list['status']) && $list['status'] == 0 ? 'selected' : '' ?>>In Asteptare</option>
                                            <option value="1" <?php echo isset($list['status']) && $list['status'] == 1 ? 'selected' : '' ?>>Acceptat</option>
                                            <option value="2" <?php echo isset($list['status']) && $list['status'] == 2 ? 'selected' : '' ?>>In Progres</option>
                                            <option value="3" <?php echo isset($list['status']) && $list['status'] == 3 ? 'selected' : '' ?>>Finalizat</option>
                                            <option value="4" <?php echo isset($list['status']) && $list['status'] == 4 ? 'selected' : '' ?>>Respinsa</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col2">
                                    <div class="form-group">
                                        <label for="nr_inregistrare">Nr. Inregistrare</label>
                                        <input type="text" class="form-control" name="nr_inregistrare" id="nr_inregistrare" value="<?php echo isset($list['nr_inregistrare']) ? $list['nr_inregistrare'] : '-' ?>">
                                    </div>


                                    <div class="form-group">
                                        <label for="model">Modelul Vehiculului</label>
                                        <input type="text" class="form-control" name="model" id="model" value="<?php echo isset($list['model']) ? $list['model'] : '-' ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="data_creare">Data Creare</label>
                                        <input type="date" class="form-control" autocomplete="off" name="data_creare" id="data_creare" value="<?php echo isset($list['data_creare']) ? date("Y-m-d",strtotime($list['data_creare'])) : '' ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="descriere">Descriere</label>
                                        <textarea name="descriere" id="descriere" class="form-control">
                                    <?php echo isset($list['descriere']) ? $list['descriere'] : '-' ?>
                                            </textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="button">
                                <button class="btn save " form="manage-project">Save</button>
                                <button class="btn close" type="button" onclick="location.href='programari.php'">Cancel</button>
                        </div>
                    </div>
                </div>
        </div>
</main>


</body>
</html>
