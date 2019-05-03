@extends('layouts.app')

@section('content')
<div class="content">
                <div class="title m-b-md">
                    Menu
                </div>

              <div class="col-md-6">
	  					<h3>Tambah Menu Baru</h3>
				  			{!! Form::open(['route'=>'add.menu']) !!}

				  				<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
									{!! Form::label('Nama:') !!}
									{!! Form::text('nama', old('nama'), ['class'=>'form-control', 'placeholder'=>'Masukkan Nama']) !!}
									<span class="text-danger">{{ $errors->first('nama') }}</span>
								</div>


								<div class="form-group {{ $errors->has('parent_id') ? 'has-error' : '' }}">
									{!! Form::label('Parent:') !!}
									{!! Form::select('parent_id',$allMenu, old('parent_id'), ['class'=>'form-control', 'placeholder'=>'Pilih Parent']) !!}
									<span class="text-danger">{{ $errors->first('parent_id') }}</span>
								</div>


								<div class="form-group">
									<button class="btn btn-success">Add New</button>
								</div>


				  			{!! Form::close() !!}


	  				</div>

                <div>
                  

                  <ul id="tree1">
				            @foreach($menu as $val)
				                <li>
				                    <span>{{ $val->nama }} <a style="font-size: 11px" href="/menu/delete/{{$val->id}}">Hapus</a></span>
				                    @if(count($val->childs))
				                        @include('listChild',['childs' => $val->childs])
				                    @endif
				                </li>

				            @endforeach
                  </ul>

            </div>
        </div>
@endsection
