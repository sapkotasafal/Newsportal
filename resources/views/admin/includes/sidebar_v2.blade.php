<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
         <ul>
            @if(Session::get('admin_page') == 'dashboard')
            @php $active = "active"   @endphp
            @else
            @php
                $active= "";
            @endphp
            @endif


            <li class ={{$active}}>
                <a href="{{route('adminDashboard')}}"><i class="la la-dashboard"></i> <span> Dashboard</span> </a>
            </li>

                @if(Session::get('admin_page') == 'theme')
                @php $active = "active" @endphp
                @else
                @php $active = "" @endphp
                @endif

            <li class="{{ $active }}">
                <a href="{{ route('theme') }}"><i class="la la-cogs"></i> <span> Settings</span></a>
            </li>
            @if(Session::get('admin_page') == 'Social')
                @php $active = "active" @endphp
                @else
                @php $active = "" @endphp
                @endif

            <li class="{{ $active }}">
                <a href="{{ route('social') }}"><i class="la la-facebook"></i> <span>Social Settings</span></a>
            </li>


         </ul>
        </div>
    </div>
</div>
