var canRunAds = true;

var Validation = {

    InitValidation: function (formid, errorplacement, rules, messages) {
        $(formid).validate({
            errorClass: 'alert-danger form-control mt-2 help-block', // You can change the animation class for a different entrance animation - check animations page
            errorElement: 'div',
            errorPlacement: function (error, e) {
                //e.parents('.form-group > div').append(error);
                $(e).parents(errorplacement).append(error);
            },
            highlight: function (e) {
                //console.log("highlight");
                $(e).closest('.form-control').removeClass('is-valid').addClass('is-invalid');
                //$(e).closest('.help-block').remove();
            },
            unhighlight: function (e) {
                //console.log("unhighlight");
                $(e).closest('.form-control').removeClass('is-invalid'); //.addClass('is-valid');
                //$(e).closest('.help-block').remove();
            },
            success: function (e) {
                //console.log("success;");
                //console.log($(e).closest('.form-control').removeClass('is-valid is-invalid'));
                $(e).closest('.help-block').remove();
            },
            rules:rules,
            messages:messages
        });
    }
};