@extends('layouts.app')

@section('content')
   <div class="flex justify-center  ">
       <div class="w-8/12 bg-white p-6 rounded-lg">
       <form action="{{ route('posts')}}" method="POST" class="mb-4">
        @csrf
            <div class="mb-4">
                <label for="body" class="sr-only">Body</label>
                <textarea name="body" id="body" cols="30" rows="4" 
                class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror md:focus:bg-white "
                 placeholder="Post Something!!"></textarea>
                 @error('body')
                     <div class="text-red-500 mt-2 text-sm">
                         <div class="mb-4">{{'write some post !!'}}</div>
                        
                     </div>
                 @enderror
                 <div>
                     <button type="submit" class="bg-blue-500 text-green px-4 py-2 rounded font-medium">
                        Post
                     </button>
                 </div>

            </div>
        </form>

        {{-- To show the Posts   --}} 
        @if ($posts->count())
         @foreach ($posts as $post)
             <div class="mb-4">
             <a href=""
              class="font-bold">{{ $post ->user->name}}</a> <span 
              class="text-gray-600 text-sm">{{$post->created_at->diffForHumans()}}</span>

             <p class="mb-2">{{$post->body}}</p>
                 <div class="flex items-center">
                     {{-- like --}}
                     <form action="" method="POST" class="mr-1">
                         @csrf
                         <button type="submit" class="text-blue-500">Like</button>
                     </form>
                     {{-- unlink --}}
                     <form action="" method="POST" class="mr-1">
                         @csrf
                         <button type="submit" class="text-red-500">Unlike</button>
                     </form>

                 </div>
             </div>
         @endforeach
         {{$posts->links()}}
            
        @else
            <p>There are NO posts:(</p>
        @endif
        </div>
   </div>
@endsection