@extends('layout')



@section('content')


<a href="/import-form" class="btn btn-success mt-4 mb-4 ml-4">Import Excel File <i class="fa fa-upload" aria-hidden="true"></i></a>
<!-- Add Student button-->
<button type="button" class="btn btn-primary" id="foc" data-bs-toggle="modal" data-bs-target="#addStudent">
  Add Student <i class="fa fa-plus" aria-hidden="true"></i>
</button>

<table class="table mt-5 mb-5" id="myTable">
  <thead>
    <tr>
      <th scope="col">Roll</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Designation</th>
      <th scope="col">Salary</th>
      <th scope="col">Date</th>

      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  </tbody>
</table>






<!-- Add Student Modal start here -->
<div class="modal fade" id="addStudent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal For update and create</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" id="addStudentData">
          <input type="hidden" class="form-control tooltips" name="_token" id="_token" value="{{ csrf_token() }}" />
          <input type="hidden" id="hiddenID" name="hidden">
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input type="text" name="name" id="add-name" class="form-control">
            <small id="name_error" class="text-danger"></small>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email</label>
            <input type="email" name="email" id="add-email" class="form-control">
            <small id="email_error" class="text-danger"></small>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Designation</label>
            <input type="text" name="street" id="add-street" class="form-control">
            <small id="street_error" class="text-danger"></small>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Salary</label>
            <input type="text" name="age" id="add-age" class="form-control">
            <small id="age_error" class="text-danger"></small>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Date</label>
            <input type="date" name="date" id="add-date" class="form-control">
            <small id="date_error" class="text-danger"></small>
          </div>






      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" id="add_btn">Add Data</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Add student modal END here -->

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h6 class="text-secondary text-center">Do You Reall Want to delete this <strong><span id="studentData" class="text-danger"></strong></span> Data</h6>
        <input type="hidden" id="formtextID">
      </div>
      <div class="modal-footer">
        <form id="deleteFormID">
          @csrf
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection