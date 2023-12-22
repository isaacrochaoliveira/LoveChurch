<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<link rel="stylesheet" type="text/css" href="<?php echo URL_BASE ?>assets/css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo URL_BASE ?>assets/css/auxiliar.css">
<link rel="stylesheet" type="text/css" href="<?php echo URL_BASE ?>assets/css/grade.css">
<link rel="stylesheet" type="text/css" href="<?php echo URL_BASE ?>assets/css/m-style.css">


<link rel="stylesheet" type="text/css" href="<?php echo URL_BASE ?>assets/css/login.css">
<!------ Include the above in your HEAD tag ---------->

<body>
    <div id="login">
     
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                    <!-- 
                  <img src="<?php  echo URL_BASE ?>assets/img/logo.png" class="m-aut d-block">
                   -->

                   
                        <form action="<?php echo URL_BASE ."login/logar" ?>" method="post">
                        
                            <img src="<?php  echo URL_BASE ?>assets/img/logo.png" class="m-aut d-block">
                            <?php 
                            $this->verMsg();
                            $this->verErro();
                            
                            ?>
                            <div class="form-group">
                                <label for="username" class="text-info">Login:</label><br>
                                <input type="text" name="login"  class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Senha:</label><br>
                                <input type="text" name="senha"  class="form-control">
                            </div>
                            <div class="form-group">
                                
                                <input type="submit" value="Entrar" class="btn btn-info btn-md" >
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
