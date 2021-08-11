@extends('layouts.app')

@section('content')
   <div class="flex justify-center  ">
       <div class="w-8/12 ">
        <div class="p-6 mb-3 bg-white p-6 rounded-lg">
            <h1 class="text-2xl font-medium mb-1">Details of <strong>{{$user->name}}</strong></h1>
            <p class="text-right">Posted {{$posts->count()}}</p>
        </div>

        <div class="bg-white p-6 rounded-lg">
        
            @if ($posts->count())
                @foreach ($posts as $post)
                <x-post :post="$post"/>
                @endforeach 
                {{$posts->links()}}
                
                @else
                    <p>There are NO posts:(</p>
          @endif
        </div>
    </div>
   </div>
@endsection