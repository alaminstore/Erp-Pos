@php
    function print_menu($menu, $nav_classs, $nav_padding_left, $nav_indicator = '') {
        $menu = $menu ?? [];
        
        echo "<ul class='".$nav_classs."' ".$nav_indicator.">";
            foreach ($menu as $item) {
                echo "<li>";
                    if ($item['url']) {
                        echo "<a href='".$item['url']."' style='padding-left: ".$nav_padding_left."rem;'>";
                            echo "<span class='nav-icon'>";
                                echo "<i class='fa fa-hand-o-right' aria-hidden='true'></i>";
                            echo "</span>";
                            echo "<span class='nav-text'>".$item['title']."</span>";
                        echo "</a>";
                    } else {
                        echo "<a style='padding-left: ".$nav_padding_left."rem;'>";
                            echo "<span class='nav-caret'>";
                            echo "<i class='fa fa-caret-down'></i>";
                            echo "</span>";
                            echo "<span class='nav-icon'>";
                                echo "<i class='fa fa-plus-square'></i>";
                            echo "</span>";
                            echo "<span class='nav-text'>".$item['title']."</span>";
                        echo "</a>";
                    }
                    
                    if (count($item['items'] ?? [])) {
                        print_menu($item['items'], 'nav-sub', 1.80);
                    }
                echo "</li>";
            }
        echo "</ul>";
    }

    print_menu(session('menu'), 'nav', 0.55, 'ui-nav');
@endphp
