@extends('admin::layout')
@section('content')
	<style>
		.cke_tpl_list
	{
		border: #dcdcdc 2px solid;
		background-color: #ffffff;
		overflow-y: scroll;
		overflow-x: scroll;
		flex-wrap: wrap;
		width: 100%;
		height: 220px;
		display: flex;
	    flex-wrap: nowrap;
	    flex-direction: column;
	}
	</style>
	<section class="no-padding-top">
        <div class="container-fluid">
        	<div class="row">
        		<div class="col-lg-12">
        			@if(session()->has('ok'))
	        			<div class="alert alert-success">{{session()->get('ok')}}</div>
	        		@endif
                	<div class="block margin-bottom-sm">
                		<div class="title"><strong>Settings</strong></div>
	                	@if(count($form))
	                		<form action="" method="POST" onsubmit="return cekFrm()">
	                			{!! csrf_field() !!}
	                			@foreach($form as $key=>$val)
	                				<div class="form-group row">
	                					<label for="{{$key}}" class="col-sm-6 col-form-label">{{@$val['label'] ? @$val['label'] : ucwords(str_replace("_"," ",str_replace("-"," ",$key)))}}
	                						{!! @$val['required'] ? '<span class="text-danger">*</span>' : '' !!}</label>
	                					<div class="col-sm-12">
		                					@if(in_array(@$val['type'],['text','password','email','image','file']))
		                						<input data-field = "{{@$val['label'] ? @$val['label'] : ucwords(str_replace("_"," ",str_replace("-"," ",$key)))}}" type="{{ $val['type'] == 'image' || $val['type'] == 'file' ? 'hidden' : $val['type']}}" name="{{$key}}"  class="form-control {{isset($val['class']) ? $val['class'] : ''}}" {{@$val['required'] ? 'required' : ''}} value="{{@$val['value']}}">
		                						@if($val['type'] == 'image' || $val['type'] == 'file')
		                							@if(@$val['value'] !== null)
		                								<div style="margin-top:10px;" class="img_{{$key}}">
		                									@if($val['type'] == 'file')
		                									<a href="{{asset($val['value'])}}" target="_blank">Open File</a>
		                									@else
		                									<img src="{{asset(@$val['value'])}}" class="img-fluid" width="200">
		                									@endif
		                								<br/><a style="margin: 10px 0;" href="javascript:void(0)" onclick="delImage('{{$key}}',this)">Delete</a></div>
		                							@endif
		                							<button type="button" class="btn btn-success" onclick='elfinder("{{URL::to(admin.'/elfinder?type='.$val['type'])}}","{{$key}}")'>Browse</button>
		                						@endif
		                					@elseif(@$val['type'] == 'textarea')
		                						<textarea name="{{$key}}" class="form-control {{isset($val['class']) ? $val['class'] : ''}}"  @if(@$val['required'] == true) required @endif>{{@$val['value']}}</textarea>
		                					@elseif(@$val['type'] == "select")
		                						<select name="{{$key}}" class="form-control @if(isset($val['class'])) {{$val['class']}} @endif" required="{{@$val['required'] == true ? 'required' : ''}}">
		                							<option value="">--Select--</option>
		                							@foreach($val['option'] as $k=>$d)
		                								<option value="{{$k}}" {{@$val["value"] == $k ? 'selected' : ''}} >{{$d}}</option>
		                							@endforeach
		                						</select>
		                					@endif
		                					@if(isset($val['info']))
		                						<br/>
		                						<span class="text-info">{{$val['info']}}</span>
		                					@endif
	                					</div>
	                				</div>
	                				@if(isset($val['multilang']))
	                					@if($val['multilang'])
	                						@php
	                							$lang = \Config::get('lang');
	                							$l = '';
	                							$def = $lang['default'];
	                							foreach($lang as $k=>$l){
	                								if($k == 'default' || $k == $def){
	                									continue;
	                								}
	                						@endphp
	                						<div class="form-group row">
			                					<label for="{{$key}}" class="col-sm-6 col-form-label">{{@$val['label'] ? @$val['label']. " ($l)" : ucwords(str_replace("_"," ",str_replace("-"," ",$key))). " ($l)"}}</label>
			                					<div class="col-sm-12">
				                					@if(in_array(@$val['type'],['text','password','email','image']))
				                						<input type="{{ $val['type'] == 'image' ? 'hidden' : $val['type']}}" name="{{$key."_lang"}}"  class="form-control {{isset($val['class']) ? $val['class'] : ''}}" {{@$val['required'] ? 'required' : ''}} value="{{ \App\Helper::getSetting(request()->segment(2),$key,$k) }}">
				                						@if($val['type'] == 'image' || $val['type'] == 'file')
				                							@if(@$val['value'] !== null)
				                								<div style="margin-top:10px;" class="img_{{$key}}">
				                									<img src="{{asset(@$val['value'])}}" class="img-fluid" width="200">
				                								<br/><a href="javascript:void(0)" onclick="delImage('{{$key}}',this)">Delete</a></div>
				                							@endif
				                							<button type="button" class="btn btn-success" onclick='elfinder("{{URL::to(admin.'/elfinder?t='.$val['type'])}}","{{$key}}")'>Browse</button>
				                						@endif
				                					@elseif(@$val['type'] == 'textarea')
				                						<textarea required="{{@$val['required'] == true ? 'required' : ''}}" name="{{$key."_lang"}}" class="form-control {{isset($val['class']) ? $val['class'] : ''}}">{{@$val['value']}}</textarea>
				                					@endif
				                					@if(isset($val['info']))
				                						<br/>
				                						<span class="text-info">{{$val['info']}}</span>
				                					@endif
			                					</div>
			                				</div>
			                				@php } @endphp
	                					@endif
	                				@endif
	                			@endforeach
	                			<button type="submit" class="btn btn-primary">Save changes</button>
	                		</form>
	                	@endif
	                </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
    	$(document).ready(function(){
	    	$('.ckeditor').ckeditor();
	        $('.datepicker').datepicker({
				format: 'yyyy-mm-dd',
				autoclose:true,
				changeMonth: true,
				changeYear: true
			});
    	});
    	window.elfinder = function (url,k){
	        if($('.active_elfinderxxx').length){
	            $('.active_elfinderxxx').removeClass();
	        }
	        $('[name="'+k+'"]').addClass('active_elfinderxxx');
	        var win = window.open(url,"_blank","location=no,menubar=no,resizable=yes,scrollbars=yes,toolbar=yes");
	        win.onbeforeunload = function(){
	        	$('.active_elfinderxxx').removeClass();
	        }
	    };

	    window.setPath = function(res){
	        if($('.active_elfinderxxx').length){
	            var name = $('.active_elfinderxxx').attr('name');
	            if($('.img_'+name).length){
	                $('.img_'+name).remove();
	            }
	            if(jQuery.inArray(res.mime,['image/jpg','image/jpeg','image/png','image/gif','image/ico']) !== -1){
	                var html = '<div style="margin-top:10px;" class="img_'+name+'"><img src="'+res.url+'" class="img-fluid" width="200">';
	                html+='<br/><a href="javascript:void(0)" onclick="delImage(\''+name+'\',this)">Delete</a></div>';
	            }else{
	                var html = '<div style="margin-top:10px;" class="img_'+name+' res_'+name+'"><a href="'+res.url+'" target="_blank">File</a>';
	                html+='<br/><a href="javascript:void(0)" onclick="delImage(\''+name+'\',this)">Delete</a></div>';
	            }
	            var pturl = res.url.split("{{url('/').'/'}}");
	            $('[name="'+name+'"]').val(pturl[1]);
	            $('[name="'+name+'"]').after(html);
	        }
	    };
	    window.delImage = function(n){
	    	$('[name="'+n+'"]').val('');
	    	if($('.img_'+n).length){
	    		$('.img_'+n).remove();
	    	}
	    };

	    window.cekFrm = function(){
	    	var msg = null;
	    	$('input[type="hidden"]').each(function(){
    			if(typeof $(this).attr('required') !== 'undefined'){
    				if($(this).val() == ''){
    					msg = $(this).attr('data-field')+' is required';
    					return false;
    				}
    			}
	    	});
	    	if(msg){
	    		alert(msg);
	    		return false;
	    	}
	    	return true;
	    	
	    }

    </script>
@endsection