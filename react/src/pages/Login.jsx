import SocialLoginButton from '../components/buttons/SocialLoginButton';
import LoginCta from '/assets/images/landing/landing_4.svg';
import Google from "/assets/auth/google.svg";
import Facebook from "/assets/auth/facebook.svg";
import { useGoogleLogin } from '@react-oauth/google';
import { useEffect, useState } from 'react';


export default function Login() {
    const [token, setToken] = useState(null);
    const [user, setUser] = useState(null);

    const updateUser = async () => {
        setUser(await getUserInfo());
    };

    useEffect(() => {
        if (token == null) return;
        updateUser();
    }, [token]);

    // email: "tice.lover1500@gmail.com"
    // family_name: "Phyo"
    // given_name: "Kyaw Pyae"
    // id: "104814110354431429034"
    // name: "Kyaw Pyae Phyo"
    // picture: "https://lh3.googleusercontent.com/a/ACg8ocJDBTqWaCO80hMhoFsJXXRrCelXn8PQzXeQzyucI9Pk2LnR6U-t=s96-c"
    // verified_email:  true
    const getUserInfo = async () => {
        let res = await fetch(`https://www.googleapis.com/oauth2/v1/userinfo?access_token=${token}`, {
            headers: {
                'Authorization': `Bearer ${token}`,
                'Accept': 'Application/json'
            }
        });
        return await res.json();
    }

    const loginWithGoogle = useGoogleLogin({
        onSuccess: tokenResponse => {
            setToken(tokenResponse.access_token)
        },
        onError: error => console.log(error),
    });

    return <main className="mx-auto container">
        <div className="min-h-screen grid lg:grid-cols-2 content-start lg:content-center lg:mt-0 justify-start mt-24">
            <div>
                <div className="text-4xl font-semibold text-neutral-700 dark:text-neutral-200" >
                    Welcome
                </div>
                <div className="text-sm font-regular text-neutral-400 mt-1">
                    eliminate paper trails and focus on what's really matter
                </div>
                <img src={LoginCta} alt="Log in to Ngwe Khin" className="mt-6" />
            </div>
            <div className="mt-8 lg:self-end">
                <div className="text-sm lg:text-lg font-semibold text-neutral-600 dark:text-neutral-200 mb-2 lg:mb-4">Login with</div>
                <SocialLoginButton label="Google" assetIcon={Google} onPressed={() => loginWithGoogle()} />
                <div className="my-2 lg:my-4"></div>
                <SocialLoginButton label="Facebook" assetIcon={Facebook} />
            </div>
        </div>
    </main>
}
