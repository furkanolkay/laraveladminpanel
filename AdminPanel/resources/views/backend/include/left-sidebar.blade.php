<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset("image/user.png")}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Admin</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">

            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">

            <!-- Optionally, you can add icons to the links -->
            <li><a href="/admin"><i class="fa fa-home"></i> <span>AnaSayfa</span></a></li>





            <li class="treeview">
                <a href="#"><i class="fa fa-user-circle"></i> <span> Team Operations </span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('backend.team.show')}}"> <i class="fa fa-users"></i> Team Listele</a></li>
                    <li><a href="{{route('backend.team.team')}}"> <i class="fa fa-user-plus"></i> Ekle</a></li>
                </ul>

            </li>

            <li class="treeview">
                <a href="#"><i class="fa fa-support"></i> <span> Sponsor Operations </span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('backend.sponsors.show')}}"><i class="fa fa-handshake-o"></i>Sponsor Listele</a></li>
                    <li><a href="{{route('backend.sponsors.sponsor')}}"><i class="fa fa-life-saver"></i>Ekle</a></li>
                </ul>

            </li>


            <li class="treeview">
                <a href="#"><i class="fa fa-vcard"></i> <span> About Operations </span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('backend.about.show')}}"> <i class="fa fa-vcard-o"></i> About Edit</a></li>

                </ul>

            </li>




            <li class="treeview">
                <a href="#"><i class="fa fa-toggle-right"></i> <span> Slider Operations </span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('backend.mainslider.show')}}"><i class="fa fa-toggle-down"></i>Slider Listele</a></li>
                    <li><a href="{{route('backend.mainslider.mainslider')}}"><i class="fa fa-toggle-up"></i>Ekle</a></li>
                </ul>

            </li>



            <li class="treeview">
                <a href="#"><i class="fa fa-address-book"></i> <span> Contact Operations </span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">

                    <li><a href="{{route('backend.contact.show')}}"><i class="fa fa-address-book-o"></i>Düzenle</a></li>
                </ul>

            </li>

            <li class="treeview">
                <a href="#"><i class="fa fa-sticky-note"></i> <span> Notice Operations </span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('backend.notice.show')}}"><i class="fa fa-clone"></i>Notice List</a></li>
                    <li><a href="{{route('backend.notice.notice')}}"><i class="fa fa-sticky-note-o"></i> Ekle</a></li>
                </ul>

            </li>


            <li class="treeview">
                <a href="#"><i class="fa fa-file-image-o"></i> <span> Gallery Operations </span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('backend.gallery.show')}}"><i class="fa fa-archive"></i>Gallery List</a></li>
                    <li><a href="{{route('backend.gallery.galleryAdd')}}"> <i class="fa fa-photo"></i> Gallery Ekle</a></li>
                    <li><a href="{{route('backend.gallery.categoryshow')}}"> <i class="fa fa-reorder"></i> Category List</a></li>
                    <li><a href="{{route('backend.gallery.categoryAdd')}}"><i class="fa fa-window-restore"></i> Category Ekle</a></li>
                </ul>

            </li>








        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>