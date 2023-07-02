<body>


    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card m-5">
                    <h5 class="card-header">Current accounts</h5>

                    <div class="card-body">
                        <ul class="ul-style list-group list-group-flush">
                            <?php if (empty($accounts)) : ?>
                            <p>Bank is empty. Start by creating a new account</p>
                            <?php else : ?>
                            <?php foreach ($accounts as $account) : ?>
                            <li>
                                <div class="card inner-card m-5">
                                    <div class="card-body inner-card-body">
                                        <div class="acc-list">
                                            <div class="account">
                                                <div>
                                                    <p class="acc-titles">Name:</p>
                                                    <p><?= $account['name'] ?></p>
                                                </div>
                                                <div>
                                                    <p class="acc-titles">Surname:</p>
                                                    <p><?= $account['lastName'] ?></p>
                                                </div>
                                                <div>
                                                    <p class="acc-titles">Personal ID:</p>
                                                    <p><?= $account['personalId'] ?></p>
                                                </div>
                                                <div>
                                                    <p class="acc-titles">Account No:</p>
                                                    <p><?= $account['accountNumber'] ?></p>
                                                </div>
                                                <div>
                                                    <p class="acc-titles">Funds:</p>
                                                    <p><?= $account['balance'] ?></p>
                                                </div>
                                                <div class="acc-fields">
                                                    <a href="/account/deposit/<?= $account['id'] ?>" role="button"
                                                        class="button purple-gradient">Deposit</a>
                                                    <a href="/account/withdraw/<?= $account['id'] ?>" role="button"
                                                        class="button purple-gradient">Withdraw</a>
                                                    <a href="/account/edit/<?= $account['id'] ?>" role="button"
                                                        class="button purple-gradient">Edit</a>

                                                </div>
                                                <div class="acc-fields">
                                                    <a class="button red"
                                                        href="/account/delete/<?= $account['id'] ?>">Close account</a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <?php endif ?>
</body>