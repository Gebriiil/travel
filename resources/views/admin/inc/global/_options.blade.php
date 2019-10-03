<li>    
    <a href="{{ route('admin.get.'.$routeName.'.edit',$row_id) }}">
        <i class="fa fa-edit"></i> @lang('site.edit') </a>
</li>
<li>
    <a href="{{ route('admin.get.'.$routeName.'.delete',$row_id) }}" class="conform-delete">
        <i class="fa fa-close"></i> @lang('site.delete') </a>
</li>
<li class="divider"> </li>
<li>


    @if($row_status)
        @if($row_status == 'yes')
        <a href="{{ route('admin.get.'.$routeName.'.visibility',$row_id) }}">
            <i class="fa fa-star-o text-red" ></i> @lang('site.de-active') 
        </a>

       
        @endif

        @if($row_status == 'no')
        <a href="{{ route('admin.get.'.$routeName.'.visibility',$row_id) }}">
            <i class="fa fa-star text-blue"></i> @lang('site.active')
        </a>
        @endif
    @endif
</li>