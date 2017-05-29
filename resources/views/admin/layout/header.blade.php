<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Startmin</a>
        </div>

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <!-- Top Navigation: Left Menu -->
        <ul class="nav navbar-nav navbar-left navbar-top-links">
            <li><a href="#"><i class="fa fa-home fa-fw"></i> Website</a></li>
        </ul>

        <!-- Top Navigation: Right Menu -->
        <ul class="nav navbar-right navbar-top-links">
            <li class="dropdown navbar-inverse">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell fa-fw"></i> <b class="caret"></b>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-comment fa-fw"></i> New Comment
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
            </li>
                
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> {{Auth::user()->name}} <b class="caret"></b>
                    </a>
                    
                    <ul class="dropdown-menu dropdown-user">
                        <!-- <li><a href="#"><i class="fa fa-user fa-fw"></i> {{ Auth::user()->name }}</a>
                        </li> -->
                        <li><a href="admin/user/sua/{{ Auth::user()->id }}}}"><i class="fa fa-gear fa-fw"></i> Sửa</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="admin/k_logout"><i class="fa fa-sign-out fa-fw"></i>Thoát</a>
                        </li>
                    </ul>
                    
                </li>
                
        </ul>
        
        <!-- Sidebar -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">

                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                        </div>
                    </li>
                    <li>
                        <a href="admin/kadmin" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-fw"></i> Quản lý tin tức<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="admin/tintuc/them">Thêm tin</a>
                            </li>
                            <li>
                                <a href="admin/tintuc/danhsach">Danh sách tin</a>
                            </li>
                            <li>
                                <a href="admin/loaitin/danhsach">Danh sách loại tin</a>
                            </li>
                            <li>
                                <a href="admin/theloai/danhsach">Danh sách thể loại tin</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-fw"></i> Quản lý sản phẩm<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Thêm sản phâm</a>
                            </li>
                            <li>
                                <a href="admin/products">Danh sách sản phẩm</a>
                            </li>
                            <li>
                                <a href="admin/productCategory">Danh mục sản phẩm</a>
                            </li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-fw"></i> Slide<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="admin/slide/them">Thêm</a>
                            </li>
                            <li>
                                <a href="admin/slide/danhsach">Danh sách</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-fw"></i> User<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="admin/user/them">Thêm</a>
                            </li>
                            <li>
                                <a href="admin/user/danhsach">Danh sách</a>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
