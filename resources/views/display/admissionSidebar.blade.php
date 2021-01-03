<div class="col-sm-3 vertical-nav bg-white " id="sidebar">

    <p class="text-gray font-weight-bold  ">Related Links</p>

    <ul class="nav flex-column bg-white mb-0">

        <li class="nav-item ">
            <a href="{{ url('/view/admission') }}" class="nav-link text-dark bg-light  {{ $type === 'admissions' ? 'current' : '' }}"><i class="fa fa-chevron-right mr-3 "></i>Admission</a>
        </li>

        <li class="nav-item ">
            <a href="{{ url('/view/courses') }}" class="nav-link text-dark bg-light {{ $type === 'courses' ? 'current' : '' }}"><i class="fa fa-chevron-right mr-3 "></i>Courses</a>
        </li>

    </ul>

</div>

