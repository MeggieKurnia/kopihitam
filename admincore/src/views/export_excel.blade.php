<table width="100%">
	@if($header)
		<tr>
		@foreach($header as $hd)
			<td><b>{{$hd}}</b></td>
		@endforeach
		</tr>
	@endif
		@foreach($data as $k=>$v)
			<tr>
				@foreach($header as $h=>$d)
					@if(isset($v[$h]))
						<td>{{$v[$h]}}</td>
					@endif
				@endforeach
			</tr>
		@endforeach
</table>