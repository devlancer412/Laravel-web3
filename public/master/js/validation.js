$(function(){
    var $editform = $('#edit_form');

    jQuery.validator.addMethod("lettersonly", function(value, element) {
        return this.optional(element) || /^[A-Za-z][a-z0-9\-\s]+$/i.test(value);
    }, "Letters and Numbers only please"); 

    jQuery.validator.addMethod("passportval", function(value, element) {
        return this.optional(element) || /[A-Z]{1}[0-9]{7}$/i.test(value);
    }, "Not valid Passport number");
    
    jQuery.validator.addMethod("panval", function(value, element) {
        return this.optional(element) || /[A-Z]{5}[0-9]{4}[A-Z]{1}$/i.test(value);
    }, "Not valid PAN number");
    
    jQuery.validator.addMethod("ifscval", function(value, element) {
        return this.optional(element) || /[A-Z]{4}[0-9]{7}$/i.test(value);
    }, "Not valid IFSC code"); 
     
    if($editform.length)
    {
        $editform.validate({
            rules:
            {           
                address: {lettersonly:true, required: true},
                address2:{lettersonly:true, required: true},
                // mobile:{noSpace:true,digits:true,minlength:10,maxlength:10},
                // mail:{required:true,email:true,noSpace:true},
                panchayat:{lettersonly:true, required: true},
                passport_no:{passportval:true, required: true},
                visa_no:{ digits:true,required: true},
                pin_code:{digits:true,minlength:6,maxlength:6, required: true},
                bank:{lettersonly:true, required: true},
                branch:{lettersonly:true, required: true},
                acc_type:{lettersonly:true, required: true},
                acc_no:{digits:true,minlength:14,maxlength:14, required: true},
                pan_no:{panval:true, required: true},
                ifc_code:{ifscval:true, required: true},
                city : { required: true,lettersonly:true }
            },
            messages:
            {
                address:
                {
                    required : 'Please enter House Name/No:'
                },
                address2:
                {
                    required : 'Please enter Address'
                },
                panchayat:
                {
                    required : 'Please enter Panchayat Name:'
                },
                passport_no:
                {
                    required : 'Please enter Passport No:'
                },
                visa_no:
                {
                    required : 'Please enter Visa Card No :'
                },
                pan_no:
                {
                    required : 'Please enter Pancard No:'
                },
                city:
                {
                    required : 'Please enter City Name:'
                },
                acc_type:
                {
                    required : 'Please enter Account Type :'
                },
                branch:
                {
                    required : 'Please enter Bank Branch:'
                }, 
                bank:               
                {
                    required : 'Please enter Bank Name :'
                },
                ifc_code:
                {
                    required : 'Please enter IFSC Code:'
                },                
                pin_code:
                 {
                    digits:'Please enter a numeric value!',
                    minlength:'Pincode must be at least 6 character!',
                    maxlength:'Pincode must be atmost 6 character!',
                    required : 'Please enter Pincode'
                },
                mobile:
                {
                    digits:'Please enter a numeric value!',
                    minlength:'Mobile No must be at least 10 character!',
                    maxlength:'Mobile No must be atmost 10 character!',
                    required : 'Please enter Mobile Number:'
                },
                acc_no:
                {
                    digits:'Please enter a numeric value!',
                    required : 'Please enter Bank Account No:',
                },
                
                mail:
                {
                    required:'Please enter your email',
                    email:'not recognised as mail id',
                }                
            },
          
        }) 
    }
})