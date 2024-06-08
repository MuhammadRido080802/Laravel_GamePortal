<div class="sidebar">
  <div class="logo-details">
    <i class="bx bx-category"></i>
    <span class="logo_name">Pemain</span>
  </div>
  <ul class="nav-links">
    <li>
      <a href="/admin">
        <i class="bx bx-grid-alt"></i>
        <span class="links_name">Dashboard</span>
      </a>
    </li>
    <li>
      <a href="/pemain" class="{{ request()->Is('pemain*') ? 'active' : '' }}">
        <i class="bx bx-box"></i>
        <span class="links_name">Pemain</span>
      </a>
    </li>
    <li>
      <a href="/game" class="{{ request()->Is('Game*') ? 'active' : '' }}">
        <i class="bx bx-list-ul"></i>
        <span class="links_name">Game</span>
      </a>
    </li>
    <li>
      <a href="/about" class="{{ request()->Is('about*') ? 'active' : '' }}">
        <i class="bx bx-list-ul"></i>
        <span class="links_name">About</span>
      </a>
    </li>
    <li>
      <a href="/log-out">
        <i class="bx bx-log-out"></i>
        <span class="links_name">Log out</span>
      </a>
    </li>
  </ul>
</div>
