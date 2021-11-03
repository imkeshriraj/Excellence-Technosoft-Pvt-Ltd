@extends('layout')

@section('content')

<div class="row">
<div class="col-md-6 offset-md-3 mt-5">

<form method="POST" action="{{route('import')}}" enctype="multipart/form-data">
@csrf
<div class="form-group">
<label for="file">Choose CSV file</label>
<input type="file" name="file" class="form-control" />
<input type="submit" class="btn btn-primary mt-5" value="submit">

</div>

</form>
</div>


</div>

@endsection