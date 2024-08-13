import { useNavigate } from "react-router-dom";
import BrandLogo from "/assets/brand/wordmark.svg"

export default function WordmarkLogo() {
    let navigate = useNavigate();
    return <img src={BrandLogo} alt="" className="lg:max-h-10 max-h-8 cursor-pointer" onClick={() => navigate("/")} />;
}
