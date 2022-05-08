<!DOCTYPE html>
<html>
<body>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="menu_deroulant.css" media="screen" type="text/css" />
        <link rel="stylesheet" href="add.css" media="screen" type="text/css" />

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    </head>
    <body>
        <nav class="menuD"> 
            <a href="menu.php">Profil</a>
            <a href="add.php">Add new pic</a>
            <a href="deconnexion.php">Déconnexion</a>
        </nav>

        <?php 
            $receive=$_GET["id"];
        ?>

        <div class="container">
            <div class="title">
                <span>M</span>
                <span>O</span>
                <span>D</span>
                <span>I</span>
                <span>F</span>
                <span>Y</span>
            </div>

            <?php 
                //requete php pour mettre la photo et retrouver les données$
                require("ConnectDB.php");
                $requete="SELECT * FROM picture WHERE pic_id=$receive";
                $result=mysqli_query($connexion,$requete);

                while($tab=mysqli_fetch_assoc($result)){
                    $name=$tab['pic_name'];
                    $place=$tab['pic_place'];
                    $comment=$tab['pic_comment'];
                    $date=$tab['pic_date'];
                    $type=$tab['pic_type'];
            
            ?>
            <br><br>
            
                <div class="row">
                    <div class="col-sm-6">
                        <img class="imagemodify" src="<?php echo 'posts/'.$receive.'.'.$type?>" style="width:230px;height:230px;position:relative;right:0px;">
                    </div>
        
                    <div class ="col-sm-6">
                        <form method="POST" action="modify.php">
                            <label><b>Nom de la photo :</b></label>
                            <br>
                            <input type="text" value="<?php echo $name;?>" name="picname" >
                            <br>
                            <label><b>Lieu :</b></label>
                            <br>
                            <input type="text" value="<?php echo $place;?>" name="picplace" >
                            <br>
                            <label><b>Comments :</b> (sans apostophe/guillemets)</label>
                            <br>
                            <textarea name="piccomment"><?php echo $comment;?></textarea>
                            <br>
                            <label><b>Date de la photo :</b></label>
                            <br>
                            <input type="date" name="picdate" value="<?php echo $date;?>">  
                            <br><br>
                            <button class="bn"><input type="submit" value="submit" class="bnspan"></button>
                            <input type="hidden" value="<?php echo $receive;?>" name="id">
                            
                        </form>
                    </div>
                </div>
                <br><br>
                <?php
                }
                ?>
        </div>

    </body>

</body>
</html>