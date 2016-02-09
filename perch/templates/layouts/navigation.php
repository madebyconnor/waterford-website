</head>
<body class="m0a">
  <nav class="globalnav m0a" id="globalnav" role="navigation">
    <div class="gn-content">
      <div id="js-overlay-sidenav" class="overlay"></div>

      <!-- Icons on mobile -->
      <div class="gn-mobile">
        <ul class="gn-mobile-list">
          <li class="gn-tab-mobile gn-tab-logo">
            <a class="gn-logo" href="/" title="Homepage"></a>
          </li>
          <li class="gn-tab-icon gn-tab-mobile">
            <i class="gn-icon js-gn-search icon-search" title="Search the website"></i>
          </li>
          <li class="gn-tab-icon gn-tab-mobile">
            <i class="gn-icon js-gn-menu icon-menu"></i>
          </li>
        </ul>
      </div>

      <!-- Main navigation -->
      <div class="gn-nav">
        <ul class="gn-nav-list">
          <li class="gn-tab gn-desktop gn-tab-logo">
            <a class="gn-logo gn-top" href="/" title="Homepage"></a>
          </li>

          <?php perch_pages_navigation(array(
                'levels' => 2,
                'template' => array('globalnav.html', 'subnav.html')
          )); ?>
          <li class="gn-tab gn-desktop gn-tab-search js-gn-search">
            <i class="gn-top icon-search" title="Search the website"></i>
          </li>
        </ul>
      </div>

      <!-- Search -->
      <div class="gn-search gn-search-form">
        <div id="js-overlay-search" class="overlay"></div>
        <div class="gn-search-wrapper">
          <?php perch_search_form(); ?>
          <a class="js-search-close search-close" title="Close (esc)">×</a>
        </div>
      </div>
    </div>
  </nav>


  <div id="min-height">
