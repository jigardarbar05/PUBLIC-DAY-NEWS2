$(function(){
 
    var $abc=$("#abc");

    $abc.validate({

        rules:{
            title:{
                required:true,
                lattersonly:true
            },
            Description:{
                required:true,
                lattersonly:true
            
                
            
          
            },
            Category:{
                required:true,
                password:true
            },
            file:{
                required:true,
                error:true
            }

    },
    
    messages:{
        title:{
            required:'enter the title'
            
        },
        Description:{
            required:'enter the description'
           
       
        },
        Category:{
            required:'enter the category'
           
        },
        file:{
            required:'enter the image'
            
        }


    }  
}) 
})