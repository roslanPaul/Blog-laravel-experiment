
                    
	<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-edit"></i><span>Users</span></a>
</li>

<li class="{{ Request::is('categories*') ? 'active' : '' }}">
    <a href="{!! route('categories.index') !!}"><i class="fa fa-edit"></i><span>Categories</span></a>
</li>

<li class="{{ Request::is('articles*') ? 'active' : '' }}">
    <a href="{!! route('articles.index') !!}"><i class="fa fa-edit"></i><span>Articles</span></a>
</li>

<li class="{{ Request::is('keywords*') ? 'active' : '' }}">
    <a href="{!! route('keywords.index') !!}"><i class="fa fa-edit"></i><span>Keywords</span></a>
</li>

<li class="{{ Request::is('newsletters*') ? 'active' : '' }}">
    <a href="{!! route('newsletters.index') !!}"><i class="fa fa-edit"></i><span>Newsletters</span></a>
</li>

