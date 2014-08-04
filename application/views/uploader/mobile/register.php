<body>

<!-- Page starts here -->
    <div data-role="page" data-theme="b" id="registration">

        <div data-role="header" id="hdrMain" name="hdrMain" data-nobackbtn="true">
            <h1>Geek Overload Registration</h1>
        </div>

        <div data-role="content" id="contentMain" name="contentMain">
<form action="<?php echo site_url();?>login/register" method="post" name='register' data-ajax="false">
    <div data-role="fieldcontain">
        <label for="txtEmail" id="labelEmail">First Name:*</label>
        <input type="text" name="firstname" id="firstName" value="" data-mini="true" />
    </div>
    <div data-role="fieldcontain">
        <label for="txtEmail" id="labelEmail">Last Name:*</label>
        <input type="text" name="lastname" id="lastName" value="" data-mini="true" />
    </div>
    <div data-role="fieldcontain">
        <label for="txtEmail" id="labelEmail">Email:*</label>
        <input type="email" name="email" id="loginEmail" value="" data-mini="true" placeholder="email"  />
    </div>
    <div data-role="fieldcontain">
        <label for="txtEmail" id="labelEmail">Phone:*</label>
        <input type="tel" name="phone" id="txtEmail" value="" data-mini="true" />
    </div>
    <div data-role="fieldcontain">
        <label for="txtEmail" id="labelEmail">Password:*</label>
        <input type="password" name="password" id="loginPass" value="" data-mini="true" placeholder="Password"/>
    </div>
    <div data-role="fieldcontain" style="text-align: center;">
        <input type="submit" name="btnRegister" value="Register Now" />
    </div>
</form>
</div>
        <!-- contentMain -->
        <div data-role="footer">
<h4><a href="<?php echo site_url();?>login/go">Login</a></h4>
</div>
</div>