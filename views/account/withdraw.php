<body>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            Withdraw money
                        </div>
                        <div class="card-body">
                            <form action="/account/updateDeduct/<?= $account['id'] ?>" method="post">
                                <div class="mb-3">
                                    <label class="form-label">Available funds: <?= $account['balance'] ?> €</label> <br>
                                    <label class="form-label" required>Enter amount</label>
                                    <input class="form-control" name="amount" type="number" placeholder="€">
                                </div>
                                <button type="submit" class="purple-gradient mt-4">Withdraw</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        </form>