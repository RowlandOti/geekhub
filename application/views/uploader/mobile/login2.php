<body>

    <!-- Page starts here -->
    <div data-role="page" data-theme="b" id="page1">

        <div data-role="header" id="hdrMain" name="hdrMain" data-nobackbtn="true">
            <h1>Geek Overload Login</h1>
        </div>

        <div data-role="content" id="contentMain" name="contentMain">

            <form id="form1">

               
                <div id="fnameDiv" data-role="fieldcontain">
                    <label for="fname" id="fnameLabel" name="fnameLabel">First name*</label>
                    <input id="fname" name="fname_r" type="text" />
                </div>

                <div id="lnameDiv" data-role="fieldcontain">
                    <label for="lname">Last name*</label>
                    <input id="lname" name="lname_r" type="text" />
                </div>

                <div id="emailDiv" data-role="fieldcontain">
                    <label for="email">Email*</label>
                    <input id="email" name="email_r" type="text" />
                </div>

                <div id="phoneDiv" data-role="fieldcontain">
                    <label for="phone">Phone</label>
                    <input id="phone" name="phone" type="text" />
                </div>


                <div id="streetDiv" data-role="fieldcontain">
                    <label for="street">Password*</label>
                    <input id="street" name="street_r" type="text" />
                </div>

                <!--<div id="cityDiv" data-role="fieldcontain">
                    <label for="city">City*</label>
                    <input id="city" name="city_r" type="text" />
                </div>
                <div id="stateDiv" data-role="fieldcontain">
                    <label id="stateLabel" for="state">State*</label>
                    <select id="state" name="state_r" tabindex="2">
                        <option value="ZZ">Please select a state</option>
                        <option value="AL">Alabama</option>
                        <option value="AK">Alaska</option>
                        <option value="AZ">Arizona</option>
                        <option value="AR">Arkansas</option>
                        <option value="CA">California</option>
                        <option value="CO">Colorado</option>
                        <option value="CT">Connecticut</option>
                        <option value="DE">Delaware</option>
                        <option value="FL">Florida</option>
                        <option value="GA">Georgia</option>
                        <option value="HI">Hawaii</option>
                        <option value="ID">Idaho</option>
                        <option value="IL">Illinois</option>
                        <option value="IN">Indiana</option>
                        <option value="IA">Iowa</option>
                        <option value="KS">Kansas</option>
                        <option value="KY">Kentucky</option>
                        <option value="LA">Louisiana</option>
                        <option value="ME">Maine</option>
                        <option value="MD">Maryland</option>
                        <option value="MA">Massachusetts</option>
                        <option value="MI">Michigan</option>
                        <option value="MN">Minnesota</option>
                        <option value="MS">Mississippi</option>
                        <option value="MO">Missouri</option>
                        <option value="MT">Montana</option>
                        <option value="NE">Nebraska</option>
                        <option value="NV">Nevada</option>
                        <option value="NH">New Hampshire</option>
                        <option value="NJ">New Jersey</option>
                        <option value="NM">New Mexico</option>
                        <option value="NY">New York</option>
                        <option value="NC">North Carolina</option>
                        <option value="ND">North Dakota</option>
                        <option value="OH">Ohio</option>
                        <option value="OK">Oklahoma</option>
                        <option value="OR">Oregon</option>
                        <option value="PA">Pennsylvania</option>
                        <option value="RI">Rhode Island</option>
                        <option value="SC">South Carolina</option>
                        <option value="SD">South Dakota</option>
                        <option value="TN">Tennessee</option>
                        <option value="TX">Texas</option>
                        <option value="UT">Utah</option>
                        <option value="VT">Vermont</option>
                        <option value="VA">Virginia</option>
                        <option value="WA">Washington</option>
                        <option value="WV">West Virginia</option>
                        <option value="WI">Wisconsin</option>
                        <option value="WY">Wyoming</option>
                    </select>
                </div>

                <div id="zipDiv" data-role="fieldcontain">
                    <label for="zip">Postal code*</label>
                    <input id="zip" name="zip_r" type="text" />
                </div>

                <div id="whatDiv" data-role="fieldcontain">
                    <label id="whatLabel" for="what">Please explain what happened*:</label>
                    <textarea cols="40" rows="8" id="what" name="what_r"></textarea>
                </div>-->

                <div id="submitDiv" data-role="fieldcontain">
                    <input type="submit" value="Submit Claim" data-inline="true" />
                </div>
            </form>
        </div>
        <!-- contentMain -->

        <div data-role="footer" id="ftrMain" name="ftrMain"></div>

        <div align="CENTER" data-role="content" id="contentDialog" name="contentDialog">
            <div>Please fill in all required fields before submitting the form.</div>
            <a id="buttonOK" name="buttonOK" href="#page1" data-role="button" data-inline="true">OK</a>
        </div>
        <!-- contentDialog -->

        <!-- contentTransition is displayed after the form is submitted until a response is received back. -->
        <div data-role="content" id="contentTransition" name="contentTransition">
            <div align="CENTER">
                <h4>Your claim has been sent. Please wait.</h4>
            </div>
            <div align="CENTER">
                <img id="spin" name="spin" src="img/wait.gif" />
            </div>
        </div>
        <!-- contentTransition -->

        <!-- Although stored within page1 div tag, hdrConfirmation, contentConfirmation and ftrConfirmation represent a self contained 'confirmation page' -->
        <div data-role="header" id="hdrConfirmation" name="hdrConfirmation" data-nobackbtn="true">
            <h1>Claim Created</h1>
        </div>

        <div data-role="content" id="contentConfirmation" name="contentConfirmation" align="center">
            <p>A new claim has been created based on data you have submitted.</p>
            <p>Your confirmation number is: <span id="confirmation" name="confirmation"></span> 
            </p>
        </div>
        <!-- contentConfirmation -->

        <div data-role="footer" id="ftrConfirmation" name="ftrConfirmation"></div>


        <script>
            $(document).ready(function () {
                // Assign global variables
                hdrMainVar = $('#hdrMain');
                contentMainVar = $('#contentMain');
                ftrMainVar = $('#ftrMain');
                contentTransitionVar = $('#contentTransition');
                stateLabelVar = $('#stateLabel');
                whatLabelVar = $('#whatLabel');
                stateVar = $('#state');
                whatVar = $('#what');
                form1Var = $('#form1');
                confirmationVar = $('#confirmation');
                contentDialogVar = $('#contentDialog');
                hdrConfirmationVar = $('#hdrConfirmation');
                contentConfirmationVar = $('#contentConfirmation');
                ftrConfirmationVar = $('#ftrConfirmation');
                inputMapVar = $('input[name*="_r"]');

                hideContentDialog();
                hideContentTransition();
                hideConfirmation();
            });

            $('#buttonOK').click(function () {
                hideContentDialog();
                showMain();
                return false;
            });


            $('#form1').submit(function () {
                var err = false;
                // Hide the Main content
                hideMain();

                // Reset the previously highlighted form elements
                stateLabelVar.removeClass(MISSING);
                whatLabelVar.removeClass(MISSING);
                inputMapVar.each(function (index) {
                    $(this).prev().removeClass(MISSING);
                });

                // Perform form validation
                inputMapVar.each(function (index) {
                    if ($(this).val() == null || $(this).val() == EMPTY) {
                        $(this).prev().addClass(MISSING);
                        err = true;
                    }
                });
                if (stateVar.val() == NO_STATE) {
                    stateLabelVar.addClass(MISSING);
                    err = true;
                }
                if (whatVar.val() == null || whatVar.val() == EMPTY) {
                    whatLabelVar.addClass(MISSING);
                    err = true;
                }

                // If validation fails, show Dialog content
                if (err == true) {
                    showContentDialog();
                    return false;
                }

                // If validation passes, show Transition content
                showContentTransition();

                // Submit the form
                $.post("/forms/requestProcessor.php", form1Var.serialize(), function (data) {
                    confirmationVar.text(data);
                    hideContentTransition();
                    showConfirmation();
                });
                return false;
            });

            function hideMain() {
                hdrMainVar.hide();
                contentMainVar.hide();
                ftrMainVar.hide();
            }

            function showMain() {
                hdrMainVar.show();
                contentMainVar.show();
                ftrMainVar.show();
            }

            function hideContentTransition() {
                contentTransitionVar.hide();
            }

            function showContentTransition() {
                contentTransitionVar.show();
            }

            function hideContentDialog() {
                contentDialogVar.hide();
            }

            function showContentDialog() {
                contentDialogVar.show();
            }

            function hideConfirmation() {
                hdrConfirmationVar.hide();
                contentConfirmationVar.hide();
                ftrConfirmationVar.hide();
            }

            function showConfirmation() {
                hdrConfirmationVar.show();
                contentConfirmationVar.show();
                ftrConfirmationVar.show();
            }
        </script>
    </div>
    <!-- page1 -->