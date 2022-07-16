
    jQuery.validator.addMethod("upper", function(value, element) {
        return this.optional(element) || /^(.*[A-Z].*)/.test(value);
    }, "Enter atleast one upper case");
   
    jQuery.validator.addMethod("lower", function(value, element) {
        return this.optional(element) || /^(.*[a-z].*)/.test(value);
    }, "Enter atleast one lower case");

    jQuery.validator.addMethod("specialchars", function(value, element) {
        return this.optional(element) || /^(?=.*[!@#$%&*()_+}])/.test(value);
    }, "Enter atleast one special characters");

    jQuery.validator.addMethod("onenumeric", function(value, element) {
        return this.optional(element) || /^(?=.*\d)/.test(value);
    }, "Enter atleast one numeric value");

    jQuery.validator.addMethod("lettersonly", function(value, element) {
        return this.optional(element) || /^[a-z,A-Z," "]+$/i.test(value);
    }, "Enter only alphabets");

    jQuery.validator.addMethod("noSpace", function(value, element) {
        return value.indexOf(" ") < 0 && value != " ";
    }, "Space not allowed");

    jQuery.validator.addMethod("validEmail", function(value, element) {
        return this.optional( element ) || /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/.test( value );
    }, "Enter valid email");

    jQuery.validator.addMethod("alphanumeric", function(value, element) {
      var testregex = /^[a-zA-Z0-9]+$/i;
        return testregex.test(value);
    }, "Enter only alphanumeric values");

    jQuery.validator.addMethod("num_only", function(value, element) {
      var testregex = /^[0-9]+$/i;
        return testregex.test(value);
    }, "Enter only numbers");

    jQuery.validator.addMethod("notEqualTo", function(value, element, param) {
        var notEqual = true; value = $.trim(value);
        for (i = 0; i < param.length; i++) {
            if (value == $.trim($(param[i]).val())) { notEqual = false; }
        }
        return this.optional(element) || notEqual;
    }, "Enter different value");

    jQuery.validator.addMethod("extension",function(a,b,c){return c="string"==typeof c?c.replace(/,/g,"|"):"png|jpeg|jpg",this.optional(b)||a.match(new RegExp("\\.("+c+")$","i"))}, "Upload valid file");
