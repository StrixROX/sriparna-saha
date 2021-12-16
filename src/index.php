<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dr. Sriparna Saha</title>
    
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/vue-router/dist/vue-router.js"></script>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500;800&family=Roboto+Mono:wght@700&family=Noto+Sans+Display:wght@200;400&display=swap"
        rel="stylesheet"
    >
    
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.13.1/css/OverlayScrollbars.min.css"
        integrity="sha512-jN4O0AUkRmE6Jwc8la2I5iBmS+tCDcfUd1eq8nrZIBnDKTmCp5YxxNN1/aetnAH32qT+dDbk1aGhhoaw5cJNlw=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />

    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/common_resp.css">
    <link href='https://css.gg/chevron-down-o.css' rel='stylesheet'>

</head>
<body class="mob-close">
    <div id="app">
        <nav :class="['navbar', 'mob-close', page.title]">
            <div class="action-button"></div>
            <router-link to="/"><span class="text"> Home </span><span class="indic"></span></router-link>
            <router-link to="/about"><span class="text"> About </span><span class="indic"></span></router-link>
            <router-link to="/academia"><span class="text"> Academia </span><span class="indic"></span></router-link>
            <router-link to="/work"><span class="text"> Work </span><span class="indic"></span></router-link>
            <router-link to="/awards"><span class="text"> Awards </span><span class="indic"></span></router-link>
            <router-link to="/contact"><span class="text"> Contact </span><span class="indic"></span></router-link>
        </nav>
        <div :class="['banner', page.title]">
            <img class="pic" src="../assets/sriparna.png">
            <transition name="fade" mode="out-in">
                <h1 class="text" :key="this.page.title">{{ this.page.customBannerText ? this.page.customBannerText : "&nbsp;" }}</h1>
            </transition>
        </div>
        <transition name="fade" mode="out-in">
            <router-view @view-mounted="onViewMount"></router-view>
        </transition>
    </div>
    <script>
        const commonFeatures = {
            beforeMount: (component) => {
                // component.$emit("before-view-mounted");
            },
            mounted: (component) => {
                const mountData = {
                    title: component.title,
                    customBannerText: (component.customBannerText ? component.customBannerText : component.title)
                }
                component.$emit("view-mounted", mountData);
            }
        }

        const Home = {
            template: `<?php echo file_get_contents("./pages/home.html") ?>`,
            data: () => {
                return {
                    title: "Home",
                    customBannerText: "Dr. Sriparna Saha",
                    styles: [
                        "./css/home.css"
                    ]
                }
            },
            beforeMount: function() {
                commonFeatures.beforeMount(this);
            },
            mounted: function() {
                commonFeatures.mounted(this);
            }
        };
        const About = {
            template: `<?php echo file_get_contents("./pages/about.html") ?>`,
            data: () => {
                return {
                    title: "About",
                    styles: [
                        "./css/about.css",
                        "./css/about_resp.css"
                    ]
                }
            },
            beforeMount: function() {
                commonFeatures.beforeMount(this);
            },
            mounted: function() {
                commonFeatures.mounted(this);
            }
        };
        const Acads = {
            template: `<?php echo file_get_contents("./pages/acads.html") ?>`,
            data: () => {
                return {
                    title: "Academia",
                    styles: [
                        "./css/acads.css"
                    ]
                }
            },
            beforeMount: function() {
                commonFeatures.beforeMount(this);
            },
            mounted: function() {
                commonFeatures.mounted(this);
            }
        };
        const Work = {
            template: `<?php echo file_get_contents("./pages/work.html") ?>`,
            data: () => {
                return {
                    title: "Work",
                    styles: [
                        "./css/work.css"
                    ]
                }
            },
            beforeMount: function() {
                commonFeatures.beforeMount(this);
            },
            mounted: function() {
                commonFeatures.mounted(this);
            }
        };
        const Awards = {
            template: `<?php echo file_get_contents("./pages/awards.html") ?>`,
            data: () => {
                return {
                    title: "Awards",
                    styles: [
                        "./css/awards.css"
                    ]
                }
            },
            beforeMount: function() {
                commonFeatures.beforeMount(this);
            },
            mounted: function() {
                commonFeatures.mounted(this);
            }
        };
        const Contact = {
            template: `<?php echo file_get_contents("./pages/contact.html") ?>`,
            data: () => {
                return {
                    title: "Contact",
                    styles: [
                        "./css/contact.css"
                    ]
                }
            },
            beforeMount: function() {
                commonFeatures.beforeMount(this);
            },
            mounted: function() {
                commonFeatures.mounted(this);
            }
        };
    </script>
    <script src="./router/index.js"></script>
    <script>
        const app = new Vue({
            router: router,
            el: "#app",
            data: () => {
                return {
                    page: {
                        title: "",
                        customBannerText: "",
                    }
                }
            }, 
            methods: {
                onViewMount(data){
                    this.page.title = data.title;
                    this.page.customBannerText = data.customBannerText;

                    $("html, body").animate({
                        scrollTop: ($(window).scrollTop() > window.outerHeight/2 ? window.outerHeight : 0)
                    }, 500);

                    $(".navbar").removeClass("mob-open").addClass("mob-close");
                    $(".navbar .action-button").unbind().click(function() {
                        $(this).parent().toggleClass("mob-close mob-open");
                        $("body").toggleClass("mob-close mob-open");
                    });
                    $(".navbar .action-button a").click(function() {
                        $(this).parent().parent().removeClass("mob-open").addClass("mob-close");
                    });
                    
                    $(".dropdown-container .item .heading").click(function() {
                        const item = $(this).parent();

                        item.toggleClass("open close");
                    });

                    // $(window).scroll(() => {
                    //     let scrollFraction = $(window).scrollTop()/window.outerHeight;
                    //     scrollFraction = scrollFraction <= 1 ? scrollFraction : 1;

                    //     $("section").css({
                    //         background: "rgba(0, 0, 0, " + String(0.35 * scrollFraction) + ")"
                    //     })
                    // })
                    
                    // if(data.title != "Home"){
                    //     let moved = false;
                    //     $(window).scroll(() => {
                    //         if(!moved){
                    //             $("html, body").animate({
                    //                 scrollTop: window.outerHeight
                    //             }, 500);
                                
                    //             moved = !moved;
                    //         }
                    //     });
                    // }
                },
            }
        });
    </script>
</body>
</html>