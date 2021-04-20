<li class="header">TRANG QUẢN TRỊ</li>

<li class="{{ Request::segment(2) == 'home' ? 'active' : null  }}">
    <a href="{{ route('backend.home') }}">
        <i class="fa fa-home"></i> <span>Trang chủ</span>
    </a>
</li>
<li class="{{ Request::segment(2) == 'users' ? 'active' : null  }}">
    <a href="{{ route('users.index') }}">
        <i class="fa fa-user"></i> <span>Tài khoản</span>
    </a>
</li>

<li class="treeview {{ Request::segment(2) === 'category' || Request::segment(2) === 'products' ||  Request::segment(2) === 'product-attributes' || Request::segment(2) === 'brand' || Request::segment(2) === 'category-filter' || Request::segment(2) === 'filter' ? 'active' : null }}">
    <a href="#">
        <i class="fa fa-tags" aria-hidden="true"></i> <span>Sản phẩm</span>
        <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">

        <li class="{{ Request::segment(2) === 'products' ? 'active' : null }}">
            <a href="{{ route('products.index') }}"><i class="fa fa-circle-o"></i> Danh sách sản phẩm</a>
        </li>

    </ul>
</li>

<li class="{{ Request::segment(2) == 'orders' ? 'active' : null  }}">
    <a href="{{ route('order.index') }}">
        <i class="fa fa-line-chart" aria-hidden="true"></i> <span>Đơn hàng</span>
    </a>
</li>

<li class="{{ Request::segment(2) == 'contact' ? 'active' : null  }}">
    <a href="{{ route('get.list.contact') }}">
        <i class="fa fa-comments" aria-hidden="true"></i> <span>Khách hàng liên hệ</span>
    </a>
</li>

<li class="treeview {{ Request::segment(2) === 'posts' || Request::segment(2) === 'categories-post' ? 'active' : null }}">
    <a href="#">
        <i class="fa fa-tags" aria-hidden="true"></i> <span>Bài viết</span>
        <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">

        <li class="{{ Request::segment(2) === 'posts' ? 'active' : null }}">
            <a href="{{ route('posts.index') }}"><i class="fa fa-circle-o"></i> Danh sách bài viết</a>
        </li>


        <li class="{{ Request::segment(2) === 'categories-post' ? 'active' : null }}">
            <a href="{{ route('categories-post.index') }}"><i class="fa fa-circle-o"></i> Danh mục bài viết</a>
        </li>

    </ul>
</li>


<li class="{{ Request::segment(2) == 'pages' ? 'active' : null  }}">
    <a href="{{ route('pages.list') }}">
        <i class="fa fa-paper-plane" aria-hidden="true"></i> <span>Cài đặt trang</span>
    </a>
</li>





<li class="header">Cấu hình hệ thống</li>
<li class="treeview {{ Request::segment(2) === 'options' || Request::segment(2) === 'branchs' || Request::segment(2) === 'menu-category' ||  Request::segment(2) === 'menu' || Request::segment(2) === 'banks' ? 'active' : null }}">
    <a href="#">
        <i class="fa fa-cog" aria-hidden="true"></i> <span>Cấu hình</span>
        <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">

        <li class="{{ Request::segment(3) === 'general' ? 'active' : null }}">
            <a href="{{ route('backend.options.general') }}"><i class="fa fa-circle-o"></i> Cấu hình chung</a>
        </li>

        <li class="{{ Request::segment(2) === 'menu' ? 'active' : null }}">
            <a href="{{ route('setting.menu') }}"><i class="fa fa-circle-o"></i> Menu</a>
        </li>

        <li class="{{ Request::segment(3) === 'smtp' ? 'active' : null }}">
            <a href="{{ route('backend.options.smtp-config') }}"><i class="fa fa-circle-o"></i>  Cấu hình Email</a>
        </li>

    </ul>
</li>
<div style="display: none;">
	<li class="header">Cấu hình hệ thống</li>
	<li class="treeview {{ Request::segment(2) == 'options' ? 'active' : null  }}">
		<a href="#">
			<i class="fa fa-folder"></i> <span>Setting (Developer)</span>
			<span class="pull-right-container">
				<i class="fa fa-angle-left pull-right"></i>
			</span>
		</a>
		<ul class="treeview-menu">
			<li class="{{ Request::segment(3) == 'developer-config' ? 'active' : null  }}">
				<a href="{{ route('backend.options.developer-config') }}"><i class="fa fa-circle-o"></i> Developer - Config</a>
			</li>
		</ul>
	</li>
</div>
