<?php
$userId = $apiClient->getOption(WooCommerceGetScorecardApi::OPTION_USER_ID);
$userInfo = $apiClient->getUserById($userId);
$userInfoLabels = $apiClient->getUserInfoLabels();

include('_getscorecard_banner.php');
include('_scripts_init.php'); ?>

<div id="container_woo_gs_crm">
    <div id="woo_gs_crm_toleft">
        <div class="first_step_woo_gs_crm">

            <div id="woo_gs_crm_welcome">

                <br><div class="notice_visible"> <h1 class="cf7_gs_welcome_header">Welcome to GetScorecard CRM for WooCommerce</h1>
                    <p>
                        Welcome, WooCommerce users!
                        <br/><br/>
                        CRM for WooCommerce allows you to manage your contacts and sales.  Control your business from enquiry to shipping through drag and drop.
                    </p>

                    <!--<p>
                        <a href="<?php /*echo WOO_GS_GETSCORECARD7_GS_BASE_URL; */?>" target="_blank">Open GetScorecard</a>
                    </p>-->

                    <br>
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/ZnnoSZp8Idc" frameborder="0" allowfullscreen></iframe>
                    <br>
                    <br>

                    <a href="<?php echo WOO_GS_GETSCORECARD7_GS_BASE_URL; ?>" target="_blank">
                        <button class="btn_woo_gs_crm_open_gs_link" type="button" >
                            Open GetScorecard
                        </button>
                    </a>


                    <p>
                        Now you can import all your WooCommerce orders to GetScorecard
                    </p>

                    <!--<a href="#" id="woo_gs_crm_button_import">Import Orders</a>-->

                    <a href="#" id="woo_gs_crm_button_import">
                        <button class="btn_woo_gs_crm_button_import" type="button" >
                            Import Orders
                        </button>
                    </a>

                    <p>
                        Importing Orders will create contacts for all previous sales.
                    </p>

                    <p>
                        New orders will be imported automatically. When you change order and save it, it also will be updated in GetScorecard
                    </p>

                    <br>

                    <h2>You are authorized</h2>

                    <table id="loginForm" class="form-table">
                        <tbody>
                        <?php foreach($userInfo as $key=>$value): ?>
                            <?php if(in_array($key,['id','fullname','email']) && $value):?>
                                <tr class="form-field form-required">
                                    <td style="width: 150px; text-align:left;" scope="row">
                                        <strong>
                                            <?php echo $userInfoLabels[$key]; ?>:
                                        </strong>
                                    </td>
                                    <td><?php echo $value; ?></td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        </tbody>
                    </table>

                    <br>

                    <a class="button-primary button-hero" href="<?php echo WOOGS_URL_PATH_ADMIN; ?>&action=logout">
                        Logout
                    </a>

                    <br><br>

                </div>

            </div>
        </div>
    </div>
</div>