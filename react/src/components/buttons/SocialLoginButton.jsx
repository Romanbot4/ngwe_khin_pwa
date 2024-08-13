

export default function SocialLoginButton({ label, assetIcon, onPressed}) {
    return <div className="relative" onClick={onPressed}>
        <button type="button" className="relative w-full bg-neutral-50 py-3 rounded-lg shadow-sm text-md font-semibold">
            {label}
        </button>
        <div className="grid absolute top-0 bottom-0 content-center">
            <img src={assetIcon} alt="Google" className="h-7 ml-3 top-0 bottom-0 left-0" />
        </div>
    </div>;
}
