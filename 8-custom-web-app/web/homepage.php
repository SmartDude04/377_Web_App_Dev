
<!-- Main heading and description -->
<div class="heading">
    <img src="img/homepage-heading.png" alt="TPM - A Terrible Password Manager" id="homepage-heading">
</div>

<div class="desc">
    <h1 id="desc-header">The only password manager you can trust.</h1>
    <p>
        In the modern age where quantum computing will soon break most encryption, why want a password manager that relies on frankly
        old tech? TPM is the first password manager to revolutionize the structure of a password manager. Say goodbye to logging in - 
        with TPM all your passwords are always accessible to the end user. And, with passwords being unencrypted in the database, 
        you can rest easy knowing you can access your login info even if you don't feel like going to the website.
    </p>
</div>

<img src="img/wave-transition.svg" alt="" class="transition">

<div class="get-started">
    <h1 id="started-title">Get Started</h1>
    <div id="get-started-container">
        <h1 class="started-text">Access Your Vault: </h1>
        <a class="started-button" href="https://google.com">My Vault</a>

        <h1 class="started-text">Explore the password generator: </h1>
        <button class="started-button">Generator</button>

        <h1 class="started-text">Create new passwords:  </h1>
        <button class="started-button" type="button">New</button>
    </div>
</div>

<?php

$conn = dbConnect();

