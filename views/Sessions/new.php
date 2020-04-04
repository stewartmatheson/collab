<?php require __DIR__ . '/../empty_header.php' ?>

<div id="signup">

    <div class="highlight-color">
        <img src="/img/logo.svg"></img>
        <p>Login to collab.</p>
    </div>

    <div>
        <form method="POST" action="/?q=/sessions/create">
            <div>
                <div>
                    <label for="email">Email</label>
                </div>
                <input id="email" name="email" type="email" required />
            </div>


            <div>
                <div>
                    <label for="password">Password</label>
                </div>
                <input id="password" type="password" name="password" required minlength="4" maxlength="10" />
            </div>

            <div>
                <input class="highlight-color" type="submit" value="Login"/>
            </div>
        </form>
    </div>

</div>

<?php require __DIR__ . '/../empty_footer.php' ?>
