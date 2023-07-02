<div class="container text-center">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Closing the account
                </div>
                <div class="card-body">
                    <form action="/account/destroy/<?= $account['id'] ?>" method="post">
                        <div class="mb-3 text-center">
                            <p>Do you really want to close this account?</p>
                            <h4>Name: <?= $account['name']  ?> </h4>
                            <h4>Surname: <?= $account['lastName']  ?></h4>
                            <h4>Account Number: <?= $account['accountNumber']  ?></h4>
                            <h4>Balance: <?= $account['balance']  ?> €</h4>
                        </div>
                        <div class="row"
                            style="display: flex; flex-direction: column; align-items: center; margin: 20px;">
                            <?php if ($account['balance'] > 0) : ?>
                            <div class="col-12" style="display:flex; flex-direction: column; align-items: center">
                                <a class="button red" href="/account/withdraw/<?= $account['id'] ?>">Withdraw funds
                                    before closing </a>
                                <?php endif ?>
                                <button type="submit" class="red mt-4" style="max-width: 120px;">Close account
                                    :(</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>