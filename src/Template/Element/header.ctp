<div role="banner" class="navbar navbar-default bs-docs-nav" style="width:100%; height:100%">
    <div style="float:left;"><?=$this->Html->image( 'asap.jpg', ['style'=>'height:50px;'] )?></div>
    <nav role="navigation" class="collapse navbar-collapse bs-navbar-collapse">
        <ul class="nav navbar-nav" id="bpf-page-navi-items">
            <?if( !isset($authUser) || $authUser['status'] == USER_PASSWORD_CHANGE){ echo "<h3 style='margin-left:210px; padding-top:5px;'>".$this->Html->link("Hinotori ExecCharter",
                ['controller' => 'Users','action' => 'login'],['style'=>'color:black; text-decoration:none'])."</h3>"; }else{



                if(!empty($navItems)){
                    foreach($navItems as $key => $navItem ) {
                        if ( isset( $navItem['title'] ) ) {
                            $css = ($this->name == $navItem['controller'] && $this->request->params['action'] == $navItem['action']) ? "active" : "";
                            echo "<li class='navitem " .$css. "'>";
                                echo $this->Html->link( $navItem['title'], '/'.$navItem['controller']."/".$navItem['action'] );
                            echo "</li>";
                        } else {
                            $subLi = "";
                            $supCss = "";
                            foreach($navItem as $item ) {
                                $css = ($this->name == $item['controller'] && $this->request->params['action'] == $item['action']) ? "active" : "";
                                if ( $css == "active" ) { $supCss="active"; }
                                $subLi .= "<li class='navitem " .$css. "'>";
                                    $subLi .= $this->Html->link( $item['title'], '/'.$item['controller']."/".$item['action'] );
                                $subLi .=  "</li>";
                            }
                            echo '<li class="btn-group '.$supCss.'">';
                                echo '<a href="" data-toggle="dropdown" class="dropdown-toggle">'.$key.'<span class="caret"></span></a>';
                                echo '<ul role="menu" class="dropdown-menu">';
                                    echo $subLi;
                                echo '</ul>';
                            echo '</li>';
                        }
                    }
                }
            }
            ?>
        </ul>

        <?= $this->element('contextmenu_user') ?>

    </nav> <!-- /navigation -->

</div>
