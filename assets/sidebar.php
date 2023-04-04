<?php
    if (isset($_GET['destination'])){
        $dest = $_GET['destination'];
    } else {
        $dest = NULL;
    }
?>
<div class="side-bar">
    <ul class="sidebar-menu">
        <li class="sidebar-list <?php if ($dest == 'home'){echo 'active';}?>">
            <form method="get">
                <button type="submit" class="sidebar-list-item" name="destination" value="home" >
                    <i class="fa-solid fa-house"></i>
                    <span>Overview</span>
                </button>
            </form>
        </li>
        <li class="sidebar-list <?php if ($dest == 'trending'){echo 'active';}?>">
            <form method="get">
                <button type="submit" class="sidebar-list-item" name="destination" value="trending">
                    <i class="fa-solid fa-fire"></i>
                    <span>Trending</span>
                </button>
            </form>
        </li>
        <li class="sidebar-list <?php if ($dest == 'recent'){echo 'active';}?>">
            <form method="get">
                <button type="submit" class="sidebar-list-item" name="destination" value="recent">
                    <i class="fas fa-clock"></i>
                    <span>Most Recent</span>
                </button>
            </form>
        </li>
        <li class="sidebar-list <?php if ($dest == 'category'){echo 'active';}?>">
            <form method="get">
                <button type="submit" class="sidebar-list-item" name="destination" value="category">
                    <i class="fa-solid fa-grip-vertical"></i>
                    <span>Categories</span>
                </button>
            </form>
        </li>
    </ul>
</div>         
