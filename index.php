<?php

require_once "./vendor/autoload.php";

require_once "./template/header.php";

use puresoft\jibimo\payment\values\JibimoPrivacyLevel; ?>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">Jibimo API PHP Library Sample</h1>
        <p class="lead">Quickly and easily build awesome services and applications using simple and straightforward
            Jibimo PHP library.</p>
    </div>

    <div class="container">

        <script>
            function copyTokenValue(textArea) {
                const token = textArea.value;
                document.getElementById("requestTokenInput").value = token;
                document.getElementById("payTokenInput").value = token;
                document.getElementById("extendedPayTokenInput").value = token;
                document.getElementById("validateRequestTokenInput").value = token;
                document.getElementById("validatePayTokenInput").value = token;
                document.getElementById("validateExtendedPayTokenInput").value = token;
            }
        </script>
        <div class="form-group">
            <label for="tokenTextArea">Your API Token</label>
            <textarea class="form-control" id="tokenTextArea" rows="3" onchange="copyTokenValue(this);"></textarea>
        </div>
        <div class="card-deck mb-3 text-center">
            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Request Money</h4>
                </div>
                <div class="card-body">

                    <!-- Request money form -->
                    <form method="post" action="request-money.php" target="_blank">

                        <input type="hidden" name="token" id="requestTokenInput">

                        <div class="form-group">
                            <label for="requestMobileInput">Mobile number</label>
                            <input type="text" class="form-control" name="mobile" id="requestMobileInput" aria-describedby="requestMobileHelp" placeholder="Enter mobile number of user" required>
                            <small id="requestMobileHelp" class="form-text text-muted">This mobile number will be used to request money from.</small>
                        </div>

                        <div class="form-group">
                            <label for="requestAmountInput">Amount in Toman</label>
                            <input type="number" class="form-control" name="amount" id="requestAmountInput" aria-describedby="requestAmountHelp" placeholder="Enter amount of transaction in Toman" required>
                            <small id="requestAmountHelp" class="form-text text-muted">This amount must be in Toman.</small>
                        </div>

                        <div class="form-group">
                            <label for="requestPrivacyInput">Jibimo Privacy Level</label>
                            <select class="form-control" id="requestPrivacySelect" name="privacy">
                                <option><?= JibimoPrivacyLevel::PERSONAL ?></option>
                                <option><?= JibimoPrivacyLevel::FRIEND ?></option>
                                <option><?= JibimoPrivacyLevel::PUBLIC ?></option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="requestTrackerInput">Tracker ID</label>
                            <input type="text" class="form-control" name="tracker" id="requestTrackerInput" aria-describedby="requestTrackerHelp" placeholder="Enter your tracker ID" value="<?= uniqid() ?>" required>
                            <small id="requestTrackerHelp" class="form-text text-muted">This tracker ID is something like factor ID in your system.</small>
                        </div>

                        <div class="form-group">
                            <label for="requestDescriptionInput">Description (Optional)</label>
                            <input type="text" class="form-control" name="description" id="requestDescriptionInput" aria-describedby="requestDescriptionHelp" placeholder="Enter transaction description here">
                            <small id="requestDescriptionHelp" class="form-text text-muted">Use emojies like 👍 , 🎁 and 😃 to make your transaction look beautiful in Jibimo.</small>
                        </div>

                        <button type="submit" class="btn btn-lg btn-block btn-outline-primary">Request Money</button>
                    </form>
                </div>
            </div>
            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Pay Money</h4>
                </div>
                <div class="card-body">
                    <!-- Pay form -->
                    <form method="post" action="pay-money.php" target="_blank">

                        <input type="hidden" name="token" id="payTokenInput">

                        <div class="form-group">
                            <label for="payMobileInput">Mobile number</label>
                            <input type="text" class="form-control" name="mobile" id="payMobileInput" aria-describedby="payMobileHelp" placeholder="Enter mobile number of user" required>
                            <small id="payMobileHelp" class="form-text text-muted">This mobile number will be used to pay your money to.</small>
                        </div>

                        <div class="form-group">
                            <label for="payAmountInput">Amount in Toman</label>
                            <input type="number" class="form-control" name="amount" id="payAmountInput" aria-describedby="payAmountHelp" placeholder="Enter amount of transaction in Toman" required>
                            <small id="payAmountHelp" class="form-text text-muted">This amount must be in Toman.</small>
                        </div>

                        <div class="form-group">
                            <label for="payPrivacyInput">Jibimo Privacy Level</label>
                            <select class="form-control" id="payPrivacySelect" name="privacy">
                                <option><?= JibimoPrivacyLevel::PERSONAL ?></option>
                                <option><?= JibimoPrivacyLevel::FRIEND ?></option>
                                <option><?= JibimoPrivacyLevel::PUBLIC ?></option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="payTrackerInput">Tracker ID</label>
                            <input type="text" class="form-control" name="tracker" id="payTrackerInput" aria-describedby="payTrackerHelp" placeholder="Enter your tracker ID" value="<?= uniqid() ?>" required>
                            <small id="payTrackerHelp" class="form-text text-muted">This tracker ID is something like factor ID in your system.</small>
                        </div>

                        <div class="form-group">
                            <label for="payDescriptionInput">Description (Optional)</label>
                            <input type="text" class="form-control" name="description" id="payDescriptionInput" aria-describedby="payDescriptionHelp" placeholder="Enter transaction description here">
                            <small id="payDescriptionHelp" class="form-text text-muted">Use emojies like 👍 , 🎁 and 😃 to make your transaction look beautiful in Jibimo.</small>
                        </div>

                        <div class="alert alert-primary" role="alert">
                            Make sure your business account has enough balance to perform the transaction.
                        </div>

                        <button type="submit" class="btn btn-lg btn-block btn-warning">Pay Money</button>
                    </form>

                </div>
            </div>
            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Extended Pay AKA Direct Pay</h4>
                </div>
                <div class="card-body">
                    <!-- Extended pay form -->
                    <form method="post" action="extended-pay.php" target="_blank">

                        <input type="hidden" name="token" id="extendedPayTokenInput">

                        <div class="form-group">
                            <label for="extendedPayMobileInput">Mobile number</label>
                            <input type="text" class="form-control" name="mobile" id="extendedPayMobileInput" aria-describedby="extendedPayMobileHelp" placeholder="Enter mobile number of user" required>
                            <small id="extendedPayMobileHelp" class="form-text text-muted">This mobile number will be used to pay your money to.</small>
                        </div>

                        <div class="form-group">
                            <label for="extendedPayAmountInput">Amount in Toman</label>
                            <input type="number" class="form-control" name="amount" id="extendedPayAmountInput" aria-describedby="extendedPayAmountHelp" placeholder="Enter amount of transaction in Toman" required>
                            <small id="extendedPayAmountHelp" class="form-text text-muted">This amount must be in Toman.</small>
                        </div>

                        <div class="form-group">
                            <label for="extendedPayPrivacyInput">Jibimo Privacy Level</label>
                            <select class="form-control" id="extendedPayPrivacySelect" name="privacy">
                                <option><?= JibimoPrivacyLevel::PERSONAL ?></option>
                                <option><?= JibimoPrivacyLevel::FRIEND ?></option>
                                <option><?= JibimoPrivacyLevel::PUBLIC ?></option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="extendedPayTrackerInput">Tracker ID</label>
                            <input type="text" class="form-control" name="tracker" id="extendedPayTrackerInput" aria-describedby="extendedPayTrackerHelp" placeholder="Enter your tracker ID" value="<?= uniqid() ?>" required>
                            <small id="extendedPayTrackerHelp" class="form-text text-muted">This tracker ID is something like factor ID in your system.</small>
                        </div>

                        <div class="form-group">
                            <label for="extendedPayDescriptionInput">Description (Optional)</label>
                            <input type="text" class="form-control" name="description" id="extendedPayDescriptionInput" aria-describedby="extendedPayDescriptionHelp" placeholder="Enter transaction description here">
                            <small id="extendedPayDescriptionHelp" class="form-text text-muted">Use emojies like 👍 , 🎁 and 😃 to make your transaction look beautiful in Jibimo.</small>
                        </div>

                        <div class="form-group">
                            <label for="extendedPayNameInput">Name (Optional)</label>
                            <input type="text" class="form-control" name="name" id="extendedPayNameInput" aria-describedby="extendedPayNameHelp" placeholder="Enter first name of user here">
                            <small id="extendedPayNameHelp" class="form-text text-muted">This should be the name of IBAN (Sheba) owner.</small>
                        </div>

                        <div class="form-group">
                            <label for="extendedPayFamilyInput">Family (Optional)</label>
                            <input type="text" class="form-control" name="family" id="extendedPayFamilyInput" aria-describedby="extendedPayFamilyHelp" placeholder="Enter last name of user here">
                            <small id="extendedPayFamilyHelp" class="form-text text-muted">This should be the family of IBAN (Sheba) owner.</small>
                        </div>

                        <div class="form-group">
                            <label for="extendedPayIbanInput">IBAN (Sheba)</label>
                            <input type="text" class="form-control" name="iban" id="extendedPayIbanInput" aria-describedby="extendedPayIbanHelp" placeholder="Enter IBAN (Sheba) number of user who you want tot pay to here" required>
                            <small id="extendedPayIbanHelp" class="form-text text-muted">This is a 26 character string which will start with `IR`.</small>
                        </div>

                        <div class="alert alert-primary" role="alert">
                            Make sure your business account has enough balance to perform the transaction.
                        </div>

                        <button type="submit" class="btn btn-lg btn-block btn-warning">Directly Pay Money</button>
                    </form>

                </div>
            </div>
        </div>


    <!-- Validations -->

    <div class="card-deck mb-3 text-center">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">Validate Request Money</h4>
            </div>
            <div class="card-body">

                <!-- Request validation form -->
                <form method="post" action="validate-request-money.php" target="_blank">

                    <input type="hidden" name="token" id="validateRequestTokenInput">

                    <div class="form-group">
                        <label for="validateRequestTransactionIdInput">Transaction ID</label>
                        <input type="text" class="form-control" name="id" id="validateRequestTransactionIdInput" aria-describedby="validateRequestTransactionIdHelp" placeholder="Enter transaction ID here" required>
                        <small id="validateRequestTransactionIdHelp" class="form-text text-muted">This is the transaction ID which you want to validate.</small>
                    </div>

                    <div class="form-group">
                        <label for="validateRequestMobileInput">Mobile number</label>
                        <input type="text" class="form-control" name="mobile" id="validateRequestMobileInput" aria-describedby="validateRequestMobileHelp" placeholder="Enter mobile number of user" required>
                        <small id="validateRequestMobileHelp" class="form-text text-muted">This should be the mobile number that was used in transaction.</small>
                    </div>

                    <div class="form-group">
                        <label for="validateRequestAmountInput">Amount in Toman</label>
                        <input type="number" class="form-control" name="amount" id="validateRequestAmountInput" aria-describedby="validateRequestAmountHelp" placeholder="Enter amount of transaction in Toman" required>
                        <small id="validateRequestAmountHelp" class="form-text text-muted">This should be the same amount that was used in transaction.</small>
                    </div>

                    <div class="form-group">
                        <label for="validateRequestTrackerInput">Tracker ID</label>
                        <input type="text" class="form-control" name="tracker" id="validateRequestTrackerInput" aria-describedby="validateRequestTrackerHelp" placeholder="Enter your tracker ID" required>
                        <small id="validateRequestTrackerHelp" class="form-text text-muted">This should be the same tracker ID that was used in transaction.</small>
                    </div>

                    <button type="submit" class="btn btn-lg btn-block btn-outline-success">Validate Request Money</button>
                </form>
            </div>
        </div>
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">Validate Pay Money</h4>
            </div>
            <div class="card-body">
                <!-- Pay validation form -->
                <form method="post" action="validate-pay-money.php" target="_blank">

                    <input type="hidden" name="token" id="validatePayTokenInput">

                    <div class="form-group">
                        <label for="validatePayTransactionIdInput">Transaction ID</label>
                        <input type="text" class="form-control" name="id" id="validatePayTransactionIdInput" aria-describedby="validatePayTransactionIdHelp" placeholder="Enter transaction ID here" required>
                        <small id="validatePayTransactionIdHelp" class="form-text text-muted">This is the transaction ID which you want to validate.</small>
                    </div>

                    <div class="form-group">
                        <label for="validatePayMobileInput">Mobile number</label>
                        <input type="text" class="form-control" name="mobile" id="validatePayMobileInput" aria-describedby="validatePayMobileHelp" placeholder="Enter mobile number of user" required>
                        <small id="validatePayMobileHelp" class="form-text text-muted">This should be the mobile number that was used in transaction.</small>
                    </div>

                    <div class="form-group">
                        <label for="validatePayAmountInput">Amount in Toman</label>
                        <input type="number" class="form-control" name="amount" id="validatePayAmountInput" aria-describedby="validatePayAmountHelp" placeholder="Enter amount of transaction in Toman" required>
                        <small id="validatePayAmountHelp" class="form-text text-muted">This should be the same amount that was used in transaction.</small>
                    </div>

                    <div class="form-group">
                        <label for="validatePayTrackerInput">Tracker ID</label>
                        <input type="text" class="form-control" name="tracker" id="validatePayTrackerInput" aria-describedby="validatePayTrackerHelp" placeholder="Enter your tracker ID" required>
                        <small id="validatePayTrackerHelp" class="form-text text-muted">This should be the same tracker ID that was used in transaction.</small>
                    </div>

                    <button type="submit" class="btn btn-lg btn-block btn-outline-success">Validate Pay</button>
                </form>

            </div>
        </div>
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">Validate Extended Pay</h4>
            </div>
            <div class="card-body">
                <!-- Extended pay validation form -->
                <form method="post" action="validate-extended-pay.php" target="_blank">

                    <input type="hidden" name="token" id="validateExtendedPayTokenInput">

                    <div class="form-group">
                        <label for="validatePayTransactionIdInput">Transaction ID</label>
                        <input type="text" class="form-control" name="id" id="validateExtendedPayTransactionIdInput" aria-describedby="validateExtendedPayTransactionIdHelp" placeholder="Enter transaction ID here" required>
                        <small id="validateExtendedPayTransactionIdHelp" class="form-text text-muted">This is the transaction ID which you want to validate.</small>
                    </div>

                    <div class="form-group">
                        <label for="validateExtendedPayMobileInput">Mobile number</label>
                        <input type="text" class="form-control" name="mobile" id="validateExtendedPayMobileInput" aria-describedby="validateExtendedPayMobileHelp" placeholder="Enter mobile number of user" required>
                        <small id="validateExtendedPayMobileHelp" class="form-text text-muted">This should be the mobile number that was used in transaction.</small>
                    </div>

                    <div class="form-group">
                        <label for="validateExtendedPayAmountInput">Amount in Toman</label>
                        <input type="number" class="form-control" name="amount" id="validateExtendedPayAmountInput" aria-describedby="validateExtendedPayAmountHelp" placeholder="Enter amount of transaction in Toman" required>
                        <small id="validateExtendedPayAmountHelp" class="form-text text-muted">This should be the same amount that was used in transaction.</small>
                    </div>

                    <div class="form-group">
                        <label for="validateExtendedPayTrackerInput">Tracker ID</label>
                        <input type="text" class="form-control" name="tracker" id="validateExtendedPayTrackerInput" aria-describedby="validateExtendedPayTrackerHelp" placeholder="Enter your tracker ID" required>
                        <small id="validateExtendedPayTrackerHelp" class="form-text text-muted">This should be the same tracker ID that was used in transaction.</small>
                    </div>

                    <button type="submit" class="btn btn-lg btn-block btn-outline-success">Validate Direct Pay</button>
                </form>

            </div>
        </div>
    </div>

<?php

require_once "./template/footer.php";