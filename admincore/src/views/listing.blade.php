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
	      overflow:auto;
	}
	.modal-full {
	    min-width: 95%;
	    margin: 10;
	}

	.modal-full .modal-content {
	    min-height: 100vh;
	}
	.select2-container {
	  border: 1px solid #444951;
	}
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
	.btn.btn-warning{
		padding: 2px 15px;
    	margin-bottom: 6px;
	}
</style>
	@php 
		$priv = \App\Helper::getPriv(auth()->guard('admin')->user()->id,request()->segment(2),'create');
		$privd = \App\Helper::getPriv(auth()->guard('admin')->user()->id,request()->segment(2),'download'); 
	@endphp

	<section class="no-padding-top">
        <div class="container-fluid">
        	<div class="row">
        		<div class="col-lg-12">
                	<div class="block margin-bottom-sm">
                		<div class="title"><strong>
			              @if(request()->segment(2) == 'expience_home') 
			                Experience
			              @elseif(request()->segment(2) == 'annualreport') 
			                Annual Report
			              @elseif(request()->segment(2) == 'financialreport')
			                Financial Report
			              @else
                			{{ucfirst(str_replace("-"," ",str_replace("_"," ",request()->segment(2) == 'subsupraco' ? 'Subsidiaries' : request()->segment(2) )))}}
                		  @endif
                			 Table</strong></div>
                		@if( (in_array('create',$config) && $priv) || ($privd && in_array('download',$config) ) )
	                		<div class="btn-group" role="group">
							    <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							      Action
							    </button>
							    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
							      @if(in_array('create',$config) && $priv)
							      	<a class="dropdown-item" href="javascript:void(0);" onclick="callForm()">Create</a>
							      @endif
							      @if(in_array('download',$config) && $privd)
							      	<a class="dropdown-item" href="{{url(admin."/".request()->segment(2)."/download")}}">Download</a>
							      @endif
							    </div>
							 </div>
						@endif
						<div id="msgRes" class="alert alert-success alert-dismissible" style="display: none; z-index: 3243324252; width: 80%;position: fixed; top: 10%;right:12.5%;">
    						<button type="button" class="close" onclick="$('#msgRes').hide();">&times;</button>
							<div class="msgr">success</div>
						</div>
		                 <div class="table-responsive" style="margin-top: 20px;"> 
		                    <table class="table table-striped" id="example" style="width: 100%!important;">
		                      @if(count($header))
		                      <thead>
		                        <tr>
		                          @foreach($header as $hk=>$hv)
		                          	<th>{{$hv}}</th>
		                          @endforeach
		                        </tr>
                      		  </thead>
                      		  @endif
                      		</table>
                      	  </div>
                	</div>
                </div>
        	</div>
        </div>
    </section>
    <div class="modal fade" id="formAct" data-focus="false"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-full" role="document">
	  	 <form id="formActData">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Form {{ucfirst(str_replace("-"," ",str_replace("_"," ",(request()->segment(2) == 'expience_home' ? 'Experience' : request()->segment(2)) ))) }}</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" id="cls" data-dismiss="modal">Close</button>
		        <button type="button" class="btn btn-primary" id="btn_save">Save changes</button>
		      </div>
		    </div>
		</form>
	  </div>
	</div>
    <script type="text/javascript">
    	<?php
    		echo 'var l = '.json_encode(config()->get('lang')).';';
    	?>
    	var def_lang = typeof l !== 'undefined' ? l['default'] : '';
    	var max = {};
    	var min = {};
    	var ed = {};
    	if(typeof l !== 'undefined'){
    		delete l['default'];
    	}
		$(document).ready(function(){
			$.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': '{{csrf_token()}}'
			    }
			});
			 @if(count($header))
				$('#example').DataTable({
					"lengthMenu": [[10, 25, 50,100], [10, 25, 50, 100]],
					"ordering": false,
					"paging":true,
					"filter": true,
					"processing": true,
			        "serverSide": true,
			        "columnDefs": [
					  { targets: 'no-sort', orderable: false }
					],
			        "ajax": {
			        	'url':'{{url(admin."/".request()->segment(2)."/getListing")}}',
			        	'type':'GET'
			        }
				});
			@endif
			$('#formAct').on('hidden.bs.modal', function () {
	    		$('#formAct .modal-body').empty();
			});	
		});
		$('#formAct').on('hidden.bs.modal', function () {
		    max = {};
		    min = {};
		    ed ={};
		});

		window.callForm = function(){
			$('#formAct').modal({backdrop: 'static', keyboard: false});
			$.ajax({
				url:"{{url(admin.'/'.request()->segment(2).'/create')}}",
				type:'GET',
				dataType:'JSON',
				beforeSend:function(){
					$('#formAct .modal-body').append('<div id="ld"><center>Loading...</center></div>');
				},
				success:function(response){
					generateForm(response.form);
					if(response.script != null){
						 var src = document.createElement('script');
						 src.text = response.script.replace(/[\n\r\t]/g, '');
						 document.body.appendChild(src);
					}
					$('#btn_save').attr('onclick','saveData("create")');
				}
			});
		}

		window.generateForm = function(res){
			var html = '';
			$.each(res,function(key,val){
				if(val['type'] == 'widget'){
					if(typeof val['min'] !== 'undefined')
						min[key] = val['min'];
					if(typeof val['max'] !== 'undefined')
						max[key] = val['max'];
					ed[key] = 1;
					if(typeof res['dataFormxxx'] !== 'undefined'){
						if(typeof res['dataFormxxx']['widget'] !== 'undefined'){
							html+=widgetHtml(key,val,res['dataFormxxx']['widget']);
						}else{
							html+=widgetHtml(key,val);
						}
					}else{
						html+=widgetHtml(key,val);
					}
				}
				else{
					if(key == 'dataFormxxx' || key == 'pkKey')
						return false;
					if(val['type'] == 'hidden'){
						html+='<input name="'+key+'" type="hidden" value="'+(typeof val['value'] !== 'undefined' ? val['value'] : '')+'">';
						return;
					}
					html+='<div class="form-group row '+(typeof val['classRow'] !== 'undefined' ? val['classRow'] : '')+'">';
					html+='<label for="'+key+'" class="col-sm-8 col-form-label">'+( (typeof val['label']) !== 'undefined' ?  val['label'] : (key == 'is_active') ? 'Is Active' : key )+' '+(typeof val['required'] !== 'undefined' ? (val['required'] == true ? '<span class="text-danger">*</span>' : '') : '')+'</label>';
					html+='<div class="col-sm-12">';
					if(jQuery.inArray(val['type'],['text','password','email','date','number']) !== -1){
						html+='<input name="'+key+'" '+(typeof val['maxlength'] !== 'undefined' ? 'maxlength='+val['maxlength'] : '')+' '+(typeof val['minlength'] !== 'undefined' ? 'minlength='+val['minlength'] : '')+' type="'+val['type']+'" class="form-control '+( (typeof val['class'] !== 'undefined') ? val['class'] : '' )+'" value="'+( (typeof res['dataFormxxx']) !== 'undefined' && val['type'] != 'password' ? typeof res['dataFormxxx'][key] === 'undefined' ? (res['dataFormxxx'][def_lang][key] != 'null' ? (res['dataFormxxx'][def_lang][key] != null ? res['dataFormxxx'][def_lang][key] : '')  : '') : (res['dataFormxxx'][key] != null ? res['dataFormxxx'][key] : '') : '' )+'">';
					}
					else if(val['type'] == 'textarea'){
	      				html+='<textarea name="'+key+'" class="form-control '+( (typeof val['class'] !== 'undefine') ? val['class'] : '' )+'">'+( (typeof res['dataFormxxx']) !== 'undefined' ? typeof res['dataFormxxx'][key] === 'undefined' ? (res['dataFormxxx'][def_lang][key] != null ? res['dataFormxxx'][def_lang][key] : '') : (res['dataFormxxx'][key] != null ? res['dataFormxxx'][key] : '')  : '' )+'</textarea>';
					}else if(val['type'] == 'image' || val['type'] == 'file' || val['type'] == 'video'){
						var asset = '{{asset("/")}}';
						html+='<button type="button" class="btn btn-success" onclick="elfinder(\'{{URL::to(admin.'/elfinder')}}?type='+val['type']+'\',\''+key+'\')">Browse</button>';
						html+='<input type="hidden" name="'+key+'" value="'+( (typeof res['dataFormxxx']) !== 'undefined' ? (res['dataFormxxx'][key] != null ? res['dataFormxxx'][key] : '') : '' )+'" readonly>';
						if(typeof res['dataFormxxx'] !== 'undefined'){
							if(res['dataFormxxx'][key]){
								if(cekFileExist(asset+res['dataFormxxx'][key])){
									var ext = res['dataFormxxx'][key].split(".");
									if(jQuery.inArray(ext.pop(),['jpg','jpeg','png','ico','gif','webp']) !== -1) {
											html+='<div style="margin-top:10px;" class="img_'+key+'"><img src="'+asset+res['dataFormxxx'][key]+'" class="img-fluid" width="200">';
										}else{
											html+='<div class="img_'+key+'"><a style="padding:8px 0" target="_blank" href="'+asset+res['dataFormxxx'][key]+'" >Open File</a>';
										}
								}else{
									html+='<div style="margin-top:10px;" class="img_'+key+'"><img src="'+asset+'/download.png" class="img-fluid" width="200">';
								}
								html+='<br/><a style="margin:5px 0;" href="javascript:void(0)" onclick="delImage(\''+key+'\',this)">Delete</a></div>';
							}
						}
					}else if(val['type'] == 'select'){
						html+='<select name="'+(val['class'] == 'select2' ? key+"[]" : key)+'" class="form-control '+( (typeof val['class'] !== 'undefined') ? val['class'] == 'select2' ? 'sc2x' : val['class'] : '' )+'">'
						if(typeof val['option'] !== 'undefined'){
							if(Object.keys(val['option']).length){
								html+='<option value="">--Select--</option>';
								if(typeof val['dis'] !== 'undefined'){
									$.each(val['option'], function(ok,ov){
										if(typeof ov === 'object'){
											$.each(ov,function(ck1,cv1){
												if(typeof cv1 === 'object'){
													$.each(cv1,function(ck2,cv2){
														html+='<option value="'+ck1.toString()+'" '+( (typeof res['dataFormxxx'] !== 'undefined') ? res['dataFormxxx'][key] == ok ? 'selected' : '' : '')+'disabled>'+cv2+'</option>';
														
													})
												}else{
													var e = false;
													$.each(val['dis'],function(dk,dv){
														if(dv == ok)
															e = true;
													});
													html+='<option value="'+ok.toString()+'" '+( (typeof res['dataFormxxx'] !== 'undefined') ? res['dataFormxxx'][key] == ok ? 'selected' : '' : '')+' '+(res['pkKey'] == ok.toString() || e ? 'disabled' : '')+'>'+cv1+'</option>';
												}
											});
										}else{
											html+='<option value="'+ok.toString()+'" '+( (typeof res['dataFormxxx'] !== 'undefined') ? res['dataFormxxx'][key] == ok ? 'selected' : '' : '')+' '+(res['pkKey'] == ok.toString() ? 'disabled' : '')+'>'+ov+'</option>';
										}
									});
								}else{
									$.each(val['option'], function(ok,ov){
										html+='<option value="'+ok+'" '+( (typeof res['dataFormxxx'] !== 'undefined') ? res['dataFormxxx'][key] == ok ? 'selected' : '' : '')+'>'+ov+'</option>';
									});
							 	}
							}else{
								html+='<option value="">--Select--</option>';
							}
						}else{
							html+='<option value="">--Select--</option>';
						}
						html+='</select>';
					}else if(key == 'is_active'){
						html+='<select name="'+key+'" class="form-control" '+(typeof res['dataFormxxx'] !== 'undefined' ? (typeof res['dataFormxxx']['disabled'] !== 'undefined' ? 'disabled' : '') : '')+'>';
						html+='<option value="1"  '+( (typeof res['dataFormxxx'] !== 'undefined') ? res['dataFormxxx'][key] == '1' ? 'selected' : '' : '')+'>True</option>';
						html+='<option value="0"  '+( (typeof res['dataFormxxx'] !== 'undefined') ? res['dataFormxxx'][key] == '0' ? 'selected' : '' : '')+'>False</option>';
						html+='</select>';
					}
					if(typeof val['info'] !== 'undefined'){
						if(val['type'] == 'image')
							html+='<br/>';
						html+='<span class="text-info">'+val['info']+'</span>'
					}
					html+='</div></div>';
					if(typeof l !== 'undefined'){
						if(typeof val['multilang'] !== 'undefined'){
							$.each(l,function(k,v){
								if(k != def_lang){
									html+='<div class="form-group row">';
									html+='<label for="'+key+'" class="col-sm-8 col-form-label">'+( (typeof val['label']) !== 'undefined' ?  val['label']+" ("+v+")" : (key == 'is_active') ? 'Is Active' : key )+' '+(typeof val['required'] !== 'undefined' ? (val['required'] == true ? '<span class="text-danger">*</span>' : '') : '')+'</label>';
									html+='<div class="col-sm-12">';
									if(jQuery.inArray(val['type'],['text']) !== -1){
									html+='<input '+(typeof val['maxlength'] !== 'undefined' ? 'maxlength='+val['maxlength'] : '')+' '+(typeof val['minlength'] !== 'undefined' ? 'minlength='+val['minlength'] : '')+' name="'+key+'_lang" type="'+val['type']+'" class="form-control '+( (typeof val['class'] !== 'undefined') ? val['class'] : '' )+'" value="'+( (typeof res['dataFormxxx']) !== 'undefined' && val['type'] != 'password' ? typeof res['dataFormxxx'][key] === 'undefined' ? (res['dataFormxxx'][k][key] != null ? (res['dataFormxxx'][k][key] != null ? res['dataFormxxx'][k][key] : '') : '') : (res['dataFormxxx'][key] != null ? res['dataFormxxx'][key] : '') : '' )+'">';
									}else if(val['type'] == 'textarea'){
					      				html+='<textarea name="'+key+'_lang" class="form-control '+( (typeof val['class'] !== 'undefine') ? val['class'] : '' )+'">'+( (typeof res['dataFormxxx']) !== 'undefined' ? typeof res['dataFormxxx'][key] === 'undefined' ? (res['dataFormxxx'][k][key] != null ? res['dataFormxxx'][k][key] : '') : res['dataFormxxx'][key] : '' )+'</textarea>';
									}
									else if(val['type'] == 'image' || val['type'] == 'file'){
									var asset = '{{asset("/")}}';
									html+='<button type="button" class="btn btn-success" onclick="elfinder(\'{{URL::to(admin.'/elfinder')}}?type='+val['type']+'\',\''+key+'\')">Browse</button>';
									html+='<input type="hidden" name="'+key+'" value="'+( (typeof res['dataFormxxx']) !== 'undefined' ? (res['dataFormxxx'][key] != null ? res['dataFormxxx'][key] : '') : '' )+'" readonly>';
									if(typeof res['dataFormxxx'] !== 'undefined'){
										if(res['dataFormxxx'][key]){
											if(cekFileExist(asset+res['dataFormxxx'][key])){
												var ext = res['dataFormxxx'][key].split(".");
												if(jQuery.inArray(ext.pop(),['jpg','jpeg','png','ico','gif','webp']) !== -1) {
														html+='<div style="margin-top:10px;" class="img_'+key+'"><img src="'+asset+res['dataFormxxx'][key]+'" class="img-fluid" width="200">';
													}else{
														html+='<div class="img_'+key+'"><a style="padding:8px 0" target="_blank" href="'+asset+res['dataFormxxx'][key]+'" >Open File</a>';
													}
											}else{
												html+='<div style="margin-top:10px;" class="img_'+key+'"><img src="'+asset+'/download.png" class="img-fluid" width="200">';
											}
											html+='<br/><a style="margin:5px 0;" href="javascript:void(0)" onclick="delImage(\''+key+'\',this)">Delete</a></div>';
										}
									}
								}
									if(typeof val['info'] !== 'undefined'){
										html+='<span class="text-info">'+val['info']+'</span>'
									}
									html+='</div></div>';
								}
							});
							
						}
					}
				}
			});
			$('#ld').remove();
			$('#formAct .modal-body').append(html);
			setTimeout(function(){
				@if(request()->segment(2) == 'slider')
					$('[name="type"]').change(function(){
						var v = $(this).val();
						var i = $('[name="image"]').parents('.row');
						var im = $('[name="image_mobile"]').parents('.row');
						var vd = $('[name="video"]').parents('.row');
						if(v == 'video'){
							i.hide();
							im.hide();
							vd.show();
						}else{
							i.show();
							im.show();
							vd.hide();
						}
					});
				@endif
				if($('.sc2x').length){
					$('.sc2x option:first').remove();
					$('.sc2x').val('').trigger('change');
					if(typeof res['dataFormxxx'] !== 'undefined'){
						var nm = $('.sc2x').attr('name');
						var r = nm.replaceAll('[]','');
						var d = res['dataFormxxx'][r];
						if(d){
							$('.sc2x').select2({
								multiple:true,
								dropdownParent: $("#formAct .modal-content"),
							  	containerCssClass: ':all:'
							}).val(d.split(",")).trigger('change');
						}else{
							$('.sc2x').select2({
								multiple:true,
								placeholder: "Pilih Posisi",
								dropdownParent: $("#formAct .modal-content"),
							  	containerCssClass: ':all:'
							});
						}				
					}else{
						$('.sc2x').select2({
							placeholder: "Pilih Posisi",
    						allowClear: true,
							multiple:true,
							dropdownParent: $("#formAct .modal-content"),
						  	containerCssClass: ':all:'
						});
					}
				}

				if($('[name="is_parent"]').length){
					var options = $('[name="is_parent"] option');
					var x = $('[name="is_parent"]').val();
		            options.detach().sort(function(a, b) {
		                var at = $(a).text();
		                var bt = $(b).text();
		                return (at > bt) ? 1 : ((at < bt) ? -1 : 0);
		            });
		            options.appendTo('[name="is_parent"]');
		            $('[name="is_parent"]').val(x);
				}
				
				if($('.ckeditor').length){
					$('.ckeditor').ckeditor();
					CKEDITOR.config.contentEditable = true;
					CKEDITOR.config.templates_files= ['{{asset("admin_assets/vendor/ckeditor/plugins/templates/templates/default.js?v=".date('YmdHis'))}}','{{asset("admin_assets/vendor/ckeditor/plugins/templates/templates/tes.js?v=".date('YmdHis'))}}'];
					CKEDITOR.config.templates= "default";
					CKEDITOR.config.templates_replaceContent = false;
					CKEDITOR.config.allowedContent = true;
					CKEDITOR.config.extraAllowedContent = 'h2 class';
                    CKEDITOR.config.protectedSource.push(/<span[^>]*><\/span>/g);
                    CKEDITOR.config.protectedSource.push(/<i[^>]*><\/i>/g);
                    CKEDITOR.config.filebrowserBrowseUrl="{{ URL::to('elfinder/ckeditor') }}";
                    CKEDITOR.config.image_previewText = CKEDITOR.tools.repeat( ' ', 100 );
                    CKEDITOR.dtd.a.div = 1;
                    $(".modal").removeAttr("tabindex");

				}
				if($('.datepicker').length){

					$(".datepicker").datetimepicker({
							format: 'Y-m-d',
	    					timepicker:false,
					        closeOnDateSelect:true,
					        theme:'dark',
					        todayButton:true
					});
					$(".datepicker").keydown(function(e){
						e.preventDefault();
					});
				}
				if($('.datepicker_seq').length){
					$('.datepicker_seq').datetimepicker({
						format:'Y-m-d H:i:s',
						showMeridian: true,
				        theme:'dark',
					    todayButton:true,
					    closeOnDateSelect:true,
					});
					$('.datepicker_seq').keydown(function(e){
						e.preventDefault();
					})
				}
				if(typeof res['dataFormxxx'] !== 'undefined'){
					if(typeof res['dataFormxxx']['widget'] !== 'undefined'){
						var obj = res['dataFormxxx']['widget'];
						for(var o in obj){
							var x = 0;
							for(var i in obj[o]){
								if(i > 0){
									if(typeof max[o] !== 'undefined'){
										if(ed >= max[o]){
											return false;
										}else{
											addWidget(o);	
										}
									}else{
										addWidget(o);
									}
								}
								for(var n in obj[o][i]['data']){
									var el = $('[name="widget['+o+']['+obj[o][i]['data'][n]['key']+'][]"]').prev().attr('onclick');
									if(def_lang == obj[o][i]['data'][n]['lang'] || obj[o][i]['data'][n]['lang'] == null){
										if(typeof el !== 'undefined'){
											var id = Math.random().toString(36).substr(2, 10);
											if(obj[o][i]['data'][n]['value'] != null){
												$('[name="widget['+o+']['+obj[o][i]['data'][n]['key']+'][]"]').eq(x).val(obj[o][i]['data'][n]['value']);
												$('[name="widget['+o+']['+obj[o][i]['data'][n]['key']+'][]"]').eq(x).val(obj[o][i]['data'][n]['value']).attr('id',id);
												var asset = "{{asset('/')}}";
												var ext = obj[o][i]['data'][n]['value'].split(".");
												if(jQuery.inArray(ext.pop(),['jpg','jpeg','png','ico','gif','webp']) !== -1) {
													var img_d = '<div style="margin-top:10px;" class="img_'+id+'"><img src="'+asset+obj[o][i]['data'][n]["value"]+'" class="img-fluid" width="200"><br><a style="padding:8px 0" href="javascript:void(0)" onclick="delImage(\''+id+'\',this)">Delete</a></div>';
												}else{
													var img_d = '<div style="margin-top:5px;" class="img_'+id+'"><a style="padding:8px 0" target="_blank" href="'+asset+obj[o][i]['data'][n]["value"]+'">Open File</a><br><a style="padding:8px 0" href="javascript:void(0)" onclick="delImage(\''+id+'\',this)">Delete</a></div>';
												}
												$('[name="widget['+o+']['+obj[o][i]['data'][n]['key']+'][]"]').eq(x).val(obj[o][i]['data'][n]['value']).after(img_d);
											}
										}else{
											$('[name="widget['+o+']['+obj[o][i]['data'][n]['key']+'][]"]').eq(x).val(obj[o][i]['data'][n]['value']);
										}
									}else{
										$('[name="widget['+o+']['+obj[o][i]['data'][n]['key']+'_lang][]"]').eq(x).val(obj[o][i]['data'][n]['value']);
									}
								}
								$('[name="widget['+o+'][sequence][]"]').eq(x).val(obj[o][i]['sequence']);
								$('[name="widget['+o+'][is_active][]"]').eq(x).val(obj[o][i]['is_active']);
								x++;
							}
						}
					}
				}

			},500);
		}

		window.cekFileExist = function (urlToFile) {
		    var xhr = new XMLHttpRequest();
		    xhr.open('HEAD', urlToFile, false);
		    xhr.send();
		     
		    if (xhr.status == "404") {
		        return false;
		    } else {
		        return true;
		    }
		}

		window.widgetHtml = function(k,v,data=null){
			var res='<div><label class="col-form-label">'+v['label'].toUpperCase()+'</label></div>';
			res+='<div id="widgetData_'+k+'">';
			res+='<div class="widgetDataClass_'+k+'">';
			$.each(v['data'], function(ky,vy){
				res+='<div>';
				res+="<div style='padding: 8px;border: 1px #db6574 solid;margin:8px 8px 24px; background: #1e1e1e' class='row align-items-center'>";
					res+='<div class="col-md-8">';
							$.each(vy, function(ky2,vy2){
								res+='<div class="form-group row">';
								res+='<label for="'+ky2+'" class="col-sm-8 col-form-label">'+( (typeof vy2['label']) !== 'undefined' ?  vy2['label'] :  ky2 )+' '+(typeof vy2['required'] !== 'undefined' ? (vy2['required'] == true ? '<span class="text-danger">*</span>' : '') : '')+'</label>';
								res+='<div class="col-sm-12">';
									if(jQuery.inArray(vy2['type'],['text','password','email','date','number']) !== -1){
										res+='<input '+(typeof vy2['maxlength'] !== 'undefined' ? 'maxlength='+vy2['maxlength'] : '')+'  '+(typeof vy2['minlength'] !== 'undefined' ? 'minlength='+vy2['minlength'] : '')+' name="widget['+k+']['+ky2+'][]" type="'+vy2['type']+'" class="form-control '+( (typeof vy2['class'] !== 'undefined') ? vy2['class'] : '' )+'" value="'+( (typeof v['data']['dataFormxxx']) !== 'undefined' && vy2['type'] != 'password' ? typeof vy['dataFormxxx'][key] === 'undefined' ? (v['data'][0]['dataFormxxx'][def_lang][k] != 'null' ? (v['data'][0]['dataFormxxx'][def_lang][k] != null ? v['data'][0]['dataFormxxx'][def_lang][k] : '')  : '') : (v['data'][0]['dataFormxxx'][k] != null ? v['data'][0]['dataFormxxx'][k] : '') : '' )+'">';
									}else if(vy2['type'] == 'textarea'){
	      								res+='<textarea name="widget['+k+']['+ky2+'][]" class="form-control '+( (typeof vy2['class'] !== 'undefine') ? vy2['class'] : '' )+'">'+( (typeof v['data'][0]['dataFormxxx']) !== 'undefined' ? typeof v['data'][0]['dataFormxxx'][k] === 'undefined' ? (v['data'][0]['dataFormxxx'][def_lang][k] != null ? v['data'][0]['dataFormxxx'][def_lang][k] : '') : (v['data'][0]['dataFormxxx'][k] != null ? v['data'][0]['dataFormxxx'][k] : '')  : '' )+'</textarea>';
	      							}else if(vy2['type'] == 'image' || vy2['type'] == 'file' || vy2['type'] == 'video'){
										var asset = '{{asset("/")}}';
										res+='<button type="button" class="btn btn-success" onclick="elfinder(\'{{URL::to(admin.'/elfinder')}}?type='+vy2['type']+'\',this)">Browse Widget</button>';
										res+='<input type="hidden" name="widget['+k+']['+ky2+'][]" value="'+( (typeof v['data'][0]['dataFormxxx']) !== 'undefined' ? (v['data'][0]['dataFormxxx'][ky2] != null ? v['data'][0]['dataFormxxx'][ky2] : '') : '' )+'" readonly>';
										if(typeof v['data'][0]['dataFormxxx'] !== 'undefined'){
											if(v['data'][0]['dataFormxxx'][ky2]){
												if(cekFileExist(asset+v['data'][0]['dataFormxxx'][ky2])){
													var ext = v['data'][0]['dataFormxxx'][ky2].split(".");
													if(jQuery.inArray(ext.pop(),['jpg','jpeg','png','ico','gif','webp']) !== -1) {
															res+='<div style="margin-top:10px;" class="img_'+ky2+'"><img src="'+asset+v['data'][0]['dataFormxxx'][ky2]+'" class="img-fluid" width="200">';
														}else{
															res+='<div class="img_'+ky2+'"><a style="padding:8px 0" target="_blank" href="'+asset+v['data'][0]['dataFormxxx'][ky2]+'" >Open File</a>';
														}
												}else{
													res+='<div style="margin-top:10px;" class="img_widget['+k+']['+ky2+'][]"><img src="'+asset+'/download.png" class="img-fluid" width="200">';
												}
												res+='<br/><a style="padding:8px 0" href="javascript:void(0)" onclick="delImage(\'widget['+k+']['+ky2+'][]\',this)">Delete</a></div>';
											}
										}
									}
									if(typeof vy2['info'] !== 'undefined'){
										res+='<span class="text-info">'+vy2['info']+'</span>'
									}
								res+='</div></div>';
								if(typeof l !== 'undefined'){
									if(typeof vy2['multilang'] !== 'undefined'){
										$.each(l,function(klang,vlang){
											if(klang != def_lang){
												res+='<div class="form-group row">';
												res+='<label for="'+ky2+'" class="col-sm-8 col-form-label">'+( (typeof vy2['label']) !== 'undefined' ?  vy2['label']+" ("+vlang+")" : (ky2 == 'is_active') ? 'Is Active' : key )+' '+(typeof vy2['required'] !== 'undefined' ? (vy2['required'] == true ? '<span class="text-danger">*</span>' : '') : '')+'</label>';
												res+='<div class="col-sm-12">';
												if(jQuery.inArray(vy2['type'],['text']) !== -1){
												res+='<input name="widget['+k+']['+ky2+'_lang][]" type="'+vy2['type']+'" class="form-control '+( (typeof vy2['class'] !== 'undefined') ? vy2['class'] : '' )+'" value="'+( (typeof v['data'][0]['dataFormxxx']) !== 'undefined' && vy2['type'] != 'password' ? typeof v['data'][0]['dataFormxxx'][ky2] === 'undefined' ? (v['data'][0]['dataFormxxx'][klang][ky2] != null ? (v['data'][0]['dataFormxxx'][klang][ky2] != null ? v['data'][0]['dataFormxxx'][klang][ky2] : '') : '') : (v['data'][0]['dataFormxxx'][ku2] != null ? v['data'][0]['dataFormxxx'][ky2] : '') : '' )+'">';
												}else if(vy2['type'] == 'textarea'){
								      				res+='<textarea name="widget['+k+']['+ky2+'_lang][]" class="form-control '+( (typeof vy2['class'] !== 'undefine') ? vy2['class'] : '' )+'">'+( (typeof v['data'][0]['dataFormxxx']) !== 'undefined' ? typeof v['data'][0]['dataFormxxx'][key] === 'undefined' ? (v['data'][0]['dataFormxxx'][klang][ky2] != null ? v['data'][0]['dataFormxxx'][klang][ky2] : '') : v['data'][0]['dataFormxxx'][ky2] : '' )+'</textarea>';
												}
												if(typeof vy2['info'] !== 'undefined'){
													res+='<span class="text-info">'+vy2['info']+'</span>'
												}
												res+='</div></div>';
											}
										});
										
									}
								}
							});	
					res+='<div class="form-group row">';
								res+='<label for="sequence_data" class="col-sm-2 col-form-label">Sequence</label><div class="col-sm-12">';
								res+='<input name="widget['+k+'][sequence][]" type="text" class="form-control datepicker_seq"><span class="text-info"></span>The newer will be displayed in upper position</div></div>';
					res+='<div class="form-group row"><label for="is_active" class="col-sm-2 col-form-label">Is Active</label><div class="col-sm-12">';
								res+='<select name="widget['+k+'][is_active][]" class="form-control">';
								res+='<option value="1" selected>True</option>';
								res+='<option value="0">False</option></select></div></div>';
					res+='</div>';

					

				    res+='<div class="col-md-4 justify-content-md-center act"><div class="row justify-content-md-center" '+( typeof min[k] !== 'undefined' ? (min[k] == 1 ? 'style="display:none;"' : '') : "")+'><button type="button" class="btn btn-danger" onclick=delRow(this,"'+k+'")><i class="fa fa-minus"></i> delete</button></div></div>';
				res+='</div><hr/></div>';
			});
			
			res+='</div>';
			res+='</div>';
			res+='<div class="row justify-content-md-center">';
			if(typeof max[k] !== 'undefined'){
				if(max[k] > 1)
					res+='<button type="button" class="btn btn-success act-add-'+k+'" onclick="addWidget(\''+k+'\')"> <i class="fa fa-plus"></i> add</button>';
			}else{
				res+='<button type="button" class="btn btn-success act-add-'+k+'" onclick="addWidget(\''+k+'\')"> <i class="fa fa-plus"></i> add</button>';
			}
			// if(typeof min[k] !== 'undefined' || min[k] < 1){
			// 	res+='&nbsp;<button type="button" class="btn btn-secondary act-delwidget-'+k+'" onclick="removeAllWidget(\''+k+'\')"> No Use Widget</i></button>';
			// }
			res+='</div>';
			res+='</div>';
			return res;
		}
		window.addWidget = function(k){
			if($('[name="no_use_widget['+k+']"]').length){
				$('[name="no_use_widget['+k+']"]').remove();
			}
			if(!$('.act-delwidget-'+k).is(':visible')){
				$('.act-delwidget-'+k).show();
			}
			if(!$('#widgetData_'+k).is(':visible')){
				$('#widgetData_'+k).show();
				if(typeof max[k] !== 'undefined'){
					if(ed[k] < max[k]){
						$('.act-add-'+k).show();
					}else{
						$('.act-add-'+k).hide();
					}
				}else{
					$('.act-add-'+k).show();
				}
				return;
			}
			ed[k]++;
			if($('.widgetDataClass_'+k+':first').is('visible')){
				var cl = $('.widgetDataClass_'+k+':first').clone();
			}else{
				if($('.widgetDataClass_'+k+':visible').length){
					var cl = $('.widgetDataClass_'+k+':visible:first').clone();
				}else{
					$('.widgetDataClass_'+k+':first').show();
					$('.widgetDataClass_'+k+':first').find('input,textarea,select').prop('disabled',false);
					$('.widgetDataClass_'+k+':first').find('input,textarea,select').val('');
					$('.widgetDataClass_'+k+':first').find('select[name="is_active"]').val('1');
					$('.widgetDataClass_'+k+':first').find('.btn-success').next().next().remove();
					return;
				}
			}
			$(cl).find('input[type="text"]').val('');
			$(cl).find('input[type="hidden"]').val('');
			$(cl).find('textarea').val('');
			$(cl).find('input[type="hidden"]').removeAttr('id');
			$(cl).find('input[type="hidden"]').next().remove();
			$(cl).find('.text-danger').remove();
			if($(cl).find('.ckeditor').length){
				var idx = Math.random().toString(36).substr(2, 20)
				$(cl).find('.ckeditor').next().remove();
				$(cl).find('.ckeditor').attr('id',"id_"+idx);
			}
			if($(cl).find('.datepicker').length){
				$(cl).find('.datepicker').datetimepicker('destroy');
				
			}
			if(!$(cl).find('.act > .row').is(':visible')){
				$(cl).find('.act > .row').show();
			}
			$('#widgetData_'+k).append(cl);
			setTimeout(function(){
				
				 if($(cl).find('.ckeditor').length){
				 	CKEDITOR.replace('id_'+idx);
				 	CKEDITOR.instances['id_'+idx].setData('');
			 	 	CKEDITOR.config.templates_files= ['{{asset("admin/vendor/ckeditor/plugins/templates/templates/default.js?v=".date('YmdHis'))}}','{{asset("admin/vendor/ckeditor/plugins/templates/templates/tes.js?v=".date('YmdHis'))}}'];
				 	 CKEDITOR.config.templates= "default";
				 	 CKEDITOR.config.templates_replaceContent = false;
				 	 CKEDITOR.config.allowedContent = true;
				 	 CKEDITOR.config.readOnly = false;
                      CKEDITOR.config.protectedSource.push(/<span[^>]*><\/span>/g);
                      CKEDITOR.config.protectedSource.push(/<i[^>]*><\/i>/g);
                      CKEDITOR.config.filebrowserBrowseUrl="{{ URL::to('elfinder/ckeditor') }}";
                      CKEDITOR.config.image_previewText = CKEDITOR.tools.repeat( ' ', 100 );
                      CKEDITOR.dtd.a.div = 1;
				 }
				if($(cl).find('.datepicker').length){
					$('.datepicker').datetimepicker({
							format: 'Y-m-d',
							lang:'id',
	    					timepicker:false,
					        closeOnDateSelect:true,
					        theme:'dark',
					});
				}
				if($('.datepicker_seq').length){
					$('.datepicker_seq').datetimepicker({
						format:'Y-m-d H:i:s',
						showMeridian: true,
				        theme:'dark',
					    todayButton:true
					});
				}
			},1000);
			if(typeof max[k] !== 'undefined'){
				if(ed[k] >= max[k]){
					$('.act-add-'+k).hide();
				}
			}

		}

		window.delRow = function(f,n){
			if($(f).parents('.widgetDataClass_'+n).index() == 0){
				$(f).parents('.widgetDataClass_'+n).find('input,textarea,select').prop('disabled',true);
				$(f).parents('.widgetDataClass_'+n).hide();
			}else{
				$(f).parents('.widgetDataClass_'+n).remove();
			}
			if(!$('.widgetDataClass_'+n+':visible').length){
				$('#formActData').append('<input type="hidden" name="no_use_widget['+n+']" value="true"/>');
			}
			ed[n]--;
			console.log(max,ed);
			if(typeof max[n] !== 'undefined'){
				if(ed[n] < max[n]){
					$('.act-add-'+n).show();
				}
			}else{
				$('.act-add-'+n).show();
			}
		}

		window.removeAllWidget = function(v){
			var idName = "widgetData_"+v;
			$('#'+idName).hide();
			$('.act-delwidget-'+v).hide();
			if(!$('.act-add-'+v).is(':visible')){
				$('.act-add-'+v).show();
			}
			$('#formActData').append('<input type="hidden" name="no_use_widget['+v+']" value="true"/>');
		}

		window.saveData = function(act){
			for(var r in CKEDITOR.instances){
				if(r.startsWith('id_') !== false){
					CKEDITOR.instances[r].updateElement();
				}
			}
			$('#formActData').append('<input type="hidden" name="_token" value="{{csrf_token()}}">');
			var data = $('#formActData').serialize();
			if($('.err-req').length){
				$('.err-req').remove();
			}
			var a = $('#btn_save').attr('onclick');
			var txt = $('#btn_save').text();
			$('#btn_save').text("Loading...");
			$('#btn_save').removeAttr('onclick');
			$.ajax({
				url:'{{url(admin."/".request()->segment(2))}}/'+act,
				type:'POST',
				data:data,
				dataType:'json',
				success:function(r){
					if(r.status == 'ok'){
						showMsg(r.msg,'ok');
						$('#example').DataTable().ajax.reload();
						$('#formAct').modal('hide');
						if(act == 'create'){
							//setTimeout(function(){
							//	callForm();
							//},1000);
						}
					}else if(r.status == 'err'){
						var i=1;
						if(typeof r.validate !== 'undefined'){
							$.each(r.validate, function(k,v){
								if(k == 'widget'){
									var nmf = null;
									$.each(v, function(erk,erv){
										$.each(erv,function(erkk,ervv){
											$.each(ervv,function(kv,vv){
												nmf = $('[name="widget['+erk+']['+erkk+'][]"]').eq(kv);
												if(!$('[name="widget['+erk+']['+erkk+'][]"]').eq(kv).is(':visible')){
													$('[name="widget['+erk+']['+erkk+'][]"]').eq(kv).after('<br/><span class="text-danger err-req">'+vv+'</span>');
												}else{
													$('[name="widget['+erk+']['+erkk+'][]"]').eq(kv).after('<span class="text-danger err-req">'+vv+'</span>');
												}
												if(i == 1){
													if(!$(nmf).is(':visible')){
														var el = $(nmf).prev();
														var c = $('#formAct');
														var id_el = $(nmf).attr('id');
														if($(nmf).is('textarea')){
															if($('#cke_'+id_el).length && id_el !== 'undefined'){
																$('#formAct').stop().animate({
															        scrollTop: $('#cke_'+id_el).offset().top - (c.offset().top + 100) + c.scrollTop()
															    }, 100);
															}else{
															 	var e = $(nmf).next();
																$('#formAct').stop().animate({
															        scrollTop: $(e).offset().top - (c.offset().top + 100) + c.scrollTop()
															    }, 100);
															}
														}else{
															$('#formAct').stop().animate({
														        scrollTop: el.offset().top - (c.offset().top + 100) + c.scrollTop()
														    }, 100);
														}
													}else{
														$(nmf).focus();
													}
													i++;
												}
											});
										});
									});
								}else{
									if(!$('[name="'+k+'"]').is(':visible')){
										$('[name="'+k+'"]').after('<br/><span class="text-danger err-req">'+v+'</span>');
									}else{
										$('[name="'+k+'"]').after('<span class="text-danger err-req">'+v+'</span>');
									}
									if(i == 1){
										var t = $('[name="'+k+'"]');
										if(!$(t).is(':visible')){
											var el = $(t).prev();
											var c = $('#formAct');
											if($('#cke_'+k).length){
												$('#formAct').stop().animate({
											        scrollTop: $('#cke_'+k).offset().top - (c.offset().top + 100) + c.scrollTop()
											    }, 100);
											}else{
												$('#formAct').stop().animate({
											        scrollTop: el.offset().top - (c.offset().top + 100) + c.scrollTop()
											    }, 100);
											}
										}else{
											$('[name="'+k+'"]').focus();
										}
									}
								}
								i++;
							});
						}else{
							alert("Something Wrong, Please Check your form");
						}
				}
				$('#btn_save').attr('onclick',a);
				$('#btn_save').text(txt);
			},
				error:function(xhr){
					console.log(xhr);
					alert('Error Server');
					$('#btn_save').attr('onclick',a);
					$('#btn_save').text(txt);
				}
			});
			$('#formActData [name="_token"]').remove();
		}
		
		window.showMsg = function(msg,type='danger'){
			$('#msgRes').removeAttr('class');
			$('#msgRes').addClass('alert');
			if(type == 'ok')
				$('#msgRes').addClass('alert-success');
			else
				$('#msgRes').addClass('alert-danger');
			$('.msgr').text(msg);
			$('#msgRes').show().delay(3000).fadeOut(1000);
		}

		window.crm = function(t){
			var c = confirm('Are You Sure ?');
			if(c){
				var url = $(t).attr('href');
				$.ajax({
					url:url,
					type:'DELETE',
					dataType:'json',
					success:function(res){
						if(res.status == 'ok'){
							showMsg('Delete Successfully','ok');
							$('#example').DataTable().ajax.reload();
						}else{
							showMsg(res.msg);
						}
					},
					error:function(){
						alert('Error');
					}
				});
			}
			return false;
		}

		window.getEdit = function(t){
			$('#formAct').modal({backdrop: 'static', keyboard: false});
			var url = $(t).attr('href');
			$.ajax({
				url:url,
				type:'put',
				dataType:'json',
				beforeSend:function(){
					$('#formAct .modal-body').append('<div id="ld"><center>Loading...</center></div>');
				},
				success:function(res){
					generateForm(res.form);
					if(res.script != null){
						 var src = document.createElement('script');
						 src.text = res.script.replace(/[\n\r\t]/g, '');
						 document.body.appendChild(src);
					}
					$('#btn_save').attr('onclick','saveData("edit/'+res.form['pkKey']+'")');
				},
				error:function(){
					alert('error');
				}
			});
			return false;
		}
		var f = null;
		var f_old = null
		window.elfinder = function (url,k){
	        if($('.active_elfinderxxx').length){
	            $('.active_elfinderxxx').removeClass();
	        }
	        if(typeof f === 'object'){
	        	f = null;
	        }
	        if(typeof k === 'object'){
	        	var aft = $(k).next();
	        	f_old = aft.attr('id');
	        	var id = Math.random().toString(36).substr(2, 10);
	        	aft.attr('id',id);
	        	$('#'+id).addClass('active_elfinderxxx');
	        	f = id;
	        	console.log('a');
	        	console.log(f);
	        }else{
	        	$('[name="'+k+'"]').addClass('active_elfinderxxx');
	        	console.log('b');
	        	console.log(f);
	    	}
	        var win = window.open(url,"_blank","location=no,menubar=no,resizable=yes,scrollbars=yes,toolbar=yes");
	        win.onbeforeunload = function(){
	        	$('.active_elfinderxxx').removeClass();
	        }
	    }

	    window.setPath = function(res){
        if($('.active_elfinderxxx').length){
        	var name='';
        	if(f == null){
            	name = $('.active_elfinderxxx').attr('name');
	            if($('.img_'+name).length){
	                $('.img_'+name).remove();
	            }
	            if(jQuery.inArray(res.mime,['image/jpg','image/jpeg','image/png','image/gif','image/ico']) !== -1){
	                var html = '<div style="margin-top:10px;" class="img_'+name+'"><img src="'+res.url+'" class="img-fluid" width="200">';
	                html+='<br/><a href="javascript:void(0)" onclick="delImage(\''+name+'\',this)">Delete</a></div>';
	            }else{
	                var html = '<div style="margin-top:10px;" class="img_'+name+' res_'+name+'"><a style="padding:8px 0" href="'+res.url+'" target="_blank">Open File</a>';
	                html+='<br/><a style="padding:8px 0" href="javascript:void(0)" onclick="delImage(\''+name+'\',this)">Delete</a></div>';
	            }
	            f=null;
	            f_old =null;
	            var pturl = res.url.split("{{url('/').'/'}}");
	            $('[name="'+name+'"]').val(pturl[1]);
	            $('[name="'+name+'"]').after(html);
        	}else{
        		if($('.img_'+f_old).length){
	                $('.img_'+f_old).remove();
	            }
        		if(jQuery.inArray(res.mime,['image/jpg','image/jpeg','image/png','image/gif','image/ico']) !== -1){
	                var html = '<div style="margin-top:10px;" class="img_'+f+'"><img src="'+res.url+'" class="img-fluid" width="200">';
	                html+='<br/><a href="javascript:void(0)" onclick="delImage(\''+f+'\',this)">Delete</a></div>';
	            }else{
	                var html = '<div style="margin-top:10px;" class="img_'+f+' res_'+f+'"><a style="padding:8px 0" href="'+res.url+'" target="_blank">Open File</a>';
	                html+='<br/><a style="padding:8px 0" href="javascript:void(0)" onclick="delImage(\''+f+'\',this)">Delete</a></div>';
	            }

	            var pturl = res.url.split("{{url('/').'/'}}");
	            $('#'+f).val(pturl[1]);
	            $('#'+f).after(html);
	            f=null;
	            f_old =null;
        	}
        }
    }

    window.delImage = function(n){
    	if($('[name="'+n+'"]').length){
	    	$('[name="'+n+'"]').val('');
	    	if($('.img_'+n).length){
	    		$('.img_'+n).remove();
	    	}
    	}else{
    		$('#'+n).val('');
    		if($('.img_'+n).length){
	    		$('.img_'+n).remove();
	    	}
    	}
    }
    window.showChild = function(t){
    	var cls = $(t).attr('id'); 
    	if($("."+cls).length){
    		$("."+cls).remove();
    		if($('.trchild').length)
    			$('.trchild').remove();
    		$('#'+cls+"> i").attr("class","fa fa-caret-right");
    		return;
    	}
    	$('#'+cls+"> i").attr("class","fa fa-caret-down");
    	var data = $(t).attr('data');
    	var json = JSON.parse(data);
    	if(Object.keys(json).length){
    		var tr = '';
    		var asset = "{{asset('/')}}";
    		var adm_url = "{{url(admin)}}/";
    		$.each(json,function(k,v){
    			tr+='<tr class="'+$(t).attr('id')+' '+(typeof $(t).attr('v2') !== 'undefined' ? "trchild" : "")+'">';
    			if(v['child'] != null){
    				tr+='<td><div style="margin-left:'+(typeof $(t).attr('v2') !== 'undefined' ? "90px;" : "30px;")+'">'+v['label']+' <div data=\''+JSON.stringify(v['child'])+'\' v2="true" id="id_'+v['id']+'" onclick="showChild(this)"><i class="fa fa-caret-right"></i></div></div></td>';
    			}else{
    				tr+='<td><div style="margin-left:'+(typeof $(t).attr('v2') !== 'undefined' ? "90px;" : "30px;")+'">'+v['label']+'</div></td>';
    			}
    			tr+='<td>'+v['template']+'</td>';
    			tr+=(v['banner'] == '' || v['banner'] == 'null' || v['banner'] == null) ? '<td>-</td>' : '<td><img src="'+asset+v['banner']+'" width="100" height="100"/></td>';
    			tr+='<td>'+v['parent']+'</td>';
    			tr+='<td>'+v['sequence']+'</td>';
    			tr+='<td>'+v['is_active']+'</td>';
    			tr+='<td>';
    			if(v['is_delete']){
    				tr+='<a href="'+adm_url+'menus/delete/'+v['id']+'" class="btn btn-danger" onclick="return crm(this);">Delete</a>&nbsp; ';
    			}
    			tr+='<a href="'+adm_url+'menus/edit/'+v['id']+'" class="btn btn-success" onclick="return getEdit(this);">Edit</a>';
    			
    			tr+='</td>';
    			tr+='</tr>';
    		});
    		$(t).parents('tr').after(tr);
    	}

    }
    </script>
@endsection