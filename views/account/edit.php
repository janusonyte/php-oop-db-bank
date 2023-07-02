<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Edit account
                    </div>
                    <div class="card-body">
                        <form action="/account/update/<?= $account['id'] ?>" method="post">
                            <div class="mb-3">
                                <label for="name">First Name</label>
                                <input type="text" name="name" id="name" value="<?= $account['name'] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="lastName">Surname</label>
                                <input type="text" name="lastName" id="lastName" value="<?= $account['lastName'] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="accountNumber ">Account Number</label>
                                <input type="text" name="accountNumber" id="accountNumber" value="<?= $account['accountNumber'] ?>" required readonly>
                            </div>
                            <div class="mb-3">
                                <label for="personalId">Personal ID</label>
                                <input type="text" name="personalId" id="personalId" value="<?= $account['personalId'] ?>" required readonly>
                            </div>
                            <div class="mb-3">
                                <label for="balance">Balance</label>
                                <input type="text " name="balance" id="balance" value="<?= $account['balance'] ?>" required readonly>
                            </div>
                            <button type="submit" class="purple-gradient mt-4">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    </form>