@extends('layouts.index')
 <script src="<?php echo URL::to('/') ?>/bootstrap/js/jquery-1.11.2.min.js"></script>
@section('content')
    <div id="outside_form">
        <form action="#" id="form_login" class="text-center form-horizontal" role="form" style="background: #dfffd0;margin-top:50px;" enctype="multipart/form-data">
            <div class="form-group alert-danger alert_error"></div>
            <div class="form-group ">
                 <label class="control-label col-lg-2 col-lg-offset-3" for="email">email :</label>
                 <div class="col-lg-2">
                    <input type="text" name="email" id="email" class="form-group" />
                 </div>
            </div>
            <div class="form-group ">
                 <label class="control-label col-lg-2 col-lg-offset-3  " for="password">Password:</label>
                 <div class="col-lg-2 ">
                    <input type="text" name="password" id="password" class="form-group" />
                 </div>
            </div>
            <div class="form-group">
                 <div class="col-lg-offset-5 col-lg-1">
                    <span id="bnt_sub" class="btn btn-sm btn-success" data-loading-text="Loading..." onclick="user.login(this)">Login</span>
                 </div>
                 <div class="col-lg-1">
                    <span id="bnt_sub" class="btn btn-sm btn-link" data-loading-text="Loading..." data-toggle="modal" data-target="#registerForm" >Register User?</span>
                 </div>
                 <input type="hidden" name="token" value="{{ csrf_token() }}">
            </div>
        </form>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="registerForm" role="dialog" aria-labelledby="registerForm" aria-hidden="true">
             <div class="modal-dialog">
                <div class="modal-content">
                   <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            &times;
                      </button>
                      <h4 class="modal-title" id="myModalLabel">
                         Register User
                      </h4>
                   </div>
                   <div class="modal-body">
                       <form action="" class="form-horizontal" enctype="multipart/form-data" id="form_register" style="text-align: center" >
                            <div class="form-group col-lg-12" >
                              <span class="alert-danger error_register"></span>
                           </div>
                            <div class="form-group col-lg-11" >
                                <label for="register_name" class="control-label col-lg-2">Username:</label>
                                <input type="text" name="register_name" id="register_name" class="form-control col-lg-10"/>
                            </div>
                            <div class="form-group col-lg-11 ">
                                <label for="password" class="control-label col-lg-1">Password:</label>
                                <input type="text" name="password" id="password" class="form-control col-lg-10" />
                            </div>
                             <div class="form-group col-lg-1 ">
                                <span class="fa fa-check-circle same" style="display: none;" ></span>
                            </div>
                            <div class="form-group col-lg-11" >
                                <label for="repassword" class="control-label col-lg-1">RePassword:</label>
                                <input type="text" name="repassword" id="repassword" class="form-control col-lg-10" />
                            </div>
                             <div class="form-group col-lg-1 ">
                                <span class="fa fa-check-circle same" style="display: none;"></span>
                            </div>
                            <div class="form-group col-lg-11">
                                <label for="avatar" class="control-label col-lg-1">File:</label>
                                <input type="file" name="avatar" id="avatar" class="form-control col-lg-10"/>
                            </div>
                            <button type="button" class="btn btn-primary" onclick="user.registerUser(this)">Register</button>
                       </form>
                   </div>
                   <div class="modal-footer">
                   </div>
                </div><!-- /.modal-content -->
          </div><!-- /.modal -->
      </div>
@endsection
<script>
    $(document).ready(function(){

        $('#repassword').focusout(function(){
            var pass   =  $('#password').val();
            var repass =   $('#repassword').val();
            if(pass == repass){
                $('.same').show();
            }else{
                $('.same').hide();
            }
        });
         $('#password').focusout(function(){
            var pass   =  $('#password').val();
            var repass =   $('#repassword').val();
            if(pass == repass){
                $('.same').show();
            }else{
                $('.same').hide();
            }
        })
    });
</script>