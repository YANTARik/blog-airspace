
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Админ-панель</span>
          </a>
        </li>
        <li><a href="{{route('posts.index')}}"><i class="fa fa-sticky-note-o"></i> <span>Посты</span></a></li>
        <li><a href="{{route('tags.index')}}"><i class="fa fa-tags"></i> <span>Теги</span></a></li>
        <li>
          <a href="{{route('comments.index')}}">
            <i class="fa fa-commenting"></i> <span>Комментарии</span>
          </a>
        </li>
        <li><a href="{{route('users.index')}}"><i class="fa fa-users"></i> <span>Пользователи</span></a></li>
        <router-link to="/users" class="nav-link">
          <i class="fa fa-users"></i>
          <p>Users</p>
        </router-link>
      </ul>

