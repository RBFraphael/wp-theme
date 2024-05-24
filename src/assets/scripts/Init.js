import Aos from "aos"

export class Init
{
    constructor ()
    {
        window.onload = () => {
            setTimeout(() => {
                this.init();
            }, 1000);
        };

        this.smoothScroll();
    }

    init()
    {
        setTimeout(() => {
            Aos.init({
                duration: 1000,
                easing: "ease-in-out",
                once: true,
                offset: 200,
            });
            
            window.aosRefresh = setInterval(() => {
                Aos.refresh();
            }, 500);
        }, 500);
    }

    smoothScroll()
    {
        window.lenis = new Lenis();

        window.lenisRaf = (time) => {
            window.lenis.raf(time);
            requestAnimationFrame(window.lenisRaf);
        };

        requestAnimationFrame(window.lenisRaf);
    }
}
