<div class="col-sm-3 vertical-nav bg-white " id="sidebar">

    <p class="text-gray font-weight-bold  ">Department Lists</p>

    <ul class="nav flex-column bg-white mb-0">
        @foreach($departments as $department)

            <li class="nav-item ">
                <a href="{{ url('/academics/faculty') . '/' . $department->name }}" class="nav-link text-dark "><i class="fa fa-chevron-right mr-3 "></i>{{ ucfirst($department->name) }} </a>
            </li>
        @endforeach
    </ul>

</div>
