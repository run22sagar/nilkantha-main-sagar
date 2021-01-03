<div class="col-sm-2 vertical-nav bg-white " id="sidebar">

    <p class="text-gray font-weight-bold  ">Related Links</p>

    <ul class="nav flex-column bg-white mb-0">

        <li class="nav-item ">
            <a href="{{ url('/academics/faculties') }}" class="nav-link text-dark {{ $type === 'faculties' ? 'current' : '' }}"><i class="fa fa-chevron-right mr-3 "></i>Faculties</a>
            @if($type === 'Faculties')
                @include('display.departmentlists')
            @endif
        </li>

        <li class="nav-item ">
            <a href="{{ url('/academics/managements') }}" class="nav-link text-dark {{ $type === 'managements' ? 'current' : '' }}"><i class="fa fa-chevron-right mr-3 "></i>Managements</a>
        </li>

        <li class="nav-item ">
            <a href="{{ url('/academics/others') }}" class="nav-link text-dark {{ $type === 'others' ? 'current' : '' }}"><i class="fa fa-chevron-right mr-3 "></i>Others</a>
        </li>

    </ul>

</div>
