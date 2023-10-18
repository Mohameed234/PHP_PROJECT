
<nav class="navbar navbar-expand-lg bg-body-tertiary"  >
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php"> <b>PHP PROJECT</b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">HOME</a>
            </li>
            <?php  if(!isset($_SESSION['auth'])): ?>
            <li class="nav-item">
            <a class="nav-link" href="login.php">LOGIN</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="register.php">REGISTER</a>
            </li>
            <?php else:?>
            <li class="nav-item">
            <a class="nav-link" href="profile.php">PROFILE</a>
            </li>
            <?php endif;?>
        </ul>

        <?php  if(isset($_SESSION['auth'])): ?>
       <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="logout.php">LOGOUT</a>
            </li>
       </ul>
       <?php endif;?>
        </div>
    </div>
    </nav>