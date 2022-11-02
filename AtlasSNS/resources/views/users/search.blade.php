 @extends('layouts.login')

 @section('content')

 {!! Form::open(['url' => '/search']) !!}
 <div>
   <form action="{{route('./search')}}" method="GET">
     @csrf
     <input type="text" name="keyword" value="{{$keyword}}">
     <input type="submit" value="検索">
   </form>

   <ul>
     @foreach(@users as $user)
     <li>
       {{$user -> username}}
     </li>
     @endforeach
   </ul>
 </div>


 {!! Form::close() !!}
 @endsection
