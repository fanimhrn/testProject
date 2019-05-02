<ul>
@foreach($childs as $child)
	<li>
  <span>{{ $child->nama }} <a style="font-size: 11px" href="/menu/delete/{{$child->id}}">Hapus</a></span>
	@if(count($child->childs))
            @include('listChild',['childs' => $child->childs])
        @endif
	</li>
@endforeach
</ul>