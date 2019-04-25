    @php
    $pagenow    = dirname($_SERVER['PHP_SELF']); echo "<br>";
    // $activePage = print_r($pagenow); echo "<br>";
    // $hamboh     = $pagenow; echo $hamboh;
    // if($activePage == "/perpus_masjid/admin/layouts") {echo "active";} else {echo "";}
    $url    = $_SERVER['PHP_SELF'];
    $exp    = explode("/", $url);
    $get    = $exp[3];
    @endphp
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('AdminLTE/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="@if($get == 'santri' OR $get == 'guru' OR $get == 'provinsi') {{'active'}} @endif treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Admin</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="@if ( $get == 'santri') {{'active'}} @endif"><a href="{{url('admin/santri')}}"><i class="fa fa-circle-o" ></i>User</a></li>
            <li class="@if( $get == 'guru') {{'active'}} @endif"><a href="{{url('admin/guru')}}"><i class="fa fa-circle-o"></i>Guru</a></li>
            <li class="@if ( $get == 'provinsi') {{'active'}} @endif"><a href="{{url('admin/provinsi')}}"><i class="fa fa-circle-o"></i>Provinsi</a></li>
          </ul>
        </li>
      </ul>
    </section>