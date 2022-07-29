<!doctype html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Student managment system</title>

  </head>

  <body>

    @include("navbar")

 @if ($layout=='index')
    <div class="container-fluid mt-4">
        <div class="row">
                 <section class="col-md-12">
                    @include("studentlist")
                </section>
             <section class="col"></section>
        </div>
    </div>



@elseif ($layout=='create')
<div class="container-fluid mt-4">
 <div class="row">
       <section class="col-md-7">
         @include("studentlist")
      </section>
    <section class="col-md-5">

        <div class="card mb-3">
            <img src="https://mediaindia.eu/wp-content/uploads/2017/03/o-INDIAN-STUDENTS-IN-A-CLASSROOM-facebook.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Enter information of the new student.</h5>
              @if (count($errors)>0)
              <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
              </div>

              @endif
              <form action="{{url('/store')}}" method="post">
                @csrf
             <div class="form-group">
                @if(session()->has('msg'))
                <div class="alert alert-success">
                    {{ session()->get('msg') }}

            @endif
                            <label>SR</label>
                            <input name="SR" type="text" class="form-control"  placeholder="Enter SR">
                            </div>
                            <div class="form-group">
                                <label>First Name</label>
                                <input name="FirstName" type="text" class="form-control"  placeholder="Enter the first name">
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input name="LastName" type="text" class="form-control"  placeholder="Enter the last name">
                            </div>
                            <div class="form-group">
                                <label>Age</label>
                                <input name="Age" type="text" class="form-control"  placeholder="Enter the Age">
                            </div>
                            <div class="form-group">
                                <label>Course</label>
                                <input name="Speciallity" type="text" class="form-control"  placeholder="Enter your course">
                            </div>
                            {{-- <input type="submit" class="btn-btn-info" value="save"> --}}
                            <input type="submit" class="btn btn-success" value="save">
                            <input type="reset" class="btn btn-dark" value="Reset">
                        </form>

            </div>
          </div>


    </section>
 </div>
</div>


@elseif ($layout=='show')
<div class="container-fluid mt-4">
    <div class="row">
    <section class="col">
        @include("studentlist")
    </section>
    <section class="col"></section>
</div>
</div>


@elseif ($layout=='edit')
<div class="container-fluid mt-4">
    <div class="row">
    <section class="col-md-7">
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


              </tr>
              @endforeach
            </tbody>
          </table>
          {{-- {{$students->links()}} --}}
        {{-- @include"s(tudentlist") --}}
    </section>
    <section class="col-md-5">

        <div class="card mb-3">
            <img src="https://mediaindia.eu/wp-content/uploads/2017/03/o-INDIAN-STUDENTS-IN-A-CLASSROOM-facebook.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Update informations of student.</h5>
              @if (count($errors)>0)
              <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
              </div>

              @endif
              <form action="{{url('/update/'.$student->id)}}" method="post">
                @csrf
             <div class="form-group">
                            <label>SR</label>
                            <input value="{{$student->sr}}" name="SR" type="text" class="form-control"  placeholder="Enter SR">
                            </div>
                            <div class="form-group">
                                <label>First Name</label>
                                <input value="{{$student->FirstName}}" name="FirstName" type="text" class="form-control"  placeholder="Enter the first name">
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input value="{{$student->LastName}}" name="LastName" type="text" class="form-control"  placeholder="Enter the last name">
                            </div>
                            <div class="form-group">
                                <label>Age</label>
                                <input value="{{$student->Age}}"name="Age" type="text" class="form-control"  placeholder="Enter the Age">
                            </div>
                            <div class="form-group">
                                <label>Speciallity</label>
                                <input value="{{$student->Speciallity}}" name="Speciallity" type="text" class="form-control"  placeholder="Enter the Speciallity">
                            </div>
                            <input type="submit" class="btn btn-success" value="Update">
                            <input type="reset" class="btn btn-primary" value="Reset">
                        </form>


            </div>
          </div>

            </section>
</div>
</div>


    @endif
    <br><br><br>
    <br>
    <footer id="footer" class="footer">

        <div class="footer-content">
          <div class="container">
            <div class="row gy-4">
              <div class="col-lg-5 col-md-12 footer-info">
                <a href="/" class="logo d-flex align-items-center">
                  <span>School managment System</span>
                </a>
                <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
                <div class="social-links d-flex  mt-3">
                  <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                  <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                  <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                  <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                </div>
              </div>

              <div class="col-lg-2 col-6 footer-links">
                <h4>Useful Links</h4>
                <ul>
                  <li><i class="bi bi-dash"></i> <a href="#">Home</a></li>
                  <li><i class="bi bi-dash"></i> <a href="#">About us</a></li>
                  <li><i class="bi bi-dash"></i> <a href="#">Services</a></li>
                  <li><i class="bi bi-dash"></i> <a href="#">Terms of service</a></li>
                  <li><i class="bi bi-dash"></i> <a href="#">Privacy policy</a></li>
                </ul>
              </div>

              <div class="col-lg-2 col-6 footer-links">
                <h4>Our Services</h4>
                <ul>
                  <li><i class="bi bi-dash"></i> <a href="#">Web Design</a></li>
                  <li><i class="bi bi-dash"></i> <a href="#">Web Development</a></li>
                  <li><i class="bi bi-dash"></i> <a href="#">Product Management</a></li>
                  <li><i class="bi bi-dash"></i> <a href="#">Marketing</a></li>
                  <li><i class="bi bi-dash"></i> <a href="#">Graphic Design</a></li>
                </ul>
              </div>

              <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                <h4>Contact Us</h4>
                <p>
                  A108 Adam Street <br>
                  New York, NY 535022<br>
                  United States <br><br>
                  <strong>Phone:</strong> +1 5589 55488 55<br>
                  <strong>Email:</strong> info@example.com<br>
                </p>

              </div>

            </div>
          </div>
        </div>

        <div class="footer-legal">
          <div class="container">
            <div class="copyright">
              &copy; Copyright <strong><span>School managment System</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
              <!-- All the links in the footer should remain intact. -->
              <!-- You can delete the links only if you purchased the pro version. -->
              <!-- Licensing information: https://bootstrapmade.com/license/ -->
              <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nova-bootstrap-business-template/ -->
              Designed by <a href="#">Akash khot</a>
            </div>
          </div>
        </div>
      </footer><!-- End Footer -->
      <!-- End Footer -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
