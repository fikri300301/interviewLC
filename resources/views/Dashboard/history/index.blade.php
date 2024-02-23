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
    
</tr> 
@endforeach
       
      
    </tbody>
  </table>
</div>

@endsection

