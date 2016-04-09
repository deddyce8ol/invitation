<ul class="sidebar-menu">
    <li class="header">MENU UTAMA</li>
    <li>
      <a href="#">
        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
      </a>
    </li>
    <?php
      if (count($menu)>0) {
        foreach ($menu as $m) {
          echo "<li>";
            $link_name = "<i class='".$m->icon."'></i><span>".$m->name."</span>";
            echo anchor($m->link, $link_name);
          echo "</li>";
        }
      }
    ?>
</ul>