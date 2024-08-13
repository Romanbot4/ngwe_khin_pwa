import WordmarkLogo from "../logo/WordmarkLogo";
import FacebookIcon from "/assets/social-icons/facebook.svg";
import YoutubeIcon from "/assets/social-icons/youtube.svg";
import InstagramIcon from "/assets/social-icons/instagram.svg";
import PinterestIcon from "/assets/social-icons/pinterest.svg";
import PlayStoreDownloadImg from "/assets/download-buttons/download-on-play-store.png";
import AppStoreDownloadImg from "/assets/download-buttons/download-on-app-store.png";

export default function Footer() {
    let socialItems = [
        {
            name: "Faceobok",
            assetImage: FacebookIcon,
            link: "#",
        },
        {
            name: "YouTube",
            assetImage: YoutubeIcon,
            link: "#",

        },
        {
            name: "Instagram",
            assetImage: InstagramIcon,
            link: "#",
        },
        {
            name: "Pinterest",
            assetImage: PinterestIcon,
            link: "#",
        }
    ];

    return <footer className="bg-primary-950">
        <div className="container mx-auto px-4 py-8 grid gap-6 justify-between lg:grid-cols-3 md:grid-cols-2 grid-cols-1">
            <div className="grid justify-between">
                <div>
                    <WordmarkLogo />
                    <p className="text-xs text-neutral-300 mt-1">
                        Effortlessly manage your expenses!
                    </p>
                </div>
                <ul className="flex gap-8 justify-between pt-6">
                    {
                        socialItems.map(({ name, assetImage, link }) => {
                            return (<li key={name}>
                                <a className="text-neutral-50" href={link} aria-label={name}>
                                    <img src={assetImage} alt={name} />
                                </a>
                            </li>);
                        })
                    }
                </ul>
            </div>
            <ul className="columns-2" role="list">
                <li><a className="block text-sm font-medium text-neutral-50 py-2" href="#">Home</a></li>
                <li><a className="block text-sm font-medium text-neutral-50 py-2" href="#">Products</a></li>
                <li><a className="block text-sm font-medium text-neutral-50 py-2" href="#">About us</a></li>
                <li><a className="block text-sm font-medium text-neutral-50 py-2" href="#">Terms & conditions</a></li>
                <li><a className="block text-sm font-medium text-neutral-50 py-2" href="#">Privacy policy</a></li>
            </ul>
            <div className="grid grid-flow-col gap-4 items-start justify-start lg:grid-flow-row lg:items-center lg:justify-self-end">
                <img src={PlayStoreDownloadImg} alt="" />
                <img src={AppStoreDownloadImg} alt="" />
            </div>
        </div>
    </footer>
}
