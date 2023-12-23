<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?= URL_BASE ?>assets/css/login.css">
</head>
<body>

</body>
    <div class="mx-auto">
        <div class="container">
            <?php 
                $this->verMsg();
                $this->verErro();
            ?>
            <h1 class="mb-5">LoveChurch</h1>
            <form action="<?= URL_BASE ?>login/checkall" method="post">
                <div class="row">
                    <div class="col-md-4 mx-auto">
                        <div class="form-floating">
                            <input type="text" name="email" id="email" class="form-control" value="<?= isset($login->email) ? $login->email : '' ?>">
                            <label for="email">E-mail</label>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-4 mx-auto">
                        <div class="form-floating">
                            <input type="password" name="senha" id="senha" class="form-control" value="<?= isset($login->senha) ? $login->senha : '' ?>">
                            <label for="senha">Senha</label>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-3 mx-auto">
                        <button type="submit" class="btn-submit w-100">Logar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</html>