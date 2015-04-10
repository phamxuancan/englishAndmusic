<!DOCTYPE html>
<html>
    <header>
        <title></title>
        <meta charset="UTF-8" />
        <link href="<?php echo URL::to('/') ?>/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo URL::to('/') ?>/bootstrap/css/bootstrap-theme.css" rel="stylesheet">
        <link href="<?php echo URL::to('/') ?>/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <script src="<?php echo URL::to('/') ?>/bootstrap/js/jquery-1.11.2.min.js"></script>
        <script src="<?php echo URL::to('/') ?>/bootstrap/js/bootstrap.js"></script>
        <script src="<?php echo URL::to('/') ?>/bootstrap/js/user.js"></script>

    </header>
    <body>
        <nav class="navbar navbar-default navbar-inverse">
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">English<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#" data-toggle="modal" data-target="#createCategory">Create Category</a></li>
                            <li><a href="#" data-toggle="modal" data-target="#insertWord">Insert new word</a></li>
                        </ul>
                    </li>
                         <?php if(Auth::check()){

                            echo '<li><a href="logout" >Logout</a></li>';

                         } ?>

                </ul>
            </div>
        </nav>
        <div id="content">
             @yield('content')
        </div>
    </body>
</html>