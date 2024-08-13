export default function FeatureInfoCard({ title, description, assetImage, reverse = true }) {
    return <div className="grid md:grid-cols-2 lg:gap-12 gap-6 items-start">
        <div className={`rounded-2xl md:dark:bg-primary-900 md:bg-primary-100 w-full flex justify-center ${reverse ? "md:row-start-1 md:col-start-2" : ""}`}>
            <img src={assetImage} alt="" className="max-h-60" />
        </div>
        <div className="dark:text-neutral-100 grid gap-4">
            <div className="font-bold text-2xl">
                {title}
            </div>
            <div className="text-base dark:text-neutral-300 text-neutral-600">
                {description}
            </div>
        </div>
    </div>
}
