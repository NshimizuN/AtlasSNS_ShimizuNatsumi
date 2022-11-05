 @extends('layouts.login')

 @section('content')

 {!! Form::open(['url' => '/search']) !!}
 <div>
   <form action="/search" method="GET">
     @csrf
     <input type="text" name="keyword" value="{{ $keyword }}" placeholder="ユーザー名">
     <input type="submit" name="submit" value="検索">
     <p class="key">検索ワード{{$keyword}}</p>
   </form>

   <ul>
     @foreach($users as $user)
     <li>
       {{$user -> username}}
     </li>
     @endforeach
   </ul>

 </div>


 {!! Form::close() !!}
 @endsection
