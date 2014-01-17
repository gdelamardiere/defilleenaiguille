<div id="content-wrapper" class="clearfix row">
    <div class="content-left twelve columns jquery-plugin">
        <div id="contentLogin" class="jquery-plugin">
            <form class="form-horizontal" role="form" method="post">
                <input type="hidden" value="login" name="Task"/>
                <div class="form-group">
                    <label for="inputEmail1" class="col-lg-2 control-label">Identifiant</label>
                    <div class="col-lg-4">
                        <input type="text" class="form-control" id="inputEmail1" name="loginCrit" value="<?php echo $sLogin; ?>" placeholder="Identifiant">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword1" class="col-lg-2 control-label">Mot de passe</label>
                    <div class="col-lg-4">
                        <input type="password" class="form-control" id="inputPassword1" name="passwordCrit" value="" placeholder="Mot de passe">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <button type="submit" class="btn btn-default active">Se Connecter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

