<?php if (!isset($_SESSION['email'])) : ?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Login
                    </div>
                    <div class="card-body">
                        <form action="<?= '/login' ?>" method="post">
                            <div class="mb-3">
                                <label class="form-label">Your email address</label>
                                <input type="email" class="form-control" name="email" placeholder="email@example.com"
                                    value="<?= $old['email'] ?? '' ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Your password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password">

                            </div>
                            <button type="submit" class="purple-gradient mt-4">Log in</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </form>

    <?php endif ?>