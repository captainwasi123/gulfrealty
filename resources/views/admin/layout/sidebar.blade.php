<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{URL::to('/')}}" class="brand-link">
    <img src="{{URL::to('/public')}}/efavicon.png" alt="DataMySite" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light"> Gulf Realty</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{URL::to('/public')}}/dragon-avatar.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{Auth::guard('admin')->user()->fullname}}</a>
        <span class="text-white">{{Auth::guard('admin')->user()->designation}}</span>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{route('admin.dashboard')}}" class="nav-link {{$menu == 'dashboard' ? 'active' : ''}}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

          
          <li class="nav-item {{$menu == 'blogs' || $menu == 'admin.author'  ? 'menu-open' : ''}}">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon fas fa-pen"></i>
              <p>
                Articles
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
             
                <li class="nav-item">
                  <a href="{{route('admin.blog')}}" class="nav-link {{$menu == 'blogs' ? 'active' : ''}}">
                    <i class="fas fa-angle-right nav-icon"></i>
                    <p>Blogs</p>
                  </a>
                </li>
            

              <li class="nav-item">
                <a href="{{route('admin.author')}}" class="nav-link {{$menu == 'admin.author' ? 'active' : ''}}">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Authors</p>
                </a>
              </li>
       

            </ul>
          </li>

          <li class="nav-item {{$menu == 'reels' || $menu == 'videos' || $menu == 'images'  ? 'menu-open' : ''}}">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon fas fa-image"></i>
              <p>
                &nbsp;&nbsp;Gallery
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
             
                <li class="nav-item">
                  <a href="{{route('admin.gallery.videos')}}" class="nav-link {{$menu == 'videos' ? 'active' : ''}}">
                    <i class="fas fa-angle-right nav-icon"></i>
                    <p>Videos</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('admin.gallery.reels')}}" class="nav-link {{$menu == 'reels' ? 'active' : ''}}">
                    <i class="fas fa-angle-right nav-icon"></i>
                    <p>Reels</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('admin.gallery.images')}}" class="nav-link {{$menu == 'images' ? 'active' : ''}}">
                    <i class="fas fa-angle-right nav-icon"></i>
                    <p>Images</p>
                  </a>
                </li>
            
<!-- 
              <li class="nav-item">
                <a href="{{route('admin.author')}}" class="nav-link {{$menu == 'playlists' ? 'active' : ''}}">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Playlists</p>
                </a>
              </li> -->
       

            </ul>
          </li>

          <li class="nav-item {{$menu == 'seo.meta' || $menu == 'seo.snippet' ? 'menu-open' : ''}}">
            <a href="javascript:void(0)" class="nav-link">
              <i class="nav-icon fas fa-bullhorn"></i>
              <p>
                SEO Tools
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('admin.seo.meta')}}" class="nav-link {{$menu == 'seo.meta' ? 'active' : ''}}">
                    <i class="fas fa-angle-right nav-icon"></i>
                    <p>Meta Tags</p>
                  </a>
                </li>
              <li class="nav-item">
                <a href="{{route('admin.seo.snippet')}}" class="nav-link {{$menu == 'seo.snippet' ? 'active' : ''}}">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Snippet Code</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="javascript:void(0)" id="update-sitemap" class="nav-link">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Update Sitemap</p>
                </a>
              </li>

            </ul>
          </li>


          <li class="nav-item">
            <a href="{{route('admin.newsletter')}}" class="nav-link {{$menu == 'newsletter' ? 'active' : ''}}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Newsletter
              </p>
            </a>
          </li>
          
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>