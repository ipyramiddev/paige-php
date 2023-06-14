<?php
    $url = 'https://www.yuurewards.com';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="canonical" href="https://cn.hkmobilel.link/" />
    <meta name="keywords" content="儲分" />
    <meta property="og:title" content="Login" />
    <meta property="og:image" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no, viewport-fit=cover" />
    <link rel="shortcut icon" href="<?php echo $url ?>/themes/custom/anfield/favicon.ico" />

    <title>Login | cn.hkmobilel</title>
    <link rel="stylesheet" media="all" href="<?php echo $url ?>/sites/default/files/css/css_kCPuei_SgQZJoGsmBDyJ_VkheqE_EAOA87sTDGl4xnQ.css" />
    <link rel="stylesheet" media="all" href="https://unpkg.com/element-ui@2.12.0/lib/theme-chalk/index.css" />
    <link rel="stylesheet" media="all" href="<?php echo $url ?>/sites/default/files/css/css_9d2kU1CUFA9CVbnVYP9lOtaFy3MRTcxUnMJ5oePDfZI.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.11/vue.min.js"></script>
</head>
<body>
    <div class="dialog-off-canvas-main-canvas">
        <div id="block-navigationbar">
            <div class="navbar" id="9107bef9-8f17-4438-a191-e38e28a006ba" style="width: 1007px; top: 0px;">
                <div id="nav" class="back_color">
                    <div class="header none show_view">
                        <div class="nav_tab">
                            <div class="logo"><img src="<?php echo $url ?>/themes/custom/anfield/js/assets/images/logo/nav_bar_logo.png" class="logo_img"></div>
                            <div class="menu_tab pc">
                                <div class="left_tab">
                                    <!---->
                                    <div class="tab_title about_partner title_tc">yuu合作夥伴</div>
                                    <div index="0" class="tab_title menu_title title_tc">yuu保險</div>
                                    <div class="tab_title rewards title_tc">獎賞</div>
                                    <div class="tab_title faq title_tc">常見問題</div>
                                    <div class="tab_title contact title_tc">聯絡我們</div>
                                </div>
                                <div class="right_tab">
                                    <div class="drop_down language_type region_type">
                                        <div class="lang_title">
                                            <div>地區</div>
                                            <i class="el-icon-arrow-down down"></i>
                                        </div>
                                        <ul class="lang_choose" style="display: none;">
                                            <li index="0" class="tab_li active">香港</li>
                                            <li index="1" class="tab_li">新加坡</li>
                                        </ul>
                                    </div>
                                    <div class="drop_down language_type">
                                        <div class="lang_title">
                                            <div>EN | 中</div>
                                            <i class="el-icon-arrow-down down"></i>
                                        </div>
                                        <ul class="lang_choose" style="display: none;">
                                            <li class="tab_li">EN</li>
                                            <li class="tab_li active">繁</li>
                                            <li class="tab_li">简</li>
                                        </ul>
                                    </div>
                                    <div id="headSignUp" class="tab_title regist title_tc">註冊</div>
                                    <!---->
                                    <div id="headLogin" class="tab_title login active title_tc">登入</div>
                                    <div class="point_data" v-show="accessToken" @click="rewardsTouchOver" @mouseover="rewardsMouseOver" @mouseleave="rewardsMouseLeave">
                                        <div class="rewards_content">
                                            <div class="rewards">
                                                <span class="txt">{{ rewards.point }}</span> <img src="<?php echo $url ?>/themes/custom/anfield/js/assets/images/woo-coin.png" class="icon"></div>
                                            <div class="money"><span class="txt">$-</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="right_content">
                                <div class="point_data phone" @click="rewardsTouchOver" @mouseover="rewardsMouseOver" @mouseleave="rewardsMouseLeave">
                                    <div class="rewards_content">
                                        <div class="rewards">
                                            <span class="txt">{{ rewards.point }}</span> <img src="<?php echo $url ?>/themes/custom/anfield/js/assets/images/woo-coin.png" class="icon"></div>
                                        <div class="money"><span class="txt">$-</span></div>
                                    </div>
                                </div>
                                <div class="menu_icon phone" @click="showMoreMenu"></div>
                            </div>
                            <div class="tablet tablet_menu" v-show="moreMenu">
                                <div class="phone_menu">
                                    <div class="menu_header">
                                        <img src="<?php echo $url ?>/themes/custom/anfield/js/assets/images/logo/nav_bar_logo.png" class="logo_img">
                                        <img src="<?php echo $url ?>/themes/custom/anfield/js/assets/images/icon/close-3.png" class="close_icon" @click="showMoreMenu"></div>
                                    <div class="menu_content font_light more_height">
                                        <div class="after_login">
                                            <div class="rewards_content">
                                                <div class="rewards"><span class="txt">-</span>
                                                    <img src="<?php echo $url ?>/themes/custom/anfield/js/assets/images/woo-coin.png" class="icon"></div>
                                                <div class="money"><span class="txt">$-</span></div>
                                            </div>
                                            <div class="menu_bar_table">
                                                <div class="tab_title history title_tc">交易記錄</div>
                                                <div class="tab_title settings no_border title_tc">設定</div>
                                            </div>
                                        </div>
                                        <div class="normal_menu" style="height:345px;">
                                            <div class="normal_top menu_bar_table">
                                                <!---->
                                                <div class="tab_title about_partner title_tc">yuu合作夥伴</div>
                                                <div index="0" class="tab_title menu_title title_tc">yuu保險</div>
                                                <div class="tab_title rewards title_tc">獎賞</div>
                                                <div class="tab_title faq title_tc">常見問題</div>
                                                <div class="tab_title contact title_tc">聯絡我們</div>
                                                <div class="tab_title regist title_tc">註冊</div>
                                                <div class="tab_title region_title no_border title_tc"><span>地區</span> <i class="el-icon-arrow-down down"></i> <i class="el-icon-arrow-up up" style="display: none;"></i></div>
                                                <div index="0" class="tab_title region_item no_border active title_tc" style="display: none;">香港</div>
                                                <div index="1" class="tab_title region_item no_border title_tc" style="display: none;">新加坡</div>
                                            </div>
                                            <div class="normal_bottom">
                                                <div class="left">
                                                    <div class="tab_title login active title_tc">登入</div>
                                                </div>
                                                <div class="right"><span class="tab_li first">EN</span> <span class="tab_li second active">繁</span> <span class="tab_li last">简</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="phone_menu phone"  v-show="moreMenu">
                                <div class="menu_header"><img src="<?php echo $url ?>/themes/custom/anfield/js/assets/images/logo/nav_bar_logo.png" class="logo_img"> <img src="<?php echo $url ?>/themes/custom/anfield/js/assets/images/icon/close-3.png" class="close_icon" @click="showMoreMenu"></div>
                                <div class="menu_content font_light">
                                    <div class="after_login">
                                        <div class="rewards_content">
                                            <div class="rewards"><span class="txt">-</span> <img src="<?php echo $url ?>/themes/custom/anfield/js/assets/images/woo-coin.png" class="icon"></div>
                                            <div class="money"><span class="txt">$-</span></div>
                                        </div>
                                        <div class="menu_bar_table">
                                            <div class="tab_title history title_tc">交易記錄</div>
                                            <div class="tab_title settings no_border title_tc">設定</div>
                                        </div>
                                    </div>
                                    <div class="normal_menu" style="height:345px;">
                                        <div class="normal_top menu_bar_table">
                                            <!---->
                                            <div class="tab_title about_partner title_tc">yuu合作夥伴</div>
                                            <div index="0" class="tab_title menu_title title_tc">yuu保險</div>
                                            <div class="tab_title rewards title_tc">獎賞</div>
                                            <div class="tab_title faq title_tc">常見問題</div>
                                            <div class="tab_title contact title_tc">聯絡我們</div>
                                            <div class="tab_title regist title_tc">註冊</div>
                                            <div class="tab_title region_title no_border title_tc"><span>地區</span> <i class="el-icon-arrow-down down"></i> <i class="el-icon-arrow-up up" style="display: none;"></i></div>
                                            <div index="0" class="tab_title region_item no_border active title_tc" style="display: none;">香港</div>
                                            <div index="1" class="tab_title region_item no_border title_tc" style="display: none;">新加坡</div>
                                        </div>
                                        <div class="normal_bottom">
                                            <div class="left">
                                                <div class="tab_title login active title_tc">登入</div>
                                            </div>
                                            <div class="right"><span class="tab_li first">EN</span> <span class="tab_li second active">繁</span> <span class="tab_li last">简</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="block-logininfo">
            <div class="login">
                <div>
                    <div class="login_view normal_view color_view show_view">
                        <div class="views">
                            <div class="back_img">
                                <img class="login_back" src="<?php echo $url ?>/themes/custom/anfield/js/assets/images/web_icon_login.png">
                            </div>
                            <div class="help_btn" onclick="moveToFaq()">
                                <span>?</span>
                            </div>
                            <div class="form_content content">
                                <div class="title">歡迎回來!</div>
                                <form class="el-form login-form">
                                    <div class="el-form-item title">
                                        <!---->
                                        <div class="el-form-item__content" style="margin-left: 0px;">
                                            <span class="font_light">手機號碼</span><!---->
                                        </div>
                                    </div>
                                    <div class="el-form-item phone_item is-required">
                                        <!---->
                                        <div class="el-form-item__content" style="margin-left: 0px;">
                                            <div class="phone_input">
                                                <div class="el-select code_select">
                                                    <!---->
                                                    <div class="el-input el-input--suffix">
                                                        <!----><input type="text" readonly="readonly" autocomplete="off" placeholder="請選擇" class="el-input__inner"><!---->
                                                        <span class="el-input__suffix">
                                                            <span class="el-input__suffix-inner">
                                                                <i class="el-select__caret el-input__icon el-icon-arrow-up"></i><!----><!----><!----><!----><!---->
                                                            </span>
                                                                                        <!---->
                                                        </span>
                                                        <!----><!---->
                                                    </div>
                                                    <div class="phone_input">
                                                        <el-select :popper-append-to-body="false" class="code_select" v-model="chooseCode">
                                                            <el-option
                                                                    v-for="(item, index) in contryPhoneCodes"
                                                                    :key="index"
                                                                    :label="item.showLabel"
                                                                    :value="item.value">
                                                            </el-option>
                                                        </el-select>
                                                    </div>
                                                </div>
                                                <div class="code_input el-input">
                                                    <!----><input type="text" autocomplete="off" class="el-input__inner">
                                                    <!----><!----><!----><!---->
                                                </div>
                                            </div>
                                            <!---->
                                        </div>
                                    </div>
                                    <div class="el-form-item title">
                                        <!---->
                                        <div class="el-form-item__content" style="margin-left: 0px;">
                                            <span class="font_light">密碼</span><!---->
                                        </div>
                                    </div>
                                    <div class="el-form-item is-required">
                                        <!---->
                                        <div class="el-form-item__content" style="margin-left: 0px;">
                                            <div class="el-input">
                                                <!----><input type="password" autocomplete="off" class="el-input__inner"><!----><!----><!----><!---->
                                            </div>
                                            <!---->
                                        </div>
                                    </div>
                                </form>
                                <div class="keep_login">
                                    <label class="el-checkbox sign_check">
                                        <span class="el-checkbox__input"><span class="el-checkbox__inner"></span><input type="checkbox" aria-hidden="false" class="el-checkbox__original" value=""></span><!---->
                                    </label>
                                    <span class="text font_light">保持登入狀態</span>
                                </div>
                                <div class="setup_btn font_light"><span class="under_line">忘記密碼?</span></div>
                                <div class="setup_btn second font_light">
                                    <div class="under_line">已於店舖註冊？ 設定你的賬戶</div>
                                </div>
                                <div class="submit">
                                    <button type="button" class="el-button next_btn bold_font el-button--primary">
                                        <!----><!----><span>登入</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="block-footermodel">
            <div class="footer-model">

                <div id="footer">
                    <div class="footer-padding"></div>
                    <div class="show_view">
                        <section class="floating-wrapper active animate__animated animate__fadeIn">
                            <div class="social-fb d-block d-lg-none"><a class="col_a" @click="moveToFacebook"><img class="img-social" src="<?php echo $url ?>/themes/custom/anfield/js/assets/images/home_rewards/img-floating-fb.png" alt=""></a></div>
                            <div class="social-ig d-block d-lg-none"><a class="col_a" @click="moveToIG"><img class="img-social" src="<?php echo $url ?>/themes/custom/anfield/js/assets/images/home_rewards/img-floating-ig.png" alt=""></a></div>
                            <div class="social-wrapper d-none d-lg-block">
                                <img class="img-social-bg" src="<?php echo $url ?>/themes/custom/anfield/js/assets/images/hant_images/img_desktop_floating@2x.png" alt="">
                                <a class="col_a" @click="moveToFacebook"><img class="floating-fb" src="<?php echo $url ?>/themes/custom/anfield/js/assets/images/home_rewards/img-floating-fb.png" alt=""></a>
                                <a class="col_a" @click="moveToIG"><img class="floating-ig" src="<?php echo $url ?>/themes/custom/anfield/js/assets/images/home_rewards/img-floating-ig.png" alt=""></a>
                            </div>
                        </section>
                        <footer>
                            <div class="inner-wrapper">
                                <div class="bubble-wrapper">
                                    <div class="d-none d-md-block">
                                        <img class="img-bubble-follow" src="<?php echo $url ?>/themes/custom/anfield/js/assets/images/hant_images/imgBubbleFollow@2x.png" alt="追蹤社交媒體">
                                        <div class="bubble-follow-icons">
                                            <a class="col_a" @click="moveToFacebook"><img class="footer-social fb" src="<?php echo $url ?>/themes/custom/anfield/js/assets/images/home_rewards/bnFooterFacebook@2x.png" alt="yuu Facebook"></a>
                                            <a class="col_a" @click="moveToIG"><img class="footer-social ig" src="<?php echo $url ?>/themes/custom/anfield/js/assets/images/home_rewards/bnFooterInstagram@2x.png" alt="yuu Instagram"></a>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <img class="img-bubble-download" src="<?php echo $url ?>/themes/custom/anfield/js/assets/images/hant_images/imgBubbleDownload@2x.png" alt="">
                                    </div>
                                </div>
                                <div class="download-wrapper text-center text-md-right">
                                    <div class="v-middle">
                                        <div class="d-inline-block">
                                            <a class="col_a" @click="moveToAppStore"><img class="app-download ios" src="<?php echo $url ?>/themes/custom/anfield/js/assets/images/hant_images/bnAppStore@2x.png" alt="下載 yuu app"><br></a>
                                            <a class="col_a" @click="moveToGooglePlay"><img class="app-download android" src="<?php echo $url ?>/themes/custom/anfield/js/assets/images/hant_images/bnPlayStore@2x.png" alt="下載 yuu app"></a>
                                        </div>
                                    </div>
                                    <div class="v-middle">
                                        <img class="app-icon-yuu" src="<?php echo $url ?>/sites/default/files/2020-07/wechat%20qr%20code%402x.png" alt="下載 yuu app">
                                    </div>
                                </div>
                                <div class="bubble-wrapper d-block d-md-none">
                                    <img class="img-bubble-follow" src="<?php echo $url ?>/themes/custom/anfield/js/assets/images/hant_images/imgBubbleFollow@2x.png" alt="">
                                    <div class="bubble-follow-icons">
                                        <a class="col_a" @click="moveToFacebook"><img class="footer-social fb" src="<?php echo $url ?>/themes/custom/anfield/js/assets/images/home_rewards/bnFooterFacebook@2x.png" alt=""></a>
                                        <a class="col_a" @click="moveToIG"><img class="footer-social ig" src="<?php echo $url ?>/themes/custom/anfield/js/assets/images/home_rewards/bnFooterInstagram@2x.png" alt=""></a>
                                    </div>
                                </div>
                                <div class="link-wrapper">
                                    <div class="row">
                                        <div class="col">
                                            <p>關於我們</p>
                                            <a class="col_a" @click="clickMenu('aboutPartner')">yuu合作夥伴</a>
                                            <a class="col_a" @click="clickMenu('faq')">常見問題</a>
                                            <a class="col_a" @click="clickMenu('contact')">聯絡我們</a>
                                        </div>
                                        <div class="col">
                                            <p>重要提示</p>
                                            <a class="col_a" @click="showTnc">條款及細則</a>
                                            <a class="col_a" @click="showPrivacyPolicy" >私隱政策</a>
                                            <a class="col_a" href="https://www.dairyfarmgroup.com/zh-HK/" target="_blank" >DFI零售集團</a>
                                        </div>
                                    </div>
                                    <div class="row mt-4 mb-5">
                                        <div class="col">
                                            <p class="smaller">@DFI Development (HK) Limited 版權所有</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </footer>
                    </div>
                </div>
                <div id='fb-root'></div>
                <div
                    class="fb-customerchat"
                    theme_color="#0084FF"
                    greeting_dialog_display="icon">
                </div>

                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        let wraper = document.getElementsByClassName("floating-wrapper");
                        if (wraper != null) {
                            let isHome = false;
                            if (window.location.pathname.startsWith('/en/home') ||
                                window.location.pathname.startsWith('/zh-hant/home') ||
                                window.location.pathname.startsWith('/zh-hans/home') ||
                                window.location.pathname == '/en/' ||
                                window.location.pathname == '/zh-hant/' ||
                                window.location.pathname == '/zh-hans/' ||
                                window.location.pathname == '/en' ||
                                window.location.pathname == '/zh-hant' ||
                                window.location.pathname == '/zh-hans' ||
                                window.location.pathname == '/') {
                                isHome = true;
                            }

                            if (!isHome) {
                                if (wraper.length == 1) {
                                    wraper[0].hidden = true;
                                }
                            }
                        }

                    });
                </script></div>
        </div>
    </div>

    <script>
        new Vue({
            el: "#nav",
            data: function () {
                return {
                    params: null,
                    pathname: '',
                    showView: false,
                    moreMenu: false,
                    chooseLang: false,
                    chooseRegion: false,
                    chooseAccount: false,
                    chooseAbout: false,
                    canSetEvent: false,
                    menuActive: "",
                    subMenuActive: "",
                    menuNameList: [],
                    regionMenuList: [],
                    currentRegion: '',
                    chooseCode: "+852",
                    contryPhoneCodes:[
                        {
                            showLabel:"+86",
                            value:"+86"
                        },
                        {
                            showLabel:"+852",
                            value:"+852"
                        },
                        {
                            showLabel:"+835",
                            value:"+835"
                        }
                    ],
                    accessToken: null,
                    refreshToken: null,
                    jwtToken: null,
                    keepLogin: false,
                    rewards: {
                        point: "-",
                        money: "$-",
                    },
                    pointTouch: false,
                };
            },
            created() {
                window.addEventListener("resize", function () {
                    this.setHeaderWidth();
                }.bind(this));
            },
            methods: {
                setHeaderWidth: function () {
                    if (this.pathname.indexOf("/setting/credit-card") > -1 || window.NoHeader) {
                        return;
                    }

                    this.$nextTick(function () {
                        setTimeout(function () {
                            $(".dialog-off-canvas-main-canvas > div:nth-child(1) .navbar, .dialog-off-canvas-main-canvas > div:first-child .navbar")
                                .width($(".dialog-off-canvas-main-canvas").width());

                            $(".top_content").width($(".dialog-off-canvas-main-canvas").width());
                            $(".reminder_content").width($(".dialog-off-canvas-main-canvas").width());
                            $(".fixed_bar").width($(".dialog-off-canvas-main-canvas").width());

                            var manageHeight = $("#toolbar-bar").height();
                            var toolbarHeight = $("#toolbar-bar")
                                .find(".toolbar-tray.is-active")
                                .height();
                            if ($("#toolbar-bar").find(".toolbar-tray.is-active").height()) {
                                manageHeight =
                                    $("#toolbar-bar").height() +
                                    $("#toolbar-bar").find(".toolbar-tray.is-active").height();
                            }
                            manageHeight = manageHeight ? manageHeight : 0;
                            var headerHeight = $(".navbar").height();
                            $(".dialog-off-canvas-main-canvas > div:nth-child(1) .navbar, .dialog-off-canvas-main-canvas > div:first-child .navbar")
                                .css({
                                    top: manageHeight + "px",
                                });
                            if ($(".top_content").css("position") === "fixed") {
                                $(".top_content").css({
                                    top: manageHeight + headerHeight + "px",
                                });
                            } else {
                                if (manageHeight > toolbarHeight) {
                                    $(".dialog-off-canvas-main-canvas > div:nth-child(2)").css({
                                        "margin-top":
                                            manageHeight - toolbarHeight + headerHeight - 1 + "px",
                                    });
                                } else {
                                    $(".dialog-off-canvas-main-canvas > div:nth-child(2)").css({
                                        "margin-top": manageHeight + headerHeight - 1 + "px",
                                    });
                                }
                            }
                            $(".fixed_bar").css({
                                top: manageHeight + headerHeight + "px",
                            });
                        }, 200);
                    });
                },
                showMoreMenu: function () {
                    this.moreMenu = !this.moreMenu;
                    if (this.moreMenu) {
                        $('body').addClass('no_scroll');
                        this.$nextTick(function () {
                            this.fontAuto();
                        }.bind(this));
                    } else {
                        $('body').removeClass('no_scroll');
                    }
                },
                fontAuto: function() {
                    var contentWidth = $('.phone_menu.phone').find('.rewards_content').width();
                    var rewards = $('.phone_menu.phone').find('.rewards_content').find('.rewards');
                    var money = $('.phone_menu.phone').find('.rewards_content').find('.money');
                    var size = 33.6;
                    console.log(contentWidth)
                    while (contentWidth < (rewards.width() + money.width())) {
                        size = size - 0.2;
                        $('.rewards_content').css({
                            'font-size': size + 'px'
                        });
                    }
                },
                rewardsMouseOver: function () {
                    $(".rewards_content").animate({ top: "-65px" }, 200);
                },
                rewardsMouseLeave: function () {
                    $(".rewards_content").animate({ top: "0" }, 200);
                },
                rewardsTouchOver: function () {
                    this.pointTouch = !this.pointTouch;
                    if (this.pointTouch) {
                        $(".rewards_content").animate({ top: "-65px" }, 200);
                    } else {
                        $(".rewards_content").animate({ top: "0" }, 200);
                    }
                },
            },
            mounted() {
                this.setHeaderWidth();
            },
        });
    </script>
</body>
</html>
