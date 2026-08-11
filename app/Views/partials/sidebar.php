/* =========================================================
   NEXUSERP SIDEBAR
========================================================= */

.sidebar {
    position: fixed;
    top: 0;
    left: 0;

    width: 255px;
    height: 100vh;

    display: flex;
    flex-direction: column;

    background: #ffffff;
    border-right: 1px solid #e9ecef;

    z-index: 1000;

    overflow: hidden;
}


/* =========================================================
   SIDEBAR TOP
========================================================= */

.sidebar-top {
    flex: 1;

    min-height: 0;

    overflow-y: auto;

    padding-bottom: 10px;
}

.sidebar-top::-webkit-scrollbar {
    width: 4px;
}

.sidebar-top::-webkit-scrollbar-thumb {
    background: #e5e7eb;
    border-radius: 10px;
}


/* =========================================================
   LOGO
========================================================= */

.logo {
    height: 76px;

    display: flex;
    align-items: center;

    padding: 0 22px;

    border-bottom: 1px solid #f0f1f3;
}

.logo-icon {
    width: 40px;
    height: 40px;

    min-width: 40px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 11px;

    background: #111827;
    color: #ffffff;

    font-size: 18px;

    margin-right: 11px;
}

.logo-text h3 {
    margin: 0;

    font-size: 18px;
    font-weight: 800;

    color: #111827;

    line-height: 1.1;
}

.logo-text small {
    display: block;

    margin-top: 3px;

    color: #9ca3af;

    font-size: 10px;

    letter-spacing: .4px;
}


/* =========================================================
   USER CARD
========================================================= */

.user-card {
    display: flex;
    align-items: center;

    margin: 15px 14px;

    padding: 11px;

    border-radius: 12px;

    background: #f8f9fb;
}

.user-card img {
    width: 38px;
    height: 38px;

    min-width: 38px;

    object-fit: cover;

    border-radius: 50%;
}

.user-info {
    min-width: 0;

    margin-left: 10px;
}

.user-info h4 {
    display: block;

    margin: 0;

    color: #1f2937;

    font-size: 13px;

    font-weight: 600;

    white-space: nowrap;

    overflow: hidden;

    text-overflow: ellipsis;
}

.user-info p {
    display: flex;
    align-items: center;

    gap: 5px;

    margin: 3px 0 0;

    color: #9ca3af;

    font-size: 11px;
}

.status {
    width: 7px;
    height: 7px;

    display: inline-block;

    background: #22c55e;

    border-radius: 50%;
}


/* =========================================================
   SECTION TITLES
========================================================= */

.menu-title {
    display: block;

    padding: 14px 23px 7px;

    color: #a0a6af;

    font-size: 9px;

    font-weight: 800;

    letter-spacing: 1px;
}


/* =========================================================
   MENU
========================================================= */

.sidebar-menu {
    list-style: none;

    padding: 0 12px;

    margin: 0;
}

.sidebar-menu li {
    margin-bottom: 3px;
}

.sidebar-menu a {
    height: 42px;

    display: flex;
    align-items: center;

    padding: 0 12px;

    border-radius: 9px;

    color: #68707d;

    text-decoration: none;

    font-size: 13px;

    font-weight: 500;

    transition:
        background .2s ease,
        color .2s ease,
        transform .2s ease;
}

.sidebar-menu a i {
    width: 23px;

    margin-right: 9px;

    font-size: 16px;

    text-align: center;
}

.sidebar-menu a:hover {
    background: #f4f5f7;

    color: #111827;

    transform: translateX(2px);
}


/* =========================================================
   ACTIVE MENU
========================================================= */

.sidebar-menu a.active {
    background: #111827;

    color: #ffffff;

    font-weight: 600;
}

.sidebar-menu a.active:hover {
    background: #111827;

    color: #ffffff;

    transform: none;
}


/* =========================================================
   POS LINK
========================================================= */

.sidebar-menu a[href*="/pos"] {
    background: #f4f5f7;

    color: #111827;

    font-weight: 600;
}

.sidebar-menu a[href*="/pos"] i {
    color: #111827;
}

.sidebar-menu a[href*="/pos"]:hover {
    background: #111827;

    color: #ffffff;
}

.sidebar-menu a[href*="/pos"]:hover i {
    color: #ffffff;
}


/* =========================================================
   SIDEBAR BOTTOM
========================================================= */

.sidebar-bottom {
    flex-shrink: 0;

    padding: 12px 14px 18px;

    border-top: 1px solid #eeeeee;

    background: #ffffff;
}


/* =========================================================
   LOGOUT
========================================================= */

.logout-button {
    width: 100%;
    height: 44px;

    display: flex;
    align-items: center;

    padding: 0 13px;

    border-radius: 10px;

    color: #dc3545;

    text-decoration: none;

    font-size: 13px;

    font-weight: 600;

    transition:
        background .2s ease,
        color .2s ease;
}

.logout-button i {
    width: 24px;

    margin-right: 9px;

    font-size: 17px;

    text-align: center;
}

.logout-button:hover {
    background: #fff1f2;

    color: #b42318;
}


/* =========================================================
   MAIN CONTENT
========================================================= */

.main {
    margin-left: 255px;

    min-height: 100vh;

    transition: margin-left .25s ease;
}


/* =========================================================
   COLLAPSED SIDEBAR
========================================================= */

.sidebar.collapsed {
    width: 78px;
}

.main.expanded {
    margin-left: 78px;
}


/* Hide text when collapsed */

.sidebar.collapsed .logo-text,
.sidebar.collapsed .user-info,
.sidebar.collapsed .menu-title,
.sidebar.collapsed .sidebar-menu span,
.sidebar.collapsed .logout-button span {
    display: none;
}


/* Center logo */

.sidebar.collapsed .logo {
    justify-content: center;

    padding: 0;
}

.sidebar.collapsed .logo-icon {
    margin-right: 0;
}


/* Center user */

.sidebar.collapsed .user-card {
    justify-content: center;

    padding: 8px;

    margin-left: 10px;
    margin-right: 10px;
}


/* Center menu icons */

.sidebar.collapsed .sidebar-menu {
    padding-left: 9px;
    padding-right: 9px;
}

.sidebar.collapsed .sidebar-menu a {
    justify-content: center;

    padding: 0;
}

.sidebar.collapsed .sidebar-menu a i {
    margin-right: 0;
}


/* Center logout */

.sidebar.collapsed .sidebar-bottom {
    padding-left: 10px;
    padding-right: 10px;
}

.sidebar.collapsed .logout-button {
    justify-content: center;

    padding: 0;
}

.sidebar.collapsed .logout-button i {
    margin-right: 0;
}


/* =========================================================
   SIDEBAR TRANSITION
========================================================= */

.sidebar {
    transition: width .25s ease;
}

.logo-text,
.user-info,
.menu-title,
.sidebar-menu span,
.logout-button span {
    transition: opacity .15s ease;
}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 991px) {

    .sidebar {
        width: 230px;
    }

    .main {
        margin-left: 230px;
    }

}


@media (max-width: 767px) {

    .sidebar {
        width: 255px;

        transform: translateX(-100%);

        transition:
            transform .25s ease,
            width .25s ease;
    }

    .sidebar.mobile-open {
        transform: translateX(0);
    }

    .sidebar.collapsed {
        width: 255px;
    }

    .main,
    .main.expanded {
        margin-left: 0;
    }

}