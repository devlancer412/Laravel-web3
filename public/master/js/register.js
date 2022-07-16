$(function(){
    jQuery.validator.addMethod("noSpace", function(value, element) { 
        return value == '' || value.trim().length != 0;  
    }, "No space please and don't leave it empty");
    jQuery.validator.addMethod("customEmail", function(value, element) { 
      return this.optional( element ) || /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test( value ); 
    }, "Please enter valid email address!");
    
    $(document).ready(function()
{
$('#mobile').numeric();
});
var $SubmitForm = $('#SubmitForm');
if($SubmitForm.length){
    $SubmitForm.validate({

    rules:{
        
        fname: 
        {
            required: true,  
            noSpace: true     
        },
        lname: 
        {
            required: true,
            noSpace: true
        },
        c_sponsor_id: 
        {
            required: true
        },
        terms: 
        {
            required: true,
        },
        gender: 
        {
            required: true,       
        },
        dob: 
        {
            required: true,
            date:true
        },
        mobile: 
        {
            required: true,
            number:true,
            minlength:10,
            maxlength:10,
            noSpace: true,
        },           
        state: 
        {
            required: true,
        },
        country: 
        {
            required: true,
        },
        email: 
        {
            required: true,
            noSpace:true,           
        },
        password: 
        {
            required: true,
            minlength:8
        },
        cpassword: 
        {
            required: true,
            equalTo: '#password'
        },           
        
    },
    messages:{
        c_sponsor_id:
        {
            required:'Please enter Sponsor ID'
        },      
        email: 
        {
            required: "Email is required  !",
            email: "Enter a Valid Email  !",
        },
        password: 
        {
            required: 'Please enter password!',
            minlength:'Password must be at least 8 character!'
        },
        cpassword: 
        {
            required: 'Please enter confirm password!',
            equalTo: 'Please enter same password!',
        },
        dob:
        {
            required:'Please select your Date of Birth'
        },
        gender:
        {
            required:'Please select gender'
        },
        terms:
        {
            required:'Please select Terms ands Conditions'
        },
        state:
        {
            required:'  Please select State'
        },
        country:
        {
            required:'Please select Country'
        },              
        fname: 
        {
            required: 'Please enter First name!'
        },
        lname: 
        {
            required: 'Please enter Last name!'
        },
        mobile: 
        {
            required: 'Please enter the phone number!',
            number:'Please enter a numeric value!',
            minlength:'Phonenumber must be at least 10 character!',
            maxlength:'Phonenumber must be atmost 10 character!'                  
        }, 
    },
          errorPlacement: function(error, element) 
          {
            if (element.is(":radio")) 
            {
                error.appendTo(element.parents('.gender'));
            }
           
            else 
            { 
                error.insertAfter( element );
            }
            
           }
      });
    }
    })