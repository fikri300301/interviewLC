@extends('layouts.mainlayouts')

@section('title','History-List')

@section('page-name','categort')
      
@section('content')

<h1>History-List</h1>
  
<div>
    <table class="table my-4">
    <thead>
      <tr>
        <th scope="col">no</th>
      
        <th scope="col">word</th>
        <th scope="col">Definition</th>
        <th scope="col">Hapus</th>
        
      
      </tr>
    </thead>
    <tbody>
        <?php 
        $a=1;    
        ?>
@foreach ($words as $word)
<tr>
    <th>{{ $a++ }}</th>
   
    <td>{{ $word->word }}</td>
    <td>{{ $word->definition }}</td>
   <td> <a href="history-delete/{{ $word->id }}"> <button class="btn btn-danger " onclick="return confirm ('are you sure to delete word meaning {{ $word->word}}?')"><i class="bi bi-trash3-fill"></i></button></a></td>
      
</tr> 
@endforeach
       
      
    </tbody>
  </table>

<div>
  {{ $words->links() }}
</div>
</div>

@endsection

