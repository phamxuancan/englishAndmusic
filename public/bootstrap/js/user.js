/**
 * Created by Can on 3/26/2015.
 */
var user = {
    login:function(myselt){
        var form     = $("#form_login")[0];
        formData = new FormData(form);
        $.ajax({
            url : '/users/confirm',
            data:formData,
            type:'POST',
            contentType: false,
            processData: false,
            beforeSend:function(){
                $(myselt).button('loading');
            },
            success:function(result){
            if(result.error == 1){
               $('.alert_error').html(result.message);
               $(myselt).button('reset');
                }else{
                window.location.href= '/users';
            }},
            error:function(result){
                alert(result.responseText);
                $(myselt).button('reset');
            }
        });
    },
    registerUser:function(myself){
        var form    = $('#form_register')[0];
        formDataa    = new FormData(form);
        $.ajax({
            url : '/users/addUser',
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
    },
    insertWord:function(that,user_id){
        var form = $('#formInsertword')[0];
        formDatas = new FormData(form);
        formDatas.append("user_id",user_id)
        $.ajax({
            url:'/users/me/insertWord',
            data:formDatas,
            type:'POST',
            contentType:false,
            processData:false,
           beforeSend:function(){
               $(that).button('loading');
           },
            success:function(result){
              console.log(result);
            },
            error:function(result){
                console.log(result);
            }
        });
    },
    cancelForm:function(myself,form){
        $('#insertWord').modal('hide');
        $('#'+form)[0].reset();
        $(myself).button('reset');
    }
};