<nav class="pcoded-navbar">
                            <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                            <div class="pcoded-inner-navbar main-menu">
<?php $activePage = basename($_SERVER['PHP_SELF'], ".php"); ?>
                                <!-- <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Layout</div> -->
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class="mt-2 <?= ($activePage == 'employee') ? 'active':''; ?>">
                                        <a href="employee.php">
                                            <span class="pcoded-micon"><i class="fa fa-user" aria-hidden="true"></i><b>D</b></span>
                                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Add Employee</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <!-- <li class="mt-2 <?= ($activePage == 'add_bulk_emp') ? 'active':''; ?>">
                                        <a href="add_bulk_emp.php">
                                            <span class="pcoded-micon"><i class="fa fa-users" aria-hidden="true"></i><b>D</b></span>
                                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Add Bulk Employees</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li> -->
                                    <li class="mt-2 <?= ($activePage == 'show_emp_data') ? 'active':''; ?>">
                                        <a href="show_emp_data.php">
                                            <span class="pcoded-micon"><i class="fa fa-list" aria-hidden="true"></i><b>D</b></span>
                                            <span class="pcoded-mtext" data-i18n="nav.dash.main">All Employees</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="mt-2 <?= ($activePage == 'salary') ? 'active':''; ?>">
                                        <a href="salary.php">
                                            <span class="pcoded-micon"><i class="fa fa-money" aria-hidden="true"></i><b>D</b></span>
                                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Salary</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="mt-2 <?= ($activePage == 'recent_sal_history') ? 'active':''; ?>">
                                        <a href="recent_sal_history.php">
                                            <span class="pcoded-micon"><i class="fa fa-history" aria-hidden="true"></i><b>D</b></span>
                                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Recent Salary History</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="mt-2 <?= ($activePage == 'inactive_emp') ? 'active':''; ?>">
                                        <a href="inactive_emp.php">
                                            <span class="pcoded-micon"><i class="fa fa-user-times" aria-hidden="true"></i><b>D</b></span>
                                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Inactive Employees</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <!-- <li class="pcoded-hasmenu">
                                        <a href="javascript:void(0)">
                                            <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                            <span class="pcoded-mtext"
                                                data-i18n="nav.basic-components.main">Components</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class=" ">
                                                <a href="accordion.html">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext"
                                                        data-i18n="nav.basic-components.alert">Accordion</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </a>
                                            </li>
                                            <li class=" ">
                                                <a href="breadcrumb.html">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext"
                                                        data-i18n="nav.basic-components.breadcrumbs">Breadcrumbs</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </a>
                                            </li>
                                            <li class=" ">
                                                <a href="button.html">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext"
                                                        data-i18n="nav.basic-components.alert">Button</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </a>
                                            </li>
                                            <li class=" ">
                                                <a href="tabs.html">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext"
                                                        data-i18n="nav.basic-components.breadcrumbs">Tabs</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </a>
                                            </li>
                                            <li class=" ">
                                                <a href="color.html">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext"
                                                        data-i18n="nav.basic-components.alert">Color</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </a>
                                            </li>
                                            <li class=" ">
                                                <a href="label-badge.html">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext"
                                                        data-i18n="nav.basic-components.breadcrumbs">Label Badge</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </a>
                                            </li>
                                            <li class=" ">
                                                <a href="tooltip.html">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext"
                                                        data-i18n="nav.basic-components.alert">Tooltip</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </a>
                                            </li>
                                            <li class=" ">
                                                <a href="typography.html">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext"
                                                        data-i18n="nav.basic-components.breadcrumbs">Typography</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </a>
                                            </li>
                                            <li class=" ">
                                                <a href="notification.html">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext"
                                                        data-i18n="nav.basic-components.alert">Notification</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </a>
                                            </li>
                                            <li class=" ">
                                                <a href="icon-themify.html">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext"
                                                        data-i18n="nav.basic-components.breadcrumbs">Themify</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </a>
                                            </li>

                                        </ul>
                                    </li> -->
                                </ul>
                                <!-- <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms">Forms &amp; Tables
                                </div> -->
                                <!-- <ul class="pcoded-item pcoded-left-item">
                                    <li>
                                        <a href="form-elements-component.html">
                                            <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Form
                                                Components</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="bs-basic-table.html">
                                            <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Basic
                                                Table</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>

                                </ul> -->

                                <!-- <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms">Chart &amp; Maps
                                </div> -->
                                <!-- <ul class="pcoded-item pcoded-left-item">
                                    <li>
                                        <a href="chart.html">
                                            <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Chart</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="map-google.html">
                                            <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Maps</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="pcoded-hasmenu">
                                        <a href="javascript:void(0)">
                                            <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                            <span class="pcoded-mtext"
                                                data-i18n="nav.basic-components.main">Pages</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class=" ">
                                                <a href="auth-normal-sign-in.html">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext"
                                                        data-i18n="nav.basic-components.alert">Login</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </a>
                                            </li>
                                            <li class=" ">
                                                <a href="auth-sign-up.html">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext"
                                                        data-i18n="nav.basic-components.breadcrumbs">Register</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </a>
                                            </li>
                                            <li class=" ">
                                                <a href="sample-page.html">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext"
                                                        data-i18n="nav.basic-components.breadcrumbs">Sample Page</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                </ul> -->

                                <!-- <div class="pcoded-navigatio-lavel" data-i18n="nav.category.other">Other</div> -->
                                <!-- <ul class="pcoded-item pcoded-left-item">
                                    <li class="pcoded-hasmenu ">
                                        <a href="javascript:void(0)">
                                            <span class="pcoded-micon"><i class="ti-direction-alt"></i><b>M</b></span>
                                            <span class="pcoded-mtext" data-i18n="nav.menu-levels.main">Menu
                                                Levels</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class="">
                                                <a href="javascript:void(0)">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext"
                                                        data-i18n="nav.menu-levels.menu-level-21">Menu Level 2.1</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </a>
                                            </li>
                                            <li class="pcoded-hasmenu ">
                                                <a href="javascript:void(0)">
                                                    <span class="pcoded-micon"><i class="ti-direction-alt"></i></span>
                                                    <span class="pcoded-mtext"
                                                        data-i18n="nav.menu-levels.menu-level-22.main">Menu Level
                                                        2.2</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </a>
                                                <ul class="pcoded-submenu">
                                                    <li class="">
                                                        <a href="javascript:void(0)">
                                                            <span class="pcoded-micon"><i
                                                                    class="ti-angle-right"></i></span>
                                                            <span class="pcoded-mtext"
                                                                data-i18n="nav.menu-levels.menu-level-22.menu-level-31">Menu
                                                                Level 3.1</span>
                                                            <span class="pcoded-mcaret"></span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="">
                                                <a href="javascript:void(0)">
                                                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                    <span class="pcoded-mtext"
                                                        data-i18n="nav.menu-levels.menu-level-23">Menu Level 2.3</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </a>
                                            </li>

                                        </ul>
                                    </li>
                                </ul> -->
                            </div>
                        </nav>