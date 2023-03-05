<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>بنك الدم</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.rtl.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.rtl.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
</head>

<body>

    <div id="app">
        
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo"
                                    srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i
                                    class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">القائمة</li>

                        <li class="sidebar-item  ">
                            <a href="index.html" class='sidebar-link'>
                                <span>جميع عروض التبرع </span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="index.html" class='sidebar-link'>
                                <span>جميع المناشدات</span>
                            </a>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <span>عروض التبرع بناء على فصيلة<br>محددة دم </span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="component-alert.html">فصيلة +A</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-badge.html">فصيلة +B</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-breadcrumb.html">فصيلة +O</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-button.html">فصيلة -A</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-card.html">فصيلة -B</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-carousel.html">فصيلة -O</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-dropdown.html">فصيلة +AB</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-list-group.html">فصيلة -AB</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <span>مناشدات التبرع بناء على فصيلة <br> محددة دم </span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="component-alert.html">فصيلة +A</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-badge.html">فصيلة +B</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-breadcrumb.html">فصيلة +O</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-button.html">فصيلة -A</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-card.html">فصيلة -B</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-carousel.html">فصيلة -O</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-dropdown.html">فصيلة +AB</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-list-group.html">فصيلة -AB</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>Layouts</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="layout-default.html">Default Layout</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="layout-vertical-1-column.html">1 Column</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="layout-vertical-navbar.html">Vertical with Navbar</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="layout-horizontal.html">Horizontal Menu</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
       
        
        <div id="main">
         <!--
            <div >
                <nav class="navbar navbar-dark bg-dark">
                  <form class="container-fluid justify-content-start">
                    <button class="btn btn-outline-success me-2" type="button">Main button</button>
                    <button class="btn btn-sm btn-outline-secondary" type="button">Smaller button</button>
                  </form>
                </nav>
              </div>
              
          -->
            
            <div class="page-heading mt-5" >
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>عروض التبرع </h3>
                            <p class="text-subtitle text-muted">An application for user to check Chat inbox</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Chat Application</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                @yield('section')
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="http://ahmadsaugi.com">A. Saugi</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/main.js"></script>
</body>

</html>
