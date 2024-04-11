$(function(){
 
    var $abc=$("#abc");

    $abc.validate({

        rules:{
         
            // emailid:{
            //     required:true,
            //   emailid:true
            // },
            email:{
                required:true,
                emailid:true
            },
            password:{
                required:true,
                password:true
            }

    },
    
    messages:{
        
        // emailid:{
        //     required:'Enter the email',
        //    emailid:'invalid email' 
        // },
        email:{
            required:'Enter the email ',
            emailid:'Invalid emailid'

        },
        password:{
            required:'Enter the password'
            
            
        }


    }


});
jQuery.validator.addMethod('emailid',function(value,element){
    return/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(value);
 });




})