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
            <h1><b> Ajoute une nouvelle pics </b></h1>
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
                        <input type="text" placeholder="pics" name="picname" >
                        <br>
                        <label><b>Lieu :</b></label>
                        <input type="text" placeholder="place to be" name="picplace" >
                        <label><b>Comments :</b></label>
                        <textarea placeholder="tell all about your pic" name="piccomment"></textarea>
                        <br>
                        <label><b>Date de la photo :</b></label>
                        <input type="date" name="picdate" >  
                    </div>
                </div>
                <br><br>
                <input type="submit" value="submit">

                <!-- <div class="bouton">
                    <button id="btn">
                        <p id="btnText">ADD</p>
                        <div class="check-box">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50">
                                <path fill="transparent" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                            </svg>
                        </div>
                    </button>
                </div>
                <script type="text/javascript">
                    const btn = document.querySelector("#btn");
                    const btnText = document.querySelector("#btnText");
            
                    btn.onclick = () => {
                        btnText.innerHTML = "Thanks";
                        btn.classList.add("active");
                    };
                </script> -->
            </form>

        </div>

    </body>

</body>
</html>