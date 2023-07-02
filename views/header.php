<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="./">
            PHP Sunset Bank
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav" style="display: flex; flex-direction: row; justify-content: space-around;">
                <?php if (isset($_SESSION['email'])) : ?>
                <form action="<?= URL . 'logout' ?>" method="post" style="display: flex; flex-direction: row; ">
                    <button type="submit" class="red"
                        style="display: flex; flex-direction: row; justify-content: flex-end; ">Logout</button>
                </form>
                <div style="display: flex; flex-direction: row; justify-content: center; align-items: center">
                    <a class="nav-link " href="/account/create">Add a new account</a>
                    <a class="nav-link " href="/account">Account list</a>
                </div>


                <?php endif ?>
            </div>
        </div>
    </div>
</nav>