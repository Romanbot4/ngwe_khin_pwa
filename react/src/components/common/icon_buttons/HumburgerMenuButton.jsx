import MenuIcon from '/assets/icons/menu.svg';
import AddIcon from '/assets/icons/add.svg';

export default function HumburgerMenuButton({ isOpen = true, onClick }) {
    let label = isOpen ? "open menu" : "close menu";
    return <button type="button" aria-label={label} onClick={onClick}>
        <div className='relative h-8 w-8 text-neutral-600 dark:text-neutral-200'>
            <img src={AddIcon} alt={label} className={`text-primary absolute h-8 w-8 transition ${isOpen ? 'rotate-45 opacity-100' : 'rotate-0 opacity-0'}`} />
            <img src={MenuIcon} alt={label} className={`text-primary  absolute h-8 w-8 transition ${isOpen ? 'opacity-0' : 'opacity-100'}`} />
        </div>
    </button>
}
