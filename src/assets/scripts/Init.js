import Aos from "aos"

export class Init
{
    constructor ()
    {
        Aos.init({
            duration: 1000,
            easing: "ease-in-out",
        });
    }
}
