<?php include('layouts/header.php'); ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <h1 class="mb-4">Descubra seu signo:</h1>
            
            <form id="signo-form" method="POST" action="show_zodiac_sign.php" class="card p-4 shadow-sm">
                <div class="mb-3 text-start">
                    <label for="data_nascimento" class="form-label">Data de nascimento</label>
                    <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Descobrir</button>
            </form>
            
            <p class="text-muted mt-3"><small>Desenvolvido por Jefferson</small></p>
        </div>
    </div>
</div>

</body>
</html>