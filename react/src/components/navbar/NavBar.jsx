import { useState } from "react"
import PrimaryButton from "../common/buttons/PrimaryButton"
import HumburgerMenuButton from "../common/icon_buttons/HumburgerMenuButton";
import useScreenSize from "../../hooks/use_screen_size";
import WordmarkLogo from "../logo/WordmarkLogo";
import { useNavigate } from "react-router-dom";

export default function NavBar() {
    const navigate = useNavigate();
    const [showMenu, setShowMenu] = useState(false);
    const [width] = useScreenSize();
    if (width > 1024 && showMenu) setShowMenu(false);

    return <header className={`z-auto fixed left-0 right-0 bg-background dark:bg-background-dark container mx-auto px-4 py-2 lg:flex lg:items-center lg:justify-between lg:gap-4 ${showMenu ? 'bg-surface dark:bg-surface-dark' : ''}`}>
        <span className="flex justify-between">
            <a aria-label="Home" className={`transition-opacity ${showMenu ? 'pointer-events-none opacity-0' : 'opacity-100'}`}>
                <WordmarkLogo />
            </a>

            <span className="lg:hidden block">
                <HumburgerMenuButton isOpen={showMenu} onClick={() => setShowMenu(!showMenu)} />
            </span>
        </span>

        <nav className={`${showMenu ? 'block' : 'hidden'} lg:block`}>
            <ul className="lg:flex lg:gap-4 lg:items-center transition-transform">
                <li><a href="#" className="font-regular dark:text-on-primary block px-2 py-4 w-full">Home</a></li>
                <li><a href="/others" className="font-regular dark:text-on-primary block px-2 py-4 w-full">Others</a></li>
                <li><a href="/about-us" className="font-regular dark:text-on-primary block px-2 py-4 w-full">About us</a></li>
            </ul>
        </nav>


        <span className="lg:block hidden">
            <PrimaryButton onClick={() => navigate("/login")} label="Login" />
        </span>
    </header>
}
