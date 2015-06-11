<?php
ini_set('display_errors', E_ALL);

require 'db.php';

$stmt = $pdo->query('SELECT * FROM  `clients`');

$all_clients = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Ajax</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="">
                    <select id="clients">
                        <?php foreach ($all_clients as $client): ?>
                            <option value="<?=$client['id']?>"><?=$client['id'].':'.$client['name']?></option>
                        <?php endforeach ?>
                    </select>
                    <select id="typep">
                        <option value="Выберите клиента">Выберите клиента</option>
                    </select>
                    <div id="client_op"></div>
                </form>
            </div>
        </div>
    </div>
    <!-- Default JS -->
    <script src="jquery.js"></script>
    <script src="chrjq.js"></script>
</body>
</html>