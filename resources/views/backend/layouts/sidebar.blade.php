<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
   

    <!-- SidebarSearch Form -->
    
   

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
        <li class="nav-item">
          <a href="{{ URL('admin/dashboard')}}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Dashboard
            
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('list.customer')}}" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Customer Data List
            
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('list.membership')}}" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Customer Membership List
            
            </p>
          </a>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
             Category
                <i class="fas fa-angle-left right"></i>
               
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('add.category')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Category</p>
                </a>
              </li>  
            </ul>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('list.category')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Category</p>
                </a>
              </li>  
            </ul>

          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
             Sub Category
                <i class="fas fa-angle-left right"></i>
               
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('add.subcategory')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Sub Category</p>
                </a>
              </li>  
            </ul>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('list.subcategory')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Sub Category</p>
                </a>
              </li>  
            </ul>

          </li>

        <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
              Divisions/Districts/Area
                <i class="fas fa-angle-left right"></i>
               
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{ route('add.divisions')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Divisions</p>
                </a>
              </li> 

              <li class="nav-item">
                <a href="{{ route('list.divisions')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>list Divisions</p>
                </a>
              </li> 

              <hr style="border-bottom: 1px solid white; width: 80%; margin-top: 0px; margin-bottom: 0px;">

              <li class="nav-item">
                <a href="{{ route('add.districts')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Districts</p>
                </a>
              </li> 

              <li class="nav-item">
                <a href="{{ route('list.districts')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>list Districts</p>
                </a>
              </li> 

              <hr style="border-bottom: 1px solid white; width: 80%; margin-top: 0px; margin-bottom: 0px;">

              <li class="nav-item">
                <a href="{{ route('add.areas')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Areas</p>
                </a>
              </li> 

              <li class="nav-item">
                <a href="{{ route('list.areas')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>list Areas</p>
                </a>
              </li> 

            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
             Brand
                <i class="fas fa-angle-left right"></i>
               
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('add.brand')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Brand</p>
                </a>
              </li>  
            </ul>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('list.brand')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Brand</p>
                </a>
              </li>  
            </ul>

          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
             Model
                <i class="fas fa-angle-left right"></i>
               
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('add.model')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Model</p>
                </a>
              </li>  
            </ul>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('list.model')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Model</p>
                </a>
              </li>  
            </ul>

          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
             Ad Post
                <i class="fas fa-angle-left right"></i>
               
              </p>
            </a>
            

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('list.ad.post')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Ad Post</p>
                </a>
              </li>  
            </ul>

          </li>

         

        <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
              Home Page Setup
                <i class="fas fa-angle-left right"></i>
               
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('edit.home.page.favicon')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Your Home Page</p>
                </a>
              </li>  
            </ul>
          </li>

          

          

        <li class="nav-item">
          <a href="{{ route('admin.logout')}}" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
              Logout
              <!-- <span class="right badge badge-danger">New</span> -->
            </p>
          </a>
        </li>
       
      
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>