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
            session_start();
            
        ?>

        <div class="container">
            <div class="title">
                <span>N</span>
                <span>E</span>
                <span>W</span>
                <span> </span>
                <span>P</span>
                <span>O</span>
                <span>S</span>
                <span>T</span>
            </div>
            <br><br>
            <form method="POST" action="adding.php" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-sm-6">
                        <h3> Image </h3>
                        <input type="file" name="picfile">
                        <img class="newimage"> <!-- Si pas d'image, mettre un sans blanc d'image -->
                    </div>
        
                    <div class ="col-sm-6">
                        <label><b>Nom de la photo :</b></label>
                        <br>
                        <input type="text" placeholder="pics" name="picname" >
                        <br>
                        <label><b>Lieu :</b></label>
                        <br>
                        <input type="text" placeholder="place to be" name="picplace" >
                        <br>
                        <label><b>Comments :</b></label>
                        <br>
                        <textarea placeholder="tell all about your pic" name="piccomment"></textarea>
                        <br>
                        <label><b>Date de la photo :</b></label>
                        <br>
                        <input type="date" name="picdate" >  
                    </div>
                </div>
                <br><br>
                <button class="bn"><input type="submit" value="submit" class="bnspan"></button>

                
            </form>

        </div>

    </body>

</body>
</html>