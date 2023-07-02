<body>
    <div class="container">
        <div class="col m-5">
            <h2>Edit account</h2>
        </div>
        <form action="/account/deposit/<?= $account['id'] ?>" method="post">
            <div>
                <label for="name">First Name</label>
                <input type="text" name="name" id="name" value="<?= $account['name'] ?>" required readonly>
            </div>
            <div>
                <label for="lastName">Surname</label>
                <input type="text" name="lastName" id="lastName" value="<?= $account['lastName'] ?>" required readonly>
            </div>
            <div>
                <label for="personalId">Personal ID</label>
                <input type="text" name="personalId" id="personalId" value="<?= $account['personalId'] ?>" required
                    readonly>
            </div>
            <div>
                <label for="accountNumber ">Account Number</label>
                <input type="text" name="accountNumber" id="accountNumber" value="<?= $account['accountNumber'] ?>"
                    required readonly>
            </div>
            <div>
                <label for="balance">Balance</label>
                <input type="text " name="balance" id="balance" value="<?= $account['balance'] ?>" required readonly>
            </div>
            <div>
                <label for="amount">Add amount</label>
                <input type="text " name="amount" id="amount" value="<?= $account['amount'] ?>" required>
            </div>

            <button class="btn btn-success" type="submit">Add</button>
    </div>
    </form>