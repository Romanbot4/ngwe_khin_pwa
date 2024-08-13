export default function PrimaryButton({ label, onClick, }) {
    return <button type="button" className="bg-primary-500 text-on-primary font-semibold rounded-full px-8 py-3 hover:bg-opacity-90" onClick={onClick}>
        {label}
    </button>
}
