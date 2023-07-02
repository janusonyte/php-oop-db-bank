<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Deposit money
                    </div>
                    <div class="card-body">
                        <form action="/account/updateAdd/<?= $account['id'] ?>" method="post">
                            <div class="mb-3">
                                <label class="form-label">Current funds: <?= $account['balance'] ?> €</label> <br>
                                <label class="form-label" required>Enter amount</label>
                                <input class="form-control" name="amount" type="number">
                            </div>
                            <button type="submit" class="purple-gradient mt-4">Deposit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    </form>