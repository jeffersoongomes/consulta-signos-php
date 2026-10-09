<?php include('layouts/header.php'); ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <?php
            if (isset($_POST['data_nascimento']) && !empty($_POST['data_nascimento'])) {
                $data_nascimento = $_POST['data_nascimento'];
                $signos = simplexml_load_file("signos.xml");
                
                $data_user = new DateTime($data_nascimento);
                $ano_user = $data_user->format('Y');

                $signo_encontrado = null;

                foreach ($signos->signo as $signo) {
                    $dt_inicio = DateTime::createFromFormat('d/m', (string)$signo->dataInicio);
                    $dt_fim = DateTime::createFromFormat('d/m', (string)$signo->dataFim);

                    $dt_inicio->setDate($ano_user, $dt_inicio->format('m'), $dt_inicio->format('d'));
                    $dt_fim->setDate($ano_user, $dt_fim->format('m'), $dt_fim->format('d'));

                    if ($dt_inicio > $dt_fim) {
                        if ($data_user < $dt_inicio) {
                            $dt_inicio->modify('-1 year');
                        } else {
                            $dt_fim->modify('+1 year');
                        }
                    }

                    if ($data_user >= $dt_inicio && $data_user <= $dt_fim) {
                        $signo_encontrado = $signo;
                        break;
                    }
                }

                if ($signo_encontrado) {
                    echo "
                    <div class='card text-white bg-primary mb-3 shadow-lg'>
                        <div class='card-body py-5'>
                            <h1 class='card-title display-3 fw-bold'>{$signo_encontrado->signoNome}</h1>
                            <p class='card-text fs-4 mt-3'>{$signo_encontrado->descricao}</p>
                        </div>
                    </div>";
                } else {
                    echo "<div class='alert alert-warning'>Signo não encontrado para a data informada.</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Por favor, informe uma data válida!</div>";
            }
            ?>
            <a href="index.php" class="btn btn-secondary mt-3">Voltar</a>
        </div>
    </div>
</div>

</body>
</html>