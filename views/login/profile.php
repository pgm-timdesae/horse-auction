<div class="profile-container h-layout">
    <section class="info">
        <h2>Welcome <?= $user->firstname;?>!</h2>
        <h3>this is your profile:</h3>
        <p>firstname: <?= $user->firstname; ?></p>
        <p>lastname: <?= $user->lastname; ?></p>
        <p>email: <?= $user->email; ?></p>
    </section>

    <section class="update">
        <h3>You can update your profile here</h3>

        <form method="POST">
            <label>
                <span>Firstname</span>
                <input type="text" name="firstname" maxlenght="128" placeholder="Tim"
                value="<?php echo $user->firstname ?? ''; ?>" required>
            </label>

            <label>
                <span>Lastname</span>
                <input type="text" name="lastname" maxlenght="128" placeholder="De Saeger"
                value="<?php echo $user->lastname ?? ''; ?>" required>
            </label>

            <label>
                <span>E-mail</span>
                <input type="email" name="email" maxlenght="256" placeholder="timdesaeger@hotmail.be"
                value="<?php echo $user->email ?? ''; ?>" required>
            </label>

            <label>
                <span>Password</span>
                <input type="password" name="password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;" required>
            </label>

            <label>
                <span>Re-enter Password</span>
                <input type="password" name="password2" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;" required>
            </label>

            <button type="submit" class="secondary-btn" name="update-user">update</button>
        </form>
    </section>

    <section class="delete">
        <h3>Delete my account</h3>
        <button type="submit" class="secondary-btn" name="delete-user">delete</button>
    </section>
    
</div>