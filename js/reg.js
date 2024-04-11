$(function(){
 
    var $abc=$("#abc");

    $abc.validate({

        rules:{
            name:{
                required:true,
                lattersonly:true
            },
            city:{
                required:true,
                lattersonly:true
            },
            gender:{
                required:true,
                
            },
            mobile:{
                required:true,
                numericonly:true,
                minlength:10,
                maxlength:10
            },
            email:{
                required:true,
              email:true
            },
            password:{
                required:true,
                password:true
            },
            gender:{
                required:true,
                error:true
            }

    },
    
    messages:{
        name:{
            required:'enter the name',
            lattersonly:'invalid name'
        },
        city:{
            required:'enter the city',
            lattersonly:'invalid city'
        },
        gender:{
            required:' &nbsp; select one option'
        },
        mobile:{
            required:'enter number',
            numericonly:' invaild number',
            minlength:'min 10 digit',
            maxlength:'max 10 digit'
        },
        email:{
            required:'enter the email',
           email:'invalid email' 
        },
        password:{
            required:'enter the password'
            
        }


    },
    errorPlacement : function(error, element){
        if(element.is(":radio"))
        {
            error.appendTo(element.parents(".form-1"));

        }
        else{
            error.insertAfter(element);
        }
    }
})
jQuery.validator.addMethod('lattersonly',function(value,element){
    return /^[^-\s][a-zA-Z_\s-]+$/.test(value);
});
jQuery.validator.addMethod('lattersonly',function(value,element){
    return /^[^-\s][a-zA-Z_\s-]+$/.test(value);
});
jQuery.validator.addMethod('numericonly',function(value,element){
    return /^[0-9]+$/.test(value);

});
jQuery.validator.addMethod('email',function(value,element){
    return/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(value);
 });




})
