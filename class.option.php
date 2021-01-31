<?php

    class CHNF_Option
    {

        private $_settings;

        public function __construct() {
            /**
             ** 缓存插件设置
            */
            $this->_settings = get_option( 'festival_setting' );

            /**
             ** 事件绑定
            **/
            add_action( 'admin_menu', array( $this, 'menu' ) );
            add_action( 'admin_init', array( $this, 'page_init' ) );
            add_filter( 'plugin_action_links', array( $this, 'plugin_action_link' ), 10, 4 );
        }
    
        /**
         * 显示后台菜单
         */
        public function menu() {
            add_menu_page( '中国节日', '中国节日', 'manage_options', CHNF_NAME, array( $this, 'show_settings' ), 'dashicons-art' );

            add_action( 'admin_init', array( $this, 'festival_setting' ) );
        }

        public function show_settings() {
            @require_once( 'include/setting.php' );
        }

        /**
         * 注册设置数组
         */
        public function festival_setting() {
            register_setting( 'festival_setting_group', 'festival_setting' );
        }

        /**
         * 添加写文章所需要的js和css
         */
        function page_init() {
            global $pagenow;

            if ( $pagenow == "admin.php" && $_GET['page'] == CHNF_NAME ) {
                //上传音乐支持
                // wp_enqueue_media();
                // $this->_css( 'hermit-library' );
                // $this->_libjs( 'watch,handlebars,jquery.mxloader,jquery.mxpage,jquery.mxlayer' );
                // $this->_js( 'hermit-library' );
            }
        }

        /**
         * settings - 插件设置
         *
         * @param $key
         *
         * @return bool
         */
        public function settings( $key ) {
            $defaults = array(
                'lantern'        => 0,
                'lantern_l'      => '新年',
                'lantern_r'      => '快乐',
                'background'     => 0,
                'zindex'         => -1,
            );

            $settings = $this->_settings;
            $settings = wp_parse_args( $settings, $defaults );

            return $settings[ $key ];
        }

        /**
         * 添加设置按钮
         */
        public function plugin_action_link( $actions, $plugin_file, $plugin_data ) {
            if ( strpos( $plugin_file, CHNF_NAME ) !== false && is_plugin_active( $plugin_file ) ) {
                $_actions = array( 'option' => '<a href="' . CHNF_ADMIN_URL . 'admin.php?page=' . CHNF_NAME . '">设置</a>' );
                $actions  = array_merge( $_actions, $actions );
            }

            return $actions;
        }
    }