<?php require __DIR__ . '/../empty_header.php' ?>

<div id="signup">

    <div class="highlight-color">
        <img src="/img/logo.svg"></img>
        <p>Welcome to collab. The ethical software collabration platform with a difference. You should signup today.</p>
    </div>

    <div>
        <form method="POST" action="/?q=/users/create">
            <div>
                <div>
                    <label for="email">Email</label>
                </div>
                <input id="email" name="email" type="email" required />
            </div>

            <div>
                <div>
                    <label for="firstName">First Name</label>
                </div>
                <input id="firstName" name="firstName" required />
            </div>

            <div>
                <div>
                    <label for="lastName">Last Name</label>
                </div>
                <input id="lastName" name="lastName" required />
            </div>

            <div>
                <div>
                    <label for="password">Password</label>
                </div>
                <input id="password" type="password" name="password" required minlength="4" maxlength="10" />
            </div>

            <div>
                <div>
                    <label for="passwordConfirm">Password Confirm</label>
                </div>
                <input id="passwordConfirm" type="password" name="passwordConfirm" required minlength="4" maxlength="10" />
            </div>

            <div>
                <input class="highlight-color" type="submit" value="Start Collab Now!"/>
            </div>
        </form>
    </div>

</div>


<?php require __DIR__ . '/../empty_footer.php' ?>
