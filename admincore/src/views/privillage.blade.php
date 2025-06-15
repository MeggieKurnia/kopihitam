@extends('admin::layout')
@section('content')
<style>
	.modal-dialog {
      width: 100%;
      height: 100%;
}
.modal-content {    
      height: 100%;
      width:100%;
      border-radius: 0;
      color:white;
      overflow:auto;
}
.modal-full {
    min-width: 95%;
    margin: 10;
}

.modal-full .modal-content {
    min-height: 100vh;
}

</style>
	<section class="no-padding-top">
        <div class="container-fluid">
          <div>
            <h3>Edit Privillage for user {{ \App\Helper::getDataUser(request()->get('uniq'))->name }}</h3>
          </div>
          <form id="frmPriv" onsubmit="return cekForm(this);">
        	 <div class="row">
        		<div class="col-lg-12">  
                @php $countArray = count($data);@endphp
                @if($countArray)
                  <div class="row">
                    @foreach($data as $key=>$val)
                        <div class="col-lg-12 px-lg-1">
                          <p class="text-light bg-primary px-lg-1">{{ucfirst($key)}} <input type="checkbox" id="x_{{$key}}" onchange="selectedData('{{$key}}')"></p>
                        </div>
                        @foreach($val as $k=>$v)
                          @if(@$v['is_parent'])
                            @continue
                          @endif
                          @php 
                            $dataRoute = isset($v['route']) ? $v['route'] : []; 
                            $countRoute = count($dataRoute);
                          @endphp
                          @if($countRoute)
                            <div class="container" style="margin-bottom: 10px;">
                              <div class="row">
                                <div class="col-lg-3">
                                  <span>{{$k}}</span>
                                </div>
                                @foreach($dataRoute as $r=>$rv)
                                  <div class="container px-lg-5">
                                    <div class="row">
                                      <div class="col-lg-2">
                                        {{$rv}}
                                      </div>
                                      <div class="col-lg-2">
                                        <input type="checkbox" class="{{$key}}" name="data[{{$k}}][{{$rv}}]" {{isset($priv[$k][$rv]) ? 'checked' : ''}} class="form-check-input">
                                      </div>
                                    </div>
                                  </div>
                                @endforeach
                              </div>
                            </div>
                          @endif
                        @endforeach
                    @endforeach
                  </div>
                @endif
            </div>
          </div>
          <div class="row justify-content-md-center">
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
          <br/>
        </form>
    </div>
  </section>
  <script type="text/javascript">
      function cekForm(t){
        var data = $(t).serializeArray().reduce(function(obj, item) {
            obj[item.name] = item.value;
            return obj;
        }, {});
        data['_token'] = "{{csrf_token()}}";
        data['userId'] = "{{$userId}}";
        $.ajax({
          url:"{{url()->full()}}",
          data:data,
          type:'POST',
          dataType:'json',
          success:function(res){
              alert(res.message);
          }
        });
        return false;
      }

      function selectedData(id){
        if($('#x_'+id).prop('checked')) {
          $('.'+id).prop('checked',true);
        }else{
          $('.'+id).prop('checked',false);
        }
      }
  </script>
@endsection