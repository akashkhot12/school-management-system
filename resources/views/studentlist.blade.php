<div class="card mb-3">
    <img src="https://dominicanhighschool.com/wp-content/uploads/2018/09/horizontal-logo-light-background-1.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">List of students </h5>
      <p class="card-text">You can find here all the informations about students in the system.</p>

      <table class="table">

        <thead class="thead-light">
          <tr>
            <th scope="col">SR</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Age</th>
            <th scope="col">Speciality</th>
            <th scope="col">Operations</th>
          </tr>
        </thead>
        <tbody>
            {{-- @php
        $i=1;
       @endphp --}}
            @foreach ($students as $student)


          <tr>
            {{-- <th scope="row"></th> --}}
            <td>{{$student->SR}}</td>
            <td>{{$student->FirstName}}</td>
            <td>{{$student->LastName}}</td>
            <td>{{$student->Age}}</td>
            <td>{{$student->Speciallity}}</td>
            <td>
                <a href="{{url('/edit/'.$student->id)}}" class="btn btn-warning">Edit</a>
                <a href="{{url('/delete/'.$student->id)}}" class="btn btn-danger">Delete</a>
                {{-- <a href="{{url('/delete/',$student->id)}}"" class="btn btn-sm btn-danger">Delete</a> --}}
                 {{-- <a href="{{route('delete',$student->id)}}"><button type="button">delete</button></a></td> --}}

          </tr>
          @endforeach
        </tbody>
      </table>
      {{-- {{$students->links()}} --}}
    </div>
  </div>

