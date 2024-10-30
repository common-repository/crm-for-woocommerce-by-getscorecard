/**
 * Created by Antonshell on 18.09.2015.
 */
jQuery(document).ready(function($) {

    var cf7Gs_myjq = jQuery.noConflict();

    cf7Gs_myjq('#woo_gs_crm_button_yes').click(function() {
        cf7Gs_myjq('#login_form').slideToggle('slow');
        cf7Gs_myjq('#register_form').slideUp('slow');
    });

    cf7Gs_myjq('#woo_gs_crm_button_no').click(function() {
        cf7Gs_myjq('#register_form').slideToggle('slow');
        cf7Gs_myjq('#login_form').slideUp('slow');
    });

    cf7Gs_myjq('#woo_gs_crm_button_import').click(function(event) {
        event.preventDefault();

        if( confirm("Do you want to import?") ){
            $(".loader").show();
            cf7Gs_myjq.ajax({ type: "POST", url: WOO_GS_ADMIN_AJAX_URL + 'admin.php?page=woocommerce-gs-crm&action=importData', data: {},
                success: function(data) {
                    $(".loader").hide();
                }
            });
        }
    });

    /* validate register form */
    $( "#woo_gs_registerform" ).validate({
        errorClass: "form-field-error",
        rules: {
            fullname: {
                required: true
            },
            emailaddress: {
                required: true,
                email: true
            },
            password: {
                required: true
            }
        }
    });
    /**/

    $( "#woo_gs_registerform").submit(function( event ) {
        $(".loader").show();
    });

});