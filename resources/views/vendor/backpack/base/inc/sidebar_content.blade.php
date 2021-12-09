<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class=" nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('tag') }}'><i class="fa fa-circle" aria-hidden="true"></i> Tags</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('post') }}'><i class="fa fa-circle" aria-hidden="true"></i> Posts</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('category') }}'><i class="fa fa-circle" aria-hidden="true"></i> Categories</a></li>
<ul class='nav-item'><a class='nav-link' href='{{ backpack_url('menu') }}'><i class="fa fa-circle" aria-hidden="true"></i>menu</a>
{{--   @foreach ($data as $key => $value)--}}
{{--       <li href="{{ route('show',$value->id) }}"></li>--}}
{{--<@foreach--}}
{{--    @foreach($data as $key => $value)--}}
{{--        <li href="{{ route('show',$value->id) }}"></li>--}}
</ul>


<li class='nav-item'><a class='nav-link' href='{{ backpack_url('log') }}'><i class='nav-icon la la-terminal'></i> Logs</a></li>