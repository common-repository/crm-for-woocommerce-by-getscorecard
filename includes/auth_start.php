<?php
$callback_uri = site_url() . '/wp-admin/admin.php?page=woocommerce-gs-crm&action=auth_callback';
$oauth_redirect_uri = site_url() . '/wp-admin/admin.php?page=woocommerce-gs-crm&action=auth_redirect';

include('_getscorecard_banner.php');
include('_scripts_init.php'); ?>

<div id="container_woo_gs_crm">
    <div id="woo_gs_crm_toleft">
            <div class="first_step_woo_gs_crm">

                <div id="woo_gs_crm_welcome">
                    <p>
                        CRM for WooCommerce is an add-on solution for WooCommerce users to enhance their contact form capabilities with GetScorecard Proactive CRM. Once integrated, you can add data to you GetScorecard account.
                    </p>

                    <br>
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/ZnnoSZp8Idc" frameborder="0" allowfullscreen></iframe>
                    <br>
                    <br>

                    <button id="woo_gs_crm_button_no" class="btn_woo_gs_crm_sign_up">
                        Set Up Free Account
                    </button>

                    <!-- register form -->
                    <?php
                    $registerFormStyle = 'display:none';
                    if(isset($_GET['error']) && $_GET['error']=='create_account_error'){
                        $register_error = true;
                        $message = isset($_GET['message']) ? $_GET['message'] : 'Can\'t create account';
                        $registerFormStyle = 'display:block';
                    }
                    ?>

                    <div id="register_form" style="<?php echo $registerFormStyle; ?>">
                        <h3><?php echo WOO_GS_GETSCORECARD_WEBSITE_LABEL; ?> Register</h3>

                        <?php if($register_error): ?>
                            <div class="advice_notice_custom_alert"><?php echo $message; ?></div>
                        <?php endif; ?>

                        <form method="post" action="<?php echo WOO_GS_GETSCORECARD_BASE_URL; ?>/register/user_register_api.php" id="woo_gs_registerform" name="woo_gs_registerform">
                            <table class="form-table">
                                <tr>
                                    <th><label class="labelform" for="login_name">Full Name</label><br>
                                    <td><input class="inputform" id="login_name" type="text" aria-required="true" value="" name="fullname"></td>
                                </tr>
                                <tr>
                                    <th><label class="labelform" for="login_email">Email</label><br>
                                    <td><input class="inputform" id="login_email" type="email" aria-required="true" value="" name="emailaddress"></td>
                                </tr>
                                <tr>
                                    <th><label class="labelform" for="user_pass">Password</label></th>
                                    <td><input id="user_pass" class="inputform" type="password" value="" name="password"></td>
                                </tr>

                                <tr><th></th>
                                    <td>
                                        <input type="hidden" name="plugin_signIn" value="1">
                                        <input type="hidden" name="plugin_type" value="contact-form-7-getscorecard">
                                        <input type="hidden" name="registerType" value="contact-form-7-getscorecard">

                                        <input type="hidden" name="form_version" value="2">

                                        <input type="hidden" name="return_url" value="<?php echo WOO_GS_ADMIN_AJAX_URL; ?>admin.php?page=woocommerce-gs-crm">

                                        <input type="hidden" name="callback_uri" value="<?php echo $callback_uri; ?>">
                                        <input type="hidden" name="oauth_redirect_uri" value="<?php echo $oauth_redirect_uri; ?>">

                                        <input id="registerbtn" class="action_red_button" value="Register" type="submit">
                                    </td>
                                </tr>

                            </table>
                        </form>
                    </div>
                    <!---->

                    <br>
                    <br>

                    <button id="woo_gs_crm_button_yes" class="btn_woo_gs_crm_sign_in" type="button" >
                        Login
                    </button>

                    <br>
                    <br>

                    <?php
                    $loginFormStyle = 'display:none';
                    if(isset($_GET['error']) && $_GET['error']=='authorize_error'){
                        $authorize_error = true;
                        $loginFormStyle = 'display:block';
                    }

                    if(isset($_GET['status']) && $_GET['status']=='authCanceled'){
                        $auth_canceled = true;
                        $loginFormStyle = 'display:block';
                    }
                    ?>

                    <!-- login form -->
                    <div id="login_form" style="<?php echo $loginFormStyle; ?>">
                        <h3><?php echo WOO_GS_GETSCORECARD_WEBSITE_LABEL; ?> Login</h3>

                        <?php if($authorize_error): ?>
                            <div class="advice_notice_custom_alert">Wrong email or password</div>
                        <?php endif; ?>

                        <?php if($auth_canceled): ?>
                            <div class="advice_notice_custom_alert">Authorization canceled by user</div>
                        <?php endif; ?>

                        <form method="post" action="<?php echo WOO_GS_GETSCORECARD_BASE_URL; ?>/login-process.php" id="gs_loginform" name="gs_loginform">
                            <table class="form-table">
                                <tr>
                                    <th><label class="labelform" for="login_email">Email</label><br>
                                    <td><input class="inputform" id="login_email" type="email" aria-required="true" value="" name="email"></td>
                                </tr>
                                <tr>
                                    <th><label class="labelform" for="user_pass">Password</label></th>
                                    <td><input id="user_pass" class="inputform" type="password" value="" name="password"></td>
                                </tr>

                                <tr><th></th>
                                    <td>
                                        <input type="hidden" name="plugin_signIn" value="1">
                                        <input type="hidden" name="plugin_type" value="contact-form-7-getscorecard">
                                        <input type="hidden" name="return_url" value="<?php echo WOO_GS_ADMIN_AJAX_URL; ?>admin.php?page=woocommerce-gs-crm">

                                        <input type="hidden" name="callback_uri" value="<?php echo $callback_uri; ?>">
                                        <input type="hidden" name="oauth_redirect_uri" value="<?php echo $oauth_redirect_uri; ?>">

                                        <input id="loginbtn" class="action_blue_button" value="Login" type="submit">
                                    </td>
                                </tr>

                            </table>
                        </form>
                    </div>
                    <!---->

                    <a href="<?php echo WOO_GS_GETSCORECARD7_GS_BASE_URL; ?>" target="_blank">
                        <button class="btn_woo_gs_crm_open_gs_link" type="button" >
                            Open GetScorecard
                        </button>
                    </a>
                </div>
            </div>
    </div>
</div>