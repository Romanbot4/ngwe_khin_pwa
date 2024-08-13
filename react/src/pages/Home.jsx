import FeatureInfoCard from "../components/card/feature_info/FeatureInfoCard";
import PrimaryButton from "../components/common/buttons/PrimaryButton";
import Landing1 from "/assets/images/landing/landing_1.svg";
import Landing2 from "/assets/images/landing/landing_2.svg";
import Landing3 from "/assets/images/landing/landing_3.svg";
import DemoVideo from "/assets/videos/app_demo.mp4";

export default function Home() {
    let features = [
        {
            title: "Master Your Money: Expense Manager",
            description: "Track every dollar with precision, set realistic budgets, and achieve your financial goals effortlessly. Our app provides detailed insights and analytics to help you master your money management. With features like category-wise spending analysis, reminders for due bills, and secure data backup, you’ll have everything you need to stay on top of your finances and make informed decisions.",
            assetImage: Landing1
        },
        {
            title: "Smart Budgeting: Expense Manager",
            description: "Simplify your finances with our easy-to-use tracking and saving tools. Create custom budgets tailored to your lifestyle, monitor your expenses in real-time, and get comprehensive reports to make informed financial decisions. Our app offers intuitive charts, expense categorization, and alerts to ensure you never overspend. Stay on top of your financial health with our seamless and user-friendly interface.",
            assetImage: Landing2
        },
        {
            title: "Boost Savings: Expense Manager",
            description: "Optimize your spending habits and watch your savings grow with our advanced expense management app. Set personalized savings goals, receive actionable tips and insights, and enjoy a seamless experience designed to help you achieve financial success. Our app features automatic expense tracking, detailed spending reports, and secure cloud sync to keep your data safe. Take control of your financial future with tools that make saving effortless and effective.",
            assetImage: Landing3
        }
    ];

    return <main className="mx-auto container my-6 grid grid-flow-row gap-8">
        <div className="min-h-screen grid items-center justify-center">
            <div className="grid grid-cols-1 lg:grid-cols-2 pb-4 lg:pb-12 gap-10 lg:gap-12">
                <div>
                    <div className="text-4xl lg:text-8xl font-bold text-neutral-700 dark:text-neutral-200 pb-4">
                        Write. Plan. Organize.
                        <div className="lg:text-2xl text-xl font-normal pt-4 text-neutral-400">
                            With the help of Ngwe Khin
                        </div>
                    </div>
                    <PrimaryButton label={"Get started"} onClick={() => {
                        window.location.href = "/login";
                    }}/>
                </div>
                <video autoPlay muted loop src={DemoVideo} className="h-full object-cover rounded-2xl row-start-1" type="video/mp4"></video>
            </div>
        </div>
        {
            features.map((e, index) => {
                return <div className="pb-4 lg:pb-40">
                    <FeatureInfoCard key={index}  {...e} reverse={(index % 2) == 0} />
                </div>
            })
        }
    </main>
}
