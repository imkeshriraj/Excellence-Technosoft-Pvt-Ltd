console.log('validate');

$(document).ready(function () {
    // alert("validate ready");
    function invalid(id, border) {
        $(id).prop(disabled, true);
        $(border).css('border', '1px solid red');
        return false;
    }
    function success(id, border) {
        $(id).prop(disabled, false);
        $(second).css('border', '1px solid #27AE60');

    }
    // name validation
    bootstrapValidate('#add-name', 'required:The Field Should not be empty', function (isvalid) {
        if (!isvalid) {
            invalid('#add_btn', '');
            return false;
        }
        else {
            success('#add_btn', '#add-name');
        }
    });
    bootstrapValidate('#add-name', 'min:3:The Field Should be greater than 3', function (isvalid) {
        if (!isvalid) {
            invalid('#add_btn', '');
            return false;
        }
        else {
            success('#add_btn', '#add-name');
        }
    });
    bootstrapValidate('#add-name', 'regex:^[a-zA-Z ]*$:Please Enter a valid name', function (isvalid) {
        if (!isvalid) {
            invalid('#add_btn', '');
            return false;
        }
        else {
            success('#add_btn', '#add-name');
        }
    });
    bootstrapValidate('#add-name', 'max:20:The Field Should be less than 10', function (isvalid) {
        if (!isvalid) {
            invalid('#add_btn', '');
            return false;
        }
        else {
            success('#add_btn', '#add-name');
        }
    });




    // age validation

    bootstrapValidate('#add-age', 'required:The Field Should not be empty', function (isvalid) {
        if (!isvalid) {
            invalid('#add_btn', '');
            return false;
        }
        else {
            success('#add_btn', '#add-age');
        }
    });
   
    bootstrapValidate('#add-age', 'numeric:Please only enter numeric characters!', function (isvalid) {
        if (!isvalid) {
            invalid('#add_btn', '');
            return false;
        }
        else {
            success('#add_btn', '#add-age');
        }
    });
   











    // Street validation

    bootstrapValidate('#add-street', 'required:The Field Should not be empty', function (isvalid) {
        if (!isvalid) {
            invalid('#add_btn', '');
            return false;
        }
        else {
            success('#add_btn', '#add-street');
        }
    });
    bootstrapValidate('#add-street', 'min:5:The Field Should be greater than 5', function (isvalid) {
        if (!isvalid) {
            invalid('#add_btn', '');
            return false;
        }
        else {
            success('#add_btn', '#add-street');
        }
    });
    
    bootstrapValidate('#add-street', 'max:20:The Field Should be Greater than 20', function (isvalid) {
        if (!isvalid) {
            invalid('#add_btn', '');
            return false;
        }
        else {
            success('#add_btn', '#add-street');
        }
    });





    // Email validation

    bootstrapValidate('#add-email', 'required:The Field Should not be empty', function (isvalid) {
        if (!isvalid) {
            invalid('#add_btn', '');
            return false;
        }
        else {
            success('#add_btn', '#add-email');
        }
    });

    bootstrapValidate('#add-email', 'email:Please Enter a valid Email', function (isvalid) {
        if (!isvalid) {
            invalid('#add_btn', '');
            return false;
        }
        else {
            success('#add_btn', '#add-email');
        }
    });








});