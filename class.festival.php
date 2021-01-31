<?php

class ChineseFestivals
{

    private $_options;
    
    public function __construct($options) {
        $this->_options = $options;
    }

    public function load() {
        add_action( 'wp_enqueue_scripts', array($this, "load_scripts") );
        add_action( 'wp_footer', array($this, "load_html") );

        if ( $this->_options->settings( 'zindex' ) != -1 ) {
            add_action( 'wp_head', array($this, 'set_zindex') );
        }
    }


    // 加载脚本
    public function load_scripts() {
        if ( $this->_options->settings( 'lantern' ) == 1 || $this->_options->settings( 'background' ) != 0 ) {
            $this->_load_spring_css();
        }
    }

    protected function _load_spring_css() {
        wp_enqueue_style("festivals", CHNF_URL . '/asserts/css/spring-festival.css', array(), CHNF_VERSION, false);
    }

    public function set_zindex() {
        $style = sprintf( '<style type="text/css">.area{z-index:%d}</style>', $this->_options->settings( 'zindex' ) );
        echo $style;
    }

    public function load_html() {
        if ( $this->_options->settings( 'lantern' ) == 1 ) {
            $this->_load_lantern_html( $this->_options->settings( 'lantern_l' ), $this->_options->settings( 'lantern_r' ) );
        }
        
        if ( $this->_options->settings( 'background' ) == 1 ) {
            $this->_load_swing_blessing();
        }

        if ( $this->_options->settings( 'background' ) == 2 ) {
            $this->_load_twinkle_blessing();
        }
    }

    // 加载灯笼html结构
    protected function _load_lantern_html($left_text, $right_text) {
        $html = '
            <div class="lantern-box-left">
                <div class="lantern">
                    <div class="lantern-line"></div>
                    <div class="lantern-body">
                        <div class="lantern-container">
                            <div class="lantern-text">%s</div>
                        </div>
                    </div>
                    <div class="tassel tassel-thin">
                        <div class="tassel-dot"></div>
                        <div class="tassel-bold"></div>
                    </div>
                </div>
            </div>

            <div class="lantern-box-right">
                <div class="lantern">
                    <div class="lantern-line"></div>
                    <div class="lantern-body">
                        <div class="lantern-container">
                            <div class="lantern-text">%s</div>
                        </div>
                    </div>
                    <div class="tassel tassel-thin">
                        <div class="tassel-dot"></div>
                        <div class="tassel-bold"></div>
                    </div>
                </div>
            </div>';
        
        printf($html, $left_text, $right_text);
    }

    // 加载背景福字飘动
    protected function _load_swing_blessing() {
        $html = '
            <div class="area" >
                <ul class="blessing">
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                </ul>
            </div >';

        echo $html;
    }

    // 加载背景福字闪烁
    protected function _load_twinkle_blessing() {
        $html = 
        '<div class="area" >
            <div class="cube"></div>
            <div class="cube"></div>
            <div class="cube"></div>
            <div class="cube"></div>
            <div class="cube"></div>
            <div class="cube"></div>
            <div class="cube"></div>
        </div >';

        echo $html;
    }
}