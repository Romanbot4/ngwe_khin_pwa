import { Outlet } from "react-router-dom"
import Footer from "../footer/Footer"
import NavBar from "../navbar/NavBar"

export default function PageLayout() {
    return <>
        <NavBar />
        <Outlet />
        <Footer />
    </>
}
