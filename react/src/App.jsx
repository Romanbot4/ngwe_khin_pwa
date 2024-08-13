import { BrowserRouter, Routes, Route } from "react-router-dom"
import PageLayout from "./components/layout/Layout"
import Home from "./pages/Home"
import Login from "./pages/Login"

import { GoogleOAuthProvider } from '@react-oauth/google';
export default function App() {
    return <GoogleOAuthProvider clientId="461240179383-ovvi902406r9q2gq4g7ib1a2rqb8uev3.apps.googleusercontent.com">
        <BrowserRouter>
            <Routes>
                <Route element={<PageLayout />}>
                    <Route path="/" element={<Home />} />
                    <Route path="/login" element={<Login />} />
                </Route>
            </Routes>
        </BrowserRouter>
    </GoogleOAuthProvider>;
}
