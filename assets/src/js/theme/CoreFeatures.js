import LazyLoad from "vanilla-lazyload";
import AOS from "aos";
import jQuery from "jquery";
import barba from "@barba/core";
import { Blocks } from "./components/blocks/blocks";

export class CoreFeatures
{
    constructor()
    {
        this.initLazyload();
        this.initAos();
        this.loader();
        this.initBarbaJS();

        jQuery(".drawer-overlay").on("click", this.closeDrawer);
        window.openDrawer = this.openDrawer;
        window.closeDrawer = this.closeDrawer;
    }

    initLazyload()
    {
        if(typeof(window.lazyload) == "undefined"){
            window.lazyload = new LazyLoad();
        }
    
        window.lazyload.update();
        setTimeout(this.initLazyload, 1000);
    }

    initAos()
    {
        AOS.init({
            duration: 750,
            easing: "ease-in-out",
            offset: 160
        });
    }

    openDrawer()
    {
        if(jQuery(".drawer-overlay").hasClass("d-none")){
            jQuery(".drawer-overlay").removeClass("d-none");
        }

        if(!jQuery(".drawer-overlay").hasClass("d-block")){
            jQuery(".drawer-overlay").addClass("d-block");
        }

        jQuery(".drawer").css("left", "0");
    }

    closeDrawer()
    {
        if(jQuery(".drawer-overlay").hasClass("d-block")){
            jQuery(".drawer-overlay").removeClass("d-block");
        }

        if(!jQuery(".drawer-overlay").hasClass("d-none")){
            jQuery(".drawer-overlay").addClass("d-none");
        }

        jQuery(".drawer").css("left", "-330px");
    }

    loader()
    {
        jQuery(window).on("load", () => {
            if(jQuery("#loader").length > 0){
                setTimeout(() => {
                    jQuery("#loader").fadeOut(1000);
                }, 500);
            }
        });
    }

    initBarbaJS()
    {
        if(jQuery("[data-barba]").length > 0){
            barba.init({
                prefetchIgnore: true,
                timeout: 5000,
                transitions: [{
                    name: "default",
                    leave: (data) => {
                        return new Promise((resolve, reject) => {
                            jQuery("#page-transition").addClass("show");
                            setTimeout(resolve, 500);
                        });
                    },
                    enter: (data) => {
                        setTimeout(() => {
                            jQuery("#page-transition").removeClass("show");
                        }, 500);
                    },
                    afterEnter: () => {
                        jQuery("html,body").scrollTop(0);
                        setTimeout(() => {
                            new Blocks();
                            this.initAos();
                            this.initLazyload();
                        }, 200);
                    }
                }]
            });
        }
    }
}