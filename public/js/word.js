/**
 * Created by Can on 3/26/2015.
 */
var word = {
    insertWord:function(myselt){
        console.log("fdf");
    },
    registerUser:function(myself){
        var form    = $('#form_register')[0];
        console.log(form);
        formDataa    = new FormData(form);
        $.ajax({
            url : 'users/addUser',
            data:formDataa,
            type:'POST',
            contentType: false,
            processData: false,
            beforeSend:function(){
                $(myself).button('loading');
            },
            success:function(result){
                if(result.error == 1){
                    $('.error_register').html(result.message);
                    $(myself).button('reset');
                }else
                {
                    $('#registerForm').modal('hide');
                    $('#registerForm').find('form')[0].reset();
                    $(myself).button('reset');
                }

            },
            error:function(result){
                $(myself).button('reset');
            }
        });
    }

};