<div class="container">
    <div class="row headertitle" >
                <p>APP版本管理</p>
    </div>
    <div id="loading">
    	<div class="loading-length" style="width: 1903px;"></div>
    </div>
    <div class="row" style="height: 50px">
    @if(Session::has('message'))
        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>

        @endif
    </div>
    <div class="row" style="text-align: center;margin-bottom: 20px">
              {{ Form::open(array('url'=> 'admin/moodle', 'class'=> 'form-inline ')) }}

          <div class="form-group">
            <label for="exampleInputEmail2">版本</label>
            <input type="text" name="appversion" class="form-control"  placeholder="版本">
          </div>

          <button type="submit" class="btn btn-primary">查询</button>
            {{ Form::close() }}
    </div>


    <table class="table table-hover" >
      <thead style="text-align: center">
        <tr>
        <th>版本号</th>
        <th>保存路径（相对地址）</th>
        <th>更新时间</th>
        <th>操作</th>
        </tr>
      </thead>
      <tbody>
        @foreach($apps as $app )
            <tr>
                <th>{{ $app->appversion }}</th>
                <th>{{ $app->appfile }}</th>
                <th>{{ $app->apptime }}</th>
            </tr>
        @endforeach
      </tbody>
    </table>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  添加APP新版本
</button>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">添加APP新版本</h4>
                      </div>
                      <form method="POST" accept-charset="UTF-8" action="app" enctype="multipart/form-data">

                          <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                      <div class="modal-body" style="height: 150px">
                      <div class="row">
                         {{ FORM::label('版本号',null ,array('class'=>'col-md-2 col-md-offset-1 control-label')) }}
                                <div class="col-md-8">
                                 {{ Form::text('appversion',null, array('class'=>'form-control ')) }}
                                </div>
                      </div>
                       <div class="row">
                       {{ FORM::label('APP文件',null ,array('class'=>'col-md-2 col-md-offset-1 control-label')) }}
                                       <div class="col-md-8">
                                       <input type="file" name="appfile" class="form-control"/>
                                       </div>
                       </div>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                        {{ Form::submit('保存',array('class'=>"btn btn-primary")) }}
                      </div>
                        </form>

                    </div>
                  </div>
                </div>