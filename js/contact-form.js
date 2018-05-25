jQuery(document).ready(function($){
  $("#new-contact").parsley({
    errorClass: 'is-invalid text-danger',
    //successClass: 'is-valid', // Comment this option if you don't want the field to become green when valid. Recommended in Google material design to prevent too many hints for user experience. Only report when a field is wrong.
    errorsWrapper: '<span class="form-text text-danger"></span>',
    errorTemplate: '<span></span>',
    trigger: 'change'
  }) /* If you want to validate fields right after page loading, just add this here : .validate()*/ ;
  
});

/*
input: "acf[field_5b014a55636fb]"
message: "Please include an '@' in the email address. 'jon' is missing an '@'."
*/
// acf.add_filter('validation_complete', function( json, $form ) {});