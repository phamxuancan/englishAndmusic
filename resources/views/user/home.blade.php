@extends('layouts.index')
@section('content')
    <div class="col-lg-2" style="background-color: #eefff8">
        <div class="col-lg-12 avatar" style="width: 100%;border-radius: 50%; background-image:center ;">
            <img class="avatar_image" style="width: 100%;border-radius: 50%; background-image:center ;" src='{{ URL::to('/').'/uploads/'. $user->avatar}}' />
        </div>
      <!-- <marquee behavior="scroll"  direction="left" class="col-lg-6">
            <span class="col-lg-12 text-center btn-success btn-default btn-lg"></span>
       </marquee>
       -->
       <marquee behavior="scoll"  direction="left" class="col-lg-12">
            <span class="col-lg-6 text-center btn-default btn-success btn-lg">{{$user->email}}</span>
       </marquee>
       <span class="col-lg-12">Word :  </span>
    </div>
    <div class="col-lg-2 ">
        <span>
    </div>
   <div class="col-lg-8" >
        <table class="table table-striped table-bordered table-hover table-condensed col-lg-10">
            <thead class="">
                <tr>
                    <th class="col-lg-3 text-center">
                        STT
                    </th>
                    <th class="col-lg-3 text-center">
                        Word
                    </th>
                    <th class="col-lg-3 text-center">
                        Pronunciation
                    </th>
                    <th class="col-lg-3 text-center">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
            @foreach($data as $key => $word )
                <tr>
                    <td class="col-lg-3 text-center">
                        {{$key+1}}
                    </td>
                    <td class="col-lg-3 text-center">
                        {{$word->word}}
                    </td>
                    <td class="col-lg-3 text-center">
                        {{base64_decode($word->pronunciation)}}
                    </td>
                    <td class="col-lg-3 text-center">
                        <span class="glyphicon glyphicon-volume-up text-center action" onclick="reading('{{ URL::to('/').'/sounds/'.$word->file_name}}');" style="cursor: pointer"></span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
   </div>
   <!-- modal insert word -->
      <div class="modal fade" id="insertWord" role="dialog" aria-labelledby="insertWord" aria-hidden="true">
             <div class="modal-dialog">
                <div class="modal-content">
                   <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            &times;
                      </button>
                      <h4 class="modal-title" id="myModalLabel">
                        Insert Word
                      </h4>
                   </div>
                   <div class="modal-body">
                      <form id="formInsertword" class="form-horizontal" role="form" enctype="multipart/form-data">
                          <div class="form-group">
                              <label for="word" class="control-label col-lg-3">Word</label>
                              <div class="col-lg-9">
                                  <input type="text" class="form-control" id="word" name="word" placeholder="enter word...">
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="pronunciation" class="control-label col-lg-3">Pronunciation</label>
                              <div class="col-lg-9">
                                  <input type="pronunciation" class="form-control" name="pronunciation" id="pronunciation" placeholder="Enter Pronunciation...">
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="vietnamese" class="control-label col-lg-3">Vietnamese</label>
                              <div class="col-lg-9">
                                  <input type="vietnamese" class="form-control" id="vietnamese" name="vietnamese" placeholder="Enter vietnamese...">
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="sound" class="control-label col-lg-3">Sound File</label>
                              <div class="col-lg-9">
                                  <input type="file" class="form-control" id="sound" name="sound" placeholder="Enter vietnamese...">
                              </div>
                          </div>

                          <div class="form-group">

                              <div class="col-lg-offset-4 col-lg-2">
                                  <button type="button" class="btn btn-lg btn-default" onclick="user.cancelForm('formInsertword');">Cancel</button>
                              </div>
                              <div class="col-lg-2">
                                    <button type="button" class="btn btn-lg btn-primary" data-loading-text="adding..." onclick='user.insertWord(this,{{$user->id}})'>Add</button>
                              </div>
                          </div>
                      </form>
                   </div>
                   <div class="modal-footer">
                   </div>
                </div><!-- /.modal-content -->
          </div><!-- /.modal -->
      </div>
      <div class="modal fade" id="createCategory" role="dialog" aria-labelledby="createCategory" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            &times;
                        </button>
                        <h4 class="modal-title" id="myModalLabel">
                            Create Category
                        </h4>
                   </div>
                   <div class="modal-body">
                            <form id="createCategory" class="form-horizontal" role="form" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="control-label col-lg-4" for="name_category">Name Category:</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" id="name_category" name="name_category"/>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label class="control-label col-lg-4" for="icon_category">Icon:</label>
                                    <div class="col-lg-8">
                                        <input type="file" class="form-control" id="icon_category" name="icon_category"/>
                                    </div>
                                </div>
                            </form>
                   </div>
                   <div class="modal-footer">
                      <input type="button" class="btn btn-default" value="Cancel" id="cancel" />
                      <input type="button" class="btn btn-default btn-success" value="Create" id="save" />
                   </div>
                </div>
            </div>
      </div>
      <script type="text/javascript">
           function reading(link){
                var audio = new Audio(link);
                audio.play();
           }
      </script>

@endsection