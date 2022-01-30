import LazyLoad from "vanilla-lazyload";
import { AOS } from "aos";

export class CoreFeatures
{
    constructor()
    {
        this.initLazyload();
        this.initAos();
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
}