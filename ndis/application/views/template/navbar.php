<header class="navbar navbar-inverse" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/ndis">NDIS</a>
    </div>
    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav">
        <li><a href="/ndis/chart">Timely Chart</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            statistics<span class="caret"></span>
          </a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="/ndis/statistics/rank">IP Rank</a></li>
            <li><a href="/ndis/statistics/port">port statistics</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            Log<span class="caret"></span>
          </a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="/ndis/log/anomaly">Anomaly Flows</a></li>
            <li><a href="/ndis/log/attack">Attack Log</a></li>
            <li><a href="/ndis/log/monIP">Monitored IP Log</a></li>
            <li><a href="/ndis/log/blacklist">Black List</a></li>
            <li><a href="/ndis/log/traffic">Traffic</a></li>
          </ul>
        </li>
        <li><a href="/ndis/events">Event List</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            Configuration<span class="caret"></span>
          </a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="/ndis/conf/iplist">IP List</a></li>
            <li><a href="/ndis/conf/netflow">NetFlow</a></li>
            <li><a href="/ndis/conf/dpi">DPI</a></li>
          </ul>
        </li>
        <li><a href="/ndis/status">Machine Status</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
          <li>
            <a href="/ndis/logout">Logout</a>
          </li>
      </ul>
    </div>
  </div>
</header>
