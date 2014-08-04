<body>

    <!-- Page starts here -->
    <div data-role="page" data-theme="b" id="login">

        <div data-role="header" id="hdrMain" name="hdrMain" data-nobackbtn="true">
            <h1>Geek Overload Login</h1>
        </div>

        <div data-role="content" id="contentMain" name="contentMain">
<form action="<?php echo site_url();?>login/go" method="post" name='go' data-ajax="false">
    
    <div data-role="fieldcontain">
        <label for="txtEmail" id="labelEmail">Email:*</label>
        <input type="email" name="email" id="loginEmail" value="" data-mini="true" placeholder="E-mail"  />
    </div>
    
    <div data-role="fieldcontain">
        <label for="password" id="labelEmail">Password:*</label>
        <input type="password" name="password" id="loginPass" value="" data-mini="true" placeholder="Password"  />
    </div>
    <div data-role="fieldcontain" style="text-align: center;">
        <input type="submit" name="btnRegister" value="Login" />
    </div>
</form>
</div>
        <!-- contentMain -->
        <div data-role="footer">
<h4><a href="<?php echo site_url();?>login/register">Register</a></h4>
</div>
</div>

    