<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   
</head>

<body>
  
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
       
        <main class="py-4">
         @include('layouts.messages')
    <div class="container">
      <div class="row justify-content-center">
      
        <div class="col-md-4">   
             
            <div class="card">
              <div class="card-header">Side bar</div>
                <div class="card-body">
                 <div class="list-group">

                 <div class="list-group-item">
                   <a href="{{ route('users.index') }}">All User</a>
                 </div>

                 <div class="list-group-item">
                     <a href="{{ route('bloodgroups.index') }}">Blood Group</a>
                  </div>

                  <div class="list-group-item">
                     <a href="{{ route('states.index') }}">State</a>
                  </div>

                  <div class="list-group-item">
                     <a href="{{ route('lgas.index') }}">Lga</a>
                  </div>

                  <div class="list-group-item">
                     <a href="{{ route('nationalities.index') }}">Nationality</a>
                  </div>

                  <div class="list-group-item">
                     <a href="{{ route('subjects.index') }}">Subject</a>
                  </div>

                  <div class="list-group-item">
                   <a href="{{ route('studentrecords.index') }}"> Student</a>
                 </div>

                 <div class="list-group-item">
                   <a href="{{ route('staffrecords.index') }}">Staff</a>
                 </div>

                  <div class="list-group-item">
                     <a href="{{ route('sections.index') }}">Section</a>
                  </div>

                  <div class="list-group-item">
                     <a href="{{ route('classes.index') }}">Class</a>
                  </div>

                  <div class="list-group-item">
                     <a href="{{ route('classtypes.index') }}">Class Type</a>
                  </div> 
                
                  <div class="list-group-item">
                     <a href="{{ route('settings.index') }}">Setting</a>
                  </div>

                  <div class="list-group-item">
                   <a href="{{ route('dorms.index') }}">Dorm</a>
                  </div>   


                 <div class="list-group-item">
                   <a href="{{ route('exams.index') }}">Exams</a>
                 </div>
                 
                 <div class="list-group-item">
                   <a href="{{ route('grades.index') }}">Grades</a>
                 </div>

                  <div class="list-group-item">
                     <a href="{{ route('books.index') }}">Books</a>
                  </div>      

                 <div class="list-group-item">
                   <a href="{{ route('marks.index') }}">Marks</a>
                 </div>

                 <div class="list-group-item">
                   <a href="{{ route('pins.index') }}">Pins</a>
                 </div>

                 <div class="list-group-item">
                   <a href="{{ route('skills.index') }}">Skills</a>
                 </div>

                 <div class="list-group-item">
                   <a href="/{{ route('examrecords.index') }}">Exam Record</a>
                 </div>

                 <div class="list-group-item">
                   <a href="{{ route('bookrequests.index') }}">Book Requests</a>
                 </div>               

                 <div class="list-group-item">
                     <a href="{{ route('payments.index') }}">Payment</a>
                  </div>

                 

                 <div class="list-group-item">
                     <a href="{{ route('timetablerecords.index') }}">Time Table Record</a>
                  </div>

                  <div class="list-group-item">
                     <a href="{{ route('timeslots.index') }}">Time Slot</a>
                  </div>
                           
                  <div class="list-group-item">
                     <a href="{{ route('timetables.index') }}">Time Table</a>
                  </div>

                  <div class="list-group-item">
                     <a href="{{ route('calender.fullcalender') }}">Calender</a>
                  </div>

                  <div class="list-group-item">
                   <a href="{{ route('profiles.index') }}">Profile</a>
                  </div>


                  <div class="list-group-item">
                     <a href="{{ route('attendances.index') }}">Attendance</a>
                  </div>

                  <div class="list-group-item">
                     <a href="{{ route('noticeboards.index') }}">Notice Board</a>
                  </div>

                  <div class="list-group-item">
                     <a href="{{ route('promotions.index') }}">Promotions</a>
                  </div>
                  
                  <div class="list-group-item">
                     <a href="{{ route('settings.index') }}">Setting</a>
                  </div>
                  
           </div>
              </div>
            </div>
         </div>   
          
            @guest
               <h2>please login / register !</h2>
            @endguest
            @yield('content')
            </div>
         </div>
        </main>
    </div>
</body>
</html>
